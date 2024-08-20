<?php

use App\Http\Controllers\CarneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('carne', [CarneController::class, "index"]);
Route::post('carne', [CarneController::class, "store"]);
