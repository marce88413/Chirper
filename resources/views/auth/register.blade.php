<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta - Chirper</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <main class="mx-auto max-w-md px-6 py-12">
        <a href="{{ url('/') }}" class="text-blue-600 hover:underline">
            ← Volver a las publicaciones
        </a>

        <div class="mt-6 rounded-lg bg-white p-6 shadow">
            <h1 class="mb-6 text-center text-3xl font-bold">
                Crear cuenta
            </h1>

            <form method="POST" action="{{ url('/register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="mb-2 block font-semibold">
                        Nombre
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        maxlength="255"
                        required
                        class="w-full rounded-lg border border-gray-300 p-3"
                    >

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="mb-2 block font-semibold">
                        Correo electrónico
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        maxlength="255"
                        required
                        class="w-full rounded-lg border border-gray-300 p-3"
                    >

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="mb-2 block font-semibold">
                        Contraseña
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        minlength="8"
                        required
                        class="w-full rounded-lg border border-gray-300 p-3"
                    >

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="password_confirmation"
                        class="mb-2 block font-semibold"
                    >
                        Confirmar contraseña
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        autocomplete="new-password"
                        minlength="8"
                        required
                        class="w-full rounded-lg border border-gray-300 p-3"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold text-white hover:bg-blue-700"
                >
                    Registrarse
                </button>
            </form>
        </div>
    </main>
</body>
</html>