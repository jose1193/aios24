<form class="my-8 " action="{{ route('search.filters') }}" method="GET">


    <div class="fondo border border-gray-300 p-6 grid grid-cols-1 gap-6  shadow-lg rounded-lg text-base">
        <h1 class="md:text-base lg:text-2xl  text-white font-semibold text-center">Descubre tu nuevo hogar en un solo
            lugar
        </h1>

        <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3 sm:w-1/4">
                <div class="mb-7">
                    <select name="transactionTypes"
                        class="bg-gray-50 border pl-2 border-green-200
                       text-gray-900 text-md  rounded-lg  block w-full p-3  ">

                        @foreach ($transactions as $transaction)
                            <option value="{{ $transaction->id }}">{{ $transaction->transaction_description }}
                            </option>
                        @endforeach
                    </select>
                    @error('transactionTypes')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="w-full px-3 sm:w-1/4">
                <div class="mb-7">
                    <select name="propertyTypes"
                        class="bg-gray-50 border border-green-200 text-gray-900 text-md  rounded-lg  block w-full p-3  ">


                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->property_description }}</option>
                        @endforeach
                    </select>

                    @error('propertyTypes')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="w-full px-3 sm:w-1/2">

                <div class="mb-7">

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" placeholder="Ingresa Ciudad" id="city" name="city"
                            class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 "
                            required>

                        @error('city')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
        </div>


        <div class="-mt-5 flex justify-center">

            <button type="submit"
                class=" w-full sm:w-1/4 p-2 border  border-white bg-green-600  transition duration-500 ease-in-out 
                 hover:bg-green-700 text-white text-base font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-city mr-1"></i> Buscar </button>


        </div>
    </div>



</form>

<style>
    .fondo {
        background-image: url("img/abstract3.jpg");
        background-size: cover;
        background-position: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

    }
</style>


<!-- GOOGLE MAP API KEY -->
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places"></script>
<script>
    $(document).ready(function() {
        $("#latitudeArea").addClass("d-none");
        $("#longtitudeArea").addClass("d-none");

        initializeCityAutocomplete();
    });

    function initializeCityAutocomplete() {
        var input = document.getElementById('city');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
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
        });
    }
</script>
<!-- END GOOGLE MAP API KEY -->
