<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Site\SiteController@index')->name('index');
Route::get('/product/{slug}', 'Site\SiteController@product')->name('product');
Route::get('/about', 'Site\SiteController@about')->name('about');
Route::get('/condition', 'Site\SiteController@condition')->name('condition');
Route::get('/policy', 'Site\SiteController@policy')->name('policy');
Route::get('/category/{slug}', 'Site\SiteController@category')->name('category');

#brand_wise_products
Route::get('/brand', 'Site\SiteController@brandWiseProduct')->name('brand');
Route::get('/brand/products/{slug}', 'Site\SiteController@brandWiseProduct2')->name('brand.products.two');
#LOAD MORE CATEGORY PRODUCTS ROUTE
Route::post('load-more-category-product', 'Site\SiteController@loadMoreCatProduct')->name('load-more-cat-product');
Route::get('site/brand/{slug}', 'Site\SiteController@brandWiseProduct2')->name('site.brand');
Route::get('site.product-detail/{slug}', 'Site\SiteController@productDetail')->name('site.product-detail');


#cart route
Route::post('add-to-cart', 'Site\CartController@add')->name('cart.add');
Route::get('cart/show', 'Site\CartController@show')->name('cart.show');
Route::post('cart/remove', 'Site\CartController@remove')->name('cart.remove');
Route::post('cart/update', 'Site\CartController@update')->name('cart.update');



#CHECKOUT ROUTE
Route::get('checkout','Site\CheckoutController@index')->name('site.checkout');
Route::get('checkout/shipping','Site\CheckoutController@shipping')->name('shipping');
Route::post('checkout/shipping/info','Site\CheckoutController@shippingInfo')->name('checkout.shipping');
Route::get('checkout/payment','Site\CheckoutController@payment')->name('checkout.payment');
Route::post('order','Site\CheckoutController@order')->name('order');



#customer login and register route
Route::post('customer/register','Site\CheckoutController@register')->name('customer.register');
Route::post('customer/login','Site\CheckoutController@login')->name('customer.login');
Route::post('customer/logout','Site\CheckoutController@logout')->name('customer.logout');



#mail route

// CONTACT US Content show route...
Route::get('contact-us', 'Site\SiteController@contactUs')->name('site.contact-us');
Route::post('contact-us/send-mail', 'Site\SiteController@sendMail')->name('site.contact-us.send-mail');



#SITE LOGIN $ REGISTRATION ROUTE
Route::get('/registration', 'Site\SitelogController@registration')->name('site.registration');
Route::post('customer/registration','Site\SitelogController@register')->name('customer.registration');
Route::post('site/customer/login','Site\SitelogController@siteloggedin')->name('customer.site.loggedin');
Route::get('site/customer/loggedin','Site\SitelogController@loggedin')->name('customer.loggedin');


