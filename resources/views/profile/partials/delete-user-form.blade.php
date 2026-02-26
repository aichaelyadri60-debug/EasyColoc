<section>
    <p class="text-sm text-slate-500 leading-relaxed">
        {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez télécharger toute donnée que vous souhaitez conserver avant de supprimer votre compte.') }}
    </p>

    {{-- Bouton déclencheur --}}
    <div class="mt-5">
        <button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-5 py-2.5 rounded-xl bg-rose-500 text-white text-sm font-semibold
                   shadow-md shadow-rose-200 hover:bg-rose-600 hover:shadow-rose-300
                   active:scale-95 transition-all duration-200 flex items-center gap-2"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
            </svg>
            {{ __('Supprimer le compte') }}
        </button>
    </div>

    {{-- Modal de confirmation --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-7">

            {{-- Icône d'alerte --}}
            <div class="flex justify-center mb-5">
                <div class="w-14 h-14 rounded-2xl bg-rose-100 border border-rose-200 flex items-center justify-center">
                    <svg class="w-7 h-7 text-rose-500" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                    </svg>
                </div>
            </div>

            <h2 class="text-center text-lg font-bold text-slate-800 mb-2">
                {{ __('Supprimer votre compte ?') }}
            </h2>
            <p class="text-center text-sm text-slate-500 mb-6 leading-relaxed">
                {{ __('Cette action est irréversible. Toutes vos données seront définitivement supprimées. Confirmez avec votre mot de passe.') }}
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-5">
                @csrf
                @method('delete')

                {{-- Champ mot de passe --}}
                <div>
                    <label for="modal_password"
                           class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">
                        {{ __('Mot de passe') }}
                    </label>
                    <input
                        id="modal_password"
                        name="password"
                        type="password"
                        placeholder="••••••••"
                        class="w-full px-4 py-2.5 rounded-xl border border-rose-200 bg-rose-50/50 text-slate-800 text-sm placeholder-slate-400
                               focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 focus:bg-white transition"
                    />
                    @if($errors->userDeletion->get('password'))
                        @foreach($errors->userDeletion->get('password') as $error)
                            <p class="mt-1.5 text-xs text-rose-500">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>

                {{-- Boutons --}}
                <div class="flex justify-end gap-3 pt-1">
                    <button
                        type="button"
                        x-on:click="$dispatch('close')"
                        class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-sm font-medium
                               hover:bg-slate-50 active:scale-95 transition-all duration-200"
                    >
                        {{ __('Annuler') }}
                    </button>

                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-xl bg-rose-500 text-white text-sm font-semibold
                               shadow-md shadow-rose-200 hover:bg-rose-600 hover:shadow-rose-300
                               active:scale-95 transition-all duration-200 flex items-center gap-2"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                        {{ __('Supprimer définitivement') }}
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</section>