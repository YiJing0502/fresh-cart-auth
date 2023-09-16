<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// 之後新增的
use App\Http\Controllers\CartController;
// 後台設定產品類別
use App\Http\Controllers\TypeController;
// 前台顯示產品類別
use App\Http\Controllers\ProductTypeShowController;
use App\Http\Controllers\FontController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\OrderController;
// 後台主頁面
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
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
// 任何人都可以看
// 主頁面
Route::get('/', [FontController::class, 'index'])->name('front-index');
// 產品頁面
Route::prefix('/product/type')->group(function () {
    // 所有產品
    Route::get('/all', [ProductTypeShowController::class, 'allIndex'])->name('product.type.all');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 只有登入者可以進(前台功能區)
Route::middleware(['auth', 'role.weight: 1_2'])->group(function () {
    // 預設
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // 前台_使用者帳號資訊頁面區塊
    Route::prefix('/user/info')->group(function () {
        Route::get('/', [FontController::class, 'user_info'])->name('user.info');

        Route::post('/update', [FontController::class, 'user_info_update'])->name('user.info.update');
    });
    // 前台＿留言板傳送訊息
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
    // 前台＿留言板回覆訊息
    Route::prefix('/reply')->group(function () {
        Route::get('/index', [ReplyController::class, 'index'])->name('replyIndex');

        Route::get('/add', [ReplyController::class, 'create'])->name('replyAdd');
        Route::post('/store', [ReplyController::class, 'store'])->name('replyStore');

        Route::get('/edit/{id}', [ReplyController::class, 'edit'])->name('replyEdit');
        Route::put('/update/{id}', [ReplyController::class, 'update'])->name('replyUpdate');
    });
    // 前台＿o將產品加入購物車/o購物車頁更新產品數量/o 購物車頁刪除產品/o 會員查看訂單
    Route::prefix('/order')->group(function () {
        // o將產品加入購物車
        Route::post('/add/cart', [OrderController::class, 'add_cart'])->name('order.add.cart');
        // o購物車頁更新產品數量
        Route::put('/add/cart/update', [ShopController::class, 'add_cart_update'])->name('order.add.cart.update');
        // o購物車頁刪除產品
        Route::delete('/add/cart/delete', [ShopController::class, 'add_cart_delete'])->name('order.add.cart.delete');
        // o 會員查看訂單
        Route::get('/list/show', [OrderController::class, 'list_show_Index'])->name('order.list.show.index');
        // o 會員查看詳細訂單產品資訊
        Route::get('/list/detail/{orders_id}', [OrderController::class, 'list_detail'])->name('order.list.detail');
        // x購物車下訂單的四頁
        Route::get('/list', [OrderController::class, 'list_index'])->name('order.list');
        Route::get('/tran', [OrderController::class, 'tran_index'])->name('order.tran');
        Route::get('/pay', [OrderController::class, 'pay_index'])->name('order.pay');
        Route::get('/thanks', [OrderController::class, 'thanks_index'])->name('order.thanks');
    });
    // 前台＿o客戶訂單區塊(同學)
    Route::prefix('/shop')->group(function () {
        Route::get('/orderDetails', [ShopController::class, 'orderDetailsIndex'])->name('shopOrderDetailsGet');

        Route::get('/deliver', [ShopController::class, 'deliverIndex'])->name('shopDeliverGet');
        Route::post('/deliver/store', [ShopController::class, 'deliverStore'])->name('shopDeliverPost');

        Route::get('/money', [ShopController::class, 'moneyIndex'])->name('shopMoneyGet');
        Route::post('/money/store', [ShopController::class, 'moneyStore'])->name('shopMoneyStore');

        Route::get('/thx', [ShopController::class, 'thxIndex'])->name('shopThxGet');
        Route::post('/thx', [ShopController::class, 'thx'])->name('shopThxPost');
    });
});
// 只有管理者可以進(後台功能區)
Route::middleware(['auth', 'role.weight: 1'])->prefix('/admin')->group(function() {
    // 後台＿主頁面_admin
    Route::prefix('/back-end')->group(
        function () {
            Route::get('/index', [AdminController::class, 'index'])->name('back.end.index');
        }
    );
    // 後台＿新增商品頁面
    Route::prefix('/cart')->group(function () {
        Route::get('/product-list', [CartController::class, 'index'])->name('cartProductList');
        Route::get('/add', [CartController::class, 'create'])->name('cartAdd');
        Route::post('/store', [CartController::class, 'store'])->name('cartStore');
        Route::get('/edit/{id}', [CartController::class, 'edit'])->name('cartEdit');
        Route::post('/update/{id}', [CartController::class, 'update'])->name('cartUpdate');
        Route::post('/destroy/{id}', [CartController::class, 'destroy'])->name('cartDestroy');
    });
    // 後台＿產品類別區塊
    Route::prefix('/type')->group(function () {
        Route::get('/product-list', [TypeController::class, 'index'])->name('typeProductList');

        Route::get('/add', [TypeController::class, 'create'])->name('typeAdd');
        Route::post('/store', [TypeController::class, 'store'])->name('typeStore');

        Route::get('/edit/{id}', [TypeController::class, 'edit'])->name('typeEdit');
        Route::put('/update/{id}', [TypeController::class, 'update'])->name('typeUpdate');
        // 刪除
        Route::delete('/destroy/{id}', [TypeController::class, 'destroy'])->name('typeDestroy');
    });
});

require __DIR__ . '/auth.php';
