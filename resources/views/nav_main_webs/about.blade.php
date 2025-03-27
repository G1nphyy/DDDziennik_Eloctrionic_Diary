<x-app-layout>
    <div class="w-vw min-h-screen pb-20 ">
        <div class="max-w-3xl mt-10 mx-auto p-8 dark:bg-tonal-a10 bg-gray-200 shadow-lg rounded-lg ">
            <h1 class="text-4xl font-extrabold text-black dark:text-primary-a0 mb-4">About Us</h1>

            <p class="dark:text-tonal-a50 text-black/90 leading-relaxed mb-6">
                Welcome to our platform! We are dedicated to providing the best experience possible. Our team is
                passionate about innovation and delivering high-quality solutions that make a difference.
            </p>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold text-black dark:text-primary-a0 mb-3">Our Mission</h2>
                <p class="dark:text-tonal-a50 text-black/90 leading-relaxed">
                    Our mission is to create an impact in the tech industry by designing solutions that are not only
                    innovative but also accessible. We believe that technology should be a tool to empower individuals
                    and businesses, allowing them to achieve more.
                </p>
            </section>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold text-black dark:text-primary-a0 mb-3">Our Values</h2>
                <ul class="dark:text-tonal-a50 text-black/90 list-disc pl-6">
                    <li>Innovation - We strive to continuously push the boundaries of technology.</li>
                    <li>Quality - We are committed to delivering high-quality products and services.</li>
                    <li>Integrity - We operate with transparency and honesty in everything we do.</li>
                    <li>Customer-centricity - We prioritize the needs and satisfaction of our users above all else.</li>
                </ul>
            </section>

            <section class="mb-6">
                <h2 class="text-2xl font-semibold text-black dark:text-primary-a0 mb-3">Meet the Team</h2>
                <p class="dark:text-tonal-a50 text-black/90 leading-relaxed">
                    Our team is made up of skilled professionals who bring their expertise and passion to every project.
                    Together, we work towards achieving our common goal of making a positive impact in the tech world.
                </p>
                <div class="mt-4 flex flex-wrap gap-6">
                    <div class="dark:bg-tonal-a5 bg-gray-300 p-6 rounded-lg shadow-md w-full flex items-center space-x-4">
                        <img src="https://randomuser.me/api/portraits/men/9.jpg" alt="Borys Kędziora"
                             class="w-30 h-30 rounded-2xl object-cover">
                        <div>
                            <h3 class="text-xl font-bold dark:text-primary-a0 text-black">Borys Kędziora</h3>
                            <p class="dark:text-tonal-a50 text-black/90">Founder & CEO</p>
                            <p class="dark:text-tonal-a50 text-black/90 mt-2">Borys has over 10 years of experience in the tech industry
                                and is passionate about leading innovation.</p>
                        </div>
                    </div>
                    <div class="dark:bg-tonal-a5 bg-gray-300 p-6 rounded-lg shadow-md w-full flex items-center space-x-4">
                        <div>
                            <h3 class="text-xl font-bold dark:text-primary-a0 text-black">Zofia Anna Ratajczak</h3>
                            <p class="dark:text-tonal-a50 text-black/90">Lead Developer</p>
                            <p class="dark:text-tonal-a50 text-black/90 mt-2">Zofia is a brilliant software engineer with a deep
                                understanding of cutting-edge technologies and development practices.</p>
                        </div>
                        <img src="https://randomuser.me/api/portraits/women/6.jpg" alt="Zofia Anna Ratajczak"
                             class="w-30 h-30 rounded-2xl object-cover">
                    </div>
                    <div class="dark:bg-tonal-a5 bg-gray-300 p-6 rounded-lg shadow-md w-full flex items-center space-x-4">
                        <img src="{{Vite::asset('resources/images/about_kumi_photo.jpg')}}" alt="Kamil `Kumi` Gaming"
                             class="w-30 h-30 rounded-2xl object-cover">
                        <div>
                            <h3 class="text-xl font-bold dark:text-primary-a0 text-black">Kamil "Kumi" Gaming</h3>
                            <p class="dark:text-tonal-a50 text-black/90">Head of Design</p>
                            <p class="dark:text-tonal-a50 text-black/90 mt-2">Kumi is responsible for making sure our products are visually
                                stunning and user-friendly. His design skills are almost too good to be true!</p>
                        </div>
                    </div>

                </div>
            </section>

            <section>
                <h2 class="text-2xl font-semibold text-black dark:text-primary-a0 mb-3"><a href="/contact" class="underline">Contact
                        Us</a></h2>
                <p class="dark:text-tonal-a50 text-black/90 leading-relaxed">
                    If you would like to learn more about us or have any questions, feel free to reach out to us. We're
                    always happy to help!
                </p>
            </section>
        </div>
    </div>
</x-app-layout>
