<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('code') - @yield('message')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gray-100 text-gray-900">
    <div class="text-center">
        <h1 class="text-9xl font-extrabold text-red-600">@yield('code')</h1>
        <p class="text-2xl font-semibold mt-4">@yield('message')</p>
        <p class="text-gray-500 mt-2">@yield('description')</p>
        <div class="mt-6">
            <a href="{{ route('home') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Retour à l’accueil
            </a>
        </div>
    </div>
</body>
</html>