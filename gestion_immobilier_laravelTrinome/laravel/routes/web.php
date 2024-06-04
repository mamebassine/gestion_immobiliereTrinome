<?php

use App\Http\Controllers\BienController;
use Illuminate\Support\Facades\Route;

Route::get('/biens', [BienController::class, 'listBiens']);//aff

Route::get('/ajout', [BienController::class, 'ajoutBiens']);
Route::post('/traitementAjout',[BienController::class, 'insertBiens'])->name('traitementBien');
