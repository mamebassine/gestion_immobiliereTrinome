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

    public function listBiens(){
        $biens = Bien::all(); 
        return view('biens.accueil', compact('biens')); 
    }

    public function ajoutBiens(){
        return view('biens.ajouter'); 
    }

    public function insertBiens(Request $request){

        $request->validate([
            'nom'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'adresse'=>'required',
            'categorie'=>'required',
            'statut'=>'required',
            'date_ajout'=>'required',
        ]);

        $imageNom = null; 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageNom = time().'.'.$image->getClientOriginalExtension(); 
            $image->move(public_path('uploads'), $imageNom); 
        }

        $bienDonnee = $request->except('_token', 'image'); 
        $bienDonnee['image'] = $imageNom; 

        Bien::create($bienDonnee); 

        return redirect('/biens')->with('success', 'Bien créé avec succès.');
    }


    public function editBien($id){
        $bien = Bien::findOrFail($id);
        return view('biens.miseAjour', compact('bien'));
    }

    public function updateBien(Request $request, $id){
        $bien = Bien::findOrFail($id); 

        $request->validate([
            'nom'=>'required',
            'description'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'adresse'=>'required',
            'categorie'=>'required',
            'statut'=>'required',
            'date_ajout'=>'required|date',
        ]);

        $imageNom = $bien->image; 

    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageNom = time().'.'.$image->getClientOriginalExtension(); 
            $image->move(public_path('uploads'), $imageNom); 
        }

        
        $bien->update($request->except('_token', '_method', 'image') + ['image' => $imageNom]);

        return redirect('/biens')->with('success', 'Bien mis à jour avec succès.'); 
    }
    
    public function deleteBien($id){
        $bien = Bien::findOrFail($id);
        if ($bien->image && file_exists(public_path('uploads/' . $bien->image))) {
            unlink(public_path('uploads/' . $bien->image)); 
        }
        $bien->delete(); 

        return redirect('/biens')->with('success', 'Bien supprimé avec succès.');
    }

}
