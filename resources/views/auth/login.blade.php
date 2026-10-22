<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Chirper</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <main class="mx-auto max-w-md px-6 py-12">
        <a href="{{ url('/') }}" class="text-blue-600 hover:underline">
            ← Volver a las publicaciones
        </a>

        <div class="mt-6 rounded-lg bg-white p-6 shadow">
            <h1 class="mb-6 text-center text-3xl font-bold">
                Iniciar sesión
            </h1>

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="mb-2 block font-semibold">
                        Correo electrónico
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="username"
                        required
                        autofocus
                        class="w-full rounded-lg border border-gray-300 p-3"
                    >

                    @error('email')
                        <p role="alert" class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
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
                        autocomplete="current-password"
                        required
                        class="w-full rounded-lg border border-gray-300 p-3"
                    >

                    @error('password')
                        <p role="alert" class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <label class="mb-6 flex items-center gap-2">
                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                        @checked(old('remember'))
                        class="h-4 w-4"
                    >

                    <span class="text-sm">Recordarme</span>
                </label>

                <button
                    type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold text-white hover:bg-blue-700"
                >
                    Iniciar sesión
                </button>
            </form>

            <p class="mt-6 text-center text-sm">
                ¿No tienes una cuenta?

                <a
                    href="{{ route('register') }}"
                    class="text-blue-600 hover:underline"
                >
                    Registrarse
                </a>
            </p>
        </div>
    </main>
</body>
</html>