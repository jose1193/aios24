<x-guest-layout>
    <!-- FORM REGISTER -->
    <section class="bg-white dark:bg-gray-900">
        <div class="flex justify-center min-h-screen">
            <div class="hidden bg-cover lg:block lg:w-3/5 " style="background-image: url('{{ asset('img/01.jpg') }}')">

            </div>

            <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
                <div class="w-full">
                    <x-logo />
                    <h1
                        class="text-2xl text-center font-semibold tracking-wider text-green-800 capitalize dark:text-white">
                        Obtenga su cuenta gratuita ahora
                    </h1>


                    <x-validation-errors class="mb-4" />

                    <form method="POST" class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-1" autocomplete="off"
                        action="{{ route('register') }}">
                        @csrf

                        <div>
                            <label for="name"
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">
                                Nombre</label>
                            <input type="text" id="name" name="name" :value="old('name')" required
                                autofocus autocomplete="name" placeholder="Ingrese Nombre"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Apellido</label>
                            <input type="text" id="lastname" name="lastname" :value="old('lastname')" required
                                autofocus autocomplete="lastname" placeholder="Ingrese Apellido"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">DNI/Pasaporte</label>
                            <input type="text" id="dni" name="dni" :value="old('dni')" required
                                autofocus autocomplete="dni" placeholder="Documento de Identificación"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="md:w-1/2 lg:w-2/3">
                            <label
                                class="  block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Teléfono</label>

                            <input id="phone" type="tel" name="phone" :value="old('phone')" required
                                autofocus
                                class="w-[245%] block  px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md  focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />

                            <div><span id="valid-msg" class="hide text-green-600">✓ Valid</span>
                                <span id="error-msg" class="hide text-red-500 "></span>
                            </div>

                        </div>

                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Email</label>
                            <input type="email" name="email" id="email" :value="old('email')" required
                                autocomplete="username" placeholder="email@example.com"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border
                                 border-gray-200 rounded-md dark:placeholder-gray-600
                                   focus:border-green-400
                                    dark:focus:border-green-400 focus:ring-green-400 
                                    focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>


                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Dirección</label>
                            <input type="text" id="autocomplete" name="address" :value="old('address')" required
                                autofocus autocomplete="address" placeholder="Address/City/Location/"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />

                            <input type="hidden" id="latitude" name="latitude"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40">
                            <input type="hidden" name="longitude" id="longitude"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40">

                            <input type="hidden" readonly name="city" id="city"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                placeholder="Ciudad">
                        </div>


                        <div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-semibold text-gray-600 dark:text-gray-200">Password</label>
                                <input type="password" id="password" name="password" required
                                    autocomplete="new-password" placeholder="Ingresa tu contraseña"
                                    class="block mb-7 w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>



                            <div>
                                <label
                                    class="block mb-2 text-sm font-semibold text-gray-600 dark:text-gray-200">Confirmar
                                    Password</label>
                                <input type="password" id="password_confirmation" type="password"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirma tu password"
                                    class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('¿Ya está registrado?') }}
                            </a>


                        </div>
                        <button
                            class="  my-5 flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide
                         text-white capitalize  bg-green-600 rounded-md transition duration-500 ease-in-out hover:bg-green-700 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            <span> {{ __('Enviar') }} </span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif
                    </form>
                    <div class="relative flex items-center justify-center mt-5">
                        <span class="absolute inset-x-0 h-px bg-gray-300"></span>
                        <span class="relative bg-white px-4 text-sm text-gray-400">Sign Up With Social</span>

                    </div>
                    <a href="/google-auth/redirect"
                        class="flex items-center  justify-center gap-2 mt-5 rounded-lg border border-gray-300 bg-white px-8 py-3 text-center text-sm font-semibold text-gray-800 outline-none ring-gray-300 duration-500 ease-in-out hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:text-base">
                        <svg class="h-5 w-5 shrink-0" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23.7449 12.27C23.7449 11.48 23.6749 10.73 23.5549 10H12.2549V14.51H18.7249C18.4349 15.99 17.5849 17.24 16.3249 18.09V21.09H20.1849C22.4449 19 23.7449 15.92 23.7449 12.27Z"
                                fill="#4285F4" />
                            <path
                                d="M12.2549 24C15.4949 24 18.2049 22.92 20.1849 21.09L16.3249 18.09C15.2449 18.81 13.8749 19.25 12.2549 19.25C9.12492 19.25 6.47492 17.14 5.52492 14.29H1.54492V17.38C3.51492 21.3 7.56492 24 12.2549 24Z"
                                fill="#34A853" />
                            <path
                                d="M5.52488 14.29C5.27488 13.57 5.14488 12.8 5.14488 12C5.14488 11.2 5.28488 10.43 5.52488 9.71V6.62H1.54488C0.724882 8.24 0.254883 10.06 0.254883 12C0.254883 13.94 0.724882 15.76 1.54488 17.38L5.52488 14.29Z"
                                fill="#FBBC05" />
                            <path
                                d="M12.2549 4.75C14.0249 4.75 15.6049 5.36 16.8549 6.55L20.2749 3.13C18.2049 1.19 15.4949 0 12.2549 0C7.56492 0 3.51492 2.7 1.54492 6.62L5.52492 9.71C6.47492 6.86 9.12492 4.75 12.2549 4.75Z"
                                fill="#EA4335" />
                        </svg>

                        Continue with Google
                    </a>
                </div>
            </div>
        </div>
    </section>


    <script>
        const passwordInput = document.getElementById('password');

        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const uppercaseRegex = /[A-Z]/;
            const lowercaseRegex = /[a-z]/;
            const specialCharRegex = /[^A-Za-z0-9]/;

            const hasUppercase = uppercaseRegex.test(password);
            const hasLowercase = lowercaseRegex.test(password);
            const hasSpecialChar = specialCharRegex.test(password);

            if (hasUppercase && hasLowercase && hasSpecialChar) {
                passwordInput.setCustomValidity('');
            } else {
                passwordInput.setCustomValidity(
                    'La contraseña debe contener al menos una mayúscula, una minúscula y un carácter especial.');
            }
        });
    </script>
    <!--   PHONE COUNTRY -->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css" />

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#phone");
        const errorMsg = document.querySelector("#error-msg");
        const validMsg = document.querySelector("#valid-msg");
        // Aquí puedes especificar el código de país de España
        const defaultCountry = "es";
        // here, the index maps to the error code returned from getValidationError - see readme
        const errorMap = [
            "Número inválido",
            "Código de país inválido",
            "Número demasiado corto",
            "Número demasiado largo",
            "Número inválido"
        ];

        // Aquí, la opción initialCountry se establece en el valor de defaultCountry
        const iti = window.intlTelInput(input, {
            initialCountry: defaultCountry,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js?1684676252775"
        });

        const reset = () => {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };

        // on blur: validate
        input.addEventListener('blur', () => {
            reset();
            if (input.value.trim()) {
                if (iti.isValidNumber()) {
                    validMsg.classList.remove("hide");
                } else {
                    input.classList.add("error");
                    const errorCode = iti.getValidationError();
                    errorMsg.innerHTML = errorMap[errorCode];
                    errorMsg.classList.remove("hide");
                }
            }
        });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
    </script>

    <style>
        .hide {
            display: none;
        }
    </style>

    <!-- END PHONE COUNTRY  -->
    <!-- GOOGLE MAP API KEY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>
    <script>
        $(document).ready(function() {
            $("#latitudeArea").addClass("d-none");
            $("#longtitudeArea").addClass("d-none");
        });

        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());

                var addressComponents = place.address_components;
                var city = '';

                for (var i = 0; i < addressComponents.length; i++) {
                    var types = addressComponents[i].types;

                    if (types.includes('locality') || types.includes('administrative_area_level_2')) {
                        city = addressComponents[i].long_name;
                        break;
                    }
                }

                $('#city').val(city);

                $("#latitudeArea").removeClass("d-none");
                $("#longtitudeArea").removeClass("d-none");
            });
        }
    </script>
    <!-- END GOOGLE MAP API KEY -->
    <!-- END FORM REGISTER -->


</x-guest-layout>
