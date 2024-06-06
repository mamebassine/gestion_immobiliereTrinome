<?php

use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrateurController;

Route::get('/biens', [BienController::class, 'listBiens'])->name('biens');
Route::get('/ajout', [BienController::class, 'ajoutBiens'])->name('ajout');
Route::post('/biens/ajout', [BienController::class, 'insertBiens'])->name('traitementBien');
Route::get('/details/{id}', [BienController::class, 'details'])->name('details');

Route::post('/biens/{id}/commentaire/ajouter', [CommentaireController::class, 'ajouter'])->name('commentaireAjouter');
Route::get('/biens/{id}/commentaire/{idCommentaire}/modifier', [CommentaireController::class, 'modifier'])->name('commentaireModifier');

Route::put('/biens/{id}/commentaire/{idCommentaire}', [CommentaireController::class, 'mettreAJour'])->name('commentaireMettreAJour');
Route::delete('/biens/{id}/commentaire/{idCommentaire}', [CommentaireController::class, 'supprimer'])->name('commentaireSupprimer');

Route::get('/biens/{id}/edit', [BienController::class, 'editBien'])->name('editerBien');
Route::put('/biens/{id}', [BienController::class, 'updateBien'])->name('updateBien');
Route::delete('/biens/{id}', [BienController::class, 'deleteBien'])->name('supprimerBien');

//auth
Route::get('/inscrire', [AdministrateurController::class, 'afficherFormulaire'])->name('inscrire');
Route::post('/enregistrer_admin', [AdministrateurController::class, 'enregistrerDonne'])->name('enregistrer_admin');
Route::get('/connexion', [AdministrateurController::class, 'pageConnexion'])->name('pageConnexion');
Route::post('/connexion', [AdministrateurController::class, 'connexion'])->name('connexion');
Route::get('/deconnexion', [AdministrateurController::class, 'deconnexion'])->name('deconnexion');
//afficher la liste des bien pour admin
Route::get('/listBien', [AdministrateurController::class, 'adminBien'])->name('listBiens');

