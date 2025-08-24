<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ShoppingCartsController;
use App\Http\Controllers\CartItemsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// users
    Route::get('/users', [UsersController::class, 'list']);
    Route::post('/users', [UsersController::class, 'createUser']);

    Route::get('/users/{id}', [UsersController::class, 'getUser']);
    Route::put('/users/{id}', [UsersController::class, 'updateUser']);
    Route::delete('/users/{id}', [UsersController::class, 'deleteUser']);

    Route::post('/users/loginuser', [UsersController::class, 'loginUser']);

// products
      Route::get('/products', [ProductsController::class, 'list']);
    Route::post('/products', [ProductsController::class, 'createProduct']);

    Route::get('/products/{id}', [ProductsController::class, 'getProduct']);
    Route::put('/products/{id}', [ProductsController::class, 'updateProduct']);
    Route::delete('/products/{id}', [ProductsController::class, 'deleteProduct']);

    // orders
      Route::get('/orders', [OrdersController::class, 'list']);
    Route::post('/orders', [OrdersController::class, 'createOrder']);

    Route::get('/orders/{id}', [OrdersController::class, 'getOrder']);
    Route::put('/orders/{id}', [OrdersController::class, 'updateOrder']);
    Route::delete('/orders/{id}', [OrdersController::class, 'deleteOrder']);

    // orderitems
      Route::get('/orderitems', [OrderItemsController::class, 'list']);
    Route::post('/orderitems', [OrderItemsController::class, 'createOrderItem']);

    Route::get('/orderitems/{id}', [OrderItemsController::class, 'getOrderItem']);
    Route::put('/orderitems/{id}', [OrderItemsController::class, 'updateOrderItem']);
    Route::delete('/orderitems/{id}', [OrderItemsController::class, 'deleteOrderItem']);

    // customers
      Route::get('/customers', [CustomersController::class, 'list']);
    Route::post('/customers', [CustomersController::class, 'createCustomer']);

    Route::get('/customers/{id}', [CustomersController::class, 'getCustomer']);
    Route::put('/customers/{id}', [CustomersController::class, 'updateCustomer']);
    Route::delete('/customers/{id}', [CustomersController::class, 'deleteCustomer']);
    
    // shoppingcarts
      Route::get('/shoppingcarts', [ShoppingCartsController::class, 'list']);
    Route::post('/shoppingcarts', [ShoppingCartsController::class, 'createShoppingCart']);

    Route::get('/shoppingcarts/{id}', [ShoppingCartsController::class, 'getShoppingCart']);
    Route::put('/shoppingcarts/{id}', [ShoppingCartsController::class, 'updateShoppingCart']);
    Route::delete('/shoppingcarts/{id}', [ShoppingCartsController::class, 'deleteShoppingCart']);
  
    // cartitems
      Route::get('/cartitems', [CartItemsController::class, 'list']);
    Route::post('/cartitems', [CartItemsController::class, 'createCartItem']);

    Route::get('/cartitems/{id}', [CartItemsController::class, 'getCartItem']);
    Route::put('/cartitems/{id}', [CartItemsController::class, 'updateCartItem']);
    Route::delete('/cartitems/{id}', [CartItemsController::class, 'deleteCartItem']);
    Route::get('/cartitems/username/{username}', [CartItemsController::class, 'getCartItemByUsername']);



    