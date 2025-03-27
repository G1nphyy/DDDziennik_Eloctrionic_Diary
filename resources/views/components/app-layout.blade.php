@props([ 'pt' => '25', 'js' => '' ])
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DDDziennik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/app-layout/nav.js', $js])
</head>
<body class="bg-white text-white dark:bg-tonal-a10 dark:text-white min-w-full min-h-dvh">
<div class="fixed w-full h-dvh nav-content hidden z-200">
    <div class="w-0 h-full bg-gray-800 dark:bg-tonal-a10 absolute transition-all duration-300 pt-20 overflow-hidden">
        <div class="w-xs">
            <div class="flex items-center justify-center w-10 h-10 absolute top-0 right-0 mt-5 mr-5">
                <div class="flex flex-row gap-2 items-center justify-center w-10 h-10 group cursor-pointer" id="close-menu">
                    <div class="group-hover:bg-white/30 dark:group-hover:bg-black/30 group-hover:px-7 group-hover:py-7 rounded-full transition-all duration-300 absolute group-hover:w-10 group-hover:h-10 h-0 w-0"></div>
                    <img src="{{ Vite::asset('resources/images/menu_close.svg') }}" alt="x" class="h-full select-none">
                </div>
            </div>
            <div class="flex flex-col items-start justify-center gap-10 px-10 py-10">
                <x-button href="/events">Events</x-button>
                @auth
                    <x-button href="/events"></x-button>
                @endauth
            </div>
        </div>
    </div>
    <div class="w-full h-full bg-black/50"></div>
</div>
<div id="nav-main_block" class="w-full h-25 flex items-center justify-center button bg-gray-800 dark:bg-tonal-a0  drop-shadow-xl fixed transition-all duration-300 border-b-2 border-transparent z-100">
    <div class="flex items-center justify-center w-1/7 h-full">
        <div class="flex flex-row gap-2 items-center justify-center text-2xl px-4 py-3 h-15 group select-none">
            <div class="group-hover:bg-white/30 dark:group-hover:bg-black/30 group-hover:px-4 group-hover:py-3 rounded-full transition-all duration-300 absolute group-hover:w-15 group-hover:h-15 h-0 w-0"></div>
            <img class="h-full z-3" src="{{ Vite::asset('resources/images/menu_burger_icon.svg') }}" alt="☰">
        </div>
    </div>
    <nav class="flex items-center justify-center space-x-4 w-6/7 h-full gap-10">
        <x-nav-link-button href="/blog">Blog</x-nav-link-button>
        <x-nav-link-button href="/schools">Schools</x-nav-link-button>
        <a href="/" class="text-3xl font-bold select-none text-white">DDDziennik</a>
        <x-nav-link-button href="/contact">Contact</x-nav-link-button>
        <x-nav-link-button href="/about">About</x-nav-link-button>
    </nav>
    <div class="flex items-center justify-center w-1/7 h-full">
        <div class="w-10 h-10 relative user-profile-picture select-none">
            <img src="{{ Vite::asset('resources/images/default_icon.png') }}" alt="Profile Picture" class="w-10 h-10 rounded-full hover:contrast-more:30">
            <div class="w-10 h-10 mt-2 hidden">
                <div class="rounded-xl h-max bg-gray-900 dark:bg-tonal-a10 absolute w-80 right-0 flex flex-col items-start px-5 py-2 shadow-2xl border-2 border-gray-300/50 dark:border-white/30">
                    @guest
                        <x-button href="/login">Log In</x-button>
                        <x-button href="/register">Sign Up</x-button>
                    @endguest
                    @auth
                        <x-button href="/logout">Log Out</x-button>
                    @endauth
                    <x-button href="/settings">Settings</x-button>
                </div>
            </div>
        </div>
    </div>
</div>
<x-news-letter-pop-up></x-news-letter-pop-up>
<main class="pt-{{$pt}} min-h-dvh bg-white dark:bg-tonal-a5 ">
    {{ $slot }}
</main>
<footer class="{{ request()->url() == url('/') ? 'bg-gray-100 dark:bg-gray-900' : 'bg-white dark:bg-tonal-a0' }} text-gray-900 dark:text-white py-12 border-gray-300 dark:border-white/30 border-t-3">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12">
        <div class="space-y-4">
            <h3 class="text-2xl font-bold">Author</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Developed by Borys Kędziora, a passionate student and web developer. All rights reserved.</p>
        </div>
        <div class="space-y-4">
            <h3 class="text-2xl font-bold">School</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Zespół Szkół Komunikacji im. Hipolita Cegielskiego w Poznaniu</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Fredry 13,</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">61-701 Poznań</p>
        </div>
        <div class="space-y-4">
            <h3 class="text-2xl font-bold">Follow Us</h3>
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/borys.kedziora.5/?locale=pl_PL" class="text-gray-500 hover:text-blue-500 transition-colors duration-300">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="https://x.com/Kobuco_off" class="text-gray-500 hover:text-blue-500 transition-colors duration-300">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
                <a href="https://www.linkedin.com/in/ginphy-k%C4%99dziora-92b4a8318/" class="text-gray-500 hover:text-blue-500 transition-colors duration-300">
                    <i class="fab fa-linkedin-in"></i> LinkedIn
                </a>
            </div>
        </div>
        <div class="space-y-4">
            <h3 class="text-2xl font-bold">Contact</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Email: <a href="mailto:borys.kedziora@uczen.zsk.poznan.pl" class="text-gray-600 hover:text-blue-400">borys.kedziora@uczen.zsk.poznan.pl</a></p>
        </div>
    </div>
    <div class="mt-12 border-t border-gray-400 dark:border-gray-700 pt-6 text-center">
        <p class="text-sm text-gray-500 dark:text-gray-400">© <span id="date_footer"></span> DDDziennik. All rights reserved.</p>
    </div>
    <script>
        document.getElementById("date_footer").innerHTML = new Date().getFullYear();
    </script>
</footer>
</body>
</html>
