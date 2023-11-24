<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WasteController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('index');
Route::get('/create', [WasteController::class, 'create'])->name('create');
Route::get('/waste', [WasteController::class, 'getCollection']);
Route::get('/export', [ExcelController::class, 'export'])->name('export');
