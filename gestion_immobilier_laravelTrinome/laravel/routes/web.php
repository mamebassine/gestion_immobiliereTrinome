<?php

use App\Http\Controllers\BienController;
use Illuminate\Support\Facades\Route;

// Afficher la liste des biens
Route::get('/biens', [BienController::class, 'listBiens']);

// Afficher le formulaire d'ajout
Route::get('/ajout', [BienController::class, 'ajoutBiens']);

// Traiter l'ajout d'un bien
Route::post('/traitementAjout', [BienController::class, 'insertBiens'])->name('traitementBien');
