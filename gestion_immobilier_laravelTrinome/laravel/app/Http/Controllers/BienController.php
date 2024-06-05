<?php
namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function listBiens()
    {
        $biens = Bien::all();
        return view('biens.accueil', compact('biens'));
    }

    public function ajoutBiens()
    {
        return view('biens.ajouter');  // Retourne la vue pour ajouter un bien
    }

    public function insertBiens(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'adresse' => 'required',
            'categorie' => 'required',
            'statut' => 'required',
            'date_ajout' => 'required',
        ]);

        $imageNom = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageNom = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageNom);
        }

        $bienDonnee = $request->except('_token', 'image');
        $bienDonnee['image'] = $imageNom;

        Bien::create($bienDonnee);

        return redirect('/biens')->with('success', 'Bien créé avec succès.');
    }

    public function details($id)
{
    $bien = Bien::findOrFail($id);
    return view('biens.details')->with('bien', $bien);
}

}
