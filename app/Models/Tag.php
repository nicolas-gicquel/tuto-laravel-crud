<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['nomTag'];

    public function produits()
    {
        return $this->belongsToMany('App\Models\Produits');
    }
}
