<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" value="1" name="tipo_usuario_id">

        <div class="mt-4">
            <x-input-label for="nuhsa" :value="__('NUHSA')" />
            <x-text-input id="nuhsa" class="block mt-1 w-full" type="text" name="nuhsa" :value="old('nuhsa') ? old('nuhsa') : 'AN'" required autofocus/>
            <x-input-error :messages="$errors->get('nuhsa')" class="mt-2" />
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autocomplete="apellidos" />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- Fecha nacimiento -->
        <div class="mt-4">
            <x-input-label for="fecha_nacimiento" :value="__('Fecha nacimiento')" />

            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full"
                     type="date"
                     name="fecha_nacimiento"
                     :value="old('fecha_nacimiento')"
                     required />
            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
        </div>

        <!-- Fecha contratacion -->
        <div class="mt-4">
            <x-input-label for="fecha_contratacion" :value="__('Fecha contratacion')" />

            <x-text-input id="fecha_contratacion" class="block mt-1 w-full"
                     type="date"
                     name="fecha_contratacion"
                     :value="old('fecha_contratacion')"
                     required />
            <x-input-error :messages="$errors->get('fecha_contratacion')" class="mt-2" />
        </div>

        <!-- DNI -->
        <div>
            <x-input-label for="dni" :value="__('DNI')" />
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autocomplete="dni" />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>

        <!-- Direccion -->
        <div>
            <x-input-label for="direccion" :value="__('Direccion')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autocomplete="direccion" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>



        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>



        <!-- Genero -->
        <div class="mt-4">
            <x-input-label for="genero" :value="__('Género')" />

            <x-select id="genero" name="genero" required>
                <option value="">{{__('Elige una opción')}}</option>
                <option value="masculino" @if (old('genero') == 'masculino') selected @endif>{{__('Masculino')}}</option>
                <option value="femenino" @if (old('genero') == 'femenino') selected @endif>{{__('Femenino')}}</option>
                <option value="otro" @if (old('genero') == 'otro') selected @endif>{{__('Otro')}}</option>
            </x-select>
        </div>



        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
