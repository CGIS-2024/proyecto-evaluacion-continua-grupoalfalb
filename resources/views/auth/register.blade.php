<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" value="2" name="tipo_usuario_id">

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
            <x-input-error :messages="$errors->get('genero')" class="mt-2" />

        </div>



        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Alergia alimentaria -->
        <div>
            <x-input-label for="alergias_alimentarias" :value="__('Alergia alimentaria')" />
            <x-text-input id="alergias_alimentarias" class="block mt-1 w-full" type="text" name="alergias_alimentarias" :value="old('alergias_alimentarias')" required autocomplete="alergias_alimentarias" />
            <x-input-error :messages="$errors->get('alergias_alimentarias')" class="mt-2" />
        </div>


        <!-- Preferencias alimentarias -->
        <div>
            <x-input-label for="preferencias_alimentarias" :value="__('Preferencias alimentarias')" />
            <x-text-input id="preferencias_alimentarias" class="block mt-1 w-full" type="text" name="preferencias_alimentarias" :value="old('preferencias_alimentarias')" required autocomplete="preferencias_alimentarias" />
            <x-input-error :messages="$errors->get('preferencias_alimentarias')" class="mt-2" />
        </div>



        <!-- Motivo hospitalizacion -->
        <div>
            <x-input-label for="motivo_hospitalizacion" :value="__('Preferencias alimentarias')" />
            <x-text-input id="motivo_hospitalizacion" class="block mt-1 w-full" type="text" name="motivo_hospitalizacion" :value="old('motivo_hospitalizacion')" required autocomplete="motivo_hospitalizacion" />
            <x-input-error :messages="$errors->get('motivo_hospitalizacion')" class="mt-2" />
        </div>


        <!-- DIETISTA ID -->

        <div class="mt-4">
            <x-input-label for="dietista_id" :value="__('Dietista')" />

            @isset($dietista)
                <x-text-input id="dietista_id" class="block mt-1 w-full"
                         type="hidden"
                         name="dietista_id"
                         :value="$dietista->id"
                         required />
                <x-text-input class="block mt-1 w-full"
                         type="text"
                         disabled
                         value="{{$dietista->user->name}}"
                          />
            @else
            <x-select id="dietista_id" name="dietista_id" required>
                <option value="">{{__('Elige un dietista')}}</option>
                @foreach ($dietistas as $dietista)
                    <option value="{{$dietista->id}}" @if (old('dietista_id') == $dietista->id) selected @endif>{{$dietista->user->name}} </option>
                @endforeach
            </x-select>
            @endisset
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
