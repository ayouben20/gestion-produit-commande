<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    public function produits()
{
    return $this->belongsToMany(produit::class, 'commande_produits')->withPivot('quantite');
}
}
