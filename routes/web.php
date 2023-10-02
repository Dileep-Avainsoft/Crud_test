<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

//Route::get('/', function () {
//    return view('products.index');
//});

Route::get('/product',[ProductController::class,'index'])->name('products.view');
Route::get('/product.create',[ProductController::class,'create'])->name('products.create');
Route::post('/product.store',[ProductController::class,'store'])->name('products.store');
Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
Route::put('products/update/{id}',[ProductController::class,'update'])->name('products.update');

Route::get('/products/delete/{id}',[ProductController::class,'destroy'])->name('products.destroy');
Route::get('/products/show/{id}',[ProductController::class,'show'])->name('products.show');


// Route::get('product/{id}/edit', function ($id) {
// //    echo $id;
//    return view('products.index');
// });

