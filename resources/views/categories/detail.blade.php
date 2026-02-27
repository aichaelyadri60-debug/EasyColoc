@extends('layouts.app')

@section('content')


<div class="max-w-3xl mx-auto px-4 py-10 space-y-6">

    {{-- Retour --}}
    <a href="{{ route('colocation.show', $colocation->id) }}"
       class="text-xs text-slate-400 hover:text-violet-500 transition">
        ← Retour à la colocation
    </a>

    {{-- Header catégorie --}}
    <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">

        <div class="h-1.5 bg-gradient-to-r from-violet-400 to-pink-400"></div>

        <div class="p-6 flex items-center justify-between">

            <div>
                <h1 class="text-xl font-bold text-slate-800">
                    {{ $categorie->name }}
                </h1>
                <p class="text-xs text-slate-400 mt-1">
                    Total dépenses :
                    {{-- <span class="font-semibold text-violet-600">
                        {{ number_format($total, 2) }} €
                    </span> --}}
                </p>
            </div>

            {{-- Bouton ajouter dépense (owner uniquement) --}}

                <a href=""
                   class="px-4 py-2 rounded-xl bg-gradient-to-r from-violet-500 to-pink-500
                          text-white text-xs font-semibold shadow-md shadow-violet-200
                          hover:from-violet-600 hover:to-pink-600
                          active:scale-95 transition-all duration-200">
                    + Ajouter dépense
                </a>


        </div>
    </div>

    {{-- Liste des dépenses --}}
    <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">
            <h2 class="text-sm font-semibold text-slate-700">
                Dépenses
            </h2>
        </div>

        {{-- @forelse($depenses as $depense)

            <div class="flex items-center justify-between px-6 py-4
                        border-b border-slate-50 last:border-0
                        hover:bg-violet-50/30 transition">

                <div>
                    <p class="text-sm font-semibold text-slate-800">
                        {{ $depense->title }}
                    </p>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Ajouté par {{ $depense->user->name }}
                        • {{ $depense->created_at->format('d M Y') }}
                    </p>
                </div>

                <div class="text-sm font-bold text-rose-500">
                    - {{ number_format($depense->amount, 2) }} €
                </div>

            </div>

        @empty --}}

            <div class="px-6 py-10 text-center">
                <p class="text-slate-400 text-sm">
                    Aucune dépense pour cette catégorie.
                </p>
            </div>



    </div>

</div>

@endsection
