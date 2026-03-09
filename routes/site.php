<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing pages (Orient Yemen)
|--------------------------------------------------------------------------
| Arabic: /
| English: /en
*/

Route::name('site.')->group(function () {
    Route::view('/', 'site.home')->name('home');

    Route::view('/about', 'site.pages.about.index')->name('about');
    Route::view('/contact', 'site.pages.contact.index')->name('contact');
    Route::view('/partners', 'site.pages.partners.index')->name('partners');

    Route::view('/products', 'site.pages.products.index')->name('products');
    Route::view('/products/sweets', 'site.pages.products.sweets.index')->name('products_sweets');
    Route::view('/products/coffee', 'site.pages.products.coffee.index')->name('products_coffee');
    Route::view('/products/biscuit', 'site.pages.products.biscuit.index')->name('products_biscuit');
    Route::view('/products/marshmallow', 'site.pages.products.marshmallow.index')->name('products_marshmallow');
    Route::view('/products/healthy', 'site.pages.products.healthy.index')->name('products_healthy');
    Route::view('/products/juices', 'site.pages.products.juices.index')->name('products_juices');
    Route::view('/products/cake', 'site.pages.products.cake.index')->name('products_cake');
});

Route::prefix('en')->name('site_en.')->group(function () {
    Route::view('/', 'site-en.home')->name('home');

    Route::view('/about', 'site-en.pages.about.index')->name('about');
    Route::view('/contact', 'site-en.pages.contact.index')->name('contact');
    Route::view('/partners', 'site-en.pages.partners.index')->name('partners');

    Route::view('/products', 'site-en.pages.products.index')->name('products');
    Route::view('/products/sweets', 'site-en.pages.products.sweets.index')->name('products_sweets');
    Route::view('/products/coffee', 'site-en.pages.products.coffee.index')->name('products_coffee');
    Route::view('/products/biscuit', 'site-en.pages.products.biscuit.index')->name('products_biscuit');
    Route::view('/products/marshmallow', 'site-en.pages.products.marshmallow.index')->name('products_marshmallow');
    Route::view('/products/healthy', 'site-en.pages.products.healthy.index')->name('products_healthy');
    Route::view('/products/juices', 'site-en.pages.products.juices.index')->name('products_juices');
    Route::view('/products/cake', 'site-en.pages.products.cake.index')->name('products_cake');
});

/*
|--------------------------------------------------------------------------
| Legacy URL redirects (from static HTML structure)
|--------------------------------------------------------------------------
*/
Route::redirect('/index.html', '/');
Route::redirect('/index_en.html', '/en');

Route::redirect('/pages/about/index.html', '/about');
Route::redirect('/pages/contact/index.html', '/contact');
Route::redirect('/pages/partners/index.html', '/partners');

Route::redirect('/pages/products/index.html', '/products');
Route::redirect('/pages/products/sweets/index.html', '/products/sweets');
Route::redirect('/pages/products/coffee/index.html', '/products/coffee');
Route::redirect('/pages/products/biscuit/index.html', '/products/biscuit');
Route::redirect('/pages/products/marshmallow/index.html', '/products/marshmallow');
Route::redirect('/pages/products/healthy/index.html', '/products/healthy');
Route::redirect('/pages/products/juices/index.html', '/products/juices');
Route::redirect('/pages/products/cake/index.html', '/products/cake');

Route::redirect('/pages_en/about/index.html', '/en/about');
Route::redirect('/pages_en/contact/index.html', '/en/contact');
Route::redirect('/pages_en/partners/index.html', '/en/partners');
Route::redirect('/pages_en/products/index.html', '/en/products');
Route::redirect('/pages_en/products/sweets/index.html', '/en/products/sweets');
Route::redirect('/pages_en/products/coffee/index.html', '/en/products/coffee');
Route::redirect('/pages_en/products/biscuit/index.html', '/en/products/biscuit');
Route::redirect('/pages_en/products/marshmallow/index.html', '/en/products/marshmallow');
Route::redirect('/pages_en/products/healthy/index.html', '/en/products/healthy');
Route::redirect('/pages_en/products/juices/index.html', '/en/products/juices');
Route::redirect('/pages_en/products/cake/index.html', '/en/products/cake');