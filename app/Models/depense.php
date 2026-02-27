<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;

class Depense extends Model
{
    protected $fillable=[
        'title',
        'montant',
        'categorie_id',
        'user_id'
    ];

    public function categories(){
        return $this->belongsTo(Categorie::class );
    }
}
