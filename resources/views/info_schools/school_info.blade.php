<x-app-layout>
    <div class="max-w-4xl mt-10 mx-auto py-12 px-6 bg-gray-200 dark:bg-tonal-a20 rounded-lg shadow-lg">
        <div class="flex flex-col sm:flex-row items-center space-y-6 sm:space-y-0 sm:space-x-8">
            <img src="{{ Vite::asset('resources/images/building_of_school.jpg') }}" alt="{{ $school->name }} Logo" class="w-32 h-32 rounded-lg shadow-md object-cover">
            <div class="text-center sm:text-left">
                <h1 class="text-3xl font-bold font-consolas text-dark-a0 dark:text-light-a0">{{ $school->name }}</h1>
                <p class="text-tonal-a40 dark:text-tonal-a50 mt-2">{{ $school->address }}</p>
            </div>
        </div>

        <div class="mt-6 space-y-4">
            <div class="flex items-center space-x-3">
                <span class="text-tonal-a50 dark:text-tonal-a40">📧</span>
                <a href="mailto:{{ $school->email }}" class="dark:text-primary-a0 text-dark-a0 hover:underline">{{ $school->email }}</a>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-tonal-a50 dark:text-tonal-a40">📞</span>
                <a href="tel:{{ $school->phone }}" class="dark:text-primary-a0 text-dark-a0 hover:underline">{{ $school->phone }}</a>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-tonal-a50 dark:text-tonal-a40">🌐</span>
                <a href="{{ $school->website }}" target="_blank" class="dark:text-primary-a0 text-dark-a0 hover:underline">{{ $school->website }}</a>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ url()->previous() }}" class="inline-block px-6 py-3 bg-tonal-a50 dark:bg-tonal-a40 text-light-a0 rounded-lg shadow-md hover:bg-tonal-a40 dark:hover:bg-tonal-a50 transition">
                ← Back to Schools
            </a>
        </div>
    </div>
</x-app-layout>
