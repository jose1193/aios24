  <form class="  my-8 mt-10  ">

      <div class="fondo border border-gray-300 p-6 grid grid-cols-1 gap-6  shadow-lg rounded-lg text-base">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pl-5">
              <div class="grid grid-cols-2 gap-2  p-2 rounded">

                  <select
                      class="bg-gray-50 border pl-2 border-green-200 text-gray-900 text-md  rounded-lg  block w-full p-2.5 ">
                      <option value="">Transacción</option>
                      <option value="Alquiler">Alquilar</option>
                      <option value="Venta">Comprar</option>
                      <option value="Compartir">Compartir</option>

                  </select>

                  <select
                      class="bg-gray-50 border border-green-200 text-gray-900 text-md  rounded-lg  block w-full p-2.5 ">
                      <option value="">Tipo</option>
                      <option value="Casas">Casas</option>
                      <option value="Pisos">Pisos</option>
                      <option value="Habitación">Habitación</option>
                      <option value="Terreno">Terreno</option>
                      <option value="Garajes">Garajes</option>
                      <option value="Oficinas">Oficinas</option>
                      <option value="Locales">Locales</option>
                      <option value="Terrenos">Terrenos</option>
                      <option value="Bodega/Galpón">Bodega / Galpón</option>
                      <option value="Depósito">Depósito</option>
                      <option value="Todos">Todos</option>

                  </select>

              </div>
              <div class="grid grid-cols-1 gap-1  p-2 rounded">


                  <!-- component -->
                  <div class='w-full mx-auto'>
                      <div
                          class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                          <div class="grid place-items-center h-full w-12 text-gray-300">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                              </svg>
                          </div>

                          <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text"
                              id="search" placeholder="Ingresa ubicaciones o Características..." />
                      </div>
                  </div>
              </div>
          </div>
          <div class="flex justify-center">
              <x-button2 type="submit">
                  <i class="fa-solid fa-city mr-1"></i> Buscar
              </x-button2>

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
