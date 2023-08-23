<x-app-layout>
    <x-slot name="header">
        <x-slot name="title">

            {{ __('Anuncio') }} - {{ $publishCode }}
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
                    <a href="{{ route('upload-images', ['publishCode' => $publishCode]) }}"
                        :active="request() - > routeIs('publish')" class="text-gray-600 hover:text-green-500">
                        {{ __('Cargar Imagenes') }} / {{ $publishCode }}
                    </a>


                </li>


            </ul>
        </div>

    </x-slot>

    <div class="py-12 mb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <h1 class="text-center text-fuchsia-700 font-semibold text-2xl mb-12">
                    {{ $remainingImages }} - Imagenes Disponibles

                </h1>

                <!-- IMAGES LOADER -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
                <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet"
                    type="text/css" />
                <style>
                    .dropzone {
                        width: 98%;
                        margin: 1%;
                        border: 2px dashed #16a34a !important;
                        border-radius: 5px;
                        transition: 0.2s;
                    }

                    .dropzone.dz-drag-hover {
                        border: 2px solid #16a34a !important;
                    }

                    .dz-message.needsclick img {
                        width: 50px;
                        display: block;
                        margin: auto;
                        opacity: 0.6;
                        margin-bottom: 15px;
                    }

                    span.plus {
                        display: none;
                    }

                    .dropzone.dz-started .dz-message {
                        display: inline-block !important;
                        width: 120px;
                        float: right;
                        border: 1px solid rgba(238, 238, 238, 0.36);
                        border-radius: 30px;
                        height: 120px;
                        margin: 16px;
                        transition: 0.2s;
                    }

                    .dropzone.dz-started .dz-message span.text {
                        display: none;
                    }

                    .dropzone.dz-started .dz-message span.plus {
                        display: block;
                        font-size: 70px;
                        color: #AAA;
                        line-height: 110px;
                    }
                </style>
                <div class="dropzone">
                    <div class="dz-message needsclick">
                        <span class="text font-semibold">
                            <img src="http://www.freeiconspng.com/uploads/------------------------------iconpngm--22.png"
                                alt="Camera" />
                            Drop files here or click to upload.
                        </span>
                        <span class="plus ">+</span>
                    </div>
                    <div class="dz-previews">
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        var publishCode = '{{ $publishCode }}';
                        var dz = new Dropzone(".dropzone", {
                            paramName: "images",
                            url: "/uploadFiles",
                            previewThumbnails: true,
                            sortable: true,
                            removeLinks: false,
                            acceptedFiles: 'image/*',
                            maxFiles: 10,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        });

                        var uploadedFileNames = [];
                        var orderCounter = 1;

                        dz.on("thumbnail", function(file, dataUrl) {
                            var fileName = file.name;
                            if (uploadedFileNames.includes(fileName)) {
                                dz.removeFile(file);
                                alert("Esta imagen ya ha sido cargada.");
                                return;
                            }

                            if (dz.files.length > dz.options.maxFiles) {
                                dz.removeFile(file);
                                alert("Límite máximo de archivos alcanzado.");
                                return;
                            }

                            uploadedFileNames.push(fileName);

                            var removeButton = document.createElement('button');
                            removeButton.className =
                                'dz-remove-btn absolute top-0 right-0 z-50 p-1 flex items-center bg-white rounded-bl focus:outline-none';
                            removeButton.innerHTML = '<i class="text-sm text-red-600 fa-solid fa-trash-can"></i>';
                            file.previewElement.appendChild(removeButton);

                            var viewButton = document.createElement('button');
                            viewButton.className =
                                'dz-view-btn absolute top-0 left-0 z-50 p-1 flex items-center bg-white rounded-br focus:outline-none';
                            viewButton.innerHTML = '<i class="text-sm fa-solid fa-eye"></i>' +
                                '<span class="dz-order-display ml-1">' + orderCounter + '</span>';
                            file.previewElement.appendChild(viewButton);

                            $(removeButton).on("click", function() {
                                dz.removeFile(file);
                            });

                            $(viewButton).on("click", function() {
                                // Agrega aquí el código para mostrar la imagen en un visor modal o alguna otra acción de visualización
                            });

                            $(file.previewElement).find("img").attr("src", dataUrl);

                            orderCounter++; // Incrementa el contador
                        });

                        dz.on("sending", function(file, xhr, formData) {
                            formData.append('orderDisplay', orderCounter); // Agrega el valor al formulario
                            formData.append('publishCode', publishCode); // Agrega el valor de la variable a enviar
                        });

                        dz.on("removedfile", function(file) {
                            var fileName = file.name;
                            var index = uploadedFileNames.indexOf(fileName);
                            if (index > -1) {
                                uploadedFileNames.splice(index, 1);
                            }
                        });
                    });
                </script>


                <!-- END IMAGES LOADER -->



            </div>
        </div>
    </div>
</x-app-layout>
