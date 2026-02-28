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

<div class="max-w-6xl mx-auto px-4 py-10 space-y-6">

    {{-- ── Retour ───────────────────────────────────────────────── --}}
    <a href="{{ route('colocation.index') }}"
       class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400
              hover:text-violet-500 transition">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
        </svg>
        Retour aux colocations
    </a>

    {{-- ── Header colocation ───────────────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">
        <div class="h-1.5 bg-gradient-to-r from-violet-400 to-pink-400"></div>
        <div class="p-6 flex items-center gap-5">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-violet-400 to-pink-400
                        flex items-center justify-center shadow-lg shadow-violet-200 flex-shrink-0">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <h1 class="text-xl font-bold text-slate-800 truncate">{{ $colocation->name }}</h1>
                <div class="flex items-center gap-2 mt-1.5 flex-wrap">
                    @if($colocation->is_active)
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
                    <span class="flex items-center gap-1 text-xs text-slate-400">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                        </svg>
                        {{ $colocation->adress }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    @php
        $role = $colocation->users
            ->where('id', auth()->id())
            ->first()
            ?->pivot
            ?->role;
    @endphp


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">


        <div class="space-y-4">

            {{-- Inviter --}}
            <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">
                <div class="flex items-center gap-3 px-5 py-4 border-b border-slate-100">
                    <div class="w-9 h-9 rounded-xl bg-violet-50 border border-violet-100
                                flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold text-slate-700">Inviter un membre</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Ajoutez un colocataire par e-mail</p>
                    </div>
                </div>
                <form action="{{ route('addMembre', $colocation->id) }}" method="POST"
                      class="p-5 flex gap-2">
                    @csrf
                    <input type="email" name="email" required
                           placeholder="prenom@exemple.com"
                           class="flex-1 min-w-0 px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50
                                  text-slate-800 text-sm placeholder-slate-300
                                  focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400
                                  focus:bg-white transition"/>
                    <button type="submit"
                            class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl
                                   bg-gradient-to-r from-violet-500 to-pink-500 text-white text-sm font-semibold
                                   shadow-md shadow-violet-200 hover:from-violet-600 hover:to-pink-600
                                   active:scale-95 transition-all duration-200 whitespace-nowrap flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                        </svg>
                        Inviter
                    </button>
                </form>
            </div>

            {{-- Liste membres --}}
            <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">
                <div class="flex items-center gap-3 px-5 py-4 border-b border-slate-100">
                    <div class="w-9 h-9 rounded-xl bg-pink-50 border border-pink-100
                                flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold text-slate-700">Membres</h2>
                        <p class="text-xs text-slate-400 mt-0.5">{{ count($users) }} colocataire(s)</p>
                    </div>
                </div>

                @forelse($users as $user)
                    <div class="flex items-center gap-3 px-5 py-4 border-b border-slate-50 last:border-0
                                hover:bg-violet-50/30 transition">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-violet-300 to-pink-300
                                    flex items-center justify-center flex-shrink-0 shadow-sm">
                            <span class="text-white text-sm font-bold">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-slate-800 truncate">{{ $user->name }}</p>
                            <div class="flex items-center gap-2 mt-0.5 flex-wrap">
                                <span class="flex items-center gap-1 text-xs text-slate-400">
                                    <svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    {{ $user->Reputation }}
                                </span>
                                @if($user->is_banned)
                                    <span class="text-xs font-medium text-rose-600 bg-rose-50 border border-rose-100 px-2 py-0.5 rounded-full">Banni</span>
                                @else
                                    <span class="text-xs font-medium text-emerald-600 bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded-full">Actif</span>
                                @endif
                            </div>
                        </div>
                        <form action="" method="POST" class="flex-shrink-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Retirer ce membre ?')"
                                    class="flex items-center gap-1 px-3 py-1.5 rounded-xl border border-rose-200
                                           text-rose-500 text-xs font-medium bg-rose-50
                                           hover:bg-rose-100 hover:border-rose-300 active:scale-95 transition-all duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Retirer
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="px-5 py-10 text-center">
                        <p class="text-slate-400 text-sm">Aucun membre pour l'instant.</p>
                        <p class="text-slate-300 text-xs mt-1">Invitez votre premier colocataire.</p>
                    </div>
                @endforelse
            </div>

        </div>{{-- fin colonne gauche --}}

        {{--Catégories    --}}
        <div>
            <div class="bg-white rounded-2xl border border-violet-100 shadow-sm overflow-hidden">

                <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-amber-50 border border-amber-100
                                    flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-sm font-semibold text-slate-700">Catégories</h2>
                            <p class="text-xs text-slate-400 mt-0.5">{{ count($categories) }} catégorie(s)</p>
                        </div>
                    </div>

                    @if($role === 'owner')
                        <a href="{{ route('categories.create', $colocation->id) }}"
                           class="flex items-center gap-1.5 px-4 py-2 rounded-xl
                                  bg-gradient-to-r from-violet-500 to-pink-500
                                  text-white text-xs font-semibold shadow-md shadow-violet-200
                                  hover:from-violet-600 hover:to-pink-600 active:scale-95 transition-all duration-200">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            Ajouter
                        </a>
                    @endif
                </div>

                @forelse($categories as $category)
                    <div class="flex items-center justify-between px-5 py-4 border-b border-slate-50
                                last:border-0 hover:bg-amber-50/20 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-50 border border-amber-100
                                        flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-slate-800">{{ $category->name }}</p>
                        </div>

                        @if($role === 'owner')
                            <div class="flex items-center gap-2">
                         <a href="{{ route('categories.show', [$colocation->id, $category->id]) }}"
                                   class="px-3 py-1.5 rounded-lg border border-violet-200
                                          text-violet-600 text-xs font-medium bg-violet-50
                                          hover:bg-violet-100 hover:border-violet-300 transition">
                                    Detail
                                </a>
                                <a href="{{ route('categories.edit', [$colocation->id, $category->id]) }}"
                                   class="px-3 py-1.5 rounded-lg border border-amber-200
                                          text-amber-600 text-xs font-medium bg-amber-50
                                          hover:bg-amber-100 hover:border-amber-300 transition">
                                    Modifier
                                </a>
                                <form action="{{ route('categories.destroy', [$colocation->id, $category->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Supprimer cette catégorie ?')"
                                            class="px-3 py-1.5 rounded-lg border border-rose-200
                                                   text-rose-500 text-xs font-medium bg-rose-50
                                                   hover:bg-rose-100 hover:border-rose-300 transition">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        @else
                         <a href="{{ route('categories.show', [$colocation->id, $category->id]) }}"
                                   class="px-3 py-1.5 rounded-lg border border-violet-200
                                          text-violet-600 text-xs font-medium bg-violet-50
                                          hover:bg-violet-100 hover:border-violet-300 transition">
                                    Detail
                                </a>
                        @endif
                    </div>

                @empty
                    <div class="px-5 py-12 text-center">
                        <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-100
                                    flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-amber-300" fill="none" stroke="currentColor"
                                 stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z"/>
                            </svg>
                        </div>
                        <p class="text-slate-400 text-sm">Aucune catégorie pour l'instant.</p>
                        @if($role === 'owner')
                            <p class="text-slate-300 text-xs mt-1">Cliquez sur "Ajouter" pour commencer.</p>
                        @endif
                    </div>
                @endforelse

            </div>
        </div>

    </div>

</div>

{{-- <script>
    setTimeout(() => {
        document.querySelectorAll('.btn').forEach(el => {
            el.style.transition = "opacity 0.5s";
            el.style.opacity = "0";
        });
    }, 4000);
</script> --}}

@endsection
