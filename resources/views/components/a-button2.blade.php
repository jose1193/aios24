<a
    {{ $attributes->merge([
        'type' => 'href',
        'class' => 'inline-block rounded-lg bg-green-800
                                 px-8 py-3 text-center text-sm font-semibold
                                  text-white outline-none ring-indigo-300 duration-500 ease-in-out hover:bg-green-700 focus-visible:ring active:bg-gray-200 md:text-base',
    ]) }}>
    {{ $slot }}
</a>
