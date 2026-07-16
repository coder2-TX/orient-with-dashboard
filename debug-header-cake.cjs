const { chromium } = require('playwright');

(async () => {
    const targetPath = '/products/cake';
    const browserMessages = [];
    const browserErrors = [];

    const browser = await chromium.launch({
        headless: false,
        channel: 'chrome',
    });

    const context = await browser.newContext();
    const page = await context.newPage();

    page.on('console', (message) => {
        try {
            const currentPath = new URL(page.url()).pathname.replace(/\/+$/, '');

            if (currentPath === targetPath) {
                browserMessages.push({
                    type: message.type(),
                    text: message.text(),
                });
            }
        } catch (error) {
        }
    });

    page.on('pageerror', (error) => {
        try {
            const currentPath = new URL(page.url()).pathname.replace(/\/+$/, '');

            if (currentPath === targetPath) {
                browserErrors.push(error.message);
            }
        } catch (innerError) {
        }
    });

    await page.addInitScript(() => {
        window.__oyHeaderMutations = [];

        const observeProductsLinks = () => {
            const links = document.querySelectorAll(
                '.oy-header__link[data-nav-section="products"]'
            );

            if (!links.length) {
                window.setTimeout(observeProductsLinks, 50);
                return;
            }

            links.forEach((link, index) => {
                const observer = new MutationObserver((mutations) => {
                    mutations.forEach((mutation) => {
                        window.__oyHeaderMutations.push({
                            time: new Date().toISOString(),
                            linkIndex: index,
                            attribute: mutation.attributeName,
                            className: link.className,
                            ariaCurrent: link.getAttribute('aria-current'),
                            style: link.getAttribute('style'),
                        });
                    });
                });

                observer.observe(link, {
                    attributes: true,
                    attributeFilter: [
                        'class',
                        'style',
                        'aria-current',
                    ],
                });
            });
        };

        document.addEventListener(
            'DOMContentLoaded',
            observeProductsLinks
        );
    });

    console.log('');
    console.log('تم فتح المتصفح.');
    console.log('تنقل داخل الموقع بشكل طبيعي.');
    console.log(
        'لن تظهر نتيجة الفحص إلا بعد دخول صفحة /products/cake'
    );
    console.log('');

    await page.goto(
        'http://127.0.0.1:8000/products',
        {
            waitUntil: 'domcontentloaded',
        }
    );

    await page.waitForURL(
        (url) => {
            const path = url.pathname.replace(/\/+$/, '');

            return path === targetPath;
        },
        {
            timeout: 0,
        }
    );

    await page.waitForLoadState('domcontentloaded');
    await page.waitForTimeout(1500);

    const result = await page.evaluate(() => {
        const links = Array.from(
            document.querySelectorAll(
                '.oy-header__link[data-nav-section="products"]'
            )
        );

        const stylesheetRules = [];

        Array.from(document.styleSheets).forEach((stylesheet) => {
            try {
                Array.from(stylesheet.cssRules || []).forEach((rule) => {
                    const cssText = rule.cssText || '';

                    if (
                        cssText.includes(
                            '.oy-header__link--active'
                        ) ||
                        cssText.includes('.oy-header__link')
                    ) {
                        stylesheetRules.push({
                            source: stylesheet.href || 'inline-style',
                            rule: cssText,
                        });
                    }
                });
            } catch (error) {
                stylesheetRules.push({
                    source: stylesheet.href || 'unknown',
                    error: 'تعذر قراءة قواعد هذا الملف',
                });
            }
        });

        const loadedHeaderScripts = performance
            .getEntriesByType('resource')
            .map((entry) => entry.name)
            .filter((name) => name.includes('header.js'));

        return {
            url: window.location.href,
            pathname: window.location.pathname,
            loadedHeaderScripts,
            links: links.map((link, index) => {
                const style = window.getComputedStyle(link);
                const rect = link.getBoundingClientRect();

                return {
                    index,
                    text: link.textContent.trim(),
                    className: link.className,
                    hasActiveClass: link.classList.contains(
                        'oy-header__link--active'
                    ),
                    ariaCurrent:
                        link.getAttribute('aria-current'),
                    backgroundColor: style.backgroundColor,
                    color: style.color,
                    display: style.display,
                    visibility: style.visibility,
                    opacity: style.opacity,
                    padding: style.padding,
                    width: rect.width,
                    height: rect.height,
                };
            }),
            mutations: window.__oyHeaderMutations || [],
            stylesheetRules,
        };
    });

    console.log('');
    console.log('========================================');
    console.log('وصل المتصفح إلى صفحة الكيك');
    console.log('========================================');
    console.log('');

    console.log('بيانات روابط منتجاتنا:');
    console.dir(result.links, {
        depth: null,
    });

    console.log('');
    console.log('تغييرات الكلاس أثناء تحميل الصفحة:');
    console.dir(result.mutations, {
        depth: null,
    });

    console.log('');
    console.log('ملفات header.js المحملة:');
    console.dir(result.loadedHeaderScripts, {
        depth: null,
    });

    console.log('');
    console.log('رسائل Console الخاصة بصفحة الكيك:');
    console.dir(browserMessages, {
        depth: null,
    });

    console.log('');
    console.log('أخطاء JavaScript الخاصة بصفحة الكيك:');
    console.dir(browserErrors, {
        depth: null,
    });

    console.log('');
    console.log('قواعد CSS المتعلقة بالهيدر:');
    console.dir(result.stylesheetRules, {
        depth: null,
    });

    console.log('');
    console.log(
        'انتهى الفحص. اترك المتصفح مفتوحًا وانسخ نتيجة التيرمنل.'
    );

    await new Promise((resolve) => {
        browser.on('disconnected', resolve);
    });
})();
