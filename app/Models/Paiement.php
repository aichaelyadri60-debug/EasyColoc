<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Paiement extends Model
{
    protected $fillable = [
        'montant' ,
        'status' ,
        'user_id'
    ];

    public function users(){
        $this->belongsTo(User::class);
    }
}
