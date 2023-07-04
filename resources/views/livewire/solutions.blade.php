 @auth
     <x-app-layout>
         <x-slot name="header">
             <x-slot name="title">
                 {{ __('Soluciones') }}
             </x-slot>
             <div class="bg-white p-4 flex items-center flex-wrap font-bold">
                 <ul class="flex items-center">
                     <li class="inline-flex items-center">
                         <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-500">
                             <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24" fill="#000000">
                                 <path d="M0 0h24v24H0V0z" fill="none" />
                                 <path
                                     d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                             </svg>
                         </a>

                         <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24">
                             <path d="M0 0h24v24H0V0z" fill="none" />
                             <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z" />
                         </svg>
                     </li>

                     <li class="inline-flex items-center">
                         <a href="{{ route('solutions') }}" class="text-gray-600 hover:text-green-500">
                             {{ __('Soluciones') }}
                         </a>


                     </li>


                 </ul>
             </div>
         </x-slot>

         <x-solutions-component />

     </x-app-layout>
 @endauth


 <!-- GUEST USER -->
 @guest
     @extends('layouts.guest2')
     <x-files-guests />
     <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
         <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
             <x-home-header />
         </div>
     </div>
     <div class="flex justify-center -mt-10">
         <div class="bg-white p-4 flex items-center flex-wrap font-bold">
             <nav class="flex" aria-label="Breadcrumb">
                 <ol class="inline-flex items-center space-x-1 md:space-x-3">
                     <li class="inline-flex items-center">
                         <a href="/"
                             class="inline-flex items-center text-base font-medium text-gray-700 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
                             <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                 </path>
                             </svg>
                             Home
                         </a>
                     </li>
                     <li>
                         <div class="flex items-center">
                             <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd"
                                     d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                     clip-rule="evenodd"></path>
                             </svg>
                             <a href="{{ route('solutions') }}"
                                 class="ml-1 text-base  text-green-700 hover:text-green-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                 Servicios
                             </a>
                         </div>
                     </li>
                 </ol>
             </nav>
         </div>
     </div>
     <x-solutions-component />

     <x-footer />
 @endguest
 <!-- END GUEST USER -->
