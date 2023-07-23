<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsersController;


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
Route::get("/reset_password", [UsersController::class, "reset_password"]);
Route::post("/reset_password_store", [UsersController::class, "reset_password_store"]);
Route::get("/", [IndexController::class, "index"]);
Route::get("/user_exit", [UsersController::class, "user_exit"]);
Route::get("/calendar", [IndexController::class, "calendar"]);
Route::get("/plan_tabulation", [IndexController::class, "plan_tabulation"]);
Route::get("/plan_edit/{id}", [IndexController::class, "plan_edit"]);
Route::get("/plan_del/{id}", [IndexController::class, "plan_del"]);
Route::post("/plan_edit_store", [IndexController::class, "plan_edit_store"]);
Route::get("/plan_details/{date}", [IndexController::class, "plan_details"]);
Route::post("users_plan_store", [IndexController::class, "users_plan_store"]);
Route::get("login", [UsersController::class, "login"]);
Route::post("login_store", [UsersController::class, "login_store"]);
Route::get("signup", [UsersController::class, "signup"]);
Route::post("signup_store", [UsersController::class, "signup_store"]);
