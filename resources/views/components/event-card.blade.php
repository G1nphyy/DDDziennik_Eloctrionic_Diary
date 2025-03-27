<div class="event-card dark:bg-gray-700 p-6 rounded-lg shadow-lg cursor-pointer dark:hover:bg-gray-600/60 bg-gray-200 hover:bg-gray-300">
    <a href="events/{{$event["id"]}}" class=" flex flex-col  justify-between h-full">
        <div class="content overflow-clip md:flex sm:flex-col">
            <h3 class="text-xl font-semibold mb-2">{{$event["title"]}}</h3>
            <p class="dark:text-gray-300 text-black mb-5 pb-5 text-pretty overflow-hidden text-ellipsis max-h-[150px]">{{$event["description"]}}</p>
        </div>
        <p class="text-gray-400">Date: {{ date_format(new DateTime($event['date']), 'F d, Y') }} </p>
    </a>
</div>
