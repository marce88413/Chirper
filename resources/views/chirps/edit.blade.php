<x-layout title="Editar publicación">
    <main class="max-w-2xl mx-auto p-6">
        <h1 class="mt-8 text-3xl font-bold">
            Editar publicación
        </h1>

        <div class="mt-8 rounded-lg bg-white p-6 shadow">
            <form method="POST" action="{{ url('/chirps/' . $chirp->id) }}">
                @csrf
                @method('PUT')

                <label for="message" class="mb-2 block font-semibold">
                    Mensaje
                </label>

                <textarea
                    id="message"
                    name="message"
                    class="w-full resize-none rounded-lg border p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('message') border-red-500 @else border-gray-300 @enderror"
                    rows="4"
                    maxlength="255"
                    required
                >{{ old('message', $chirp->message) }}</textarea>

                @error('message')
                    <p role="alert" class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mt-4 flex items-center justify-between">
                    <a
                        href="{{ route('home') }}"
                        class="rounded-lg px-4 py-2 text-gray-600 hover:bg-gray-100"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700"
                    >
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-layout>