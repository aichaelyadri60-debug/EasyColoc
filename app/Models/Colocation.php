<?php

namespace App\Models;
use App\Models\User ;
use App\Models\Categorie;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable =[
        'name',
        'is_active',
        'address',
        'description'
    ];


    public function users(){
        return $this->belongsToMany(
            User::class ,'memberships' ,'colocation_id' ,'user_id'
        )
        ->withPivot('joined_at','role', 'left_at', 'status', 'token')
        ->withTimestamps();
    }

    public function categories(){
        return $this->hasMany(Categorie::class);
    }
}
