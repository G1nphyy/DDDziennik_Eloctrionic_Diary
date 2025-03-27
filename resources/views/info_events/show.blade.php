<x-app-layout>
    <div class="max-w-2xl mx-auto bg-gray-300 dark:bg-white/8 text-white p-8 border-2 border-white/30 rounded-lg shadow-xl mt-12">
        <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">{{ $event["title"] }}</h2>
        <p class="text-lg  text-gray-900/90 dark:text-gray-300 mb-4">{{ $event["description"] }}</p>
        <div class="flex items-center space-x-2 dark:text-gray-400 text-gray-900">
            <span class="text-sm">📅 {{ date_format(new DateTime($event['date']), 'F d, Y H:i') }}</span>
        </div>
        <div class="mt-6">
            <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 dark:bg-white/30 dark:hover:bg-white/40 text-white rounded-lg transition">
                ← Back
            </a>
        </div>
    </div>
</x-app-layout>
