<?php
namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{

   
    public function details($id)
{
    $bien = Bien::findOrFail($id);
    return view('biens.details')->with('bien', $bien);
}


    // Méthode pour lister tous les biens
    public function listBiens(){
        $biens = Bien::all(); // Récupérer tous les biens depuis la base de données
        return view('biens.accueil', compact('biens')); // Retourner la vue avec les biens
    }

    // Méthode pour afficher le formulaire d'ajout de bien
    public function ajoutBiens(){
        return view('biens.ajouter'); // Retourner la vue du formulaire d'ajout
    }

    // Méthode pour insérer un nouveau bien dans la base de données
    public function insertBiens(Request $request){
        // Valider les données du formulaire
        $request->validate([
            'nom'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'adresse'=>'required',
            'categorie'=>'required',
            'statut'=>'required',
            'date_ajout'=>'required',
        ]);

        $imageNom = null; // Initialiser le nom de l'image à null

        // Vérifier si une image est présente dans la requête
        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Récupérer l'image
            $imageNom = time().'.'.$image->getClientOriginalExtension(); // Générer un nom unique pour l'image
            $image->move(public_path('uploads'), $imageNom); // Déplacer l'image dans le dossier public/uploads
        }

        $bienDonnee = $request->except('_token', 'image'); // Extraire les données de la requête sauf le token et l'image
        $bienDonnee['image'] = $imageNom; // Ajouter le nom de l'image aux données

        Bien::create($bienDonnee); // Créer un nouveau bien avec les données

        return redirect('/biens')->with('success', 'Bien créé avec succès.'); // Rediriger avec un message de succès
    }

    // Méthode pour afficher le formulaire de mise à jour d'un bien
    public function editBien($id){
        $bien = Bien::findOrFail($id); // Récupérer le bien par son ID ou retourner une erreur 404
        return view('biens.miseAjour', compact('bien')); // Retourner la vue de mise à jour avec les données du bien
    }

    // Méthode pour mettre à jour un bien dans la base de données
    public function updateBien(Request $request, $id){
        $bien = Bien::findOrFail($id); // Récupérer le bien par son ID ou retourner une erreur 404

        // Valider les données du formulaire
        $request->validate([
            'nom'=>'required',
            'description'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // L'image est optionnelle
            'adresse'=>'required',
            'categorie'=>'required',
            'statut'=>'required',
            'date_ajout'=>'required|date',
        ]);

        $imageNom = $bien->image; // Garder l'ancien nom de l'image

        // Vérifier si une nouvelle image est présente dans la requête
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageNom = time().'.'.$image->getClientOriginalExtension(); // Générer un nouveau nom pour l'image
            $image->move(public_path('uploads'), $imageNom); // Déplacer la nouvelle image dans le dossier public/uploads
        }

        // Mettre à jour les données du bien avec les nouvelles données
        $bien->update($request->except('_token', '_method', 'image') + ['image' => $imageNom]);

        return redirect('/biens')->with('success', 'Bien mis à jour avec succès.'); // Rediriger avec un message de succès
    }
    // Supprimer un bien
    public function deleteBien($id){
        $bien = Bien::findOrFail($id);
        if ($bien->image && file_exists(public_path('uploads/' . $bien->image))) {
            unlink(public_path('uploads/' . $bien->image)); // Supprimer l'image associée du serveur
        }
        $bien->delete(); // Supprimer le bien de la base de données

        return redirect('/biens')->with('success', 'Bien supprimé avec succès.');
    }

}
