<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{StoreController,AuthController,AdminController};

Route::get('/',[StoreController::class,'home'])->name('home');
Route::get('/books',[StoreController::class,'books'])->name('books');
Route::get('/book/{book}',[StoreController::class,'showBook'])->name('book');
Route::post('/book/{book}/rating',[StoreController::class,'rate'])->middleware('auth')->name('book.rating');
Route::post('/book/{book}/comment',[StoreController::class,'comment'])->middleware('auth')->name('book.comment');
Route::get('/publishers',[StoreController::class,'publishers'])->name('publishers');
Route::get('/statistics',[StoreController::class,'statistics'])->name('statistics');
Route::get('/leaderboard',[StoreController::class,'leaderboard'])->name('leaderboard');

Route::get('/cart',[StoreController::class,'cart'])->name('cart');
Route::post('/cart',[StoreController::class,'cart']);
Route::post('/cart/add',[StoreController::class,'addCart'])->name('cart.add');
Route::get('/checkout',[StoreController::class,'checkout'])->middleware('auth')->name('checkout');
Route::post('/checkout',[StoreController::class,'placeOrder'])->middleware('auth')->name('checkout.place');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'authenticate'])->name('login.post');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'storeRegister'])->name('register.post');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/logout',[AuthController::class,'logout'])->name('logout.get');
Route::middleware('auth')->group(function(){
 Route::get('/profile',[AuthController::class,'profile'])->name('profile');
 Route::post('/profile',[AuthController::class,'updateProfile']);
 Route::get('/my-books',[StoreController::class,'myBooks'])->name('my-books');
 Route::get('/my-orders',[StoreController::class,'myOrders'])->name('my-orders');
 Route::get('/order-success/{order}',[StoreController::class,'orderSuccess'])->name('order-success');
});

Route::prefix('admin')->name('admin.')->group(function(){
 Route::get('/login',[AdminController::class,'login'])->name('login');
 Route::post('/login',[AdminController::class,'authenticate'])->name('login.post');
 Route::middleware(['auth','role:admin'])->group(function(){
  Route::get('/',[AdminController::class,'dashboard'])->name('dashboard');
  Route::get('/users',[AdminController::class,'users'])->name('users');
  Route::post('/users/save',[AdminController::class,'userSave'])->name('users.save');
  Route::post('/users/delete',[AdminController::class,'userDelete'])->name('users.delete');
  Route::get('/books',[AdminController::class,'books'])->name('books');
  Route::post('/books/save',[AdminController::class,'bookSave'])->name('books.save');
  Route::post('/books/delete',[AdminController::class,'bookDelete'])->name('books.delete');
  Route::get('/categories',[AdminController::class,'categories'])->name('categories');
  Route::post('/categories/save',[AdminController::class,'categorySave'])->name('categories.save');
  Route::post('/categories/delete',[AdminController::class,'categoryDelete'])->name('categories.delete');
  Route::get('/publishers',[AdminController::class,'publishers'])->name('publishers');
  Route::post('/publishers/save',[AdminController::class,'publisherSave'])->name('publishers.save');
  Route::post('/publishers/delete',[AdminController::class,'publisherDelete'])->name('publishers.delete');
  Route::get('/orders',[AdminController::class,'orders'])->name('orders');
  Route::post('/orders/{order}/status',[AdminController::class,'orderStatus'])->name('orders.status');
  Route::get('/access',[AdminController::class,'access'])->name('access');
  Route::post('/access',[AdminController::class,'grantAccess'])->name('access.grant');
  Route::post('/logout',[AdminController::class,'logout'])->name('logout');
  Route::get('/logout',[AdminController::class,'logout'])->name('logout.get');
 });
});
