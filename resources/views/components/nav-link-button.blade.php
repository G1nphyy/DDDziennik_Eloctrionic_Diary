<a {{$attributes}} class="text-xl py-2 font-consolas group relative select-none text-primary-a0/80 hover:text-primary-a0 transition-all duration-300">
    {{ $slot }}
    <span class="absolute left-1/2 bottom-0 w-0 h-0.5 bg-white/69 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
</a>
