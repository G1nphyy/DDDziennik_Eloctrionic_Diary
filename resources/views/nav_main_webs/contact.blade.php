<x-app-layout>
    <div class="min-w-vw pb-10 box-border">
        <div class="max-w-2xl mx-auto p-8 dark:bg-tonal-a10 bg-gray-200 dark:border-0 border-2 border-zinc-600/30 shadow-lg rounded-lg mt-10">
            <h1 class="text-4xl font-extrabold mb-6 dark:text-primary-a0 text-dark-a0">Contact Us</h1>
            <p class="mb-6 dark:text-tonal-a50 text-dark-a0/70">We'd love to hear from you! Fill out the form below and we'll get back to you
                soon.</p>

            <form method="POST" action="/contact" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-consolas pl-1 dark:text-primary-a0 text-dark-a0"> > Name</label>
                    <input type="text" name="name" required placeholder="Enter your name"
                           class="w-full p-3 border border-tonal-a30 dark:bg-tonal-a5 dark:text-primary-a0 text-black rounded-lg focus:ring-2 focus:ring-primary-a0 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-consolas pl-1 dark:text-primary-a0 text-dark-a0"> > Email</label>
                    <input type="email" name="email" required placeholder="Enter your email"
                           class="w-full p-3 border border-tonal-a30 dark:bg-tonal-a5 dark:text-primary-a0 text-black rounded-lg focus:ring-2 focus:ring-primary-a0 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-consolas pl-1 dark:text-primary-a0 text-dark-a0"> > Message</label>
                    <textarea name="message" rows="4" required placeholder="Write your message here..."
                              class="w-full p-3 border border-tonal-a30 dark:bg-tonal-a5 dark:text-primary-a0 text-black rounded-lg focus:ring-2 focus:ring-primary-a0 focus:outline-none"></textarea>
                </div>
                <button type="submit"
                        class="w-full px-5 py-3 dark:bg-tonal-a30 bg-gray-800 text-primary-a0 font-medium rounded-lg dark:hover:bg-tonal-a40 hover:bg-gray-700 transition duration-300">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
