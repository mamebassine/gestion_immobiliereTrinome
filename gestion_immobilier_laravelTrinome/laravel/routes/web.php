<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentaireController;

Route::get('/commentaires', [CommentaireController::class, 'lireCommentaires'])->name('lireCommentaire');
Route::get('/ajouter', [CommentaireController::class, 'ajoutCommentaire'])->name('ajoutCommentaire');
Route::post('/traitementAjout', [CommentaireController::class, 'traitementAjoutCommentaire'])->name('commentaireAjouter');
Route::get('/modifier', [CommentaireController::class, 'modifier']);
Route::post('/traitementMiseAjour', [CommentaireController::class, 'traitementMiseAjour'])->name('miseAjourTraitement');
Route::get('/supprimerCommentaire{id}', [CommentaireController::class, 'supprimerComment{id}'])->name('supprimmerCommentaire');
