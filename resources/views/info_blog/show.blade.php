<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-6">
        <h1 class="text-4xl font-bold text-dark-a0 dark:text-light-a0">{{ $post->title }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $post->created_at->format('F j, Y') }}</p>

        @if($post->image_url)
            <div class="mt-6">
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full rounded-lg shadow-md">
            </div>
        @endif

        <div class="mt-6 text-lg text-dark-a0 dark:text-light-a0 leading-relaxed">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="mt-8">
            <a href="{{ url()->previous() }}" class="inline-block px-6 py-3 bg-tonal-a50 dark:bg-tonal-a40 text-light-a0 rounded-lg shadow-md hover:bg-tonal-a40 dark:hover:bg-tonal-a50 transition">
                ← Back
            </a>
        </div>
    </div>
</x-app-layout>
