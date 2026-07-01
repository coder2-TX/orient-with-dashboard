<?php

$files = [
    'resources/views/site/layouts/app.blade.php',
    'resources/views/site-en/layouts/app.blade.php',
];

$faviconBlock = <<<'BLADE'
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/images/header/Brand_Mark.png') }}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/header/Brand_Mark.png') }}">

BLADE;

foreach ($files as $file) {
    $content = file_get_contents($file);

    if (str_contains($content, "assets/images/header/Brand_Mark.png")) {
        echo "Already exists: {$file}\n";
        continue;
    }

    $target = "  <title>@yield('title', 'Orient Yemen')</title>\n\n";

    if (! str_contains($content, $target)) {
        echo "Title target not found in {$file}\n";
        continue;
    }

    $content = str_replace($target, $target . $faviconBlock, $content);

    file_put_contents($file, $content);

    echo "Updated: {$file}\n";
}
