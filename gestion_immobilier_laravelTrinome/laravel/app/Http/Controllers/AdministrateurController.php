<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateur;

class AdministrateurController extends Controller
{
    public function afficherFormulaire()
    {
        return view('admins.inscription');
    }

    public function enregistrerDonne(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|unique:administrateurs',
            'mot_passe' => 'required|string|min:4|confirmed',
        ]);

        // Création d'un nouvel administrateur
        $administrateur = Administrateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'mot_passe' => bcrypt($request->mot_passe),
        ]);

        // Vous pouvez ajouter ici d'autres fonctionnalités, comme la redirection vers une page de confirmation, par exemple.

    }

    // Les autres méthodes de votre contrôleur restent inchangées
}
