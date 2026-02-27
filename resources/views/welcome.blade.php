@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-violet-50 via-white to-pink-50">

    <!-- HERO SECTION -->
    <div class="max-w-6xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">

        <!-- Texte -->
        <div class="flex-1">
            <h1 class="text-5xl font-extrabold text-slate-800 leading-tight">
                Gérez vos <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-500 to-pink-500">colocations</span> simplement
            </h1>

            <p class="mt-6 text-lg text-slate-500">
                EasyColoc vous aide à organiser vos membres, suivre les dépenses 
                et gérer votre colocation efficacement.
            </p>

            <div class="mt-8 flex gap-4">

                @guest
                    <a href="{{ route('register') }}"
                       class="px-6 py-3 rounded-xl bg-gradient-to-r from-violet-500 to-pink-500 
                              text-white font-semibold shadow-lg shadow-violet-200
                              hover:from-violet-600 hover:to-pink-600 
                              active:scale-95 transition-all duration-200">
                        Commencer maintenant
                    </a>

                    <a href="{{ route('login') }}"
                       class="px-6 py-3 rounded-xl border border-slate-300 text-slate-700 
                              hover:bg-slate-100 active:scale-95 transition-all duration-200">
                        Se connecter
                    </a>
                @else
                    <a href="{{ route('colocation.index') }}"
                       class="px-6 py-3 rounded-xl bg-gradient-to-r from-violet-500 to-pink-500 
                              text-white font-semibold shadow-lg shadow-violet-200
                              hover:from-violet-600 hover:to-pink-600 
                              active:scale-95 transition-all duration-200">
                        Aller au Dashboard
                    </a>
                @endguest

            </div>
        </div>

        <!-- Illustration -->
        <div class="flex-1">
            <div class="w-full h-80 bg-gradient-to-br from-violet-400 to-pink-400 
                        rounded-3xl shadow-2xl shadow-violet-200 flex items-center justify-center">

                <svg class="w-32 h-32 text-white opacity-90" fill="none" stroke="currentColor"
                     stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 9.75L12 4.5l9 5.25M4.5 10.5v9A1.5 1.5 0 006 21h3.75v-6.75a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21H18a1.5 1.5 0 001.5-1.5v-9"/>
                </svg>

            </div>
        </div>

    </div>


    <!-- FEATURES SECTION -->
    <div class="max-w-6xl mx-auto px-6 py-20">

        <h2 class="text-3xl font-bold text-center text-slate-800 mb-12">
            Pourquoi choisir EasyColoc ?
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-violet-100 hover:shadow-md transition">
                <h3 class="text-xl font-semibold mb-4 text-violet-600">Gestion des membres</h3>
                <p class="text-slate-500">
                    Invitez, supprimez et gérez les membres facilement.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-violet-100 hover:shadow-md transition">
                <h3 class="text-xl font-semibold mb-4 text-violet-600">Organisation claire</h3>
                <p class="text-slate-500">
                    Visualisez toutes vos colocations en un seul endroit.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-violet-100 hover:shadow-md transition">
                <h3 class="text-xl font-semibold mb-4 text-violet-600">Simple & rapide</h3>
                <p class="text-slate-500">
                    Interface moderne et intuitive pour gagner du temps.
                </p>
            </div>

        </div>

    </div>


    <!-- CTA FINAL -->
    @guest
    <div class="py-20 text-center bg-gradient-to-r from-violet-500 to-pink-500">

        <h2 class="text-3xl font-bold text-white mb-6">
            Prêt à commencer ?
        </h2>

        <a href="{{ route('register') }}"
           class="px-8 py-3 rounded-xl bg-white text-violet-600 font-semibold 
                  shadow-md hover:scale-105 transition">
            Créer un compte gratuitement
        </a>

    </div>
    @endguest

</div>

@endsection