<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// 之後新增的
use App\Http\Controllers\CartController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\FontController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReplyController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// 之後新增的

// 主頁面
Route::get('/front-index', [FontController::class, 'index'])->name('front-index');
// 新增商品頁面
Route::prefix('/cart')->group(function () {

    Route::get('/product-list', [CartController::class, 'index'])->name('cartProductList');
    Route::get('/add', [CartController::class, 'create'])->name('cartAdd');
    Route::post('/store', [CartController::class, 'store'])->name('cartStore');
    Route::get('/edit/{id}', [CartController::class, 'edit'])->name('cartEdit');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cartUpdate');
    // 刪除
    Route::post('/destroy/{id}', [CartController::class, 'destroy'])->name('cartDestroy');
});
// Route::get('test', [CartController::class, 'index']);
Route::prefix('/type')->group(function () {
    Route::get('/product-list', [TypeController::class, 'index'])->name('typeProductList');

    Route::get('/add', [TypeController::class, 'create'])->name('typeAdd');
    Route::post('/store', [TypeController::class, 'store'])->name('typeStore');

    Route::get('/edit/{id}', [TypeController::class, 'edit'])->name('typeEdit');
    Route::put('/update/{id}', [TypeController::class, 'update'])->name('typeUpdate');
    // 刪除
    Route::delete('/destroy/{id}', [TypeController::class, 'destroy'])->name('typeDestroy');
});
// 傳送訊息
Route::prefix('/message')->group(function () {
    Route::get('/', [MessageController::class, 'index'])->name('messageIndex');

    Route::post('/replayStore', [MessageController::class, 'replayStore'])->name('replayStore');
    Route::post('/store', [MessageController::class, 'store'])->name('messageStore');

    Route::get('/edit/{id}', [MessageController::class, 'edit'])->name('messageEdit');

    Route::put('/replayUpdate/{id}', [MessageController::class, 'replayUpdate'])->name('replayUpdate');

    Route::put('/update/{id}', [MessageController::class, 'update'])->name('messageUpdate');
    // 刪除
    Route::delete('/destroy/{id}', [MessageController::class, 'destroy'])->name('messageDestroy');

    Route::delete('/reply/destroy/{id}', [MessageController::class, 'replayDestroy'])->name('replyDestroy');
});
// 回覆訊息
Route::prefix('/reply')->group(function () {
    Route::get('/index', [ReplyController::class, 'index'])->name('replyIndex');

    Route::get('/add', [ReplyController::class, 'create'])->name('replyAdd');
    Route::post('/store', [ReplyController::class, 'store'])->name('replyStore');

    Route::get('/edit/{id}', [ReplyController::class, 'edit'])->name('replyEdit');
    Route::put('/update/{id}', [ReplyController::class, 'update'])->name('replyUpdate');
});
