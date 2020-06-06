<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Site\SiteController@index')->name('index');
Route::get('/product/{slug}', 'Site\SiteController@product')->name('product');
Route::get('/about', 'Site\SiteController@about')->name('about');
Route::get('/condition', 'Site\SiteController@condition')->name('condition');
Route::get('/policy', 'Site\SiteController@policy')->name('policy');
Route::get('/category/{slug}', 'Site\SiteController@category')->name('category');

#brand_wise_products
Route::get('/brand', 'Site\SiteController@brandWiseProduct')->name('site.brand');
#LOAD MORE CATEGORY PRODUCTS ROUTE
Route::post('load-more-category-product', 'Site\SiteController@loadMoreCatProduct')->name('load-more-cat-product');


#cart route
Route::post('add-to-cart', 'Site\CartController@add')->name('cart.add');
Route::get('cart/show', 'Site\CartController@show')->name('cart.show');
Route::post('cart/remove', 'Site\CartController@remove')->name('cart.remove');
Route::post('cart/update', 'Site\CartController@update')->name('cart.update');



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



});

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');
});
