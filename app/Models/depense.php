<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\User;

class Depense extends Model
{
    protected $fillable=[
        'title',
        'montant',
        'categorie_id',
        'user_id'
    ];
    protected $casts = [
        'montant'  =>'decimal:2'
    ];

    public function categories(){
        return $this->belongsTo(Categorie::class );
    }
    public function user(){
        return $this->belongsTo(User::class );
    }
}
