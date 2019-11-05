<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend

Route::get('','frontend\HomeController@GetHome' );

Route::get('contact','frontend\HomeController@GetContact' );
Route::get('about','frontend\HomeController@GetAbout' );

// product
Route::group(['prefix' => 'product'], function () {
    Route::get('','frontend\ProductController@ListProduct' );
    Route::get('detail','frontend\ProductController@DetailProduct' );
    // Route::get('cart','frontend\ProductController@Cart' );
    // Route::get('checkout','frontend\ProductController@CheckOut' );
});

//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('','frontend\CheckOutController@GetCheckout');
    Route::get('complete','frontend\CheckOutController@GetComplete');
    // Route::post('','frontend\CheckOutController@PostCheckout');
    // Route::get('complete/{order_id}','frontend\CheckOutController@GetComplete');
});


//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('','frontend\CartController@GetCart');
    // Route::get('add','frontend\CartController@AddCart');
    // Route::get('update/{rowId}/{qty}','frontend\CartController@UpdateCart');
    // Route::get('del/{rowId}','frontend\CartController@DelCart');
    // Route::get('all','frontend\CartController@AllCart');
});

// backend

Route::get('login','backend\LoginController@GetLogin' )->middleware('CheckLogout');
Route::post('login','backend\LoginController@PostLogin' );

Route::group(['prefix' => 'admin','middleware' => 'CheckLogin'], function () {
    
    Route::get('','backend\LoginController@GetIndex' );
    Route::get('logout','backend\LoginController@Logout' );

    // category
    Route::group(['prefix' => 'category'], function () {

        Route::get('','backend\CategoryController@GetCategory' );
        Route::post('','backend\CategoryController@PostCategory' );

        Route::get('edit/{id}','backend\CategoryController@EditCategory' );
        Route::post('edit/{id}','backend\CategoryController@PostEditCategory' );

        Route::get('del/{id}','backend\CategoryController@DelCategory' );

    });

    //product
    Route::group(['prefix' => 'product'], function () {

        Route::get('','backend\ProductController@ListProduct' );
        Route::get('add','backend\ProductController@AddProduct' );
        Route::post('add','backend\ProductController@PostAddProduct' );
        Route::get('edit','backend\ProductController@EditProduct' );
        Route::post('edit','backend\ProductController@PostEditProduct' );

        Route::get('detail-attr','backend\ProductController@DetailAttr' );
        Route::post('add-attr','backend\ProductController@AddAttr' );
        Route::get('edit-attr/{id}','backend\ProductController@EditAttr' );
        Route::post('edit-attr/{id}','backend\ProductController@PostAttr' );
        Route::get('del-attr/{id}','backend\ProductController@DelAttr' );

        Route::post('add-value','backend\ProductController@AddValue' );
        Route::get('edit-value/{id}','backend\ProductController@EditValue' );
        Route::post('edit-value/{id}','backend\ProductController@PostEditValue' );
        Route::get('del-value/{id}','backend\ProductController@DelValue' );

        Route::get('add-variant','backend\ProductController@AddVarisant' );
        Route::get('edit-variant','backend\ProductController@EditVariant' );

    });

    //order
    Route::group(['prefix' => 'order'], function () {

        Route::get('','backend\OrderController@ListOrder' );
        Route::get('detail','backend\OrderController@DetailOrder' );
        Route::get('processed','backend\OrderController@Processed' );

    });


});
