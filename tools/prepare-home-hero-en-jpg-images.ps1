param(
    [int]$TargetSizeKB = 100,
    [int]$MaxWidth = 1600,
    [int]$MaxHeight = 750
)

$ErrorActionPreference = "Stop"

Add-Type -AssemblyName System.Drawing

$projectRoot = Split-Path -Parent $PSScriptRoot
$sourceDirectory = Join-Path $projectRoot "public\assets\images\main\hero_en"
$backupDirectory = Join-Path $projectRoot "storage\app\image-backups\hero_en-original-png"

$targetBytes = $TargetSizeKB * 1KB

if (-not (Test-Path $sourceDirectory)) {
    throw "Images directory not found: $sourceDirectory"
}

New-Item -ItemType Directory -Path $backupDirectory -Force | Out-Null

$jpegCodec = [System.Drawing.Imaging.ImageCodecInfo]::GetImageEncoders() |
    Where-Object { $_.MimeType -eq "image/jpeg" } |
    Select-Object -First 1

if (-not $jpegCodec) {
    throw "JPEG encoder is not available."
}

function New-ResizedBitmap {
    param(
        [System.Drawing.Image]$SourceImage,
        [int]$Width,
        [int]$Height
    )

    $bitmap = New-Object System.Drawing.Bitmap(
        $Width,
        $Height,
        [System.Drawing.Imaging.PixelFormat]::Format24bppRgb
    )

    $bitmap.SetResolution(72, 72)

    $graphics = [System.Drawing.Graphics]::FromImage($bitmap)

    try {
        $graphics.Clear([System.Drawing.Color]::White)
        $graphics.CompositingMode =
            [System.Drawing.Drawing2D.CompositingMode]::SourceCopy
        $graphics.CompositingQuality =
            [System.Drawing.Drawing2D.CompositingQuality]::HighQuality
        $graphics.InterpolationMode =
            [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
        $graphics.SmoothingMode =
            [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
        $graphics.PixelOffsetMode =
            [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality

        $destinationRectangle = New-Object System.Drawing.Rectangle(
            0,
            0,
            $Width,
            $Height
        )

        $graphics.DrawImage(
            $SourceImage,
            $destinationRectangle,
            0,
            0,
            $SourceImage.Width,
            $SourceImage.Height,
            [System.Drawing.GraphicsUnit]::Pixel
        )
    }
    finally {
        $graphics.Dispose()
    }

    return $bitmap
}

function Save-Jpeg {
    param(
        [System.Drawing.Bitmap]$Bitmap,
        [string]$OutputPath,
        [int]$Quality
    )

    Remove-Item $OutputPath -Force -ErrorAction SilentlyContinue

    $encoderParameters =
        New-Object System.Drawing.Imaging.EncoderParameters(1)

    $qualityParameter =
        New-Object System.Drawing.Imaging.EncoderParameter(
            [System.Drawing.Imaging.Encoder]::Quality,
            [long]$Quality
        )

    $encoderParameters.Param[0] = $qualityParameter

    try {
        $Bitmap.Save(
            $OutputPath,
            $jpegCodec,
            $encoderParameters
        )
    }
    finally {
        $qualityParameter.Dispose()
        $encoderParameters.Dispose()
    }
}

$qualities = @(82, 78, 74, 70, 66, 62, 58, 54, 50, 46, 42, 38, 34, 30)
$dimensionScales = @(1.00, 0.90, 0.80, 0.70, 0.60, 0.50, 0.45)

$results = @()

foreach ($number in 1..6) {
    $sourcePath = Join-Path $sourceDirectory "$number.png"
    $outputPath = Join-Path $sourceDirectory "$number.jpg"
    $temporaryPath = Join-Path $sourceDirectory "$number.tmp.jpg"
    $backupPath = Join-Path $backupDirectory "$number.png"

    if (-not (Test-Path $sourcePath)) {
        throw "Source image not found: $sourcePath"
    }

    Copy-Item $sourcePath $backupPath -Force

    $originalSize = (Get-Item $sourcePath).Length
    $sourceImage = [System.Drawing.Image]::FromFile($sourcePath)

    $completed = $false
    $selectedWidth = 0
    $selectedHeight = 0
    $selectedQuality = 0

    try {
        $baseRatio = [Math]::Min(
            $MaxWidth / $sourceImage.Width,
            $MaxHeight / $sourceImage.Height
        )

        $baseRatio = [Math]::Min(1.0, $baseRatio)

        foreach ($dimensionScale in $dimensionScales) {
            $finalRatio = $baseRatio * $dimensionScale

            $width = [Math]::Max(
                1,
                [int][Math]::Round(
                    $sourceImage.Width * $finalRatio
                )
            )

            $height = [Math]::Max(
                1,
                [int][Math]::Round(
                    $sourceImage.Height * $finalRatio
                )
            )

            $resizedBitmap = New-ResizedBitmap `
                -SourceImage $sourceImage `
                -Width $width `
                -Height $height

            try {
                foreach ($quality in $qualities) {
                    Save-Jpeg `
                        -Bitmap $resizedBitmap `
                        -OutputPath $temporaryPath `
                        -Quality $quality

                    $temporarySize =
                        (Get-Item $temporaryPath).Length

                    if ($temporarySize -le $targetBytes) {
                        Remove-Item $outputPath `
                            -Force `
                            -ErrorAction SilentlyContinue

                        Move-Item `
                            -Path $temporaryPath `
                            -Destination $outputPath `
                            -Force

                        $completed = $true
                        $selectedWidth = $width
                        $selectedHeight = $height
                        $selectedQuality = $quality

                        break
                    }
                }
            }
            finally {
                $resizedBitmap.Dispose()
            }

            if ($completed) {
                break
            }
        }
    }
    finally {
        $sourceImage.Dispose()

        Remove-Item $temporaryPath `
            -Force `
            -ErrorAction SilentlyContinue
    }

    if (-not $completed) {
        throw "Could not reduce image below ${TargetSizeKB}KB: $sourcePath"
    }

    $compressedSize = (Get-Item $outputPath).Length

    $results += [PSCustomObject]@{
        Image         = "$number.jpg"
        OriginalKB    = [Math]::Round($originalSize / 1KB, 2)
        CompressedKB  = [Math]::Round($compressedSize / 1KB, 2)
        Width         = $selectedWidth
        Height        = $selectedHeight
        Quality       = $selectedQuality
        SavedPercent  = [Math]::Round(
            (1 - ($compressedSize / $originalSize)) * 100,
            2
        )
        Under100KB    = $compressedSize -le $targetBytes
    }
}

Write-Host ""
Write-Host "Hero images compressed successfully." -ForegroundColor Green
Write-Host ""

$results | Format-Table -AutoSize
