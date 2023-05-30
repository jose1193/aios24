<!--  AUTH USER -->
@auth
    <x-app-layout>
        <x-slot name="header">
            <x-slot name="title">
                {{ __('Blog') }}
            </x-slot>

            <div class="bg-white p-4 flex items-center flex-wrap font-bold">
                <ul class="flex items-center">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-500">
                            <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                            </svg>
                        </a>

                        <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z" />
                        </svg>
                    </li>

                    <li class="inline-flex items-center">
                        <a href="{{ route('about') }}" :active="request() - > routeIs('about')"
                            class="text-gray-600 hover:text-green-500 capitalize">
                            {{ __('Nuestros últimos artículos') }}
                        </a>


                    </li>


                </ul>
            </div>

        </x-slot>

        <div class="bg-white py-6 sm:py-8 mb-20">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16 -mt-5">

                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Descubre nuestros emocionantes
                        artículos que te mantendrán informado y entretenido. Sumérgete en el mundo del conocimiento y la
                        inspiración con nuestras noticias actualizadas, análisis en profundidad y consejos expertos.
                        ¡Permítenos ser tu fuente confiable de información y entretenimiento!</p>
                </div>
                <!-- text - end -->

                <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                    <!-- article - start -->
                    @foreach ($posts as $post)
                        <a href="{{ route('showpost', ['postTitle' => $post->post_title_slug]) }}"
                            class="group relative flex h-48 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-64 xl:h-96">
                            <img src="{{ Storage::url($post->post_image) }}" loading="lazy" alt="post image"
                                class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                            <div
                                class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent">
                            </div>

                            <div class="relative mt-auto p-4">
                                <span class="block text-sm text-gray-200">{{ $post->post_date }}</span>
                                <h2 class="mb-2 text-xl font-semibold text-white transition duration-100">
                                    {{ $post->post_title }}
                                </h2>

                                <span class="font-semibold text-green-400">Leer más</span>
                            </div>
                        </a>
                        <!-- article - end -->
                    @endforeach
                    <div class="m-2 p-2">{{ $posts->links() }}</div>
                </div>
            </div>
        </div>

    </x-app-layout>
@endauth
<!-- END AUTH USER -->


<!-- GUEST USER -->
@guest
    @extends('layouts.guest2')

    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <x-home-header />
        </div>
    </div>
    <div class="bg-white py-6 sm:py-8 mb-20">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16 -mt-5">
                <h2 class="mb-4 text-center text-2xl font-bold text-green-600 md:mb-6 lg:text-3xl">Blog</h2>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Descubre nuestros emocionantes
                    artículos que te mantendrán informado y entretenido. Sumérgete en el mundo del conocimiento y la
                    inspiración con nuestras noticias actualizadas, análisis en profundidad y consejos expertos.
                    ¡Permítenos ser tu fuente confiable de información y entretenimiento!</p>
            </div>
            <!-- text - end -->

            <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                <!-- article - start -->
                @foreach ($posts as $post)
                    <a href="{{ route('showpost', ['postTitle' => $post->post_title_slug]) }}"
                        class="group relative flex h-48 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-64 xl:h-96">
                        <img src="{{ Storage::url($post->post_image) }}" loading="lazy" alt="Photo by Minh Pham"
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent">
                        </div>

                        <div class="relative mt-auto p-4">
                            <span class="block text-sm text-gray-200">{{ $post->post_date }}</span>
                            <h2 class="mb-2 text-xl font-semibold text-white transition duration-100">
                                {{ $post->post_title }}
                            </h2>

                            <span class="font-semibold text-green-400">Leer más</span>
                        </div>
                    </a>
                    <!-- article - end -->
                @endforeach
                <div class="m-2 p-2">{{ $posts->links() }}</div>
            </div>
        </div>
    </div>

    <x-footer />
@endguest
<!-- END GUEST USER -->
