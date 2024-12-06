<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['nom_tag'];
    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }
}
