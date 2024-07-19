<?php

use App\Http\Controllers\EbanxController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/reset', [EbanxController::class, 'reset'])->name('ebanx.reset');
