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
        <h1 class="text-3xl font-bold">Chirper</h1>

        <p class="mt-2">This is your brand new Laravel app. Time to make it sing (or chirp)!</p>

        @forelse ($chirps as $chirp)
            <article class="mt-6 rounded-lg bg-white p-6 shadow">
                <div class="font-semibold">
                    {{ $chirp->user ? $chirp->user->name : 'Anónimo' }}
                </div>

                <p class="mt-1">
                    {{ $chirp->message }}
                </p>

                <p class="mt-2 text-sm text-gray-500">
                    {{ $chirp->created_at->diffForHumans() }}
                </p>
            </article>
        @empty
            <p class="mt-6 text-gray-500">
                Aún no hay publicaciones. ¡Sé el primero en publicar!
            </p>
        @endforelse
    </main>
</body>
</html>