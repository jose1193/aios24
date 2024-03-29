<div class="bg-white">
    <!-- FEATURED 1 -->
    <div class=" bg-white p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-2 gap-5">
        <!--Card 1-->
        <div class=" w-full lg:max-w-full lg:flex">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                style="background-image: url('{{ asset('img/mobile-ads.jpg') }}')" title="mobile ads">
            </div>
            <div
                class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">

                    <div class="text-gray-900 font-bold text-xl mb-2">Anunciate gratis</div>
                    <p class="text-gray-700 text-base ">Anuncia tu propiedad de manera gratuita sin preocupaciones,
                        beneficiándote de los mejores resultados. Obtén el máximo provecho sin costo alguno, alcanzando
                        tus objetivos con facilidad.</p>
                </div>
                <div class="flex items-center">
                    <a href="#" class="text-green-600 font-bold leading-none text-lg">Quiero anunciar
                        gratis</a>
                </div>
            </div>
        </div>
        <!--Card 2-->
        <div class="w-full lg:max-w-full lg:flex">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                style="background-image: url('{{ asset('img/city.jpg') }}')" title="city">
            </div>
            <div
                class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">

                    <div class="text-gray-900 font-bold text-xl mb-2">Búsqueda por Zona</div>
                    <p class="text-gray-700 text-base">Explora nuestras propiedades ubicadas en diversas ubicaciones
                        para encontrar la que mejor se adapte a tus necesidades y presupuesto.
                        Nuestro sitio te permite filtrar por zona y otros criterios para
                        encontrar la propiedad perfecta en el mapa.</p>
                </div>
                <div class="flex items-center">
                    <a href="#" class="text-green-600 font-bold leading-none text-lg">Mi Zona de Búsqueda</a>
                </div>
            </div>
        </div>
        <!--Card 3-->

    </div>
    <!-- END FEATURED 1 -->

    <!-- LATEST ADS -->
    <livewire:real-estate-cards />
    <!-- END LATEST ADS -->


    <!-- CONTENT DESCRIPTION 1 -->
    <div class="container my-24 px-6 mx-auto">

        <!-- Section: Design Block -->
        <section class="mb-32 bg-white ">
            <style>
                @media (min-width: 992px) {
                    #cta-img-nml-50 {
                        margin-left: 50px;
                    }
                }
            </style>

            <div class="flex flex-wrap">
                <div class="grow-0 shrink-0 basis-auto w-full lg:w-5/12 mb-12 lg:mb-0">
                    <div class="flex lg:py-12">
                        <img src="{{ asset('img/vacation.jpg') }}" class="w-full rounded-lg shadow-lg"
                            id="cta-img-nml-50" style="z-index: 10" alt="" />
                    </div>
                </div>

                <div class="grow-0 shrink-0 basis-auto w-full lg:w-7/12">
                    <div
                        class="bg-green-700 h-full rounded-lg p-6 lg:pl-12 text-white flex items-center text-center lg:text-left">
                        <div class="lg:pl-12">
                            <h2 class="text-3xl font-bold mb-6">Buscando una propiedad ?</h2>
                            <p class="mb-6 pb-2 lg:pb-0">
                                ¡Es el momento de aprovechar todas las oportunidades que nuestro sitio web de
                                clasificados te ofrece! Explora inmuebles nuevos, descubre lo mejor de las diferentes
                                culturas al alquilar o comprar una propiedad de la zona y vive experiencias que te
                                dejarán marcado
                                para siempre.
                            </p>



                            <p>
                                ¡Aprovecha todas las oportunidades que nuestro sitio web de clasificados te ofrece!
                                Explora inmuebles nuevos, descubre lo mejor de las diferentes culturas al alquilar o
                                comprar una
                                propiedad de la zona y disfruta de la comodidad y seguridad de tener un lugar para
                                vivir. ¡Explora una amplia variedad de propiedades que te proporciona
                                nuestro sitio web!
                            </p>


                            <div
                                class=" mt-7 flex flex-col md:flex-row md:justify-around xl:justify-start mb-6 mx-auto">

                                <x-a-button2 href="#" class="">
                                    <i class="fa-solid fa-magnifying-glass mr-2"></i>
                                    Ver alquileres disponibles
                                </x-a-button2>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->

    </div>
    <!-- END CONTENT DESCRIPTION 1 -->

    <!-- MOBILE APP- start -->
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex flex-col overflow-hidden rounded-lg bg-gray-200 sm:flex-row md:h-80">


                <!-- content - start -->
                <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
                    <h2 class="mb-4 text-xl font-bold text-green-800 md:text-2xl lg:text-4xl">Descarga la aplicación
                        para Dispositivos Móviles </h2>

                    <div class="flex flex-col lg:flex-row justify-center items-center">
                        <div class="text-center text-green-600 lg:w-1/2 px-2">
                            <p>Descubra una navegación intuitiva y una interfaz de usuario mejorada que le permitirá
                                navegar por nuestro sitio web en cualquier lugar. ¡Experimenta la comodidad de nuestro
                                sitio web para Móviles ahora!</p>
                        </div>
                        <div class="lg:w-52 px-2 -mt-5">
                            <img src="{{ asset('img/qr-image.png') }}" alt="QR Code for mobile download">
                        </div>
                    </div>


                </div>
                <!-- content - end -->

                <!-- image - start -->
                <div class="order-first h-48 w-full bg-gray-300 sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5">
                    <img src="{{ asset('img/mobile.jpg') }}" loading="lazy" alt="Photo by Andras Vas"
                        class="h-full w-full object-cover object-center" />
                </div>
                <!-- image - end -->
            </div>
        </div>
    </div>
    <!-- MOBILE APP - end -->


    <!-- FEATURED 2 -->
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Estamos contigo a
                    cada
                    paso</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Le ofrecemos una variedad de
                    opciones para alquilar y comprar propiedades.</p>
            </div>
            <!-- text - end -->

            <div class="grid gap-4 sm:grid-cols-2 md:gap-8 xl:grid-cols-3">
                <!-- feature - start -->
                <div class="flex divide-x rounded-lg border bg-gray-50">
                    <div class="flex items-center p-2 text-green-500 md:p-4">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path fill="currentColor"
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM288 176c0-44.2-35.8-80-80-80s-80 35.8-80 80c0 48.8 46.5 111.6 68.6 138.6c6 7.3 16.8 7.3 22.7 0c22.1-27 68.6-89.8 68.6-138.6zm-112 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                        </svg>

                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="mb-2 text-lg font-semibold md:text-xl">Búsqueda clara y rápida</h3>
                        <p class="text-gray-500">Nuestros filtros de búsqueda de anuncios están diseñados para hacer tu
                            experiencia más sencilla.</p>
                    </div>
                </div>
                <!-- feature - end -->

                <!-- feature - start -->
                <div class="flex divide-x rounded-lg border bg-gray-50">
                    <div class="flex items-center p-2 text-green-500 md:p-4">


                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" viewBox="0 0 640 512">
                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path fill="currentColor"
                                d="M272.2 64.6l-51.1 51.1c-15.3 4.2-29.5 11.9-41.5 22.5L153 161.9C142.8 171 129.5 176 115.8 176H96V304c20.4 .6 39.8 8.9 54.3 23.4l35.6 35.6 7 7 0 0L219.9 397c6.2 6.2 16.4 6.2 22.6 0c1.7-1.7 3-3.7 3.7-5.8c2.8-7.7 9.3-13.5 17.3-15.3s16.4 .6 22.2 6.5L296.5 393c11.6 11.6 30.4 11.6 41.9 0c5.4-5.4 8.3-12.3 8.6-19.4c.4-8.8 5.6-16.6 13.6-20.4s17.3-3 24.4 2.1c9.4 6.7 22.5 5.8 30.9-2.6c9.4-9.4 9.4-24.6 0-33.9L340.1 243l-35.8 33c-27.3 25.2-69.2 25.6-97 .9c-31.7-28.2-32.4-77.4-1.6-106.5l70.1-66.2C303.2 78.4 339.4 64 377.1 64c36.1 0 71 13.3 97.9 37.2L505.1 128H544h40 40c8.8 0 16 7.2 16 16V352c0 17.7-14.3 32-32 32H576c-11.8 0-22.2-6.4-27.7-16H463.4c-3.4 6.7-7.9 13.1-13.5 18.7c-17.1 17.1-40.8 23.8-63 20.1c-3.6 7.3-8.5 14.1-14.6 20.2c-27.3 27.3-70 30-100.4 8.1c-25.1 20.8-62.5 19.5-86-4.1L159 404l-7-7-35.6-35.6c-5.5-5.5-12.7-8.7-20.4-9.3C96 369.7 81.6 384 64 384H32c-17.7 0-32-14.3-32-32V144c0-8.8 7.2-16 16-16H56 96h19.8c2 0 3.9-.7 5.3-2l26.5-23.6C175.5 77.7 211.4 64 248.7 64H259c4.4 0 8.9 .2 13.2 .6zM544 320V176H496c-5.9 0-11.6-2.2-15.9-6.1l-36.9-32.8c-18.2-16.2-41.7-25.1-66.1-25.1c-25.4 0-49.8 9.7-68.3 27.1l-70.1 66.2c-10.3 9.8-10.1 26.3 .5 35.7c9.3 8.3 23.4 8.1 32.5-.3l71.9-66.4c9.7-9 24.9-8.4 33.9 1.4s8.4 24.9-1.4 33.9l-.8 .8 74.4 74.4c10 10 16.5 22.3 19.4 35.1H544zM64 336a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm528 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32z" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="mb-2 text-lg font-semibold md:text-xl">Una gran variedad de anunciantes</h3>
                        <p class="text-gray-500">Las mejores opciones de propiedades están disponibles en inmobiliarias
                            y dueños directos de propiedades.
                        </p>
                    </div>
                </div>
                <!-- feature - end -->

                <!-- feature - start -->
                <div class="flex divide-x rounded-lg border bg-gray-50">
                    <div class="flex items-center p-2 text-green-500 md:p-4">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" viewBox="0 0 384 512">
                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path fill="currentColor"
                                d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z" />
                        </svg>
                    </div>

                    <div class="p-4 md:p-6">
                        <h3 class="mb-2 text-lg font-semibold md:text-xl">Elección de Categorias</h3>
                        <p class="text-gray-500">Desde tu cuenta, podrás acceder de forma segura a los anuncios
                            seleccionados, tus favoritos, los anuncios que has publicado y más.</p>
                    </div>
                </div>
                <!-- feature - end -->





            </div>
        </div>
    </div>



    <!-- END FEATURED 2 -->


    <!-- LATEST POST -->
    <livewire:latest-posts />
    <!-- END LATEST POST -->

    <!-- SUPPORT CONTACT - start -->
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex flex-col overflow-hidden rounded-lg bg-gray-200 sm:flex-row md:h-80">
                <!-- image - start -->
                <div class="order-first h-48 w-full bg-gray-300 sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5">
                    <img src="{{ asset('img/help-center.jpg') }}" loading="lazy" alt="Photo by Andras Vas"
                        class="h-full w-full object-cover object-center" />
                </div>
                <!-- image - end -->

                <!-- content - start -->
                <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
                    <h2 class="mb-4 text-xl font-bold text-green-800 md:text-2xl lg:text-4xl">Centro de Ayuda</h2>

                    <p class="mb-8 max-w-md text-green-600">Si desea ponerse en contacto con nosotros, puede hacerlo a
                        través del formulario de contacto de nuestro sitio web. Estamos disponibles para responder
                        cualquier pregunta o inquietud que tenga.</p>

                    <div class="mt-auto">
                        <x-a-button href="{{ route('contact') }}" class="">
                            <i class="fa-solid fa-chalkboard-user mr-2"></i>
                            Contacto
                        </x-a-button>

                    </div>
                </div>
                <!-- content - end -->
            </div>
        </div>
    </div>
    <!-- SUPPORT CONTACT - end -->

    <!-- NESLETTER - start -->
    <livewire:suscriptions />
    <!-- newsletter - end -->
</div>
