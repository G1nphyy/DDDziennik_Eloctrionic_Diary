@props(['users'])
<section class="w-full lg:w-2/3">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Users</h1>

    <!-- Users Grid -->
    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($users as $user)
            <li class="user-card bg-white dark:bg-gray-700 rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 p-5"
                data-user-token="{{ Crypt::encryptString($user->id) }}">
                <div class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $user->first_name }} {{ $user->last_name }}
                </div>
                <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Class: <span class="italic text-gray-700 dark:text-gray-300">{{$user->class_names }}</span>
                    @if($user->school_names)
                        <div class="text-sm text-gray-600 dark:text-gray-400">
                            Schools:
                            @foreach(explode(',', $user->school_names) as $schoolName)
                                <span
                                    class="inline-block bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-100 px-2 py-0.5 rounded-full text-xs mr-1 mt-2">
                                            {{ trim($schoolName) }}
                                        </span>
                            @endforeach
                        </div>
                    @else
                        <span class="italic">No schools assigned</span>
                    @endif
                </div>
            </li>
        @endforeach
        @if( $users->isEmpty() )
            <h2 class="text-xl text-gray-800 dark:text-gray-300 mb-6">No users found</h2>
        @endif
    </ul>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $users->links('pagination::tailwind') }}
    </div>
</section>
