<?php

use Illuminate\Support\Facades\Route;
use StoresSuite\Wix\Controllers\AuthController;

Route::get("wix/oauth/redirect", [AuthController::class, "redirect"]);
Route::get("wix/oauth/token", [AuthController::class, "token"]);
