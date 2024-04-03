<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get("/login", [UserController::class, 'login'])->name("login")->middleware('guest');
Route::post("/login", [UserController::class, 'login_store'])->name("login_store")->middleware('guest');
// Route::get("/register", [UserController::class, 'register'])->name("register")->middleware('guest');
// Route::post("/register", [UserController::class, 'register_store'])->name("register_store")->middleware('guest');
Route::delete("/logout", [UserController::class, 'logout'])->name("logout")->middleware('auth');

Route::get("/home", [HomeController::class, 'index'])->name("home")->middleware('auth');
Route::get("/home/edit/{id}", [HomeController::class, 'edit'])->name("home.edit")->middleware('auth')->middleware('role');
Route::put("/home/edit/{id}", [HomeController::class, 'update'])->name("home.update")->middleware('auth')->middleware('role');
Route::delete("/home/{id}", [HomeController::class, 'destroy'])->name("home.delete")->middleware('auth')->middleware('role');
Route::post("/employee", [HomeController::class, 'store'])->name("home.store")->middleware('auth');
