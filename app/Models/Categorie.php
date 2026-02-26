<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Colocation;

class Categorie extends Model
{
    protected $fillable=[
        'name',
        'colocation_id'
    ];


    public function Colocation(){
        return $this->hasMany(Colocation::class);
    }
}
