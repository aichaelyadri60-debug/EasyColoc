<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        {{-- Mot de passe actuel --}}
        <div>
            <label for="update_password_current_password"
                   class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                {{ __('Mot de passe actuel') }}
            </label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50 text-slate-800 text-sm placeholder-slate-400
                       focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400 focus:bg-white transition"
                placeholder="••••••••"
            />
            @if($errors->updatePassword->get('current_password'))
                @foreach($errors->updatePassword->get('current_password') as $error)
                    <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                @endforeach
            @endif
        </div>

        {{-- Nouveau mot de passe --}}
        <div>
            <label for="update_password_password"
                   class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                {{ __('Nouveau mot de passe') }}
            </label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50 text-slate-800 text-sm placeholder-slate-400
                       focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400 focus:bg-white transition"
                placeholder="••••••••"
            />
            @if($errors->updatePassword->get('password'))
                @foreach($errors->updatePassword->get('password') as $error)
                    <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                @endforeach
            @endif
        </div>

        {{-- Confirmation --}}
        <div>
            <label for="update_password_password_confirmation"
                   class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                {{ __('Confirmer le mot de passe') }}
            </label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="w-full px-4 py-2.5 rounded-xl border border-violet-200 bg-violet-50/50 text-slate-800 text-sm placeholder-slate-400
                       focus:outline-none focus:ring-2 focus:ring-violet-400 focus:border-violet-400 focus:bg-white transition"
                placeholder="••••••••"
            />
            @if($errors->updatePassword->get('password_confirmation'))
                @foreach($errors->updatePassword->get('password_confirmation') as $error)
                    <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                @endforeach
            @endif
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-4 pt-2">
            <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-violet-500 to-pink-500 text-white text-sm font-semibold
                           shadow-md shadow-violet-200 hover:from-violet-600 hover:to-pink-600 hover:shadow-violet-300
                           active:scale-95 transition-all duration-200">
                {{ __('Mettre à jour') }}
            </button>

            @if (session('status') === 'password-updated')
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