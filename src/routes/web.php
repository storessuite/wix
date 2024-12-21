<?php

use Illuminate\Support\Facades\Route;
use StoresSuite\Wix\Controllers\AuthController;

Route::get("wix/oauth/app", [AuthController::class, "app"]);
Route::get("wix/oauth/redirect", [AuthController::class, "redirect"]);
