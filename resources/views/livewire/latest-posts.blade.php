<!-- LATEST POST -->
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
        <!-- text - start -->
        <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-green-600 md:mb-6 lg:text-3xl">Blog</h2>

            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">En nuestro blog recientemente
                hemos publicado una variedad de artículos interesantes que tratan sobre propiedades, noticias y
                mucho más. Invitamos a todos a explorar nuestro blog y leer los últimos artículos.</p>
        </div>
        <!-- text - end -->

        <div class="grid gap-8 sm:grid-cols-2 sm:gap-12 lg:grid-cols-2 xl:grid-cols-2 xl:gap-16">
            @foreach ($posts as $post)
                <!-- article - start -->
                <div class="flex flex-col items-center gap-4 md:flex-row lg:gap-6">
                    <a href="#"
                        class="group relative block h-56 w-full shrink-0 self-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40">
                        <img src="{{ Storage::url($post->post_image) }}" loading="lazy" alt="img article"
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                    </a>

                    <div class="flex flex-col gap-2">
                        <span class="text-sm text-gray-400">{{ $post->post_date }}</span>

                        <h2 class="text-xl font-bold text-gray-800">
                            <a href="{{ route('showpost', ['postTitle' => $post->post_title_slug]) }}"
                                class="duration-500 ease-in-out hover:text-green-500 ">{{ $post->post_title }}</a>
                        </h2>

                        <p class="text-gray-500">{{ Str::words($post->post_content, 7, '...') }}</p>

                        <div>
                            <a href="{{ route('showpost', ['postTitle' => $post->post_title_slug]) }}"
                                class="font-semibold text-green-500 duration-500 ease-in-out hover:text-green-600">Leer
                                más</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- article - end -->






        </div>
    </div>
</div>
<!-- END LATEST POST -->
