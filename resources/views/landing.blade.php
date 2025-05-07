<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center text-white">
    <div class="container max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg text-gray-800">
        <header class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Inventory Management</h1>
            <p class="text-lg text-gray-700 mb-6">Manage your inventory with ease. Log in or register to get started.</p>
        </header>

        <div class="flex justify-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/welcome') }}" class="px-6 py-2 bg-green-500 text-white font-semibold rounded hover:bg-green-600 transition">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition">
                        Login 2
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2 bg-purple-500 text-white font-semibold rounded hover:bg-purple-600 transition">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
