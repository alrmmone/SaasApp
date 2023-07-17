<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ItemsCategory;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\OrderController;


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

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin/users', [HomeController::class, 'adminHome'])->name('admin.users');
    Route::get('/admin/show/{user}', [HomeController::class, 'show'])->name('admin.show');
    Route::get('/admin/edit/{user}', [HomeController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{user}', [HomeController::class, 'update'])->name('admin.update');
    Route::delete('/admin/destroy/{user}', [HomeController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/adduser', [AuthController::class, 'adduser'])->name('admin.adduser');
    Route::post('/admin/adduser', [AuthController::class, 'adduserPost'])->name('admin.adduser');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    //Places Route
    Route::get('/places', [PlaceController::class, 'index'])->name('admin.places.places');
    Route::get('/create', [PlaceController::class, 'create'])->name('admin.places.create');
    Route::post('/create', [PlaceController::class, 'store'])->name('admin.places.create');
    Route::get('/admin/places/show/{place}', [PlaceController::class, 'show'])->name('admin.places.show');
    Route::get('/admin/places/edit/{place}', [PlaceController::class, 'edit'])->name('admin.places.edit');
    Route::put('/admin/places/update/{place}', [PlaceController::class, 'update'])->name('admin.places.update');
    Route::delete('/admin/places/destroy/{place}', [PlaceController::class, 'destroy'])->name('admin.places.destroy');

    //Users Items Route
    Route::get('/users/items', [ItemController::class, 'index'])->name('users.items');
    Route::get('/users/create', [ItemController::class, 'create'])->name('users.create');
    Route::post('/users/create', [ItemController::class, 'store'])->name('users.createdkkk');
    Route::get('/users/show/{item}', [ItemController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{item}', [ItemController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{item}', [ItemController::class, 'update'])->name('users.update');

    //Categories Route
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.categories.home');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/create', [CategoryController::class, 'store'])->name('admin.categories.create');
    Route::get('/admin/categories/show/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/admin/categories/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/update/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

    //Role Route
    Route::get('/role', [RoleController::class, 'index'])->name('admin.role.home');
    Route::get('/admin/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/admin/role/create', [RoleController::class, 'store'])->name('admin.role.create');
    Route::get('/admin/role/edit/{role}', [RoleController::class, 'edit'])->name('admin.role.edit');
    Route::put('/admin/role/update/{role}', [RoleController::class, 'update'])->name('admin.role.update');


    //ItemCategory Route
    Route::get('/itemCategory', [ItemsCategory::class, 'index'])->name('users.itemCategory.index');
    Route::get('/users/itemCategory/create', [ItemsCategory::class, 'create'])->name('users.itemCategory.create');
    Route::post('/users/itemCategory/create', [ItemsCategory::class, 'store'])->name('users.itemCategory.create');
    Route::get('/users/itemCategory/edit/{category}', [ItemsCategory::class, 'edit'])->name('users.itemCategory.edit');
    Route::put('/users/itemCategory/update/{category}', [ItemsCategory::class, 'update'])->name('users.itemCategory.update');

    //Units Route
    Route::get('/unit', [UnitController::class, 'index'])->name('users.units.index');
    Route::get('/users/units/create', [UnitController::class, 'create'])->name('users.units.create');
    Route::post('/users/units/create', [UnitController::class, 'store'])->name('users.units.create');
    Route::get('/users/units/edit/{unit}', [UnitController::class, 'edit'])->name('users.units.edit');
    Route::put('/users/units/update/{unit}', [UnitController::class, 'update'])->name('users.units.update');

    //Order In Route
    Route::resource('orders', OrderController::class);

});
