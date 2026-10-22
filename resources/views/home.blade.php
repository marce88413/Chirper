<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chirper</title>
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
    @if (session('success'))
        <div
            role="status"
            class="success-toast fixed top-4 left-1/2 z-50 w-11/12 max-w-md -translate-x-1/2 rounded-lg bg-green-100 p-4 text-center text-green-800 shadow"
        >
            {{ session('success') }}
        </div>
    @endif

    <main class="max-w-2xl mx-auto p-6">
        <h1 class="mt-8 text-3xl font-bold">
            Últimas publicaciones
        </h1>

        <div class="mt-8 rounded-lg bg-white p-6 shadow">
            <form method="POST" action="{{ url('/chirps') }}">
                @csrf

                <label for="message" class="mb-2 block font-semibold">
                    ¿Qué estás pensando?
                </label>

                <textarea
                    id="message"
                    name="message"
                    placeholder="Escribe tu publicación..."
                    class="w-full resize-none rounded-lg border p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('message') border-red-500 @else border-gray-300 @enderror"
                    rows="4"
                    maxlength="255"
                    required
                >{{ old('message') }}</textarea>

                @error('message')
                    <p role="alert" class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mt-4 flex justify-end">
                    <button
                        type="submit"
                        class="rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700"
                    >
                        Publicar
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-8 space-y-4">
            @forelse ($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <div class="py-12 text-center">
                    <p class="text-gray-500">
                        Aún no hay publicaciones. ¡Sé el primero en publicar!
                    </p>
                </div>
            @endforelse
        </div>
    </main>
</body>
</html>