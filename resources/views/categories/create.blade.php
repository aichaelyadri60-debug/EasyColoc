@extends('layouts.app')

@section('content')

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
