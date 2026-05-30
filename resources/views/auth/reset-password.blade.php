@extends('layouts.auth')
@section('title', 'Réinitialiser le mot de passe')
@section('content')
<div class="bg-white rounded-lg shadow-lg p-8">
    <div class="text-center mb-8">
        <div class="bg-gradient-to-br from-green-600 to-green-800 w-16 h-16 rounded-lg flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-lock-open text-white text-2xl"></i>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Réinitialiser votre mot de passe</h1>
        <p class="text-gray-600 text-sm mt-2">Entrez votre nouvel mot de passe ci-dessous</p>
    </div>
    <form action="{{ route('password.store') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600 cursor-not-allowed" readonly>
            </div>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">Nouveau mot de passe</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                <input type="password" id="password" name="password" class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('password') border-red-500 @enderror" placeholder="Minimum 8 caractères" required>
                <button type="button" class="absolute right-3 top-3 text-gray-400" onclick="togglePassword('password')"><i class="fas fa-eye"></i></button>
            </div>
            @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirmer le mot de passe</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Confirmez votre nouveau mot de passe" required>
                <button type="button" class="absolute right-3 top-3 text-gray-400" onclick="togglePassword('password_confirmation')"><i class="fas fa-eye"></i></button>
            </div>
        </div>
        <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white font-medium py-2 rounded-lg hover:from-green-700 hover:to-green-800 transition">
            Réinitialiser le mot de passe
        </button>
    </form>
    <div class="my-6 flex items-center">
        <div class="flex-1 border-t border-gray-300"></div>
        <span class="px-4 text-gray-500 text-sm">ou</span>
        <div class="flex-1 border-t border-gray-300"></div>
    </div>
    <div class="space-y-2 text-center">
        <a href="{{ route('login') }}" class="block text-indigo-600 hover:text-indigo-700 font-medium">
            <i class="fas fa-arrow-left mr-1"></i> Retour à la connexion
        </a>
    </div>
    <div class="mt-8 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
        <p class="text-yellow-900 text-sm">
            <i class="fas fa-shield-alt mr-2"></i>
            <strong>Sécurité:</strong> N'oubliez pas de mémoriser votre nouveau mot de passe.
        </p>
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