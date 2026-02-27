@extends('layouts.app')

@section('content')

{{-- @php
    $role = $colocation->users
        ->where('id', auth()->id())
        ->first()
        ?->pivot
        ?->role;
@endphp --}}

<div class="max-w-xl mx-auto px-4 py-12">

    {{-- Retour --}}
    <a href="{{ route('colocation.show', $colocation->id) }}"
       class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400
              hover:text-violet-500 transition mb-6">
        ← Retour à la colocation
    </a>

    <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">

        {{-- Header --}}
        <div class="h-1.5 bg-gradient-to-r from-violet-400 to-pink-400"></div>

        <div class="px-6 py-5 border-b border-slate-100">
            <h1 class="text-lg font-bold text-slate-800">
                Ajouter une catégorie
            </h1>
            <p class="text-xs text-slate-400 mt-1">
                Organisez vos dépenses par catégorie
            </p>
        </div>

        {{-- Form --}}
        <form action="{{ route('categories.store', $colocation->id) }}"
              method="POST"
              class="p-6 space-y-5">

            @csrf

            {{-- Nom catégorie --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-2">
                    Nom de la catégorie
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       placeholder="Ex: Nourriture"
                       class="w-full px-4 py-2.5 rounded-xl border border-violet-200
                              bg-violet-50/50 text-slate-800 text-sm
                              placeholder-slate-300
                              focus:outline-none focus:ring-2 focus:ring-violet-400
                              focus:border-violet-400 focus:bg-white transition">

                @error('name')
                    <p class="text-xs text-rose-500 mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Boutons --}}
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('colocation.show', $colocation->id) }}"
                   class="px-5 py-2.5 rounded-xl border border-slate-200
                          text-slate-500 text-xs font-medium
                          hover:bg-slate-100 transition">
                    Annuler
                </a>

                <button type="submit"
                        class="px-6 py-2.5 rounded-xl
                               bg-gradient-to-r from-violet-500 to-pink-500
                               text-white text-xs font-semibold
                               shadow-md shadow-violet-200
                               hover:from-violet-600 hover:to-pink-600
                               active:scale-95 transition-all duration-200">
                    Enregistrer
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
