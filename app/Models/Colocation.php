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
        )
        ->withPivot('joined_at', 'left_at', 'status', 'token')
        ->withTimestamps();
    }
}
