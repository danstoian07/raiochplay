<?php

Auth::routes();
//overwrite routes
Route::get('/logout', 'Auth\LoginController@logout')->name('logout.get-method');
Route::get('/register', function () { return 'stop'; });
Route::post('/register', function () { return 'stop'; });
Route::get('/password/reset/{token?}', function () { return 'stop'; });
Route::post('/password/email', function () { return 'stop'; });
Route::post('/password/reset', function () { return 'stop'; });

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('index');

    //categories
    Route::get('/categories', 'CategoriesController@index')->name('categories');
    Route::post('/categories', 'CategoriesController@store')->name('add.category');
    Route::post('/categories/order', 'CategoriesController@order')->name('order.categories');
    Route::get('/categories/{id}/edit', 'CategoriesController@show')->name('show.category');
    Route::post('/categories/{id}/save', 'CategoriesController@saveChanges')->name('edit.category');
    Route::get('/categories/{id}/delete', 'CategoriesController@delete')->name('delete.category');

    //products
    Route::get('/products', 'ProductsController@index')->name('products');
    Route::get('/products/add-new', 'ProductsController@newProduct')->name('product.new');
    Route::get('/products/{id}/edit', 'ProductsController@edit')->name('product.edit');
    Route::POST('/products/add-new', 'ProductsController@store')->name('product.add');
    Route::post('/products/add-new/upload', 'ProductsController@upload')->name('product.upload');
    Route::get('/products/{id}/gallery', 'ProductsController@gallery')->name('product.gallery');

    //settings
    Route::get('/settings', 'SettingsController@index')->name('settings.index');
    Route::POST('/settings/upload-avatar', 'SettingsController@uploadAvatar')->name('settings.avatar.upload');
    Route::POST('/settings/update-password', 'SettingsController@updatePassword')->name('settings.password.update');

});

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'FrontendController@index')->name('home');
    Route::get('/produse', 'FrontendController@produse')->name('produse');

});


