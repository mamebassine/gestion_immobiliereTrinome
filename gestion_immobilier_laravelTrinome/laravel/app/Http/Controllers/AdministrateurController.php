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


    }
    public function pageConnexion()
    {
        return view('admins.connexion');
    }
    public function connexion(connexionRequest $request)
    {
        {
            $credentials = $request->only('email', 'mot_de_passe');

            if (Auth::attempt($credentials)) {
                // Authentification réussie, rediriger l'utilisateur où vous le souhaitez
                return view('/biens');
            }

            // Authentification échouée, rediriger avec un message d'erreur
            return redirect()->route('pageConnexion')->with('error', 'Adresse email ou mot de passe incorrect.');
        }
    }

}
