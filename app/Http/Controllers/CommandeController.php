<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\commande_produit;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use function Laravel\Prompts\select;

class CommandeController extends Controller
{
    public function afficherproduits()
    {
        $produits = produit::all();
        return view('commanderview', compact('produits'));
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
        foreach ($request->ajouter as $produitID) {

            $quantite = $request->quantite[$produitID];
            $commande->produits()->attach($produitID, ['quantite' => $quantite]);
            
        } 

        // $countproduit = DB::table('commande_produits')->where('commande_id', $commandeid)->count();


        // print_r($countProduits);die();

        // DB::table('commandes')->where('id', $commandeid)->update(['nb_produit' => $countProduits]);

        return redirect()->back()->with('success', "La commande $commandeid a été traitée avec succès.");
    }

    public function indexcommand($commandeid): View
    {
        $commandes = DB::table('commandes')->get();
        $commandeProduits = commande_produit::all();

        $data = DB::table('commandes')
    ->join('commande_produits', 'commandes.id', '=', 'commande_produits.commande_id')
    ->select('commandes.id', 'commandes.date_commande', DB::raw('COUNT(commande_produits.id) as produit_count'))
    ->groupBy('commandes.id', 'commandes.date_commande')
    ->get();


        return view('pagecommandview', compact('commandes','commandeProduits','countProduits'));
    }
    public function supprimercommand($id)
    {
        DB::table('commandes')->where('id', $id)->delete();
        return redirect()->back()->with('success', "La commande $id a été supprimé avec succès.");
    }

    public function modifiercommand($id)
    {
        $commande = Commande::find($id);
        $produits = DB::table('produits')->get();

        return view('modifiercommandview',compact('commande','produits'));
    }
}
