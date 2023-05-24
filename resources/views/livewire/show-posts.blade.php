<!--  AUTH USER -->
@auth

    <x-slot name="header">
        <x-slot name="title">
            {{ $posts->post_title }}

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
                    <a href="" class="text-gray-600 hover:text-green-500">
                        {{ __('Artículo Publicado') }}
                    </a>


                </li>


            </ul>
        </div>

    </x-slot>

    <!-- Published POST -->
    <div class="container my-24 px-6 mx-auto">

        <!-- Section: Design Block -->
        <section class="mb-32 text-gray-800">
            <img src="{{ Storage::url($posts->post_image) }}" class="w-full shadow-lg rounded-lg mb-6" alt="" />

            <div class="flex items-center mb-6">
                <img src="{{ asset('img/logo.jpg') }}" class="rounded-full mr-2 h-8" alt="" loading="lazy" />
                <div>
                    Publicado <span class="font-medium"> {{ $posts->post_date }}</> </span>

                </div>
            </div>

            <h1 class="font-bold text-3xl mb-6"> {{ $posts->post_title }}
            </h1>

            <p>
                {{ $posts->post_content }}
            </p>
        </section>
        <!-- Section: Design Block -->
        <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=646e837f413e9c001905a213&product=inline-share-buttons&source=platform"
            async="async"></script>
        <div class="flex flex-col items-center">
            <h1 class="text-green-700 text-3xl font-semibold my-10 text-center">¡Comparte este artículo y expande su
                impacto!</h1>

            <div class="sharethis-inline-share-buttons my-5 pb-10"></div>

        </div>

    </div>


    <!-- END Published POST -->

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

    <!-- Published POST -->
    <div class="container my-12 px-6 mx-auto">
        <h1 class="text-green-700 text-3xl font-semibold my-10 text-center">{{ $posts->post_title }}</h1>
        <!-- Section: Design Block -->
        <section class="mb-32 text-gray-800">
            <img src="{{ Storage::url($posts->post_image) }}" class="w-full shadow-lg rounded-lg mb-6" alt="" />

            <div class="flex items-center mb-6">
                <img src="{{ asset('img/logo.jpg') }}" class="rounded-full mr-2 h-8" alt="" loading="lazy" />
                <div>
                    Publicado <span class="font-medium"> {{ $posts->post_date }}</> </span>

                </div>
            </div>

            <h1 class="font-bold text-3xl mb-6"> {{ $posts->post_title }}
            </h1>

            <p>
                {{ $posts->post_content }}
            </p>
        </section>
        <!-- Section: Design Block -->
        <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=646e837f413e9c001905a213&product=inline-share-buttons&source=platform"
            async="async"></script>
        <div class="flex flex-col items-center">
            <h1 class="text-green-700 text-3xl font-semibold my-10 text-center">¡Comparte este artículo y expande su
                impacto!</h1>

            <div class="sharethis-inline-share-buttons my-5 pb-10"></div>

        </div>

    </div>


    <!-- END Published POST -->

    <x-footer />
@endguest
<!-- END GUEST USER -->
