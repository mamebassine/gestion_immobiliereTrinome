<?php

use App\Http\Controllers\BienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentaireController;


Route::get('/commentaires', [CommentaireController::class, 'lireCommentaires'])->name('lireCommentaire');
Route::get('/ajouter', [CommentaireController::class, 'ajoutCommentaire'])->name('ajoutCommentaire');
Route::post('/traitementAjout', [CommentaireController::class, 'traitementAjoutCommentaire'])->name('commentaireAjouter');
Route::post('/mise-a-jour-commentaire/{id}', [CommentaireController::class, 'iseAjourCommentaire'])->name('miseAjourCommentaire');
Route::post('/traitementMiseAjour', [CommentaireController::class, 'traitementMiseAjour'])->name('miseAjourTraitement');
Route::get('/supprimer-commentaire/{id}', [CommentaireController::class, 'upprimerCommentaire'])->name('supprimmerCommentaire');

// Afficher la liste des biens
Route::get('/biens', [BienController::class, 'listBiens']);

// Afficher le formulaire d'ajout
Route::get('/ajout', [BienController::class, 'ajoutBiens']);
Route::post('/traitementAjout',[BienController::class, 'insertBiens'])->name('traitementBien');

