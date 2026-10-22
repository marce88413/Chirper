@props(['chirp'])

<article class="rounded-lg bg-white p-6 shadow">
    <div class="flex gap-3">
        <img
            src="https://avatars.laravel.cloud/{{ $chirp->user ? urlencode($chirp->user->email) : 'anonymous' }}"
            alt="Avatar de {{ $chirp->user ? $chirp->user->name : 'Anónimo' }}"
            class="h-10 w-10 shrink-0 rounded-full"
        >

        <div class="min-w-0">
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-sm font-semibold">
                    {{ $chirp->user ? $chirp->user->name : 'Anónimo' }}
                </span>

                <span class="text-gray-500">·</span>

                <span class="text-sm text-gray-500">
                    {{ $chirp->created_at->diffForHumans() }}
                </span>
            </div>

            <p class="mt-1 whitespace-pre-wrap break-words">{{ $chirp->message }}</p>
        </div>
    </div>
</article>