<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
   
    public function listCommentaires()

    {
    
        $commentaires = Commentaire::all();
    
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

    public function commentaireAjouter(Request $request)
{
    // Validate the form data
    $request->validate([
        'auteur' => 'equired|string|max:255',
        'description' => 'equired|string|max:255',
        'date_publication' => 'equired|date',
        'bien_id' => 'equired|exists:biens,id', // Check if the bien ID exists
    ]);

    // Create a new comment
    $commentaire = new Commentaire();
    $commentaire->auteur = $request->input('auteur');
    $commentaire->description = $request->input('description');
    $commentaire->date_publication = $request->input('date_publication');
    $commentaire->bien_id = $request->input('bien_id');
    $commentaire->save();

    // Redirect to the details page with a success message
    return redirect()->route('details', $request->input('bien_id'))->with('success', 'Commentaire ajouté avec succès!');
}

public function ajouter(Request $request)
{
    $request->validate([
        'auteur' => 'required|string|max:255',
        'description' => 'required|string',
        'bien_id' => 'required|exists:biens,id',
    ]);

    Commentaire::create([
        'auteur' => $request->auteur,
        'description' => $request->description,
        'bien_id' => $request->bien_id,
    ]);

    return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
}

public function modifier($id)
{
    $commentaire = Commentaire::findOrFail($id);
    return view('commentaires.modifier', compact('commentaire'));
}

public function mettreAJour(Request $request, $id)
{
    $request->validate([
        'auteur' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $commentaire = Commentaire::findOrFail($id);
    $commentaire->update($request->all());

    return redirect()->back()->with('success', 'Commentaire modifié avec succès.');
}

public function supprimer($id)
{
    $commentaire = Commentaire::findOrFail($id);
    $commentaire->delete();

    return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
}

}
