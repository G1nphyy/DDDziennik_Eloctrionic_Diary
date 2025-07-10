<x-dashboard-layout>


    <div class="flex flex-col lg:flex-row gap-8 p-6">


        <!-- Pop up info window -->
        <div id="popup-info" class="hidden fixed inset-0 bg-black/55 z-50 flex items-center justify-center p-4">
            <div class="bg-white dark:bg-gray-800 w-full max-w-[95vw] h-[95vh] rounded-xl shadow-lg relative flex flex-col">
                <div class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="font-bold text-2xl text-gray-900 dark:text-gray-100">Grades</h3>
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
                        Loading grades...
                    </div>
                </div>
            </div>
        </div>


        <!-- Users List -->
        <x-user-list :users="$users"></x-user-list>

        <div class="w-full lg:w-1/3 gap-5 flex flex-col">
            <!-- Search -->
            <x-search></x-search>
        </div>


    </div>
        <!--PopUp Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {const popup = document.getElementById('popup-info');
            const popupContent = document.getElementById('popup-content');
            const closePopup = document.getElementById('close-popup');

            document.querySelectorAll('.user-card').forEach(card => {card.addEventListener('click', () => {const userId = card.dataset.userToken;


                popup.classList.remove('hidden');
                popupContent.innerHTML = `
                        <div class="w-full flex justify-center items-center">
                            <div class="loader"></div>
                        </div>
                        <style>
                            .loader {
                              width: 50px;
                              aspect-ratio: 1;
                              color: #2b7fff;
                              position: relative;
                              animation: l40 .5s infinite alternate;
                            }
                            .loader:before,
                            .loader:after {
                              content: "";
                              position: absolute;
                              inset: 0;
                              background-size: 25px 25px;
                              background-position: 0 0,100% 0,100% 100%,0 100%;
                              background-repeat: no-repeat;
                            }
                            .loader:before {
                              background-image:
                                radial-gradient(farthest-side at top    left ,currentColor 96%,#0000),
                                radial-gradient(farthest-side at top    right,currentColor 96%,#0000),
                                radial-gradient(farthest-side at bottom right,currentColor 96%,#0000),
                                radial-gradient(farthest-side at bottom left ,currentColor 96%,#0000);
                              animation: l40-1 1s infinite;
                            }
                            .loader:after {
                              background-image:
                                radial-gradient(farthest-side at top    left ,#0000 94%,currentColor 96%),
                                radial-gradient(farthest-side at top    right,#0000 94%,currentColor 96%),
                                radial-gradient(farthest-side at bottom right,#0000 94%,currentColor 96%),
                                radial-gradient(farthest-side at bottom left ,#0000 94%,currentColor 96%);
                              animation: l40-2 1s infinite;
                            }
                            @keyframes l40-1 {
                              0%,10%,90%,100% {inset:0}
                              40%,60% {inset:-10px}
                            }
                            @keyframes l40-2 {
                              0%,40%  {transform: rotate(0)}
                              60%,100%{transform: rotate(90deg)}
                            }
                        </style>
                    `;

                fetch("{{ route('grades.fetch') }}", {method: "POST",
                    headers: {'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    body: JSON.stringify({user_token: userId})})
                    .then(response => response.json())
                    .then(data => {if (!data || (data.grades.length === 0 && data.teacher.length === 0)) {popupContent.innerHTML = '<span class="text-xl text-gray-800 dark:text-gray-300 mb-6">No grades assigned.</span>';} else {let grades = data.grades;
                        let teacher = data.teacher;

                        let teacherMap = {};
                        teacher.forEach(t => {teacherMap[t.teacher_id] = t.first_name + " " + t.last_name;});

                        let subjectsMap = {};
                        grades.forEach(g => {if (!subjectsMap[g.name]) {subjectsMap[g.name] = [];}

                            const date =new Date(g.updated_at.slice(0, 10))
                            const day = String(date.getDate()).padStart(2, '0');
                            const month = String(date.getMonth() + 1).padStart(2, '0');
                            const year = date.getFullYear();
                            const formatted = `${day}.${month}.${year}`;

                            subjectsMap[g.name].push({index: g.teacher_id,
                                grade: g.grade,
                                weight: g.weight,
                                description: g.description || '-',
                                teacher: teacherMap[g.teacher_id] || '-',
                                date: formatted});});
                        let html = `
                                                <div class="table-responsive overflow-x-auto">
                                                    <table class="table-auto w-full border border-gray-300 dark:border-gray-700">
                                                        <thead>
                                                            <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                                                                <th class="px-4 py-2 border">Subject</th>
                                                                <th class="px-4 py-2 border">Grades</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                            `;
                        let idCounter = 0;
                        Object.entries(subjectsMap).forEach(([subject, gradesList]) => {html += `<tr>
                                            <td class="border px-4 py-2 font-semibold align-top">${subject}</td>
                                            <td class="border px-4 py-2">
                                                <div class="flex flex-wrap gap-2">`;

                            gradesList.forEach(entry => {const uniqueId = `grade-detail-${idCounter++}`;
                                html += `
                                                    <div class="flex gap-2">
                                                        <!-- Button with grade -->
                                                        <div class="">
                                                            <div
                                                                class="cursor-pointer inline-block px-3 py-1.5 rounded-md bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 transition duration-200 shadow"
                                                                onclick="showGradeDetails('${entry.weight}', '${entry.description}', '${entry.teacher}', '${entry.date}', '${entry.grade}')"
                                                            >
                                                                ${entry.grade}
                                                            </div>
                                                        </div>
                                                        <!-- Overlay -->
                                                        <div id="sidebar-overlay"
                                                             class="hidden fixed inset-0 bg-black opacity-65 z-40"
                                                             onclick="closeSidebar()">
                                                        </div>

                                                        <!-- SideBar -->
                                                        <div
                                                            id="sidebar"
                                                            class="fixed top-0 right-0 h-full w-150 max-w-full bg-white dark:bg-gray-800 rounded-s-xl border-l border-gray-300 dark:border-gray-700 shadow-lg transform translate-x-full transition-transform duration-300 z-50"
                                                        >
                                                            <div class=" flex flex-col h-full">
                                                                <div class="flex justify-center items-center pb-4 pt-5 relative w-full dark:bg-gray-700 rounded-tl-xl ">
                                                                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 ">Details</h2>
                                                                    <button onclick="closeSidebar()" class="text-gray-500 hover:text-red-500 text-xl"><img
                                                                                                                                                            src="{{ Vite::asset('resources/images/menu_close.svg') }}"
                                                                                                                                                            class="w-8 hover:rotate-180 hover:scale-150 hover:p-1.5 hover:bg-gray-500 rounded-full transition-all absolute right-5 top-5"
                                                                                                                                                            alt=""></button>
                                                                </div>
                                                                <div id="sidebar-content" class="p-10 space-y-3 text-lg text-gray-700 dark:text-gray-200 overflow-auto">
                                                                    <!-- Place for content -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                `;});

                            html += `</div></td></tr>`;});

                        html += `</tbody></table></div>`;
                        popupContent.innerHTML = html;}});

            });});

            closePopup.addEventListener('click', () => {popup.classList.add('hidden');});

            document.addEventListener('click', function (e) {if (!e.target.closest('#popup-info > div') && !e.target.closest('.user-card')) {popup.classList.add('hidden');}});});

        function showGradeDetails(weight, description, teacher, date, grade) {const content = `
                    <div class="flex justify-between items-start ">
                        <span class="font-medium text-gray-500 dark:text-gray-300">Grade:</span>
                        <span class="text-right text-gray-800 dark:text-gray-100">${grade}</span>
                    </div>
                       <div class="flex justify-between items-start">
                        <span class="font-medium text-gray-500 dark:text-gray-300">Weight:</span>
                        <span class="text-right text-gray-800 dark:text-gray-100">${weight}</span>
                    </div>
                    <div class="flex justify-between items-start">
                        <span class="font-medium text-gray-500 dark:text-gray-300">Description:</span>
                        <span class="text-right text-gray-800 dark:text-gray-100">${description}</span>
                    </div>
                    <div class="flex justify-between items-start">
                        <span class="font-medium text-gray-500 dark:text-gray-300">Teacher:</span>
                        <span class="text-right text-gray-800 dark:text-gray-100">${teacher}</span>
                    </div>
                    <div class="flex justify-between items-start">
                        <span class="font-medium text-gray-500 dark:text-gray-300">Date:</span>
                        <span class="text-right text-gray-800 dark:text-gray-100">${date}</span>
                    </div>
            `;

            document.getElementById('sidebar-content').innerHTML = content;
            document.getElementById('sidebar').classList.remove('translate-x-full');
            document.getElementById('sidebar-overlay').classList.remove('hidden');}

        function closeSidebar() {document.getElementById('sidebar').classList.add('translate-x-full');
            document.getElementById('sidebar-overlay').classList.add('hidden');}
    </script>
</x-dashboard-layout>
