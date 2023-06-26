<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' => 'bg-green-600 
                                     transition duration-500 ease-in-out hover:bg-green-500 inline-flex items-center px-4 py-2 
                                                                border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                                                  active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring
                                                                   focus:ring-gray-300 disabled:opacity-25 transition',
    ]) }}>
    {{ $slot }}
</button>
