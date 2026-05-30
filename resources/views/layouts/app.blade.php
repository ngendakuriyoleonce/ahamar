<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - AHAMAR Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <aside class="w-64 bg-gradient-to-b from-indigo-700 to-indigo-900 text-white">
            <div class="p-6 border-b border-indigo-600">
                <h1 class="text-2xl font-bold">AHAMAR</h1>
                <p class="text-indigo-200 text-sm">Gestion des Congés</p>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-600 transition">
                    <i class="fas fa-home mr-3"></i> Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-600 transition">
                    <i class="fas fa-calendar-alt mr-3"></i> Congés
                </a>
                <a href="#" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-600 transition">
                    <i class="fas fa-users mr-3"></i> Employés
                </a>
                <a href="#" class="flex items-center px-4 py-2 rounded-lg hover:bg-indigo-600 transition">
                    <i class="fas fa-cog mr-3"></i> Paramètres
                </a>
            </nav>
        </aside>
        <div class="flex-1 flex flex-col">
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">@yield('header')</h2>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                    </div>
                    <div class="relative group">
                        <button class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-100">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Avatar" class="w-8 h-8 rounded-full">
                            <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition hidden group-hover:block z-10">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Profil</a>
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 rounded-b-lg">Déconnexion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex-1 overflow-auto p-6">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>