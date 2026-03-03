<?php

use Illuminate\Support\Facades\Route;
use App\Models\ProductMenu;
use App\Http\Controllers\ProductMenuController;

Route::get('/', function () {
    $produks = ProductMenu::latest()->get();

    return view('welcome', compact('produks'));
});

Route::resource("produkmenu", ProductMenuController::class);
