<x-app-layout>
    <div class="max-w-7xl mx-auto py-8">
        <div class="flex flex-row items-center justify-between ">
            <h1 class="text-3xl font-semibold text-dark-a0 dark:text-light-a0 mb-6">Schools List</h1>

            <form method="GET" action="/schools"
                  class="flex flex-col sm:flex-row items-center justify-between mb-6 space-y-4 sm:space-y-0 sm:space-x-6">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="w-70 p-4 border-2 dark:border-white/20 border-black/20 dark:text-white text-black rounded-lg focus:outline-none focus:border-gray-800 dark:focus:border-gray-300 transition-all duration-100"
                       placeholder="Search Schools">
                <button type="submit"
                        class="w-25 p-4 dark:bg-white/20 bg-dark-a0/20 text-dark-a0 hover:bg-gray-700 hover:text-white dark:text-white rounded-lg transition-all duration-100">
                    Search
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($schools as $school)
                <a href="/schools/{{$school->id}}"
                   class="bg-light-a0 dark:bg-tonal-a20 {{ $school->logo_path ? '' : 'p-6' }} rounded-lg shadow-lg flex flex-col items-center relative overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-200">
                    @if($school->logo_path)
                        <div class="w-full h-full flex items-center justify-center">
                            <img src="{{ Vite::asset('resources/images/building_of_school.jpg') }}"
                                 alt="{{ $school->name }} Logo" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-tonal-a0 to-transparent"></div>
                        </div>
                        <h2 class="text-xl font-semibold text-light-a0 absolute bottom-3 text-center px-5 ">{{ $school->name }}</h2>
                    @else
                        <div class="w-full h-full flex items-center justify-center flex-col">
                            <div class="h-full mb-4 mt-6">
                                <div class="w-28 h-28 bg-tonal-a40 rounded-full flex items-center justify-center">
                                    <span
                                        class="text-light-a0 text-lg font-semibold">{{ strtoupper(substr($school->name, 0, 1)) }}</span>
                                </div>
                            </div>
                            <h2 class="text-xl font-semibold text-center text-dark-a0 dark:text-light-a0 mt-7 mb-10 px-5 text-pretty">{{ $school->name }}</h2>
                        </div>
                    @endif
                </a>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8">
        {{ $schools->appends(request()->query())->links() }}
    </div>
</x-app-layout>
