@props(['events'])

<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 px-6">
        <h1 class="text-5xl font-extrabold dark:text-gray-200 text-dark-a0 mb-12 text-center">Events</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <a href="/events/{{ $event->id }}" class="group bg-gray-500 dark:bg-[#1E1E1E] shadow-md rounded-2xl overflow-hidden transition-transform transform hover:scale-105 hover:shadow-lg">
                    <div class="w-full h-64 bg-gray-50 dark:bg-[#292929]">
                        <img src="{{ $event->image_url ?? Vite::asset('resources/images/default-event.jpg') }}" alt="{{ $event->title }}" class="w-full h-full text-dark-a0 dark:text-primary-a0 object-cover opacity-90 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-100 group-hover:text-[#66C2FF] transition">{{ $event->title }}</h2>
                        <p class="text-gray-400 mt-2 text-sm">{{ Str::limit($event->description, 100) }}</p>
                        <span class="block mt-4 text-sm text-gray-500">{{ date_format(New DateTime($event['date']), 'M d, Y') }}</span>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-8 text-center">
            {{ $events->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
