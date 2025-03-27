<x-auth img="abstract-signup-form-bg.png" type="signup">
    <div class="flex flex-col items-center space-y-4">
        <img src="{{ Vite::asset('resources/images/default_icon.png')}}" alt="logo" class="w-40 rounded-full">
        <p class="font-consolas dark:tdark:ext-primary-a0 text-lg">Create your account</p>
    </div>

    <div class="flex w-full gap-2 mt-4">
        <div id="line1" class="w-1/2 h-2 rounded-full bg-violet-600 cursor-pointer"></div>
        <div id="line2" class="w-1/2 h-2 rounded-full bg-tonal-a40/50 cursor-pointer" >
            <div id="linein2" class="w-0 h-2 rounded-full bg-violet-600 transition-all duration-500 " ></div>
        </div>
    </div>
    <form action="/register" method="post" class="font-consolas flex flex-col items-center mt-2 w-full dark:tdark:ext-primary-a0">
        @csrf
        <div class="font-consolas flex flex-col items-center mt-8 space-y-4 w-full dark:text-primary-a0" id="card1">
            <input type="text" name="first_name" id="first_name" class="border-2 border-tonal-a0/40 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2" placeholder="Enter your First Name">
            @error('first_name')
            {{$message}}
            @enderror
            <input type="text" name="last_name" id="last_name" class="border-2 border-tonal-a0/40 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2" placeholder="Enter your Last Name">
            @error('last_name')
            {{$message}}
            @enderror
            <button class="border-2 border-tonal-a0/40 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2" id="nextButton">Next</button>
        </div>

        <div class="font-consolas flex flex-col items-center mt-8 space-y-4 w-full dark:text-primary-a0 hidden" id="card2">
            <input type="email" name="email" id="email" class="border-2 border-tonal-a0/40 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2" placeholder="Enter your email" >
            @error('email')
            {{$message}}
            @enderror
            <div class="w-full flex items-center gap-2" id="password-container">
                <input type="password" name="password" id="password" class="border-2 border-tonal-a0/40 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2" placeholder="Enter your password">
                <div class="flex items-center justify-center w-10 h-full">
                    <img src="{{ Vite::asset('resources/images/from_visibility_off.svg')}}" alt="eye" class="w-6 h-6 cursor-pointer">
                </div>
            </div>
            @error('password')
            {{$message}}
            @enderror
            <input type="password" name="password_confirmation" id="password_confirmation" class="border-2 border-tonal-a0/40 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2" placeholder="Re-enter your password" >
            @error('password_confirmation')
            {{$message}}
            @enderror
            <input type="submit" value="Sign Up" class="border-2 border-tonal-a0/40 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2">
        </div>
    </form>
    <div class="flex flex-col items-center mt-5">
        <p class="font-consolas dark:text-primary-a0 text-sm">Already have an account? <a href="/login" class="dark:text-primary-a0 text-violet-400">Log In</a></p>
    </div>
</x-auth>
