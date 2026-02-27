@extends('layouts.app')

@section('content')

    <div class="min-h-[calc(100vh-72px)] bg-rose-50/40 flex items-center justify-center px-4 py-12">

        <div class="w-full max-w-md space-y-6">

            {{-- ── Logo / Titre ─────────────────────────────────────── --}}
            <div class="text-center">
                <div
                    class="w-14 h-14 rounded-2xl bg-gradient-to-br from-violet-500 to-pink-500
                        flex items-center justify-center shadow-lg shadow-violet-200 mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Créer un compte</h1>
                <p class="text-slate-400 text-sm mt-1">Rejoignez EasyColoc dès maintenant</p>
            </div>

            {{-- ── Card ─────────────────────────────────────────────── --}}
            <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">

                <div class="h-1 bg-gradient-to-r from-violet-400 to-pink-400"></div>

                <form method="POST" action="{{ route('register') }}" class="p-8 space-y-5">
                    @csrf

                    {{-- Nom --}}
                    <div>
                        <label for="name"
                            class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                            Nom complet
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            autocomplete="name" placeholder="Jean Dupont"
                            class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50
                                  text-slate-800 text-sm placeholder-slate-300
                                  focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400
                                  focus:bg-white transition" />
                        @if ($errors->get('name'))
                            @foreach ($errors->get('name') as $error)
                                <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email"
                            class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                            Adresse e-mail
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
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
                        <label for="password"
                            class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                            Mot de passe
                        </label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
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

                    {{-- Confirmation mot de passe --}}
                    <div>
                        <label for="password_confirmation"
                            class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                            Confirmer le mot de passe
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password" placeholder="••••••••"
                            class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50
                                  text-slate-800 text-sm placeholder-slate-300
                                  focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400
                                  focus:bg-white transition" />
                        @if ($errors->get('password_confirmation'))
                            @foreach ($errors->get('password_confirmation') as $error)
                                <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                        class="w-full py-2.5 rounded-xl bg-gradient-to-r from-violet-500 to-pink-500
                               text-white text-sm font-semibold shadow-md shadow-violet-200
                               hover:from-violet-600 hover:to-pink-600 hover:shadow-violet-300
                               active:scale-[0.98] transition-all duration-200 mt-2">
                        Créer mon compte
                    </button>

                </form>
            </div>


        </div>
    </div>

@endsection
