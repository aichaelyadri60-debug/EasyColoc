@extends('layouts.app')

@section('content')
    @php

        $total = $depenses->sum('montant');
    @endphp

    <div class="max-w-3xl mx-auto px-4 py-10 space-y-6">
<div class="btn space-y-4">

    @if ($errors->any())
        <div class="btn rounded-2xl border border-rose-200 bg-rose-50 p-5 shadow-sm">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 flex items-center justify-center rounded-full bg-rose-100">
                    ❌
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-rose-700 mb-2">
                        Des erreurs sont survenues :
                    </h3>
                    <ul class="text-sm text-rose-600 space-y-1 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif


    @if (session('success'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 flex items-center justify-center rounded-full bg-emerald-100">
                    ✅
                </div>
                <p class="text-sm font-semibold text-emerald-700">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    @endif


    @if (session('error'))
        <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 flex items-center justify-center rounded-full bg-amber-100">
                    ⚠️
                </div>
                <p class="text-sm font-semibold text-amber-700">
                    {{ session('error') }}
                </p>
            </div>
        </div>
    @endif

</div>

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
                        {{ $category->name }}
                    </h1>
                    <p class="text-xs text-slate-400 mt-1">
                        Total dépenses :
                        <span class="font-semibold text-violet-600">
                            {{ number_format($total, 2) }} €
                        </span>
                    </p>
                </div>

                {{-- Bouton ajouter dépense (owner uniquement) --}}
                <a
                    href="{{ route('depenses.create', [
                        'category' => $category->id,
                        'colocation' => $colocation->id
                    ]) }}"
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

            @forelse($depenses as $depense)
                <div
                    class="flex items-center justify-between px-6 py-4
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
                         {{ number_format($depense->montant, 2) }} €
                    </div>

                </div>


            @empty
                <div class="px-6 py-10 text-center">
                    <p class="text-slate-400 text-sm">
                        Aucune dépense pour cette catégorie.
                    </p>
                </div>
            @endforelse

        </div>

    </div>
@endsection
