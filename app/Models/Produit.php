<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'prix', 'quantite', 'categorie_id','image'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function tags() { 
        return $this->belongsToMany(Tag::class);
    }
}
