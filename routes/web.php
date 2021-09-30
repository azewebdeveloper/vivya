<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\indexController;
use App\Http\Controllers\admin\makinghouse;
use App\Http\Controllers\admin\editor;
use App\Http\Controllers\admin\book;
use App\Http\Controllers\admin\category;
use App\Http\Controllers\front;
use App\Http\Controllers\admin\slider;
use App\Http\Controllers\front\basket;
use App\Http\Controllers\admin\order;
use App\Http\Controllers\admin\search;

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

Route::middleware("SetLanguage")->group(function () {
    Route::get('/lang/{lang}', function ($lang) {
        session()->put('locale', $lang);
        return redirect()->back();
    });
    Route::get('/', [front\indexController::class, 'index'])->name('index');
    Route::get('/book/{selflink}', [front\book\indexController::class, 'index'])->name('front.single');
    Route::get('/basket/add/{id}', [basket\indexController::class, 'add'])->name('basket.add');
    Route::get('/basket/remove/{id}', [basket\indexController::class, 'remove'])->name('basket.remove');
    Route::get('/basket/{flush}', [basket\indexController::class, 'flush'])->name('basket.flush');
    Route::get('/basket', [basket\indexController::class, 'index'])->name('basket.index');
    Route::get('/about', [front\about\indexController::class, 'index'])->name('about.index');
    Route::get('/contact', [front\contact\indexController::class, 'index'])->name('contact.index');
    Route::post('/contact', [front\contact\indexController::class, 'contactSubmit'])->name('contact.submit');
    Route::get('/all-products', [front\all\indexController::class, 'index'])->name('all.index');
    Route::get('/discount-products', [front\all\indexController::class, 'discount'])->name('all.discount');
    Route::get('/basket/complete', [basket\indexController::class, 'complete'])->name('basket.complete');
    Route::post('/basket/complete', [basket\indexController::class, 'completeStore'])->name('basket.completeStore');

});



Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.','middleware' => ['auth','AdminCtrl']], function () {

    Route::get('/', [indexController::class, 'index'])->name('index');
    Route::get('/create', [indexController::class, 'create'])->name('create');
    Route::get('/delete/{id}', [indexController::class, 'delete'])->name('delete');

    Route::group(['namespace' => 'makinghouse', 'prefix' => 'makinghouse', 'as' => 'makinghouse.'], function () {
        Route::get('/', [makinghouse\indexController::class, 'index'])->name('index');
        Route::get('/add', [makinghouse\indexController::class, 'create'])->name('create');
        Route::post('/add', [makinghouse\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [makinghouse\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [makinghouse\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [makinghouse\indexController::class, 'delete'])->name('delete');
    });

    Route::group(['namespace' => 'editor', 'prefix' => 'editor', 'as' => 'editor.'], function () {
        Route::get('/', [editor\indexController::class, 'index'])->name('index');
        Route::get('/add', [editor\indexController::class, 'create'])->name('create');
        Route::post('/add', [editor\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [editor\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [editor\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}',[editor\indexController::class, 'delete'])->name('delete');
    });

    Route::group(['namespace' => 'book', 'prefix' => 'book', 'as' => 'book.'], function () {
        Route::get('/', [book\indexController::class, 'index'])->name('index');
        Route::get('/search', [search\indexController::class, 'index'])->name('search');
        Route::get('/add', [book\indexController::class, 'create'])->name('create');
        Route::post('/add', [book\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [book\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [book\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [book\indexController::class, 'delete'])->name('delete');

    });

    Route::group(['namespace' => 'order', 'prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', [order\indexController::class, 'index'])->name('index');
        Route::get('/add', [order\indexController::class, 'create'])->name('create');
        Route::post('/add', [order\indexController::class, 'store'])->name('create.post');
        Route::get('/detail/{id}', [order\indexController::class, 'detail'])->name('detail');
        Route::get('/delete/{id}', [order\indexController::class, 'delete'])->name('delete');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
