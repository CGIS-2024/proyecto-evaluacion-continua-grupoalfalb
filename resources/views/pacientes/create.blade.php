<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('pacientes.index') }}">Pacientes</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li>
                    <a href="#" class="text-gray-500" aria-current="page">Crear paciente</a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Información del paciente
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Errores de validación en servidor -->
                    <x-input-error class="mb-4" :messages="$errors->all()" />
                    <form method="POST" action="{{ route('pacientes.store') }}">
                        @csrf
                        <div class="mt-4">
                                <x-input-label for="name" :value="__('Nombre')" />

                                <x-text-input id="name" class="block mt-1 w-full"
                                                type="string"
                                                name="name"
                                                required />
                        </div>
                        <div class="mt-4">
                                <x-input-label for="apellidos" :value="__('Apellidos')" />

                                <x-text-input id="apellidos" class="block mt-1 w-full"
                                                type="string"
                                                name="apellidos"
                                                required />
                        </div>

                        <div class="mt-4">
                                <x-input-label for="fecha_nacimiento" :value="__('Fecha nacimiento')" />

                                <x-text-input id="fecha_nacimiento" class="block mt-1 w-full"
                                                type="date"
                                                name="fecha_nacimiento"
                                                required />
                        </div>

                        <div class="mt-4">
                                <x-input-label for="dni" :value="__('DNI')" />

                                <x-text-input id="dni" class="block mt-1 w-full"
                                                type="string"
                                                name="dni"
                                                required />
                        </div>

                        <div class="mt-4">
                                <x-input-label for="direccion" :value="__('Dirección')" />

                                <x-text-input id="direccion" class="block mt-1 w-full"
                                                type="string"
                                                name="direccion"
                                                required />
                        </div>

                        <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />

                                <x-text-input id="email" class="block mt-1 w-full"
                                                type="email"
                                                name="email"
                                                required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Contraseña')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="genero" :value="__('Género')" />

                            <x-select id="genero" name="genero" required>
                                <option value="">{{__('Elige una opción')}}</option>
                                <option value="masculino" @if (old('genero') == 'masculino') selected @endif>{{__('Masculino')}}</option>
                                <option value="femenino" @if (old('genero') == 'femenino') selected @endif>{{__('Femenino')}}</option>
                                <option value="otro" @if (old('genero') == 'otro') selected @endif>{{__('Otro')}}</option>
                            </x-select>
                        </div>


                        

                        <div class="mt-4">
                            <x-input-label for="alergias_alimentarias" :value="__('Alergias alimentarias')" />

                            <x-text-input id="alergias_alimentarias" class="block mt-1 w-full"
                                     type="string"
                                     name="alergias_alimentarias"
                                     :value="old('alergias_alimentarias')"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="preferencias_alimentarias" :value="__('Preferencias alimentarias')" />

                            <x-text-input id="preferencias_alimentarias" class="block mt-1 w-full"
                                     type="String"
                                     name="preferencias_alimentarias"
                                     :value="old('preferencias_alimentarias')"
                                     required />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="motivo_hospitalizacion" :value="__('Motivo hospitalizacion')" />

                            <x-text-input id="motivo_hospitalizacion" class="block mt-1 w-full"
                                     type="string"
                                     name="motivo_hospitalizacion"
                                     :value="old('motivo_hospitalizacion')"
                                     required />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="nuhsa" :value="__('NUHSA')" />

                            <x-text-input id="nuhsa" class="block mt-1 w-full"
                                     type="integer"
                                     name="nuhsa"
                                     :value="old('nuhsa')"
                                     required />
                        </div>




                        <div class="flex items-center justify-end mt-4">
                            <x-danger-button type="button">
                                <a href={{route('pacientes.index')}}>
                                    {{ __('Cancelar') }}
                                </a>
                            </x-danger-button>
                            <x-primary-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
