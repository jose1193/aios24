@auth
    @foreach ($collections as $item)
        @if ($isFavorite)
            <button wire:click="removeFromFavorites({{ $propertyId }})"
                class="alert rounded-md bg-white px-3 py-2 capitalize text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                {{ $item->user_id === auth()->id() ? 'disabled' : '' }}>
                <i class="fa fa-heart mr-2"></i> Eliminar Favorito
            </button>
        @else
            <button wire:click="addToFavorites({{ $propertyId }})"
                class="alert rounded-md bg-white px-3 py-2 capitalize text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                {{ $item->user_id === auth()->id() ? 'disabled' : '' }}>
                <i class="fa-regular fa-heart mr-2"></i> Guardar Favorito
            </button>
        @endif
    @endforeach

    @empty($collections)
        <script>
            // Script para mostrar la alerta al hacer clic
            document.querySelector('.alert').addEventListener('click', function() {
                alert('Debes iniciar sesión para agregar a favoritos');
            });
        </script>
    @endempty

@endauth
