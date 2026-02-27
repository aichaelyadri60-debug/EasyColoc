<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Colocation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Colocation $colocation)
    {
        // $categories =$colocation->Categories ;
        // return view();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Colocation $colocation)
    {
        return view('categories.create' ,compact('colocation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request ,Colocation $colocation)
    {
        // $validated =$request->validated();
        // $colocation->categories()->create([
        //     'name'  =>$validated['name'],
        //     'colocation_id'  =>$colocation->id
        // ]);
        // return redirect()->back()->with(['success' =>'categorie creer avec success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Colocation $colocation ,Categorie $categorie )
    {
        return view('categories.detail' ,compact('categorie' ,'colocation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
