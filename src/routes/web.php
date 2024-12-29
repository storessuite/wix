<?php

use Illuminate\Support\Facades\Route;
use StoresSuite\Wix\Controllers\AuthController;

Route::get('wix/oauth/app', [AuthController::class, 'app'])->name('wix.oauth.app');
Route::get('wix/oauth/redirect', [AuthController::class, 'redirect'])->name('wix.oauth.redirect');
