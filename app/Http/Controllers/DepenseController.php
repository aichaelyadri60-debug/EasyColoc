<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepenseRequest;
use App\Models\Categorie;
use App\Models\Colocation;
use App\Models\Depense ;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Colocation $colocation ,Categorie $category )
    {
        return view('depenses.create',compact('colocation','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepenseRequest $request,Colocation $colocation  ,Categorie $category)
    {

        Depense::create([
            'title'         =>$request->title,
            'montant'       =>$request->montant,
            'description'   =>$request->description
        ]);
        $users = $colocation->users;
        $total =$colocation->users()->count();
        $montant =$request->montant;
        $MontantparUtilisateur = $montant / $total ;
        foreach($users as $user){
            
        }







    }

    /**
     * Display the specified resource.
     */
    public function show(Depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(depense $depense)
    {
        //
    }
}
