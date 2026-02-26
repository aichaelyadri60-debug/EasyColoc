@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto px-4 py-10 space-y-6">

    {{-- ── Page Title ──────────────────────────────────────────── --}}
    <div class="mb-2">
        <p class="text-xs font-semibold tracking-widest text-violet-400 uppercase mb-1">Paramètres</p>
        <h1 class="text-3xl font-bold text-slate-800">Mon Profil</h1>
        <p class="text-slate-400 text-sm mt-1">Gérez vos informations personnelles et votre sécurité</p>
    </div>

    {{-- ── Avatar + Nom ─────────────────────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-violet-100 shadow-sm shadow-violet-50 p-6 flex items-center gap-5">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-violet-400 to-pink-400 flex items-center justify-center shadow-lg shadow-violet-200 flex-shrink-0">
            <span class="text-white text-2xl font-bold">
                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
            </span>
        </div>
        <div>
            <p class="text-lg font-semibold text-slate-800">{{ Auth::user()->name ?? 'Votre nom' }}</p>
            <p class="text-sm text-slate-400">{{ Auth::user()->email ?? 'votre@email.com' }}</p>
        </div>
        <span class="ml-auto text-xs font-medium text-violet-600 bg-violet-50 border border-violet-100 px-3 py-1.5 rounded-full">
            Membre actif
        </span>
    </div>

    {{-- ── Informations personnelles ────────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-violet-100 shadow-sm shadow-violet-50 overflow-hidden">
        {{-- Header de la section --}}
        <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-100">
            <div class="w-9 h-9 rounded-xl bg-violet-50 border border-violet-100 flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0"/>
                </svg>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-slate-700">Informations personnelles</h2>
                <p class="text-xs text-slate-400">Nom et adresse e-mail</p>
            </div>
        </div>



        <div class="p-6">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- ── Sécurité ─────────────────────────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-violet-100 shadow-sm shadow-violet-50 overflow-hidden">
        <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-100">
            <div class="w-9 h-9 rounded-xl bg-pink-50 border border-pink-100 flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-slate-700">Sécurité</h2>
                <p class="text-xs text-slate-400">Modifiez votre mot de passe</p>
            </div>
        </div>

        @if(session('status') === 'password-updated')
            <div class="mx-6 mt-5 flex items-center gap-2 text-sm text-emerald-700 bg-emerald-50 border border-emerald-100 rounded-xl px-4 py-3">
                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/>
                </svg>
                Mot de passe mis à jour avec succès.
            </div>
        @endif

        <div class="p-6">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- ── Zone dangereuse ──────────────────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-rose-200 shadow-sm overflow-hidden">
        <div class="flex items-center gap-3 px-6 py-5 border-b border-rose-100 bg-rose-50/50">
            <div class="w-9 h-9 rounded-xl bg-rose-100 border border-rose-200 flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-rose-600">Zone dangereuse</h2>
                <p class="text-xs text-rose-400">Ces actions sont irréversibles</p>
            </div>
        </div>

        <div class="p-6">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</div>

@endsection