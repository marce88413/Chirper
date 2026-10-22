@props(['chirp'])

<article class="rounded-lg bg-white p-6 shadow">
    <div class="flex gap-3">
        <img
            src="https://avatars.laravel.cloud/{{ $chirp->user ? urlencode($chirp->user->email) : 'anonymous' }}"
            alt="Avatar de {{ $chirp->user ? $chirp->user->name : 'Anónimo' }}"
            class="h-10 w-10 shrink-0 rounded-full"
        >

        <div class="min-w-0 flex-1">
            <div class="flex flex-wrap items-start justify-between gap-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-sm font-semibold">
                        {{ $chirp->user ? $chirp->user->name : 'Anónimo' }}
                    </span>

                    <span class="text-gray-500">·</span>

                    <span class="text-sm text-gray-500">
                        {{ $chirp->created_at->diffForHumans() }}
                    </span>

                    @if ($chirp->updated_at->gt($chirp->created_at->copy()->addSeconds(5)))
                        <span class="text-gray-500">·</span>
                        <span class="text-sm italic text-gray-500">
                            editado
                        </span>
                    @endif
                </div>

                <div class="flex items-center gap-2">
                    <a
                        href="{{ url('/chirps/' . $chirp->id . '/edit') }}"
                        class="rounded px-2 py-1 text-sm text-blue-600 hover:bg-blue-50"
                    >
                        Editar
                    </a>

                    <form
                        method="POST"
                        action="{{ url('/chirps/' . $chirp->id) }}"
                        onsubmit="return confirm('¿Seguro que deseas eliminar esta publicación?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="rounded px-2 py-1 text-sm text-red-600 hover:bg-red-50"
                        >
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>

            <p class="mt-1 whitespace-pre-wrap break-words">{{ $chirp->message }}</p>
        </div>
    </div>
</article>