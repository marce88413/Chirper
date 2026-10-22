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
<body class="min-h-screen bg-[#ededee] font-sans text-[#1a1a1c]">
    <nav class="border-b border-black/10 bg-[#f7f7f8]">
        <div class="flex min-h-[60px] w-full flex-wrap items-center justify-between gap-3 px-4 py-3">
            <a
                href="{{ route('home') }}"
                class="inline-flex items-center"
                aria-label="Chirper - Inicio"
            >
                <x-logo class="h-8 w-auto" />
            </a>

            <div class="flex flex-wrap items-center gap-4">
                @auth
                    <span class="text-sm">
                        Hola, {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="rounded-[5px] border border-black/10 bg-transparent px-3 py-1.5 text-sm hover:bg-black/5"
                        >
                            Cerrar sesión
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-[5px] border border-black/10 px-3 py-1.5 text-sm text-[#1a1a1c] hover:bg-black/5"
                    >
                        Sign In
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="rounded-[5px] bg-[#5580d2] px-3 py-1.5 text-sm font-semibold text-white hover:bg-[#4469b0]"
                    >
                        Sign Up
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

    <footer class="mt-24">
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