#Test Route
Route::get('load-more-data', 'LoadMoreDataController@index');
Route::post('load-more-data', 'LoadMoreDataController@load_more')->name('load-more-data');



Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'Admin\DashboardController@index')->name('home');

    /**
     * PROFILE Route
     */
    Route::prefix('profiles')->name('profiles.')->group(function () {
        Route::get('/', 'Admin\ProfileController@index')->name('manage');
        Route::get('/add', 'Admin\ProfileController@create')->name('create');
        Route::post('/store', 'Admin\ProfileController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\ProfileController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\ProfileController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\ProfileController@delete')->name('delete');
        Route::get('/change-profile-Name/{id}/{name}', 'Admin\ProfileController@changeprofileName');

    });

    /**
     * BRANDS Route
     */
    Route::prefix('brands')->name('brand.')->group(function () {
        Route::get('/', 'Admin\BrandController@index')->name('manage');
        Route::get('/add', 'Admin\BrandController@create')->name('create');
        Route::post('/store', 'Admin\BrandController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\BrandController@edit')->name('edit');
        Route::put('/update/{id}', 'Admin\BrandController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\BrandController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\BrandController@updateStatus')->name('update.status');
        Route::get('/update-top-brand/{id}/{top_brand}', 'Admin\BrandController@updatetopBrand');
    });



    /**
     * CATEGORIES Route
     */
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'Admin\CategoryController@index')->name('manage');
        Route::get('/add', 'Admin\CategoryController@create')->name('create');
        Route::post('/store', 'Admin\CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('edit');
        Route::put('/update', 'Admin\CategoryController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\CategoryController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\CategoryController@updateStatus')->name('update.status');
    });



    /**
     * SUB CATEGORIES Route
     */
    Route::prefix('sub-categories')->name('sub.category.')->group(function () {
        Route::get('/', 'Admin\SubCategoryController@index')->name('manage');
        Route::get('/add', 'Admin\SubCategoryController@create')->name('create');
        Route::post('/store', 'Admin\SubCategoryController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\SubCategoryController@edit')->name('edit');
        Route::put('/update', 'Admin\SubCategoryController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\SubCategoryController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\SubCategoryController@updateStatus')->name('update.status');
    });



    /**
     * SLIDERS Route
     */
    Route::prefix('sliders')->name('sliders.')->group(function () {
        Route::get('/', 'Admin\SliderController@index')->name('manage');
        Route::get('/add', 'Admin\SliderController@create')->name('create');
        Route::post('/store', 'Admin\SliderController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\SliderController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\SliderController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\SliderController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\SliderController@updateStatus')->name('update.status');
    });


    /**
     * Products Route
     */
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', 'Admin\ProductController@index')->name('manage');
        Route::get('/add', 'Admin\ProductController@create')->name('create');
        Route::post('/store', 'Admin\ProductController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\ProductController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('delete');
        Route::get('/find-categories/{id}', 'Admin\ProductController@findCategories');
        Route::get('/updateBuyingPrice/{id}/{p}', 'Admin\ProductController@updateBuyingPrice');
        Route::post('/update-selling-Price', 'Admin\ProductController@updateSellingPrice');
        Route::post('/update-special-Price', 'Admin\ProductController@updateSpecialPrice');
        Route::get('/update-status/{id}/{status}', 'Admin\ProductController@updateStatus')->name('update.status');
        Route::get('/hot-deals/{id}/{hot_deals}', 'Admin\ProductController@hotDeals')->name('hot.deals');
        Route::get('/f_products/{id}/{f_products}', 'Admin\ProductController@f_products')->name('feature.products');
    });




    /**
     * Checkout Route/orders route
     */
    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/orders/manage', 'Admin\CheckoutadminController@orders')->name('orders.manage');
        Route::get('/orders/edit/{id}', 'Admin\CheckoutadminController@edit')->name('orders.edit');
        Route::put('orders/update/{id}', 'Admin\CheckoutadminController@update')->name('orders.update');
        Route::get('/delete/{id}', 'Admin\CheckoutadminController@delete')->name('orders.delete');
        Route::get('/customers/manage', 'Admin\CheckoutadminController@customerInfo')->name('customers.manage');
        Route::get('/customers/delete/{id}', 'Admin\CheckoutadminController@customerDelete')->name('customers.delete');
    });



    /**
     * About Route
     */
    Route::prefix('abouts')->name('abouts.')->group(function () {
        Route::get('/', 'Admin\AboutController@index')->name('manage');
        Route::get('/add', 'Admin\AboutController@create')->name('create');
        Route::post('/store', 'Admin\AboutController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\AboutController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\AboutController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\AboutController@delete')->name('delete');
    });

    /**
     * Terms & Conditions Route
     */
    Route::prefix('conditions')->name('conditions.')->group(function () {
        Route::get('/', 'Admin\ConditionController@index')->name('manage');
        Route::get('/add', 'Admin\ConditionController@create')->name('create');
        Route::post('/store', 'Admin\ConditionController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\ConditionController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\ConditionController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\ConditionController@delete')->name('delete');
    });

    /**
     * Privacy Policy Route
     */
    Route::prefix('policies')->name('policies.')->group(function () {
        Route::get('/', 'Admin\PolicyController@index')->name('manage');
        Route::get('/add', 'Admin\PolicyController@create')->name('create');
        Route::post('/store', 'Admin\PolicyController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\PolicyController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\PolicyController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\PolicyController@delete')->name('delete');
    });




    Route::prefix('mails')->name('mails.')->group(function () {
        Route::get('/manage', 'Admin\MailController@manage')->name('manage');
        Route::get('/delete/{id}', 'Admin\MailController@destroy')->name('delete');

    });



});

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
});
