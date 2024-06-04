<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    // Fonction pour afficher tous les commentaires
    public function lireCommentaires()
    {
        // Récupérer tous les commentaires depuis la base de données
        $commentaires = Commentaire::all();
        // Afficher la vue avec la liste des commentaires
        return view('commentaires.listCommentaire', compact('commentaires'));
    }

    // Fonction pour ajouter un nouveau commentaire
    public function ajoutCommentaire()
    {
        // Obtenir la date d'aujourd'hui
        $dateAujourdhui = date('Y-m-d');
        // Afficher la vue pour ajouter un commentaire avec la date d'aujourd'hui
        return view('commentaires.ajoutCommentaire', compact('dateAujourdhui'));
    }

    // Fonction pour traiter l'ajout d'un commentaire
    public function traitementAjoutCommentaire(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'date_publication' => 'required|date',
            'description' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
        ]);

        // Créer un nouveau commentaire avec les données fournies
        Commentaire::create([
            'date_publication' => $request->input('date_publication'),
            'description' => $request->input('description'),
            'auteur' => $request->input('auteur'),
        ]);

        // Rediriger vers la page affichant tous les commentaires après l'ajout
        return redirect()->route('ajoutCommentaire');
    }

    // Fonction pour afficher le formulaire de mise à jour d'un commentaire
    public function miseAjour($id)
    {
        // Trouver le commentaire à mettre à jour en fonction de son ID
        $commentaire = Commentaire::find($id);

        // Vérifier si le commentaire existe
        if (!$commentaire) {
            return redirect()->route('lireCommentaires')->with('error', 'Commentaire non trouvé');
        }

        // Afficher la vue pour la mise à jour du commentaire
        return view('commentaires.miseAjourComment', compact('commentaire'));
    }

    // Fonction pour traiter la mise à jour d'un commentaire
    public function traitementMiseAjour(Request $request, $id)
    {
        // Valider les données du formulaire de mise à jour
        $request->validate([
            'date_publication' => 'required|date',
            'description' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
        ]);

        // Trouver le commentaire à mettre à jour en fonction de son ID
        $commentaire = Commentaire::find($id);

        // Vérifier si le commentaire existe
        if (!$commentaire) {
            return redirect()->route('lireCommentaires')->with('error', 'Commentaire non trouvé');
        }

        // Mettre à jour les données du commentaire avec les nouvelles données fournies
        $commentaire->date_publication = $request->input('date_publication');
        $commentaire->description = $request->input('description');
        $commentaire->auteur = $request->input('auteur');
        $commentaire->save();

        // Rediriger vers la page affichant tous les commentaires après la mise à jour
        return redirect()->route('lireCommentaires')->with('success', 'Commentaire mis à jour avec succès');
    }

    // Fonction pour supprimer un commentaire
    public function supprimerComment($id)
    {
        // Trouver le commentaire à supprimer en fonction de son ID
        $commentaire = Commentaire::find($id);

        // Vérifier si le commentaire existe
        if (!$commentaire) {
            return redirect()->route('lireCommentaires')->with('error', 'Commentaire non trouvé');
        }

        // Supprimer le commentaire
        $commentaire->delete();

        // Rediriger vers la page affichant tous les commentaires après la suppression
        return redirect()->route('lireCommentaires')->with('success', 'Commentaire supprimé avec succès');
    }
}
