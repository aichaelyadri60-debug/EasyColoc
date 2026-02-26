@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto px-4 py-10 space-y-6">

    {{-- ── Titre + bouton créer ─────────────────────────────────── --}}
    <div class="flex items-center justify-between">
        <div>
            <p class="text-xs font-semibold tracking-widest text-violet-400 uppercase mb-1">Espace</p>
            <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Mes colocations</h1>
            <p class="text-slate-400 text-sm mt-1">Gérez et suivez toutes vos colocations</p>
        </div>

        <a href="{{ route('colocation.create') }}"
           class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-violet-500 to-pink-500
                  text-white text-sm font-semibold shadow-md shadow-violet-200
                  hover:from-violet-600 hover:to-pink-600 hover:shadow-violet-300
                  active:scale-95 transition-all duration-200 whitespace-nowrap">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            Nouvelle colocation
        </a>
    </div>

    {{-- ── Liste ────────────────────────────────────────────────── --}}
    @forelse($colocations as $coloc)

        <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden
                    hover:shadow-md hover:border-violet-200 transition-all duration-200">

            <div class="p-6 flex items-center gap-4">

                {{-- Icône / Avatar colocation --}}
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-400 to-pink-400
                            flex items-center justify-center shadow-md shadow-violet-200 flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                </div>

                {{-- Infos --}}
                <div class="flex-1 min-w-0">
                    <h2 class="text-base font-semibold text-slate-800 truncate">{{ $coloc->name }}</h2>
                    <div class="mt-1">
                        @if($coloc->is_active)
                            <span class="inline-flex items-center gap-1 text-xs font-medium text-emerald-700
                                         bg-emerald-50 border border-emerald-100 px-2.5 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block"></span>
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-500
                                         bg-slate-100 border border-slate-200 px-2.5 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400 inline-block"></span>
                                Inactive
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-2 flex-shrink-0">

                    {{-- Détail --}}
                    <a href="{{ route('colocation.show', $coloc->id) }}"
                       class="flex items-center gap-1.5 px-4 py-2 rounded-xl border border-violet-200
                              text-violet-600 text-sm font-medium bg-violet-50
                              hover:bg-violet-100 hover:border-violet-300 active:scale-95
                              transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Détail
                    </a>

                    {{-- Annuler --}}
                    <form action="{{ route('annulercolocation', $coloc->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                onclick="return confirm('Annuler cette colocation ?')"
                                class="flex items-center gap-1.5 px-4 py-2 rounded-xl border border-rose-200
                                       text-rose-500 text-sm font-medium bg-rose-50
                                       hover:bg-rose-100 hover:border-rose-300 active:scale-95
                                       transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Annuler
                        </button>
                    </form>

                </div>
            </div>

        </div>

    @empty

        {{-- État vide --}}
        <div class="bg-white rounded-2xl border border-violet-100 shadow-sm p-12 text-center">
            <div class="w-16 h-16 rounded-2xl bg-violet-50 border border-violet-100
                        flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-violet-300" fill="none" stroke="currentColor"
                     stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                </svg>
            </div>
            <p class="text-slate-600 font-medium">Aucune colocation trouvée</p>
            <p class="text-slate-400 text-sm mt-1">Commencez par créer votre première colocation</p>
            <a href="{{ route('colocation.create') }}"
               class="inline-flex items-center gap-2 mt-5 px-6 py-2.5 rounded-xl
                      bg-gradient-to-r from-violet-500 to-pink-500 text-white text-sm font-semibold
                      shadow-md shadow-violet-200 hover:from-violet-600 hover:to-pink-600
                      active:scale-95 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Créer une colocation
            </a>
        </div>

    @endforelse

</div>

@endsection