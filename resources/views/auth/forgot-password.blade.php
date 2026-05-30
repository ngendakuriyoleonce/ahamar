@extends('layouts.auth')
@section('title', 'Mot de passe oublié')
@section('content')
<div class="bg-white rounded-lg shadow-lg p-8">
    <div class="text-center mb-8">
        <div class="bg-gradient-to-br from-orange-600 to-orange-800 w-16 h-16 rounded-lg flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-key text-white text-2xl"></i>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Mot de passe oublié?</h1>
        <p class="text-gray-600 text-sm mt-2">Pas de problème. Entrez votre email et nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>
    </div>
    @if (session('status'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <i class="fas fa-check-circle mr-2"></i>{{ session('status') }}
        </div>
    @endif
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-medium mb-2">Adresse Email</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 @error('email') border-red-500 @enderror" placeholder="vous@exemple.com" required autofocus>
            </div>
            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            <p class="text-gray-600 text-xs mt-2">Entrez l'adresse email associée à votre compte. Nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>
        </div>
        <button type="submit" class="w-full bg-gradient-to-r from-orange-600 to-orange-700 text-white font-medium py-2 rounded-lg hover:from-orange-700 hover:to-orange-800 transition">
            Envoyer le lien de réinitialisation
        </button>
    </form>
    <div class="my-6 flex items-center">
        <div class="flex-1 border-t border-gray-300"></div>
        <span class="px-4 text-gray-500 text-sm">ou</span>
        <div class="flex-1 border-t border-gray-300"></div>
    </div>
    <div class="flex items-center justify-center space-x-2">
        <i class="fas fa-arrow-left text-gray-400"></i>
        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">Retour à la connexion</a>
    </div>
    <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
        <p class="text-blue-900 text-sm">
            <i class="fas fa-info-circle mr-2"></i>
            <strong>Conseil:</strong> Vérifiez votre dossier spam si vous ne recevez pas l'email.
        </p>
    </div>
</div>
@endsection