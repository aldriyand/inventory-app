<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth as Authenticate;
use Illuminate\Support\Facades\Route;

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
    if (Authenticate::check()) {
        return redirect()->route('inventory');
    }
    return redirect('login');
});

Route::get('/login', function () {
    if (Authenticate::check()) {
        return redirect()->route('inventory');
    }
    return view('login');
})->name('login');

Route::post('/login', [Auth::class, 'login'])->name('auth.login');
Route::get('/logout', [Auth::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::get('/inventory/purchase', [InventoryController::class, 'purchase'])->name('inventory.purchase');
    Route::get('/inventory/sale', [InventoryController::class, 'sale'])->name('inventory.sale');
    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory.store');
    Route::delete('/inventory/delete/{id}', [InventoryController::class, 'delete'])->name('inventory.delete');
    Route::get('/inventory/edit/{mode}', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::post('/inventory/update/{mode}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::get('/inventory/slip/{mode}/{id}', [InventoryController::class, 'slip'])->name('inventory.slip');

    Route::get('/users', [UserController::class, 'index'])->name('users');
});
