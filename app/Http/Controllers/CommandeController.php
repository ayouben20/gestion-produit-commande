<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\commande_produit;
use App\Models\produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function afficherproduits()
    {
        $produits = produit::all();
    $commandeProduits = commande_produit::all();
    
    return view('commanderview', compact('commandeProduits','produits'));
    }

    public function commander(Request $request)
    {
        $request->validate([
            'ajouter' => 'required|array',
            'quantite' => 'required|array',
        ]);

        $commande = new Commande();
        $commande->save();
        $commandeid = $commande->id;
// print_r($request->ajouter);die();
// Parcourir les produits ajoutés à la commande
foreach ($request->ajouter as $produitID) {
    // Récupérer la quantité associée à chaque produit
    $quantite = $request->quantite[$produitID];
    
    // Associer le produit à la commande et spécifier la quantité dans la table de liaison
    $commande->produits()->attach($produitID, ['quantite' => $quantite]);
}

        return redirect()->back()->with('success', "La commande $commandeid a été traitée avec succès.");
    }
}
