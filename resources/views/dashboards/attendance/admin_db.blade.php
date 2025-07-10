<x-dashboard-layout>


    <div class="flex flex-col lg:flex-row gap-8 p-6">


        <!-- Pop up info window -->
        <div id="popup-info" class="hidden fixed inset-0 bg-black/55 z-50 flex items-center justify-center p-4">
            <div class="bg-white dark:bg-gray-800 w-full max-w-[95vw] h-[95vh] rounded-xl shadow-lg relative flex flex-col">
                <div class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="font-bold text-2xl text-gray-900 dark:text-gray-100">Attendance</h3>
                    <button id="close-popup" class="text-sm text-red-500">
                        <img
                            class="w-8 h-8 hover:rotate-180 hover:scale-125 hover:p-1.5 hover:bg-gray-500 dark:hover:bg-gray-600 rounded-full transition-all"
                            src="{{ Vite::asset('resources/images/menu_close.svg') }}"
                            alt="Close"
                        />
                    </button>
                </div>

                <div class="overflow-auto p-4 text-sm text-gray-900 dark:text-gray-100" style="max-height: calc(95vh - 100px);">
                    <div id="popup-content" class="min-h-[100px]">
                        Loading attendance...
                    </div>
                </div>
            </div>
        </div>


        <!-- Users List -->
        <x-user-list :users='$users'></x-user-list>

        <!-- Search -->
        <x-search></x-search>

    </div>
    <!--PopUp Script -->
    <x-pop_up></x-pop_up>
</x-dashboard-layout>
