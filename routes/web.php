<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;

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

Route::get("/", function () {
  return view("welcome");
});

Route::group(["middleware" => ["auth:sanctum", "verified"]], function () {
  Route::name("dashboard.")
    ->prefix("dashboard")
    ->group(function () {
      Route::get("/", [DashboardController::class, "index"])->name("index");
      Route::resource("profile", ProfileController::class);
      Route::resource("user", UserController::class);
    });
});

require __DIR__ . "/auth.php";
