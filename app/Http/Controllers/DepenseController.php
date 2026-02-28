<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepenseRequest;
use App\Models\Categorie;
use App\Models\Colocation;
use App\Models\Paiement;
use App\Models\Depense;
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
    public function create(Colocation $colocation, Categorie $category)
    {
        return view('depenses.create', compact('colocation', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepenseRequest $request, Colocation $colocation, Categorie $category)
    {

        $category->depense()->create([
            'title'         => $request->title,
            'montant'       => $request->montant,
            'categorie_id'  => $category->id,
            'description'   => $request->description,
            'user_id'       => auth()->id()
        ]);
        $users = $colocation->users;
        $total = $users->count();
        if ($total == 0) {
            return back()->with('error', 'Aucun membre dans cette colocation.');
        }
        $montant = $request->montant;
        $part = $montant / $total;
        foreach ($users as $user) {

            $paiement =Paiement::firstOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'montant' => 0,
                    'status'  => 'pending',
                ]
            );

            if ($user->id == auth()->id()) {

                $paiement->increment(
                    'montant',
                    $montant - $part
                );
            } else {

                $paiement->decrement(
                    'montant',
                    $part
                );
            }
        }
        $depenses =$category->depense()
        ->orderBy('created_at' ,'desc')->get();

        return redirect()->route('categories.show', [
            'colocation' => $colocation,
            'category'   => $category,
            'depenses'   =>$depenses
        ])->with('success', 'Depense ajoutee avec succes.');
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
