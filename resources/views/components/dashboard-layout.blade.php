<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-200">

<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md dark:bg-gray-800 dark:text-white flex flex-col p-5 space-y-4 rounded-ee-lg">
        <h2 class="text-2xl font-bold">Dashboard</h2>
        <nav class="space-y-2">
            <x-dashboard-button href="/dashboard">Home</x-dashboard-button>
            <x-dashboard-button href="/dashboard/grades">Grades</x-dashboard-button>
            <x-dashboard-button href="/dashboard/attendance">Attendance</x-dashboard-button>
            <x-dashboard-button href="/dashboard/schedule">Schedule</x-dashboard-button>
            <x-dashboard-button href="/dashboard/testsHomeworks">Tests & homeworks</x-dashboard-button>
            <x-dashboard-button href="/dashboard/school">School</x-dashboard-button>
            <x-dashboard-button href="/dashboard/meetings">Meetings</x-dashboard-button>
            <x-dashboard-button href="/dashboard/textbooks">Textbooks</x-dashboard-button>
            <x-dashboard-button href="/settings">Settings</x-dashboard-button>
            <x-dashboard-button href="/logout">Logout</x-dashboard-button>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <header class="bg-white dark:bg-gray-800 shadow-md p-4 flex justify-between items-center border-b border-gray-200 dark:border-gray-700 relative">
            <div class="absolute bottom-0 left-0 translate-y-98/100 w-6 h-6 bg-white dark:bg-gray-800 overflow-hidden">
                <div class="absolute bottom-0 left-0 w-6 h-6 rounded-tl-2xl bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700"></div>
            </div>


            <h1 class="text-xl font-semibold">Welcome {{ Auth::user()->first_name}} {{Auth::user()->last_name}}!</h1>

            <div class="flex space-x-4">
                <!-- Theme Toggle Button -->
                <button id="theme-toggle" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                    🌞 / 🌙
                </button>

                <!-- Profile Button -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 dark:bg-blue-500 dark:hover:bg-blue-600">
                    Profile
                </button>
            </div>
        </header>

        <!-- Content Area -->
        <main class="flex-1 p-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

</body>
</html>
