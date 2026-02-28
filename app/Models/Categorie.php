<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Colocation;
use App\Models\Depense;

class Categorie extends Model
{
    protected $fillable=[
        'name',
        'colocation_id'
    ];


    public function Colocation(){
        return $this->belongsTo(Colocation::class);
    }


    public function depense(){
        return $this->hasMany(Depense::class);
    }
}
