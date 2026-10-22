<x-layout title="Latest Chirps">
    <main class="mx-auto w-full max-w-[704px] px-4 pt-[60px]">
        <h1 class="text-3xl font-normal">
            Latest Chirps
        </h1>

        <div class="mt-8 rounded-[10px] border border-black/10 bg-[#f7f7f8] p-[14px]">
            <form method="POST" action="{{ url('/chirps') }}">
                @csrf

                <label for="message" class="sr-only">
                    What's on your mind?
                </label>

                <textarea
                    id="message"
                    name="message"
                    placeholder="What's on your mind?"
                    class="block h-[104px] w-full resize-none rounded-lg border bg-white px-3 py-2.5 text-sm placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:ring-blue-500/25 @error('message') border-red-500 @else border-black/10 @enderror"
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
                        class="h-8 rounded-[5px] bg-[#5580d2] px-3 text-sm font-semibold text-white hover:bg-[#4469b0]"
                    >
                        Chirp
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-8 space-y-4">
            @forelse ($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <div class="py-12 text-center">
                    <p class="text-sm text-gray-500">
                        No chirps yet. Be the first to chirp!
                    </p>
                </div>
            @endforelse
        </div>
    </main>
</x-layout>