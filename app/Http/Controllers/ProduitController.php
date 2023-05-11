<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produit=Produit::all();
        return response()->json($produit);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'libelle' =>'required|string',
            'prix' =>'required|string',
            'quantity' =>'required|string',

        ]);
        $user=auth()->user();

        $produit = Produit::create([


            'libelle' => $request->libelle,
            'prix' => $request->prix,
            'quantity' => $request->quantity,
            'idUser' => $user->id
        ]);
        
        return response()->json($produit);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
        return $produit;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
   //
   $request->validate([
    'libelle' =>'required|string',
    'prix' =>'required|string',
    'quantity' =>'required|string',

]);
$user=auth()->user();

$produit = Produit::update([


    'libelle' => $request->libelle,
    'prix' => $request->prix,
    'quantity' => $request->quantity,
]);

return response()->json($produit);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
        $produit->delete();
    }
}
