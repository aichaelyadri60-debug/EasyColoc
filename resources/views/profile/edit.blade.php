@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-4xl space-y-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-800">
                Mon Profil
            </h1>
            <p class="text-gray-500 mt-2">
                Gérez vos informations personnelles et sécurité
            </p>
        </div>

        <div class="bg-white/70 backdrop-blur-md shadow-xl rounded-2xl p-8 border border-gray-200">
            <h2 class="text-xl font-semibold mb-6 text-gray-700">
                Informations personnelles
            </h2>

            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="bg-white/70 backdrop-blur-md shadow-xl rounded-2xl p-8 border border-gray-200">
            <h2 class="text-xl font-semibold mb-6 text-gray-700">
                Sécurité
            </h2>

            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-red-50 shadow-xl rounded-2xl p-8 border border-red-200">
            <h2 class="text-xl font-semibold mb-6 text-red-600">
                Zone dangereuse
            </h2>

            @include('profile.partials.delete-user-form')
        </div>

    </div>

</div>

@endsection