<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chirper</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <main class="max-w-2xl mx-auto p-6">
        <h1 class="mt-8 text-3xl font-bold">
            Últimas publicaciones
        </h1>

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