<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'p-2 border w-1/4 rounded-md bg-green-700 
                             transition duration-500 ease-in-out hover:bg-green-500
                              text-white',
    ]) }}>
    {{ $slot }}
</button>
