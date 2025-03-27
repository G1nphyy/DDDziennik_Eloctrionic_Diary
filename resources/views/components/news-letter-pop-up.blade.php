@if ( session('newsletter_success'))
    <div id="newsletter_success" class="bg-blue-600 text-white p-8 rounded-xl shadow-xl max-w-md mx-auto mt-10 fixed top-0 left-4 z-200 opacity-100 transform -translate-x-full transition-all duration-700 ease-out">
        <h1 class="text-3xl font-bold mb-5">Subscription Successful!</h1>
        <p class="text-lg font-light">{{session('newsletter_success')}}</p>
        <div id="path_newsletter" class="w-full bg-blue-800 h-3 rounded-xl mt-5 transition-all duration-5000 ease-linear"></div>
    </div>
    <script>
        window.onload = function() {
            const successMessage = document.getElementById('newsletter_success');
            successMessage.classList.remove('-translate-x-full');
            successMessage.classList.add('translate-x-0');

            const path = document.getElementById('path_newsletter');
            path.classList.remove('w-full');
            path.classList.add('w-0');

            setTimeout(() => {
                successMessage.classList.add('opacity-0');
                successMessage.classList.remove('translate-x-0');
                successMessage.classList.add('-translate-x-full');
                setTimeout(() => {
                    successMessage.remove();
                }, 500);
            }, 5000);
        };
    </script>
@endif
@error('email')
<div id="newsletter_error" class="bg-red-600 text-white p-8 rounded-xl shadow-xl max-w-md mx-auto mt-10 fixed top-0 left-4 z-200 opacity-100 transform -translate-x-full transition-all duration-700 ease-out">
    <h1 class="text-3xl font-bold mb-5">Subscription Error!</h1>
    <p class="text-lg font-light">{{ $message }}</p>
    <div id="path_newsletter" class="w-full bg-red-800 h-3 rounded-xl mt-5 transition-all duration-5000 ease-linear"></div>
</div>
<script>
    window.onload = function() {
        const successMessage = document.getElementById('newsletter_error');
        successMessage.classList.remove('-translate-x-full');
        successMessage.classList.add('translate-x-0');

        const path = document.getElementById('path_newsletter');
        path.classList.remove('w-full');
        path.classList.add('w-0');

        setTimeout(() => {
            successMessage.classList.add('opacity-0');
            successMessage.classList.remove('translate-x-0');
            successMessage.classList.add('-translate-x-full');
            setTimeout(() => {
                successMessage.remove();
            }, 500);
        }, 5000);
    };
</script>
@enderror
