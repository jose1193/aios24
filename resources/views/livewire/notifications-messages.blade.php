<!-- Dropdown menu MESSAGES NOTIFICATIONS -->
<div id="messages-notifications-container">
    <div class="relative m-6 inline-flex w-fit cursor-pointer" id="user-menu-button" aria-expanded="false"
        data-dropdown-toggle="user-dropdown2">

        <button type="button"
            class="relative inline-flex items-center p-2.5 text-sm font-medium text-center text-white bg-green-600 rounded-full duration-500 ease-in-out hover:bg-green-500 focus:ring-4 focus:outline-none ">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 16">
                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                <path
                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
            </svg>
            <span class="sr-only">Notifications</span>

            @forelse ($messages as $item)
                <div id="count-notifications"
                    class="absolute items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-3.5 -right-2 @if ($count == 0 || $item->to_id != auth()->user()->id) hidden @endif">
                    {{ $count }}
                </div>

            @empty
            @endforelse

        </button>



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
                        <!-- Aquí agregas el contenido del mensaje -->
                        <!-- Ejemplo: -->
                        <div class="text-gray-600 text-sm">
                            <p class="font-bold"
                                style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 150px;">
                                {{ $item->name }} {{ $item->lastname }}
                            </p>
                            <p class="font-bold text-gray-500 text-xs">
                                {{ $item->created_at }}
                            </p>
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
                    Chatbox
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- SCRIPTS PUSHERS NOTIFICATIONS IN FOOTER.BLADE.PHP-->
