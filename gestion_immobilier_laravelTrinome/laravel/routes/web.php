<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\AdministrateurController;

// Afficher la liste des biens
Route::get('/biens', [BienController::class, 'listBiens']);

// Afficher le formulaire d'ajout
Route::get('/ajout', [BienController::class, 'ajoutBiens']);

// Traiter l'ajout d'un bien
Route::post('/traitementAjout', [BienController::class, 'insertBiens'])->name('traitementBien');
//update
Route::get('/biens/{id}/edit', [BienController::class, 'editBien'])->name('editerBien');
Route::put('/biens/{id}', [BienController::class, 'updateBien'])->name('updateBien');
Route::delete('/biens/{id}', [BienController::class, 'deleteBien'])->name('supprimerBien');
//auth
Route::get('/inscrire', [AdministrateurController::class, 'afficherFormulaire'])->name('inscrire');
Route::post('/enregistrer_admin', [AdministrateurController::class, 'enregistrerDonne'])->name('enregistrer_admin');
