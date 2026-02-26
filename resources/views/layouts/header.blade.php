<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-violet-100">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="/" class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-violet-500 to-pink-500 flex items-center justify-center shadow-md shadow-violet-200">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
            </div>
            <span class="text-xl font-bold bg-gradient-to-r from-violet-600 to-pink-500 bg-clip-text text-transparent tracking-tight">
                EasyColoc
            </span>
        </a>

        {{-- Nav Links --}}
        <div class="flex items-center gap-2">
            @auth

                <a href="{{ url('/dashboard') }}"
                   class="flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-violet-600 px-4 py-2 rounded-xl hover:bg-violet-50 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-violet-600 px-4 py-2 rounded-xl hover:bg-violet-50 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                    Profil
                </a>

                <div class="w-px h-5 bg-slate-200 mx-1"></div>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                            class="flex items-center gap-1.5 text-sm font-medium text-slate-500 hover:text-rose-500 px-4 py-2 rounded-xl hover:bg-rose-50 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                        </svg>
                        Déconnexion
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}"
                   class="text-sm font-medium text-slate-600 hover:text-violet-600 px-4 py-2 rounded-xl hover:bg-violet-50 transition-all duration-200">
                    Connexion
                </a>

                <a href="{{ route('register') }}"
                   class="text-sm font-semibold text-white bg-gradient-to-r from-violet-500 to-pink-500 hover:from-violet-600 hover:to-pink-600 px-5 py-2 rounded-xl shadow-md shadow-violet-200 hover:shadow-violet-300 transition-all duration-200">
                    S'inscrire
                </a>

            @endauth
        </div>

    </div>
</nav>