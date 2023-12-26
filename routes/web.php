<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CartController;
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


Auth::routes([
    'verify'=>true
]);
//User Side Routes...........
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/category/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('/category/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost'])->name('viewPost');
Route::get('/category/delete/{id}', [FrontendController::class, 'destroy']);
Route::get('/user-contact', [FrontendController::class, 'contact'])->name('user.contact');
Route::post('/user-contact/save', [FrontendController::class, 'create'])->name('user.contact.create');
Route::middleware(['verified'])->group(function(){

// Route::get('paid/asset', [AssetController::class, 'PaidAsset'])->name('paid.asset');
// Route::get('free/asset', [AssetController::class, 'FreeAsset'])->name('free.asset');
Route::get('detail/asset/{id}', [AssetController::class, 'DetailAsset'])->name('detail.asset.paid');
Route::get('detail/free/asset/{id}', [AssetController::class, 'DetailFreeAsset'])->name('detail.asset.free');
Route::get('comment/delete/{id}', [FrontendController::class, 'deleted'])->name('comment.delete');

Route::get('review/delete/{id}', [AssetController::class, 'ReviewDelete'])->name('review.delete');
Route::get('admin/review/delete/{id}', [AssetController::class, 'AdminReviewDelete'])->name('admin.review.delete');
Route::get('cooment-edit/{id}',[CommentController::class, 'edit'])->name('comment.edit');
Route::PUT('cooment-update/{id}',[CommentController::class, 'CommentUpdate'])->name('comment.update');

Route::PUT('password/change', [FrontendController::class, 'UserUpdatePassword'])->name('user.update.password');


Route::get('user/change/password',[FrontendController::class, 'ChangePassword'])->name('user.change.password');
//Route for Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Routes for Comments.......
Route::post('comment', [CommentController::class, 'store'])->name('store.comment');
//Route for Review.......
Route::post('/review', [AssetController::class, 'Review'])->name('store.review');

//Cart Routes............
Route::post('add/cart/{id}',[CartController::class,'create'])->name('add.cart');
Route::get('cart/item',[CartController::class,'index'])->name('cart.item');
Route::get('remove/item/{user}',[CartController::class,'delete'])->name('remove.cart');

//Stripe Payment Routes............
Route::get('show', [AssetController::class, 'stripe'])->name('stripe.index');
Route::get('show/checkout', [AssetController::class, 'stripeCheckout'])->name('stripe.checkout');
Route::get('show/checkout/success', [AssetController::class, 'stripeCheckoutSuccess'])->name('stripe.checkout.success');

});
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    //Routes for Category............
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('/category', [CategoryController::class, 'index'])->name('add.category');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/add-category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::PUT('/update-category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::post('/delete-category', [CategoryController::class, 'delete'])->name('delete.category');
    Route::get('/viewcategory', [CategoryController::class, 'index'])->name('view.category');

    //Routes for Post.................
    Route::get('post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/add-post', [PostController::class, 'create'])->name('create.post');
    Route::post('/add-post', [PostController::class, 'store'])->name('insert.post');
    Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('edit.post');
    Route::PUT('/update-post/{id}', [PostController::class, 'update'])->name('update.post');
    Route::get('/delete-post/{id}', [PostController::class, 'delete'])->name('delete.post');

    //Route For Users....
    Route::get('/user/show', [UserController::class, 'index'])->name('user.index');
    Route::get('delete/user/{id}', [UserController::class, 'delete'])->name('delete.user');

    //Route for asset..........
    Route::get('/add-asset', [AssetController::class, 'index'])->name('add.asset');
    Route::get('/view-asset', [AssetController::class, 'create'])->name('create.asset');
    Route::post('/create-asset', [AssetController::class, 'store'])->name('store.asset');
    Route::get('/edit/asset/{id}', [AssetController::class, 'edit'])->name('edit.asset');
    Route::PUT('/update/asset/{id}', [AssetController::class, 'update'])->name('update.asset');
    Route::get('/delete/asset/{id}', [AssetController::class, 'delete'])->name('delete.asset');

    //Route for deleting comments by Admin....
    Route::get('/delete/comment{id}', [CommentController::class, 'CommentDeleteByAdmin'])->name('admin.comment.delete');
    Route::post('/delete-comment', [CommentController::class, 'CommentDeleteByUser'])->name('user.comment.delete');

    //Admin Profile Routes.........
    Route::get('profile/view', [AdminController::class, 'AdminProfile'])->name('admin.profile.view');
    Route::post('profile/change', [AdminController::class, 'AdminProfileChange'])->name('admin.profile.change');
    Route::get('password/change', [AdminController::class, 'AdminPasswordChange'])->name('admin.password.change');
    Route::PUT('password/change', [AdminController::class, 'AdminUpdatePassword'])->name('admin.password.update');
});


