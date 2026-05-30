@extends('layouts.auth')
@section('title', 'Connexion')
@section('content')
<div class="bg-white rounded-lg shadow-lg p-8">
    <div class="text-center mb-8">
        <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 w-16 h-16 rounded-lg flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-building text-white text-2xl"></i>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">AHAMAR</h1>
        <p class="text-gray-600 text-sm">Gestion des Congés</p>
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror" placeholder="vous@exemple.com" required>
            </div>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                <input type="password" id="password" name="password" class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password') border-red-500 @enderror" placeholder="Entrez votre mot de passe" required>
                <button type="button" class="absolute right-3 top-3 text-gray-400" onclick="togglePassword('password')"><i class="fas fa-eye"></i></button>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 flex items-center">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300 text-indigo-600">
            <label for="remember" class="ml-2 text-gray-700">Se souvenir de moi</label>
        </div>
        <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-medium py-2 rounded-lg hover:from-indigo-700 hover:to-indigo-800 transition">
            Se connecter
        </button>
    </form>
    <div class="my-6 flex items-center">
        <div class="flex-1 border-t border-gray-300"></div>
        <span class="px-4 text-gray-500 text-sm">ou</span>
        <div class="flex-1 border-t border-gray-300"></div>
    </div>
    <div class="space-y-3">
        <a href="{{ route('password.request') }}" class="block text-center text-indigo-600 hover:text-indigo-700 font-medium">Mot de passe oublié?</a>
        <p class="text-center text-gray-600">Pas encore de compte? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">S'inscrire</a></p>
    </div>
</div>
@push('scripts')
<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const button = event.target.closest('button');
    const icon = button.querySelector('i');
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endpush
@endsection