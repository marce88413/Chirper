@props(['title' => 'Chirper'])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }} · Chirper</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fade-out {
            to {
                opacity: 0;
                visibility: hidden;
            }
        }

        .success-toast {
            animation: fade-out 0.5s ease 4s forwards;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-white shadow">
        <div class="mx-auto flex max-w-2xl flex-wrap items-center justify-between gap-4 p-6">
            <a href="{{ route('home') }}" class="inline-flex items-center">
                <x-logo />
            </a>

            <div class="flex flex-wrap items-center gap-3">
                @auth
                    <span class="text-sm">
                        Hola, {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="rounded-lg border border-gray-300 px-4 py-2 text-sm hover:bg-gray-100"
                        >
                            Cerrar sesión
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-lg px-4 py-2 text-sm text-blue-600 hover:bg-blue-50"
                    >
                        Iniciar sesión
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700"
                    >
                        Registrarse
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    @if (session('success'))
        <div
            role="status"
            class="success-toast fixed top-4 left-1/2 z-50 w-11/12 max-w-md -translate-x-1/2 rounded-lg bg-green-100 p-4 text-center text-green-800 shadow"
        >
            {{ session('success') }}
        </div>
    @endif

    {{ $slot }}

    <footer class="mt-24 border-t border-gray-300 bg-gray-100">
        <div class="mx-auto max-w-2xl px-6 py-8 text-center">
            <p class="text-sm text-gray-500">
                Chirper · Creado con Laravel
            </p>

            <a
                href="https://laravel.com"
                target="_blank"
                rel="noopener noreferrer"
                class="mt-4 inline-block text-5xl font-semibold tracking-tight text-gray-300 hover:text-gray-500"
            >
                Laravel
            </a>
        </div>
    </footer>
</body>
</html>