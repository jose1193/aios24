<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="flex flex-col items-center rounded-lg bg-gray-100 p-4 sm:p-8">
            <div class="mb-4 sm:mb-8">
                <h2 class="text-center text-xl font-bold text-green-500 sm:text-2xl lg:text-3xl">Obtenga lo último
                    de nuestras actualizaciones</h2>
                <p class="text-center text-green-500">Suscríbete a nuestra newsletter</p>
            </div>

            <form class="mb-3 flex w-full max-w-md gap-2 sm:mb-5" id="form-suscriptions"
                action="{{ route('email.suscriptions') }}" autocomplete="off">
                <input type="email" placeholder="Email" required name="email_suscription"
                    class="bg-gray-white w-full flex-1 rounded border border-gray-300 px-3 py-2 text-gray-800 placeholder-gray-400 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                <x-button2 type="submit" id="submit-button">
                    Enviar
                </x-button2>

                @error('email_suscription')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </form>

            <p class="text-center text-xs text-gray-400">Al suscribirse a nuestro boletín de noticias, usted acepta
                nuestro <a href="{{ route('terms') }}"
                    class="underline transition duration-100 hover:text-green-500 ">Términos
                    de Servicios</a> y <a href="{{ route('privacy') }}"
                    class="underline transition duration-100 hover:text-green-500 ">Política de Privacidad
                </a>.</p>
        </div>
    </div>
</div>
<script>
    // Capturar el evento de envío del formulario
    document.getElementById('form-suscriptions').addEventListener('submit', function(e) {
        e.preventDefault(); // Evitar el envío del formulario normal

        // Obtener el botón de envío
        var submitButton = document.getElementById('submit-button');

        // Deshabilitar el botón y cambiar el texto a "Enviando"
        submitButton.disabled = true;
        submitButton.innerHTML = 'Enviando...';

        // Obtener los datos del formulario
        var formData = new FormData(this);

        // Enviar la solicitud AJAX
        axios.post(this.action, formData)
            .then(function(response) {
                // Obtener el mensaje de éxito del store
                var successMessage = '{{ session('success') }}';

                // Mostrar mensaje de éxito con SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Email Registrado',
                    text: successMessage,
                });

                // Restablecer el formulario
                document.getElementById('form-suscriptions').reset();

                // Habilitar el botón y cambiar el texto a "Enviar Mensaje"
                submitButton.disabled = false;
                submitButton.innerHTML = 'Enviar';
            })
            .catch(function(error) {
                // Obtener el mensaje de error del store
                var errorMessage = '{{ session('error') }}';

                // Mostrar mensaje de error con SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                });

                // Habilitar el botón y cambiar el texto a "Enviar "
                submitButton.disabled = false;
                submitButton.innerHTML = 'Enviar';
            });
    });
</script>



<!--INCLUDE ALERTS MESSAGES-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-message-success />
<!-- END INCLUDE ALERTS MESSAGES-->
