<div class="flex items-center mt-8 text-gray-600 dark:text-gray-400 mb-5">
    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
        viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    <div class="ml-4 text-md tracking-wide font-semibold w-80 capitalize">


        @foreach ($buckets as $bucket)
            {{ $bucket->description }}, {{ $bucket->city }}, {{ $bucket->community }},
            {{ $bucket->country }}
        @endforeach
    </div>
</div>

<div class="flex items-center mt-2 text-gray-600 dark:text-gray-400">
    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
        viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
    </svg>
    <div class="ml-4 text-md tracking-wide font-semibold w-40">
        {{ $emailAdmin }}
    </div>
</div>
