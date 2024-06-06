<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'mot_passe' => Hash::make($request->mot_passe), // Utilisez Hash::make pour hacher le mot de passe
        ]);

        // Rediriger après l'enregistrement
        return redirect()->route('pageConnexion')->with('success', 'Inscription réussie. Veuillez vous connecter.');
    }

    public function pageConnexion()
    {
        return view('admins.connexion');
    }

    public function connexion(Request $request)
    {
        $credentials = $request->only('email', 'mot_passe');

        // Récupérer l'administrateur par email
        $administrateur = Administrateur::where('email', $credentials['email'])->first();

        if ($administrateur && Hash::check($credentials['mot_passe'], $administrateur->mot_passe)) {
            // Authentification réussie
            Auth::login($administrateur);
            return redirect()->route('biens');
        }

        // Authentification échouée, rediriger avec un message d'erreur
        return redirect()->route('pageConnexion')->with('error', 'Adresse email ou mot de passe incorrect.');
    }
}
