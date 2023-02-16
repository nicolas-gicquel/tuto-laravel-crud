<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::all();
        $categories = Categorie::all();
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'quantite' => 'required',
            'categorie_id' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('image')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $fileNameToStore :"jeanmiche_20220422.jpg"
            $filename = $filenameWithExt. '_' .time().'.'.$extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app
            $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        
        Produit::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'categorie_id' => $request->categorie_id,
            'image' => $filename
        ]);



        return redirect()->route('produits.index')
            ->with('success', 'Produit ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.edit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateProduit = $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'quantite' => 'required'
        ]);
        Produit::whereId($id)->update($updateProduit);
        return redirect()->route('produits.index')
            ->with('success', 'Le produit mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect('/produits')->with('success', 'Produit supprimé avec succès');
    }
}
