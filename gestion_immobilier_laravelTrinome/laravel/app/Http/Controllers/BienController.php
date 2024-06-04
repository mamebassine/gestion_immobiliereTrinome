<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function listBiens(){
        $biens = Bien::all();
        return view('biens.accueil', compact('biens'));
    }
    public function ajoutBiens(){ //afficher le formulaire ajout
        return view('biens.ajouter');
    }
    public function insertBiens(Request $request){//inserer les donnees

     $request->validate([
        'nom'=>'required',
        'description'=>'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'adresse'=>'required',
        'categorie'=>'required',
        'statut'=>'required',
        'date_ajout'=>'required',

     ]);
     $imageNom = Null; //init a null

     if ($request->hasFile('image')) { // verification
        $image = $request->file('image'); //verif champ type nom img
        $imageNom = time().'.'.$image->getClientOriginalExtension(); //identifier fich
        $image->move(public_path('uploads'), $imageNom); //enrigistrer
    }

    $bienDonnee = $request->except('_token', 'image');// extrere
    $bienDonnee['image'] = $imageNom;//

    Bien::create($bienDonnee);//ajou

    return redirect('/biens')->with('success', 'Bien créé avec succès.');

    }

}
