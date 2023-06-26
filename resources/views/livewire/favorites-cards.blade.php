@foreach ($collections as $item)
    @if ($item->id === $propertyId)
        @if ($isFavorite)
            <button wire:click="removeFromFavorites({{ $propertyId }})"
                class="alert flex items-center font-medium cursor-pointer"
                {{ $item->user_id === auth()->id() ? 'disabled' : '' }}>
                <i class="fa fa-heart text-xl text-green-800"></i>
            </button>
        @else
            <button wire:click="addToFavorites({{ $propertyId }})"
                class="alert flex items-center font-medium cursor-pointer"
                {{ $item->user_id === auth()->id() ? 'disabled' : '' }}>
                <i class="fa-regular fa-heart text-xl text-green-800"></i>
            </button>
        @endif
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
