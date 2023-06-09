<!-- NEW ADS -->
<div>
    @if ($collections->count() > 0)
        <h2 class="bg-white w-full my-10 text-4xl font-bold leading-tight text-center text-gray-800">
            Últimos Anuncios
        </h2>
        <div class="w-full mb-4 -mt-5">
            <div class="h-1 mx-auto bg-green-600 w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>

        <div
            class="bg-white owl-carousel testimonials p-10 grid w-full grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            @foreach ($collections as $item)
                <div
                    class="relative inline-block w-full transform transition-transform duration-300 ease-in-out hover:-translate-y-2">


                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md m-3 ">
                        <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}">
                            <img class="rounded-t-lg " src="{{ Storage::url($item->image_path) }}" alt="" />
                        </a>

                        <div class="p-5">


                            <div class="flex justify-between mb-2">
                                <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}">
                                    <p class="text-lg font-semibold">€ {{ $item->price }}</p>
                                </a>
                                @if ($item->profile_photo_url)
                                    <img class="w-24 rounded border" src="{{ Storage::url($item->profile_photo_url) }}"
                                        alt="Foto de perfil">
                                @else
                                    <div
                                        class="w-10 h-10 rounded-full border flex items-center justify-center bg-indigo-100 text-green-600">
                                        {{ strtoupper(substr($item->name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                            <a href="#">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-green-700 ">
                                    {{ Str::words($item->title, 6, '...') }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}">
                                    {{ Str::words($item->description, 7, '...') }}
                            </p>
                            </a>
                            <div class="justify-center py-4 border-y border-slate-100 ">
                                <div class=" flex space-x-3 overflow-hidden rounded-lg px-1 py-1">
                                    <p class="flex items-center font-medium text-gray-800">
                                        <i class="fa fa-bed mr-2  text-green-600"></i>
                                        {{ $item->bedrooms }} Hab
                                    </p>

                                    <p class="flex items-center font-medium text-gray-800">
                                        <i class="fa fa-bath mr-2 text-green-600"></i>
                                        {{ $item->bathrooms }} Bañ
                                    </p>
                                    <p class="flex items-center font-medium text-gray-800">
                                        <i class="fa fa-home mr-2  text-green-600"></i>
                                        {{ $item->total_area }} m²
                                    </p>
                                </div>
                            </div>
                            <div class="justify-between">
                                <span
                                    class="absolute top-2 right-8 z-10 mt-3 ml-3 inline-flex select-none rounded-sm bg-[#27c54f] px-2 py-1 text-xs font-semibold text-white ">
                                    {{ $item->transaction_description }} </span>
                            </div>
                        </div>
                        <span
                            class="absolute top-20 right-8 z-10 mt-20 ml-3 inline-flex select-none rounded-full bg-white bg-opacity-70 px-2 py-1 text-xs font-semibold ">
                            @livewire('favorites-cards', ['propertyId' => $item->id])
                        </span>


                    </div>
                </div>
            @endforeach
        @else
    @endif


</div>

<!-- END NEW ADS -->

<!-- OWL CAROUSEL -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<script>
    $(document).ready(function() {
        var $testimonialsDiv = $('.testimonials');
        if ($testimonialsDiv.length && $.fn.owlCarousel) {
            $testimonialsDiv.owlCarousel({
                items: 1,
                nav: true,
                dots: false,
                navText: ['<i class="fa-solid fa-chevron-left ml-4 text-green-700 text-3xl"></i>',
                    '<i class="fa-solid fa-chevron-right mr-4 text-green-700 text-3xl"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    },

                }
            });
        }
    });
</script>

<style>
    /*  IMAGE GALLERY
----------------------*/




    .owl-next.disabled,
    .owl-prev.disabled {
        opacity: 0.5;

    }

    .owl-prev,
    .owl-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);

    }

    .owl-prev {
        left: 0;

    }

    .owl-next {
        right: 0;
    }

    .owl-theme .owl-nav.disabled+.owl-dots {
        margin-top: 60px;
    }

    .owl-theme .owl-dots .owl-dot span {
        background: #e7d9eb;
        width: 35px;
        height: 8px;
        border-radius: 10px;
        transition: all 0.3s ease-in;
    }

    .owl-theme .owl-dots .owl-dot:hover span {
        background: #2240F4;
    }

    .owl-theme .owl-dots .owl-dot.active span {
        background: #2240F4;
        box-shadow: 0px 9px 32px 0px rgba(0, 0, 0, 0.07);
    }

    .img-gallery .owl-item {
        box-shadow: 0px 9px 32px 0px rgba(0, 0, 0, 0.07);
        transform: scale(0.8);
        transition: all 0.3s ease-in;
    }

    .img-gallery .owl-item.center {
        transform: scale(1);
    }
</style>
<!-- END OWL CAROUSEL -->
