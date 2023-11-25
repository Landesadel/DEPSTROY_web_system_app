<?php

use App\Http\Controllers\WasteController;
use Illuminate\Support\Facades\Route;

Route::post('/upload', [WasteController::class, 'upload'])->name('upload');
Route::post('/web', [WasteController::class, 'update']);
