@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto px-4 py-10">

    {{-- Retour --}}
    <a href="{{ route('categories.show', [
        'colocation' => $colocation,
        'category' => $category
    ]) }}"
       class="text-xs text-slate-400 hover:text-violet-500 transition">
        ← Retour à la catégorie
    </a>

    <div class="mt-6 bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">

        {{-- Header --}}
        <div class="h-1.5 bg-gradient-to-r from-violet-400 to-pink-400"></div>

        <div class="p-6">
            <h1 class="text-lg font-bold text-slate-800">
                Ajouter une dépense
            </h1>

            <p class="text-xs text-slate-400 mt-1">
                Catégorie : <span class="font-semibold text-violet-600">
                    {{ $category->name }}
                </span>
            </p>
        </div>

        {{-- Formulaire --}}
        <form method="POST"
              action="{{ route('depenses.store', [
                  'colocation' => $colocation,
                  'category' => $category
              ]) }}"
              class="px-6 pb-6 space-y-5">

            @csrf

            {{-- Titre --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">
                    Titre
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       class="w-full rounded-xl border-slate-200 focus:border-violet-400 focus:ring-violet-400 text-sm"
                       required>

                @error('title')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Montant --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">
                    Montant (€)
                </label>
                <input type="number"
                       step="0.01"
                       name="montant"
                       value="{{ old('montant') }}"
                       class="w-full rounded-xl border-slate-200 focus:border-violet-400 focus:ring-violet-400 text-sm"
                       required>

                @error('montant')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">
                    Description (optionnel)
                </label>
                <textarea name="description"
                          rows="3"
                          class="w-full rounded-xl border-slate-200 focus:border-violet-400 focus:ring-violet-400 text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="pt-2">
                <button type="submit"
                        class="w-full px-4 py-2 rounded-xl
                               bg-gradient-to-r from-violet-500 to-pink-500
                               text-white text-sm font-semibold
                               shadow-md shadow-violet-200
                               hover:from-violet-600 hover:to-pink-600
                               active:scale-95 transition-all duration-200">
                    Enregistrer la dépense
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
