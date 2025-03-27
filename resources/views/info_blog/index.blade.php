<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 px-6">
        <h1 class="text-5xl font-extrabold text-dark-a0 dark:text-light-a0 mb-12 text-center">Blog</h1>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 grid-flow-dense">
            @foreach($posts as $post)
                @if(($loop->iteration - 1) % 3 == 0)
                    <a href="/blog/{{ $post->id }}" class="group bg-light-a0 dark:bg-tonal-a20 shadow-xl transition-all duration-300 hover:shadow-2xl sm:col-span-2 rounded-xl overflow-hidden">
                        <div class="w-full h-96 bg-tonal-a30 dark:bg-tonal-a40 overflow-hidden">
                            <img src="{{ $post->image_url ?? Vite::asset('resources/images/default-blog.jpg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                        </div>
                        <div class="p-6 bg-light-a0 dark:bg-tonal-a20 text-dark-a0 dark:text-light-a0">
                            <h2 class="text-2xl font-semibold mt-4 group-hover:text-primary transition-all duration-300">{{ $post->title }}</h2>
                            <p class="text-tonal-a60 dark:text-tonal-a40 mt-2 text-sm">{{ Str::limit($post->content, 120) }}</p>
                            <span class="mt-4 block text-sm text-tonal-a50 dark:text-tonal-a50">{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </a>
                @else
                    <a href="/blog/{{ $post->id }}" class="group bg-light-a0 dark:bg-tonal-a20 shadow-xl transition-all duration-300 hover:shadow-2xl rounded-xl overflow-hidden">
                        <div class="w-full h-64 bg-tonal-a30 dark:bg-tonal-a40 overflow-hidden">
                            <img src="{{ $post->image_url ?? Vite::asset('resources/images/default-blog.jpg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                        </div>
                        <div class="p-6 bg-light-a0 dark:bg-tonal-a20 text-dark-a0 dark:text-light-a0">
                            <h2 class="text-xl font-semibold mt-4 group-hover:text-primary transition-all duration-300">{{ $post->title }}</h2>
                            <p class="text-tonal-a60 dark:text-tonal-a40 mt-2 text-sm">{{ Str::limit($post->content, 100) }}</p>
                            <span class="mt-4 block text-sm text-tonal-a50 dark:text-tonal-a50">{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>

        <div class="mt-8 text-center">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
