<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;

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

//Route::get('/', function () {
    //return view('welcome');
//});

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/', [FrontendController::class,'welcome']);
Route::get('/about', [FrontendController::class,'about']);
Route::get('/contact', [FrontendController::class,'contact']);
Route::post('/add/users', [HomeController::class,'add_users']);

//Products
Route::get('/add/product',[ProductController::class, 'index']);
Route::post('/product/insert', [ProductController::class,'insert']);
Route::get('/product/edit/{product_id}', [ProductController::class,'edit']);
Route::post('/product/update', [ProductController::class,'update']);
Route::get('/product/delete/{product_id}', [ProductController::class,'delete']);
Route::get('/product/view', [ProductController::class,'product_view']);


//Payment
Route::get('/add/payment',[PaymentController::class, 'index']);
Route::post('/payment/insert', [PaymentController::class,'insert']);
Route::get('/payment/edit/{payment_id}', [PaymentController::class,'edit']);
Route::post('/payment/update', [PaymentController::class,'update']);
Route::get('/payment/delete/{payment_id}', [PaymentController::class,'delete']);
Route::get('/payment/view',[PaymentController::class,'payment_view']);
//Purchase
Route::get('/add/purchase',[PurchaseController::class, 'index']);
Route::post('/purchase/insert', [PurchaseController::class,'insert']);
Route::get('/purchase/edit/{purchase_id}', [PurchaseController::class,'edit']);
Route::post('/purchase/update', [PurchaseController::class,'update']);
Route::get('/purchase/delete/{purchase_id}', [PurchaseController::class,'delete']);
Route::get('/purchase/view', [PurchaseController::class,'purchase_view']);

