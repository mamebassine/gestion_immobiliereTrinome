<?php

use App\Http\Controllers\BienController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;

Route::get('/biens', [BienController::class, 'listBiens'])->name('biens');
Route::get('/ajout', [BienController::class, 'ajoutBiens'])->name('ajout');
Route::post('/traitementAjout', [BienController::class, 'insertBiens'])->name('traitementBien');
<<<<<<< HEAD
Route::get('/details/{id}', [BienController::class, 'details'])->name('details');

Route::post('/commentaire/ajouter', [CommentaireController::class, 'ajouter'])->name('commentaireAjouter'); 
Route::get('/commentaire/{id}/modifier', [CommentaireController::class, 'modifier'])->name('commentaireModifier');
Route::put('/commentaire/{id}', [CommentaireController::class, 'mettreAJour'])->name('commentaireMettreAJour');
Route::delete('/commentaire/{id}', [CommentaireController::class, 'supprimer'])->name('commentaireSupprimer');

=======
//update
Route::get('/biens/{id}/edit', [BienController::class, 'editBien'])->name('editerBien');
Route::put('/biens/{id}', [BienController::class, 'updateBien'])->name('updateBien');
Route::delete('/biens/{id}', [BienController::class, 'deleteBien'])->name('supprimerBien');
>>>>>>> f4f711b1e94931dd4cd667c3704a0667ed9aea38
