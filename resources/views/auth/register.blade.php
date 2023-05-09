<x-guest-layout>
    <!-- FORM REGISTER -->
    <section class="bg-white dark:bg-gray-900">
        <div class="flex justify-center min-h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/5 " style="background-image: url('{{ asset('img/01.jpg') }}')">
            </div>

            <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
                <div class="w-full">
                    <x-logo />
                    <h1
                        class="text-2xl text-center font-semibold tracking-wider text-green-800 capitalize dark:text-white">
                        Obtenga su cuenta gratuita ahora
                    </h1>


                    <x-validation-errors class="mb-4" />

                    <form method="POST" class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2" autocomplete="off"
                        action="{{ route('register') }}">
                        @csrf

                        <div>
                            <label for="name"
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">
                                Nombre</label>
                            <input type="text" id="name" name="name" :value="old('name')" required
                                autofocus autocomplete="name" placeholder="Ingresa Nombre"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Apellido</label>
                            <input type="text" id="lastname" name="lastname" :value="old('lastname')" required
                                autofocus autocomplete="lastname" placeholder="Ingresa Apellido"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div>
                            <label class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">DNI</label>
                            <input type="text" id="dni" name="dni" :value="old('dni')" required
                                autofocus autocomplete="dni" placeholder="Documento de Identificación"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Teléfono</label>
                            <input type="text" id="phone" name="phone" :value="old('phone')" required
                                autofocus autocomplete="phone" placeholder="XXX-XX-XXXX-XXX"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Email</label>
                            <input type="email" name="email" id="email" :value="old('email')" required
                                autocomplete="username" placeholder="email@example.com"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border
                                 border-gray-200 rounded-md dark:placeholder-gray-600
                                  dark:bg-gray-900 dark:text-gray-300
                                   dark:border-gray-700 focus:border-green-400
                                    dark:focus:border-green-400 focus:ring-green-400 
                                    focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>


                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Dirección</label>
                            <input type="text" id="address" name="address" :value="old('address')" required
                                autofocus autocomplete="address" placeholder="Ingresa tu dirección"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Ciudad</label>
                            <input type="text" id="city" name="city" :value="old('city')" required
                                autofocus autocomplete="city" placeholder="Ingresa tu Ciudad"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>


                        <div>
                            <label
                                class="block mb-2 font-semibold text-sm text-gray-600 dark:text-gray-200">Provincia</label>

                            <input type="text" id="province" name="province" :value="old('province')" required
                                autofocus autocomplete="province" placeholder="Provincia"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />


                        </div>

                        <div>
                            <label
                                class="block mb-2 text-sm font-semibold text-gray-600 dark:text-gray-200">Zipcode</label>
                            <input type="text" id="zipcode" name="zipcode" :value="old('zipcode')" required
                                autofocus autocomplete="zipcode" placeholder="Ingresa Código Postal"
                                class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />

                        </div>

                        <div>
                            <div>
                                <label
                                    class="block mb-2  text-sm font-semibold text-gray-600 dark:text-gray-200">Password</label>
                                <input type="password" id="password" name="password" required
                                    autocomplete="new-password" placeholder="Ingresa tu password"
                                    class="block mb-7 w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>
                            <div>
                                <label
                                    class="block mb-2 text-sm font-semibold text-gray-600 dark:text-gray-200">Confirmar
                                    password</label>
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
                            class=" my-5 flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide
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
                </div>
            </div>
        </div>
    </section>
    <!-- END FORM REGISTER -->
</x-guest-layout>
