@props(['events'])
<x-app-layout pt="0" js="resources/js/welcome.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>

    WELOME TO MY OAGE

    {{-- MAIN VIEW --}}
    <section class="hero h-dvh relative flex items-center justify-center text-center text-black drop-shadow-7xl  dark:text-white overflow-hidden">
        <div class="video-container w-full h-full relative">
            <div class="overlay w-full h-full absolute top-0 left-0 bg-white/80 dark:bg-black/70"></div>
            <video class="h-full w-full object-cover"
                   src="{{ Vite::asset('resources/images/welcome_broken_code.mp4') }}" loop autoplay muted></video>
        </div>

        <div class="hero-container absolute inset-0 flex flex-col items-center justify-center">
            <h1 class="text-5xl font-bold font-consolas opacity-0"></h1>
            <p class="text-lg mt-4 opacity-0">A powerful electronic journal designed for students, parents, and
                teachers.</p>
            <button class="btn-hero mt-6 flex items-center justify-center">Learn More <span id="arrow_down"> <img
                        src="{{ Vite::asset('resources/images/arrow_down.svg') }}">  </span></button>
        </div>
    </section>

    {{-- FEATURE CARDS --}}
    <section class="w-vw bg-gray-100 dark:bg-gray-800">
        <div class="container_feature max-w-7xl mx-auto min-h-[100dvh] py-16 px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 lg:grid-rows-4 gap-8 relative pt-40">
            {{-- SVG PATH --}}
            <div class="svg_container absolute top-0 left-0 w-full h-full flex justify-center items-center overflow-hidden">
                <svg width="505" height="1141" viewBox="0 0 495 1141" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M227.5 1C227.5 1 -9.22039 144.012 1.49991 285.5C16.373 481.797 418.5 229 488 417.5C557.5 606 40.4998 892.5 12.4999 647.5C-15.5 402.5 546.5 672.5 488 851.5C429.5 1030.5 277.357 852.917 227.5 949.5C193.375 1015.61 227.5 1140 227.5 1140"
                        class="stroke-black dark:stroke-white" stroke-linejoin="round" stroke-linecap="round" stroke-width="6px"/>
                </svg>
            </div>

            <!-- Feature Card 1 -->
            <div>
                <div class="feature-card relative pb-10 h-5/6 w-2/3 bg-gray-200/30 dark:bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-black/20 dark:border-white/20 opacity-0 translate-y-10">
                    <h3 class="text-xl font-semibold text-black dark:text-white">Grades and Statistics</h3>
                    <p class="mt-2 text-black dark:text-gray-300">Track your learning progress in real time.</p>
                    <div class="absolute -top-5 -right-5 w-16 h-16 bg-blue-500/40 rounded-full blur-2xl"></div>
                </div>
            </div>

            <div></div>

            <!-- Feature Card 2 -->
            <div></div>
            <div>
                <div class="feature-card relative pb-10 h-5/6 w-2/3 float-right bg-gray-200/30 dark:bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-black/20 dark:border-white/20 opacity-0 translate-y-10">
                    <h3 class="text-xl font-semibold text-black dark:text-white">Schedule</h3>
                    <p class="mt-2 text-black dark:text-gray-300">Check your class schedule anytime.</p>
                    <div class="absolute -top-5 -left-5 w-16 h-16 bg-green-500/40 rounded-full blur-2xl"></div>
                </div>
            </div>

            <!-- Feature Card 3 -->
            <div>
                <div class="feature-card relative pb-10 h-5/6 w-2/3 bg-gray-200/30 dark:bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-black/20 dark:border-white/20 opacity-0 translate-y-10">
                    <h3 class="text-xl font-semibold text-black dark:text-white">Attendance</h3>
                    <p class="mt-2 text-black dark:text-gray-300">Monitor your attendance and excuses.</p>
                    <div class="absolute -top-5 -right-5 w-16 h-16 bg-purple-500/40 rounded-full blur-2xl"></div>
                </div>
            </div>

            <div></div>

            <!-- Feature Card 4 -->
            <div></div>

            <div>
                <div class="feature-card relative pb-10 h-5/6 w-2/3 float-right bg-gray-200/30 dark:bg-white/10 backdrop-blur-lg p-6 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-black/20 dark:border-white/20 opacity-0 translate-y-10 justify-self-end">
                    <h3 class="text-xl font-semibold text-black dark:text-white">Messages</h3>
                    <p class="mt-2 text-black dark:text-gray-300">Easily communicate with teachers and parents.</p>
                    <div class="absolute -top-5 -left-5 w-16 h-16 bg-red-500/40 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRESS CARDS --}}
    <section class="section_progress py-36 bg-gray-100 dark:bg-gray-900 min-h-screen w-full border-y-2 border-gray-300 dark:border-white/30 flex flex-col items-center overflow-y-hidden">
        <div class="w-3/4 hedline relative mb-10">
            <h2 class="text-2xl font-bold text-black/80 dark:text-white/60 select-none">
                Check your progress
            </h2>
            <div class="text-9xl font-bold text-gray-700/40 dark:text-gray-700/90 absolute left-0 top-10 select-none">
                Check your<br/>Progress<br/>Hope not to regrets
            </div>
        </div>
        <div class="container_progress z-10 flex-grow flex items-center w-full">
            <div class="carousel_container w-full max-w-7xl mx-auto mt-6 overflow-x-hidden rounded-lg">
                <div class="item_container flex space-x-16">
                    <div class="item flex flex-col min-h-[50dvh] min-w-[600px] bg-gray-300/70 dark:bg-gray-600/50 dark:text-white text-black px-7 py-10 rounded-lg shadow-lg">
                        <h3 class="text-4xl font-semibold mb-7">Assignments Completed</h3>
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <span class="text-lg font-semibold">70% Completed</span>
                            </div>
                            <div class="relative mt-1 w-full h-3 bg-gray-600 rounded-full">
                                <div style="width: 70%">
                                    <div class="progress_path h-3 bg-blue-600 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-5 dark:text-gray-400 text-xl">
                            Finish your next assignment to improve your score! Completing all assignments helps
                            reinforce concepts and enhances your understanding.
                            Regular practice will also make exam preparation easier. Stay consistent, and you’ll see
                            steady improvement!
                        </p>
                    </div>

                    <div class="item flex flex-col min-h-[50dvh] min-w-[600px] bg-gray-300/70 dark:bg-gray-600/50 dark:text-white text-black px-7 py-10 rounded-lg shadow-lg">
                        <h3 class="text-4xl font-semibold mb-7">Grades Improvement</h3>
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <span class="text-lg font-semibold">85% Average</span>
                            </div>
                            <div class="relative mt-1 w-full h-3 bg-gray-600 rounded-full">
                                <div style="width: 85%">
                                    <div class="progress_path h-3 bg-green-600 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-5 dark:text-gray-400 text-xl">
                            Keep it up! You're almost there to a perfect score! Consistently reviewing past exams and
                            practicing new problems can help you achieve even better results.
                            Don't hesitate to ask for help when needed, and take advantage of study groups for better
                            understanding.
                        </p>
                    </div>

                    <div class="item flex flex-col min-h-[50dvh] min-w-[600px] bg-gray-300/70 dark:bg-gray-600/50 dark:text-white text-black px-7 py-10 rounded-lg shadow-lg">
                        <h3 class="text-4xl font-semibold mb-7">Attendance</h3>
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <span class="text-lg font-semibold">95% Attendance</span>
                            </div>
                            <div class="relative mt-1 w-full h-3 bg-gray-600 rounded-full">
                                <div style="width: 95%">
                                    <div class="progress_path h-3 bg-purple-600 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-5 dark:text-gray-400 text-xl">
                            Great attendance! Keep attending all classes for a perfect record. Being present in class
                            ensures you don’t miss important discussions and helps you stay on top of your coursework.
                            Active participation will also make learning more engaging and rewarding.
                        </p>
                    </div>

                    <div class="item flex flex-col min-h-[50dvh] min-w-[600px] bg-gray-300/70 dark:bg-gray-600/50 dark:text-white text-black px-7 py-10 rounded-lg shadow-lg">
                        <h3 class="text-4xl font-semibold mb-7">Homework Submitted</h3>
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <span class="text-lg font-semibold">60% Submitted</span>
                            </div>
                            <div class="relative mt-1 w-full h-3 bg-gray-600 rounded-full">
                                <div style="width: 60%">
                                    <div class="progress_path h-3 bg-red-600 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-5 dark:text-gray-400 text-xl">
                            Don’t forget to submit your homework on time! Completing assignments regularly strengthens
                            your understanding and prepares you for upcoming tests.
                            Setting reminders and breaking tasks into smaller chunks can help you stay on track.
                        </p>
                    </div>

                    <div class="item flex flex-col min-h-[50dvh] min-w-[600px] bg-gray-300/70 dark:bg-gray-600/50 dark:text-white text-black px-7 py-10 rounded-lg shadow-lg">
                        <h3 class="text-4xl font-semibold mb-7">Quiz Scores</h3>
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <span class="text-lg font-semibold">90% Average</span>
                            </div>
                            <div class="relative mt-1 w-full h-3 bg-gray-600 rounded-full">
                                <div style="width: 90%">
                                    <div class="progress_path h-3 bg-yellow-600 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-5 dark:text-gray-400 text-xl">
                            You're doing great on your quizzes! Regular revision and self-assessments can help you
                            retain knowledge and improve your scores even further.
                            Try different study methods like flashcards or peer quizzes for better retention.
                        </p>
                    </div>

                    <div class="item flex flex-col min-h-[50dvh] min-w-[600px] bg-gray-300/70 dark:bg-gray-600/50 dark:text-white text-black px-7 py-10 rounded-lg shadow-lg">
                        <h3 class="text-4xl font-semibold mb-7">Project Completion</h3>
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <span class="text-lg font-semibold">80% Completed</span>
                            </div>
                            <div class="relative mt-1 w-full h-3 bg-gray-600 rounded-full">
                                <div style="width: 80%">
                                    <div class="progress_path h-3 bg-teal-600 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-5 dark:text-gray-400 text-xl">
                            Finalize your project for the last phase! Thorough research, organization, and team
                            collaboration will make your project more successful.
                            Reviewing feedback and making necessary refinements can take your project to the next level.
                        </p>
                    </div>

                    <div class="item flex flex-col min-h-[50dvh] min-w-[600px] bg-gray-300/70 dark:bg-gray-600/50 dark:text-white text-black px-7 py-10 rounded-lg shadow-lg">
                        <h3 class="text-4xl font-semibold mb-7">Final Exam Preparation</h3>
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <span class="text-lg font-semibold">50% Completed</span>
                            </div>
                            <div class="relative mt-1 w-full h-3 bg-gray-600 rounded-full">
                                <div style="width: 50%">
                                    <div class="progress_path h-3 bg-orange-600 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-5 dark:text-gray-400 text-xl">
                            Study hard for the upcoming exams! Creating a study schedule and practicing with mock exams
                            can significantly boost your confidence and performance.
                            Make sure to balance study time with breaks to keep your mind fresh and focused.
                        </p>
                    </div>

                    <div class="empty item min-w-[600px] min-h-[50dvh]"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section class="upcoming-events py-16 bg-gray-100 dark:bg-gray-800 text-black dark:text-white border-b-2 border-gray-300 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-8">Upcoming Events</h2>
            <p class="text-center text-gray-600 dark:text-gray-300 mb-12">Join our workshops and webinars to enhance your learning
                experience.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($events as $event)
                    <x-event-card :event="$event"></x-event-card>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="min-h-fit section py-16 bg-gray-100 dark:bg-gray-900 text-black dark:text-white">
        <h2 class="text-4xl font-bold text-center mb-10">Frequently Asked Questions</h2>
        <div class="max-w-4xl mx-auto">
            <div class="space-y-4">
                <div class="faq-item bg-gray-200 dark:bg-gray-800 p-5 rounded-xl shadow-md cursor-pointer">
                    <h3 class="text-xl font-semibold flex justify-between items-center">
                        Is DDDziennik Free?
                        <span class="faq-icon text-blue-400 transition-transform duration-500 ease-in-out select-none">+</span>
                    </h3>
                    <p class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out mt-2 text-gray-600 dark:text-gray-300">
                        Yes, DDDziennik is completely free for everyone. There are no hidden fees, premium subscriptions, or additional costs. The platform is designed to be accessible to all students, teachers, and schools without financial barriers. Our goal is to provide an efficient and user-friendly system without any limitations. You can start using DDDziennik without worrying about payments or hidden charges.
                    </p>
                </div>
                <div class="faq-item bg-gray-200 dark:bg-gray-800 p-5 rounded-xl shadow-md cursor-pointer">
                    <h3 class="text-xl font-semibold flex justify-between items-center">
                        How to register?
                        <span class="faq-icon text-blue-400 transition-transform duration-500 ease-in-out select-none">+</span>
                    </h3>
                    <p class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out mt-2 text-gray-600 dark:text-gray-300">
                        To register on DDDziennik, you need to use the email address that was provided to your school during the account creation process. This helps us verify your identity and ensures that only authorized users gain access. The registration process is quick and straightforward, allowing you to set up your profile within minutes. Once registered, you will have access to all the features of the platform. If you encounter any issues, feel free to contact support for assistance.
                    </p>
                </div>
                <div class="faq-item bg-gray-200 dark:bg-gray-800 p-5 rounded-xl shadow-md cursor-pointer">
                    <h3 class="text-xl font-semibold flex justify-between items-center">
                        How to add my school to DDDziennik?
                        <span class="faq-icon text-blue-400 transition-transform duration-500 ease-in-out select-none">+</span>
                    </h3>
                    <p class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out mt-2 text-gray-600 dark:text-gray-300">
                        Any school can join DDDziennik easily. To get started, simply contact our Administration via the <a href="/contact" class="text-blue-400 hover:underline">Contact Form</a>. Our team will guide you through the setup process and ensure your school is successfully integrated into the platform. There are no complex requirements or fees involved. Schools that join DDDziennik gain immediate access to all its features. If you have any questions, our support team is always ready to assist.
                    </p>
                </div>
                <div class="faq-item bg-gray-200 dark:bg-gray-800 p-5 rounded-xl shadow-md cursor-pointer">
                    <h3 class="text-xl font-semibold flex justify-between items-center">
                        Is the website for my school on DDDziennik free?
                        <span class="faq-icon text-blue-400 transition-transform duration-500 ease-in-out select-none">+</span>
                    </h3>
                    <p class="faq-content overflow-hidden max-h-0 transition-all duration-500 ease-in-out mt-2 text-gray-600 dark:text-gray-300">
                        Yes, every school that joins DDDziennik has full access to all features at no cost. There are no restrictions on functionality, and every tool available within the platform can be used freely. We believe that education should be accessible to everyone, which is why we do not charge schools for using our system. Whether you need grade tracking, attendance management, or communication tools, everything is included for free. Schools can focus on education without worrying about any expenses.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section id="newsletter" class="py-20 bg-gradient-to-r from-blue-100 to-gray-100 text-black dark:from-blue-900 dark:to-gray-800 dark:text-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-5xl font-extrabold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600 leading-tight">
                Stay Updated with the Latest News!
            </h2>
            <p class="text-lg mb-12 text-gray-700 dark:text-gray-200 max-w-4xl mx-auto">
                Join our newsletter to receive exclusive offers, tips, and the latest updates directly in your inbox. Be the first to know about new features and promotions.
            </p>

            <form method="POST" action="update/newsletter/subscribe" class="max-w-3xl mx-auto flex flex-col sm:flex-row items-center justify-center gap-6">
                @csrf
                <!-- Email input -->
                <input type="email" name="email" id="email" placeholder="Enter your email"
                       class="px-6 py-4 rounded-full text-black bg-gray-200 dark:bg-gray-700 sm:w-2/3 placeholder-gray-500 dark:placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 shadow-md"
                       required>

                <!-- Subscribe button -->
                <button type="submit"
                        class="mt-4 sm:mt-0 px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-full shadow-xl hover:bg-gradient-to-r hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105">
                    Subscribe
                </button>
            </form>

            @error('email')
            <p class="text-red-400 mt-4">{{ $message }}</p>
            @enderror

            <p class="mt-8 text-sm text-gray-600 dark:text-gray-300">We respect your privacy. Unsubscribe anytime.</p>
        </div>
    </section>
</x-app-layout>
