<aside class="">
    <form action="" method="get" class="bg-white dark:bg-gray-700 rounded-2xl p-6 shadow-md space-y-4">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Date gap</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <input
                type="date"
                name="date_from"
                id="date_from"
                value="{{ session('date_from', '') }}"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
            <input
                type="date"
                name="date_to"
                id="date_to"
                value="{{ session('date_to', '') }}"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200"
        >
            Update
        </button>
    </form>
</aside>

<script>
    const today = new Date().toISOString().split('T')[0];
    const dateFromInput = document.getElementById('date_from');
    const dateToInput = document.getElementById('date_to');
    if (!dateFromInput.value) {
        dateFromInput.value = today;
    }
    if (!dateToInput.value) {
        dateToInput.value = today;
    }
</script>

