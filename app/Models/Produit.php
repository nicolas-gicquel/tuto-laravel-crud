<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'prix', 'quantite','categorie_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    
}
