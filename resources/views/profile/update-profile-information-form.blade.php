<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informacion de Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model.live="photo" x-ref="photo"
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

        <!-- Cedula -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="document" value="{{ __('Cedula') }}" />
            <x-input id="document" type="text" class="mt-1 block w-full" wire:model="state.document" required
                autocomplete="document" />
            <x-input-error for="document" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Last_Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="last_name" value="{{ __('Apellido') }}" />
            <x-input id="last_name" type="text" class="mt-1 block w-full" wire:model="state.last_name" required
                autocomplete="last_name" />
            <x-input-error for="last_name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Correo') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required
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

        <!-- Cellphone -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="cellphone" value="{{ __('Celular') }}" />
            <x-input id="cellphone" type="text" class="mt-1 block w-full" wire:model="state.cellphone" required
                autocomplete="cellphone" />
            <x-input-error for="cellphone" class="mt-2" />
        </div>

        <!-- address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Dirección') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address" required
                autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        <!-- birthday -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="birthday" value="{{ __('Fecha de Nacimiento') }}" />
            <x-input id="birthday" type="date" class="mt-1 block w-full" wire:model="state.birthday" required
                autocomplete="birthday" />
            <x-input-error for="birthday" class="mt-2" />
        </div>

        <!-- city -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('Ciudad') }}" />
            <x-input id="city" type="text" class="mt-1 block w-full" wire:model="state.city" required
                autocomplete="city" />
            <x-input-error for="city" class="mt-2" />
        </div>


        <!-- gender -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="gender" value="{{ __('Género') }}" />
            <x-select id="gender" class="mt-1 block w-full" input="state.gender" required>
                <option value="">Seleccionar</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </x-select>
            <x-input-error for="gender" class="mt-2" />
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
