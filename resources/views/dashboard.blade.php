<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 leading-tight">
            {{ __('Dashboard') }}
            <livewire:search-form />

        </h2>
    </x-slot>

    <x-hero />
    <x-welcome2 />


</x-app-layout>
