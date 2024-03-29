<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- LastName -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="lastname" value="{{ __('Apellido') }}" />
            <x-input id="lastname" type="text" class="mt-1 block w-full" wire:model.defer="state.lastname"
                autocomplete="lastname" />
            <x-input-error for="lastname" class="mt-2" />
        </div>

        <!-- DNI -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="dni" value="{{ __('DNI') }}" />
            <x-input id="dni" type="text" class="mt-1 block w-full" wire:model.defer="state.dni"
                autocomplete="dni" />
            <x-input-error for="dni" class="mt-2" />
        </div>

        <!-- PHONE -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone" value="{{ __('Teléfono') }}" />
            <x-input id="phone" type="tel" class="mt-1 block w-full" wire:model.defer="state.phone" />
            <x-input-error for="phone" class="mt-2" />
            <div><span id="valid-msg" class="hide text-green-600">✓ Valid</span>
                <span id="error-msg" class="hide text-red-500 "></span>
            </div>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email"
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- ADDRESS -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Dirección') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address"
                autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>
        <!-- City -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('Ciudad') }}" />
            <x-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city"
                autocomplete="city" />
            <x-input-error for="city" class="mt-2" />
        </div>

        <!-- Province -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="province" value="{{ __('Provincia') }}" />
            <x-input id="province" type="text" class="mt-1 block w-full" wire:model.defer="state.province"
                autocomplete="province" />
            <x-input-error for="province" class="mt-2" />
        </div>

        <!-- Zip Code -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="zipcode" value="{{ __(' Código Postal') }}" />
            <x-input id="zipcode" type="text" class="mt-1 block w-full" wire:model.defer="state.zipcode"
                autocomplete="zipcode" />
            <x-input-error for="zipcode" class="mt-2" />
        </div>
    </x-slot>




    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
<!--   PHONE COUNTRY -->


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css" />

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
    const input = document.querySelector("#phone");
    const errorMsg = document.querySelector("#error-msg");
    const validMsg = document.querySelector("#valid-msg");
    // Aquí puedes especificar el código de país de España
    const defaultCountry = "es";
    // here, the index maps to the error code returned from getValidationError - see readme
    const errorMap = [
        "Número inválido",
        "Código de país inválido",
        "Número demasiado corto",
        "Número demasiado largo",
        "Número inválido"
    ];

    // Aquí, la opción initialCountry se establece en el valor de defaultCountry
    const iti = window.intlTelInput(input, {
        initialCountry: defaultCountry,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js?1684676252775"
    });

    const reset = () => {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };

    // on blur: validate
    input.addEventListener('blur', () => {
        reset();
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                validMsg.classList.remove("hide");
            } else {
                input.classList.add("error");
                const errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
            }
        }
    });

    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);
</script>

<style>
    .hide {
        display: none;
    }
</style>

<!-- END PHONE COUNTRY  -->
