<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Colocation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationColocationMail;


class UserController extends Controller
{
    public function addMembre(Request $request ,Colocation $colocation){
        $email =$request->email;
        $owner =auth()->user()->name ;
        $user =User::where('email' ,$email)->first();
        if(!$user){
            return redirect()
               ->back()
               ->withErrors(['name' =>'aucun utilisateurs avec cette email']);
        }
        $colocationsActive =$user->colocations()
            ->where('colocations.is_active' ,1)
            ->wherePivot('status' ,'accepted')
            ->exists();
        if($colocationsActive){
            return redirect()
                ->back()
                ->withErrors(['name' => 'cette membre deja dans une colocation active']);
        }

        $token =bin2hex(random_bytes(32));
        Membership::create([
            'user_id'         =>$user->id,
            'colocation_id'   =>$colocation->id ,
            'token'           =>$token,
            'status'        => 'pending'
        ]);
        Mail::to($user->email)
            ->send(new InvitationColocationMail($token));
        
    }
}
