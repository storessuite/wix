<?php

use Illuminate\Support\Facades\Route;

Route::get("wix/oauth/redirect", [WixOauthController::class, "redirect"]);
Route::get("wix/oauth/token", [WixOauthController::class, "token"]);
