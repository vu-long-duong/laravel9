<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::prefix('admin')->middleware('auth')->group(function (){
    //Post Manage
    Route::prefix('/post')->group(function (){
        Route::get('/index',[PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create',[PostController::class, 'create'])->name('admin.post.create');
        Route::post('/store',[PostController::class, 'store'])->name('admin.post.store');

    });

    //Category Manage
    Route::prefix('/category')->group(function (){
        Route::get('/index',[CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create',[CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store',[CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::put('/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });

});

Route::get('/language/{locate}',[LanguageController::class, 'index'])->name('language.index');

Route::middleware(['verified'])->group( function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});




