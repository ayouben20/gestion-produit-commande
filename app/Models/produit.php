<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'description'
    ];
    public function commandes()
{
    return $this->belongsToMany(commande::class, 'commande_produits')->withPivot('quantite');
}

}
