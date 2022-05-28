<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/login", [UserController::class, "loginPage"]);
Route::post("/login", [UserController::class, "loginAction"]);

Route::middleware(['need.login'])->group(function() {
    Route::get("/", [BarangController::class, "index"]);
    Route::get("/dashboard", [BarangController::class, "index"]);

    Route::get("/barang/create", [BarangController::class, "createPage"]);
    Route::post("/barang/create", [BarangController::class, "createAction"]);
    Route::get("/barang/edit/{id}", [BarangController::class, "editPage"]);
    Route::post("/barang/edit/{id}", [BarangController::class, "editAction"]);
    Route::get("/barang/delete/{id}", [BarangController::class, "deleteAction"]);

    Route::get("/user/create", [UserController::class, "createPage"]);
    Route::post("/user/create", [UserController::class, "createAction"]);
    Route::get("/user/edit/{id}", [UserController::class, "editPage"]);
    Route::post("/user/edit/{id}", [UserController::class, "editAction"]);
    Route::get("/user/delete/{id}", [UserController::class, "deleteAction"]);

    Route::get("/logout", [UserController::class, "logout"]);
});