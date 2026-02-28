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
    public function addMembre(Request $request, Colocation $colocation)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    if (!$colocation->is_active) {
        return back()->with('error', 'Cette colocation est déjà inactive.');
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors([
            'email' => 'Aucun utilisateur avec cet email.'
        ]);
    }

    if ($user->id === auth()->id()) {
        return back()->withErrors([
            'email' => 'Vous ne pouvez pas vous inviter vous-même.'
        ]);
    }

    $alreadyActive = $user->colocations()
        ->where('colocations.is_active', 1)
        ->wherePivot('status', 'accepted')
        ->exists();

    if ($alreadyActive) {
        return back()->withErrors([
            'email' => 'Ce membre est déjà dans une colocation active.'
        ]);
    }

    $alreadyPending = Membership::where('user_id', $user->id)
        ->where('colocation_id', $colocation->id)
        ->where('status', 'pending')
        ->exists();

    if ($alreadyPending) {
        return back()->withErrors([
            'email' => 'Une invitation est déjà en attente.'
        ]);
    }

    $token = bin2hex(random_bytes(32));

    Membership::create([
        'user_id'       => $user->id,
        'colocation_id' => $colocation->id,
        'token'         => $token,
        'status'        => 'pending'
    ]);

    Mail::to($user->email)
        ->send(new InvitationColocationMail($token));

    return back()->with('success', 'Invitation envoyée avec succès 🎉');
}

   public function acceptInvitation($token)
{
    if (!auth()->check()) {
        return redirect()->route('login')
            ->with('error', 'Veuillez vous connecter.');
    }

    $membership = Membership::where('token', $token)
        ->where('status', 'pending')
        ->first();

    if (!$membership) {
        return redirect()->route('login')
            ->withErrors([
                'token' => 'Invitation invalide ou expirée.'
            ]);
    }

    if (auth()->id() !== $membership->user_id) {
        return redirect()->route('login')
            ->withErrors([
                'user' => 'Cette invitation ne vous appartient pas.'
            ]);
    }

    $user = auth()->user();

    $alreadyActive = $user->colocations()
        ->where('colocations.is_active', 1)
        ->wherePivot('status', 'accepted')
        ->exists();

    if ($alreadyActive) {
        return redirect()->route('colocation.index')
            ->with('error', 'Vous etes deja dans une colocation active.');
    }

    $membership->update([
        'status' => 'accepted',
        'token'  => null
    ]);

    return redirect()->route('colocation.index')
        ->with('success', 'Invitation acceptee avec succes ');
}
}
