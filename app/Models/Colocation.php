<?php

namespace App\Models;
use App\Models\User ;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable =[
        'name'
    ];


    public function users(){
        return $this->belongsToMany(
            User::class ,'memberships' ,'colocation_id' ,'user_id'
        )->withTimestamps();
    }
}
