<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colocations = auth()->user()->colocations;
        return view('colocations.index', compact('colocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colocations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColocRequest $request)
    {
        $validated =$request->validated();
        $colocationsActive = auth()->user()->colocations()
            ->where('colocations.is_active', 1)
            ->wherePivot('status', 'accepted')
            ->exists();
        if ($colocationsActive) {
            return redirect()
                ->back()
                ->withErrors(['name' => 'Vous avez deja une colocation active']);
        }
        DB::transaction(function () use ($request) {
            $colocation = Colocation::create([
                'name' => $validated['name'],
                'address'   =>$validated['address'],
                'description'  =>$validated['description']
            ]);
            Membership::create([
                'user_id' => auth()->id(),
                'colocation_id' => $colocation->id,
                'joined_at' => now(),
                'role' => 'owner',
                'status' => 'accepted',
            ]);
        });


        return redirect()
            ->route('colocation.index')
            ->with('success', 'colocation creer avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Colocation $colocation)
    {
        $users = $colocation->users;
        return view('colocations.detail', compact([
            'colocation',
            'users'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colocation $colocation)
    {
        return view('colocation.edit', compact('colocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colocation $colocation) {}

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Colocation $colocation) {}
    public function annulercolocation(Colocation $colocation)
    {
        $user_id = auth()->id();
        $membership = $colocation->users()
            ->where('user_id', $user_id)
            ->first();
        //    dd($membership->pivot->role);

        if (!$membership) {
            return back()->with('error', 'Vous n\'etes pas membre');
        }
        if ($membership->pivot->role === 'owner') {
            foreach ($colocation->users as $user) {
                $colocation->users()->updateExistingPivot($user->id, [
                    'status' => 'left',
                    'left_at' => now()
                ]);
                $colocation->update([
                    'is_active' => false
                ]);
            }
        } else {

            $colocation->users()->updateExistingPivot($user_id, [
                'status' => 'left',
                'left_at' => now()
            ]);
        }
        return back()->with('success', 'Opération effectuée avec succès.');
    }
}
