(function () {
    const arabicFilePondOptions = {
        labelFileSizeBytes: 'بايت',
        labelFileSizeKilobytes: 'كيلوبايت',
        labelFileSizeMegabytes: 'ميجابايت',
        labelFileSizeGigabytes: 'جيجابايت',

        labelMaxFileSizeExceeded: 'الملف كبير جدًا',
        labelMaxFileSize: 'الحد الأقصى لحجم الملف: {filesize}',

        labelMaxTotalFileSizeExceeded: 'إجمالي حجم الملفات كبير جدًا',
        labelMaxTotalFileSize: 'الحد الأقصى لإجمالي حجم الملفات: {filesize}',
    };

    document.addEventListener('FilePond:init', function (event) {
        if (event.detail?.pond && typeof event.detail.pond.setOptions === 'function') {
            event.detail.pond.setOptions(arabicFilePondOptions);
        }
    });

    if (window.FilePond && typeof window.FilePond.setOptions === 'function') {
        window.FilePond.setOptions(arabicFilePondOptions);
    }
})();