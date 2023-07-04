<!-- Dropdown menu MESSAGES NOTIFICATIONS -->
<div id="messages-notifications-container">
    <div class="relative m-6 inline-flex w-fit cursor-pointer" id="user-menu-button" aria-expanded="false"
        data-dropdown-toggle="user-dropdown2">
        @if ($count > 0)
            <span
                class="absolute h-5 w-5 bottom-auto left-5 right-0 -top-3 z-10 inline-flex items-center justify-center p-3 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ $count }}</span>
        @endif

        <div
            class="flex items-center justify-center text-base rounded-full bg-green-600 p-2 text-center text-white shadow-lg dark:text-gray-200">
            <i class="fa-regular fa-envelope"></i>
        </div>
    </div>

    <!-- Dropdown menu MESSAGES NOTIFICATIONS -->

    <div class="z-50 hidden overflow-auto my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
        id="user-dropdown2" style="max-height: 200px; overflow-y: auto;">
        <ul class="py-2" aria-labelledby="user-menu-button">
            @forelse($messages as $item)
                <li>

                    <a href="{{ route('chatify.name', ['id' => $item->from_id]) }}"
                        class="border-t border-gray-200 flex items-center space-x-2 
                    px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">

                        @if ($item->profile_photo_path)
                            <img class="h-8 w-8 rounded-full object-cover mx-0"
                                src="{{ Storage::url($item->profile_photo_path) }}" alt="avatar">
                        @else
                            <div
                                class="w-10 h-10 rounded-full border flex items-center justify-center bg-indigo-100 text-green-600 mx-0">
                                {{ strtoupper(substr($item->name, 0, 1)) }}
                            </div>
                        @endif

                        <div class="text-gray-600 text-sm">
                            <p class="font-bold"
                                style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 150px;">
                                {{ $item->name }} {{ $item->lastname }}
                            </p>
                            <p class="font-bold text-gray-500 text-xs">
                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                        </div>
                    </a>
                </li>
            @empty
                <li>
                    <a href="#"
                        class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        <div class="text-gray-600 text-sm">
                            <p class="font-bold"
                                style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 150px;">
                                No hay Mensajes
                            </p>
                        </div>
                    </a>
                </li>
            @endforelse

            <li>
                <a href="{{ route('chatify.index') }}"
                    class="border-t border-gray-200 text-center bg-green-600 block px-4 py-2 text-sm text-white hover:bg-green-400">
                    Chatbox</a>
            </li>
        </ul>
    </div>
</div>
