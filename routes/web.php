<?php

use App\Http\Controllers\ArableLandController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientshopController;
use App\Http\Controllers\EggController;
use App\Http\Controllers\FarmAnimalController;
use App\Http\Controllers\FreshNutController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VegetableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// Homepage
Route::get('/homepage', function () {
    return view('pages.homepage');
})->name('homepage');


// Homepage Client
Route::get('/homeforclient', [ClientController::class, 'home'])
    ->name('homeforclient');


// Shop
Route::get('/shoppage', [ClientshopController::class, 'shoppage'])->name('shoppage');


// About
Route::get('/about', function () {
    return view('pages.aboutus');
})->name('about');


// Cart
Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');

Route::middleware('web')->prefix('cart')->name('cart.')->group(function () {
    Route::get('/count',                          [CartController::class, 'count'])->name('count');
    Route::post('/clear',                         [CartController::class, 'clear'])->name('clear');
    Route::post('/add/{id}',                      [CartController::class, 'add'])->name('add');
    Route::post('/add-fruit/{id}',                [CartController::class, 'addFruit'])->name('add-fruit');
    Route::post('/add-juice/{id}',                [CartController::class, 'addJuice'])->name('add-juice');
    Route::post('/increment/{id}',                [CartController::class, 'increment'])->name('increment');
    Route::post('/decrement/{id}',                [CartController::class, 'decrement'])->name('decrement');
    Route::post('/increment-fruit/{id}',          [CartController::class, 'incrementFruit'])->name('increment-fruit');
    Route::post('/decrement-fruit/{id}',          [CartController::class, 'decrementFruit'])->name('decrement-fruit');
    Route::post('/increment-juice/{id}',          [CartController::class, 'incrementJuice'])->name('increment-juice');
    Route::post('/decrement-juice/{id}',          [CartController::class, 'decrementJuice'])->name('decrement-juice');
});


// User-facing category pages (used in homeforclient.blade.php)
Route::view('/user/vegetable',  'category.vegetable')->name('user.vegetable');
Route::view('/user/fruits',     'category.Fruit')->name('user.fruits');
Route::view('/user/fresh-nuts', 'category.Fresh_Nut')->name('user.fresh-nuts');
Route::view('/user/juices',     'category.juice')->name('user.juices');
Route::view('/user/eggs',       'category.Egg')->name('user.eggs');


// Reviews (homepage + per-product)
Route::get('/reviews/{type}/{id}', [ReviewController::class, 'index'])
    ->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store');


// Category
Route::get('/Farm_Animals', function() {
    return view('category.Farm_Animals');
})->name('Farm_Animals');
Route::get('/vegetable', function() {
    return view('category.vegetable');
})->name('vegetable');
Route::get('/Egg', function() {
    return view('category.Egg');
})->name('Egg');

// Arable_land
Route::get('/Arable_lands', [ArableLandController::class, 'index'])
    ->name('Arable_lands');
Route::post('/Arable_land', [ArableLandController::class, 'store'])
    ->name('Arable_land.store');
Route::delete('/Arable_lands/{id}', [ArableLandController::class, 'destroy'])
    ->name('Arable_land.destroy');


// Egg
Route::get('/Egg', [EggController::class, 'index'])
    ->name('Egg');
Route::post('/Egg', [EggController::class, 'store'])
    ->name('eggs.store');
Route::put('/Egg/{egg}', [EggController::class, 'update'])
    ->name('eggs.update');
Route::delete('/Egg/{egg}', [EggController::class, 'destroy'])
    ->name('eggs.destroy');


// Farm_Animal
Route::get('/Farm_Animals', [FarmAnimalController::class, 'index'])
    ->name('Farm_Animals');
Route::post('/Farm_Animals', [FarmAnimalController::class, 'store'])
    ->name('farm_animals.store');
Route::get('/Farm_Animals/{id}/edit', [FarmAnimalController::class, 'edit'])
    ->name('farm_animals.edit');
Route::put('/Farm_Animals/{id}', [FarmAnimalController::class, 'update'])
    ->name('farm_animals.update');
Route::delete('/Farm_Animals/{id}', [FarmAnimalController::class, 'destroy'])
    ->name('farm_animals.destroy');


// Vegeatable
Route::get('/vegetable', [VegetableController::class, 'index'])
    ->name('vegetable');
Route::post('/vegetables', [VegetableController::class, 'store'])
    ->name('vegetables.store');
Route::get('/vegetables/{id}/edit', [VegetableController::class, 'edit'])
    ->name('vegetables.edit');
Route::put('/vegetables/{id}', [VegetableController::class, 'update'])
    ->name('vegetables.update');
Route::delete('/vegetables/{id}', [VegetableController::class, 'destroy'])
    ->name('vegetables.destroy');


// Fruit
Route::get('/fruit', [FruitController::class, 'index'])
    ->name('Fruit');

Route::post('/fruit', [FruitController::class, 'store'])
    ->name('fruit.store');

Route::put('/fruit/{id}', [FruitController::class, 'update'])
    ->name('fruit.update');

Route::delete('/fruit/{id}', [FruitController::class, 'destroy'])
    ->name('fruit.destroy');

    
// Fresh Nut
Route::get('/fresh-nut', [FreshNutController::class, 'index'])
    ->name('Fresh_Nut');

Route::post('/fresh-nut', [FreshNutController::class, 'store'])
    ->name('fresh_nuts.store');

Route::put('/fresh-nut/{id}', [FreshNutController::class, 'update'])
    ->name('fresh_nuts.update');

Route::delete('/fresh-nut/{id}', [FreshNutController::class, 'destroy'])
    ->name('fresh_nuts.destroy');


// Product Card
Route::get('/homepage', [ShopController::class, 'index'])->name('homepage');


// ==========================
// Admin Dashboard
// ==========================
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])
        ->name('dashboard');
});


// Users
Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');


// Other
Route::get('/sales-report', [SalesController::class, 'index'])
    ->name('sales.report');