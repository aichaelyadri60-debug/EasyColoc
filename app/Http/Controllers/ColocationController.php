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
        $colocations =auth()->user()->colocations;
        return view('Membre.index' ,compact('colocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Membre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:100'
        ]);
        DB::transaction(function () use ($request){
            $colocation =Colocation::create([
                'name' =>$request->name
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
        ->with('success' ,'colocation creer avec success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Colocation $colocation)
    {
        return $colocation;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colocation $colocation)
    {
        return view('colocation.edit' ,compact('colocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colocation $colocation)
    {
                
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colocation $colocation)
    {
        $colocation->delete();
        return redirect()
        ->back()
        ->with('success' ,'colocation supprime avec success');
    }
}
