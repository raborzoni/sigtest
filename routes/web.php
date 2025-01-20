<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\TestRedisQueue;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-queue', function () {
    TestRedisQueue::dispatch();
    return 'Job despachado com sucesso!';
});

Route::resource('products', ProductController::class);

Route::post('/sales', [SaleController::class, 'store']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
