@forelse ($collections as $item)
    <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
        <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
            <div class="relative pb-48 overflow-hidden">
                <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}">
                    <img class="absolute inset-0 h-full w-full object-cover" src="{{ Storage::url($item->image_path) }}"
                        alt=""></a>
                <span
                    class="absolute top-1 left-5 z-10 mt-3  inline-flex  px-2 py-1 leading-none bg-green-200 text-green-800 rounded-full font-semibold uppercase tracking-wide text-xs h-6">{{ $item->transaction_description }}
                </span>
                <span id="heart"
                    class="float-right z-10 mt-3 mr-4 inline-flex select-none animate-pulse border border-green-800 rounded-full bg-green-200 bg-opacity-70 px-2 py-1 text-xs font-semibold ">
                    @livewire('favorites-cards', ['propertyId' => $item->id]) </span>

            </div>
            <div class="p-4">
                <div class="flex justify-between mb-2">
                    <div class="mt-3 flex items-center">
                        <span class="font-bold text-xl">
                            {{ $item->price % 1 === 0 ? number_format($item->price, 0) : number_format($item->price, 2) }}</span>&nbsp;<span
                            class="text-sm font-semibold">€</span>
                    </div>
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

                <a href="{{ route('views', ['publishCode' => $item->publish_code]) }}">
                    <h2 class="mt-2 mb-2  font-bold text-green-600">
                        {{ Str::words($item->title, 6, '...') }}
                    </h2>
                </a>
                <p class="text-sm"> {{ Str::words($item->description, 7, '...') }}</p>

            </div>
            <div class="p-4 border-t border-b text-xs text-gray-700">
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

            <div class="flex justify-end mr-4 my-3 space-x-2">
                <a href="tel:{{ $item->phone }}"
                    class=" bg-fuchsia-700 transition duration-500 ease-in-out hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fa-solid fa-phone-volume"></i>
                </a>

                <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                    class="  bg-green-500 transition duration-500 ease-in-out hover:bg-green-400 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>


        </div>
    </div>
@empty
    <h5 class="text-xl text-red-600 text-center capitalize mx-auto font-semibold">no hay
        registros</h5>
@endforelse
