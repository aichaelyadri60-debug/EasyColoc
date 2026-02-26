<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div>
            <label for="name" class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                {{ __('Nom') }}
            </label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required autofocus autocomplete="name"
                class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50 text-slate-800 text-sm placeholder-slate-400
                       focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400 focus:bg-white transition"
            />
            @if($errors->get('name'))
                @foreach($errors->get('name') as $error)
                    <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                @endforeach
            @endif
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                {{ __('Adresse e-mail') }}
            </label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required autocomplete="username"
                class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50 text-slate-800 text-sm placeholder-slate-400
                       focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400 focus:bg-white transition"
            />
            @if($errors->get('email'))
                @foreach($errors->get('email') as $error)
                    <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                @endforeach
            @endif

            {{-- Email non vérifié --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 rounded-xl bg-amber-50 border border-amber-200">
                    <p class="text-xs text-amber-700">
                        {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}
                        <button form="send-verification"
                                class="underline font-medium hover:text-amber-900 transition">
                            {{ __('Renvoyer l\'e-mail de vérification.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-1.5 text-xs font-medium text-emerald-600">
                            {{ __('Un nouveau lien de vérification a été envoyé.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-4 pt-2">
            <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-violet-500 to-pink-500 text-white text-sm font-semibold
                           shadow-md shadow-violet-200 hover:from-violet-600 hover:to-pink-600 hover:shadow-violet-300
                           active:scale-95 transition-all duration-200">
                {{ __('Enregistrer') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="flex items-center gap-1.5 text-xs font-medium text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full"
                >
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/>
                    </svg>
                    {{ __('Sauvegardé !') }}
                </p>
            @endif
        </div>
    </form>
</section>