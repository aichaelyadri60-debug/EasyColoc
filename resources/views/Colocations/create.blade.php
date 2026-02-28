@extends('layouts.app')

@section('content')


<div class="max-w-xl mx-auto px-4 py-10">
    {{-- Messages --}}
<div class="space-y-4">

    {{-- Erreurs validation --}}
    @if ($errors->any())
        <div class="rounded-2xl border border-rose-200 bg-rose-50 p-5 shadow-sm">
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

    {{-- Success --}}
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

    {{-- Error --}}
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

    {{-- ── Titre ───────────────────────────────────────────────── --}}
    <div class="mb-6">
        <a href="{{ route('colocation.index') }}"
           class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400
                  hover:text-violet-500 transition mb-3">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
            </svg>
            Retour aux colocations
        </a>
        <p class="text-xs font-semibold tracking-widest text-violet-400 uppercase mb-1">Nouvelle</p>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Créer une colocation</h1>
        <p class="text-slate-400 text-sm mt-1">Renseignez les informations de votre nouvelle colocation</p>
    </div>

    {{-- ── Card formulaire ─────────────────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">

        <div class="h-1.5 bg-gradient-to-r from-violet-400 to-pink-400"></div>

        <form action="{{ route('colocation.store') }}" method="POST" class="p-8 space-y-5">
            @csrf

            {{-- Nom --}}
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                    Nom de la colocation
                </label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       placeholder="Ex : Appartement Montmartre"
                       class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50
                              text-slate-800 text-sm placeholder-slate-300
                              focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400
                              focus:bg-white transition"/>
                @error('name')
                    <p class="mt-1.5 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Adresse --}}
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                    Adresse
                </label>
                <input type="text" name="address" value="{{ old('address') }}" required
                       placeholder="Ex : 12 rue de la Paix, Paris"
                       class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50
                              text-slate-800 text-sm placeholder-slate-300
                              focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400
                              focus:bg-white transition"/>
                @error('address')
                    <p class="mt-1.5 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                    Description
                </label>
                <textarea name="description" rows="3" required
                          placeholder="Décrivez votre colocation..."
                          class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50
                                 text-slate-800 text-sm placeholder-slate-300 resize-none
                                 focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400
                                 focus:bg-white transition">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1.5 text-xs text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="flex items-center gap-2 px-6 py-2.5 rounded-xl
                               bg-gradient-to-r from-violet-500 to-pink-500 text-white text-sm font-semibold
                               shadow-md shadow-violet-200 hover:from-violet-600 hover:to-pink-600
                               hover:shadow-violet-300 active:scale-95 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    Créer la colocation
                </button>

                <a href="{{ route('colocation.index') }}"
                   class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-500 text-sm font-medium
                          hover:bg-slate-50 active:scale-95 transition-all duration-200">
                    Annuler
                </a>
            </div>
        </form>
    </div>

</div>

@endsection
