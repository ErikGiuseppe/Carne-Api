<?php

use App\Http\Controllers\CarneController;
use App\Repositories\CarneRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('carne', [CarneRepository::class, "all"]);
Route::post('carne', [CarneController::class, "store"]);
Route::get('/carne/id/{id}/parcelas', [CarneController::class, 'getParcelas']);
