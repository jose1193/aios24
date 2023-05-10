<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

            <x-search-form />

        </h2>
    </x-slot>

    <x-hero />
    <x-welcome2 />


</x-app-layout>
