<x-auth img="abstract-login-form-bg.png" type="login">
    <div class="flex flex-col items-center space-y-4">
        <img src="{{ Vite::asset('resources/images/default_icon.png')}}" alt="logo" class="w-40 rounded-full">
        <p class="font-consolas dark:text-primary-a0 text-lg">Log in to your account</p>
    </div>
    <form action="/login" method="post" class="font-consolas flex flex-col items-center mt-8 space-y-4 w-full dark:text-primary-a0">
        @csrf
        <input value="{{old('email')}}" type="email" name="email" id="email" class="border-2 border-tonal-a0/20 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2" placeholder="Enter your email">
        @error('email')
        {{$message}}
        @enderror
        <div class="w-full flex items-center gap-2" id="password-container">
            <input type="password" name="password" id="password" class="border-2 border-tonal-a0/20 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2" placeholder="Enter your password">
            <div class="flex items-center justify-center w-10 h-full">
                <img src="{{ Vite::asset('resources/images/from_visibility_off.svg')}}" alt="eye" class="w-6 h-6 cursor-pointer bg-gray-900 dark:bg-transparent">
            </div>
        </div>
        @error('password')
        {{$message}}
        @enderror
        <input type="submit" value="Log In" class="border-2 border-tonal-a0/20 dark:border-primary-a0/20 rounded-lg shadow-lg w-full p-2">
    </form>
    <div class="flex flex-col items-center space-y-4 mt-5">
        <p class="font-consolas dark:text-primary-a0 text-sm">You don't have an account? <a href="/register" class="text-blue-400">Sign Up</a></p>
    </div>
</x-auth>
