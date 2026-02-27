@extends('layouts.app')

@section('content')

    <div class="min-h-[calc(100vh-72px)] bg-rose-50/40 flex items-center justify-center px-4 py-12">

        <div class="w-full max-w-md space-y-6">

            {{-- ── Logo / Titre ─────────────────────────────────────── --}}
            <div class="text-center">
                <div
                    class="w-14 h-14 rounded-2xl bg-gradient-to-br from-violet-500 to-pink-500
                        flex items-center justify-center shadow-lg shadow-violet-200 mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Bon retour !</h1>
                <p class="text-slate-400 text-sm mt-1">Connectez-vous à votre compte EasyColoc</p>
            </div>

            {{-- ── Card ─────────────────────────────────────────────── --}}
            <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">

                <div class="h-1 bg-gradient-to-r from-violet-400 to-pink-400"></div>

                <form method="POST" action="{{ route('login') }}" class="p-8 space-y-5">
                    @csrf

                    {{-- Session errors --}}
                    @if ($errors->any())
                        <div
                            class="flex items-center gap-2 bg-rose-50 border border-rose-200 text-rose-600
                                text-sm px-4 py-3 rounded-xl">
                            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                            Identifiants incorrects. Veuillez réessayer.
                        </div>
                    @endif

                    {{-- Email --}}
                    <div>
                        <label for="email"
                            class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                            Adresse e-mail
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            autocomplete="username" placeholder="prenom@exemple.com"
                            class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50
                                  text-slate-800 text-sm placeholder-slate-300
                                  focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400
                                  focus:bg-white transition" />
                        @if ($errors->get('email'))
                            @foreach ($errors->get('email') as $error)
                                <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>

                    {{-- Mot de passe --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password"
                                class="block text-xs font-semibold text-slate-500 uppercase tracking-widest">
                                Mot de passe
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-xs text-violet-500 hover:text-violet-700 font-medium transition">
                                    Mot de passe oublié ?
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50
                                  text-slate-800 text-sm placeholder-slate-300
                                  focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400
                                  focus:bg-white transition" />
                        @if ($errors->get('password'))
                            @foreach ($errors->get('password') as $error)
                                <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>

                    {{-- Se souvenir de moi --}}
                    <label for="remember_me" class="flex items-center gap-2.5 cursor-pointer">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-violet-300 text-violet-500
                                  focus:ring-violet-400 accent-violet-500" />
                        <span class="text-sm text-slate-500">Se souvenir de moi</span>
                    </label>

                    {{-- Submit --}}
                    <button type="submit"
                        class="w-full py-2.5 rounded-xl bg-gradient-to-r from-violet-500 to-pink-500
                               text-white text-sm font-semibold shadow-md shadow-violet-200
                               hover:from-violet-600 hover:to-pink-600 hover:shadow-violet-300
                               active:scale-[0.98] transition-all duration-200">
                        Se connecter
                    </button>

                </form>
            </div>

        </div>
    </div>

@endsection
