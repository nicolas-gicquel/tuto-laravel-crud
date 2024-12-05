<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'quantite' => 'required',
            'categorie_id' => 'required'

        ]);

        Produit::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'categorie_id' => $request->categorie_id
        ]);

        return redirect()->route('produits.index')
            ->with('success', 'Produit ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.edit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
     */
    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return redirect('/produits')->with('success', 'Produit supprimé avec succès');
    }
}
