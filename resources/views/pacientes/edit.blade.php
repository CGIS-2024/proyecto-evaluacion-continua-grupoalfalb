<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('pacientes.index') }}">Pacientes</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/>
                    </svg>
                </li>
                <li>
                    <a href="#" class="text-gray-500" aria-current="page">Editar paciente</a>
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
                    <x-input-error class="mb-4" :messages="$errors->all()"/>
                    <form method="POST" action="{{ route('pacientes.update', $paciente->id) }}">
                        @csrf
                        @method('put')
                        @if(Auth::user()->es_administrador)
                            <div class="mt-4">
                                <x-input-label for="name" :value="__('Nombre')"/>

                                <x-text-input id="name" class="block mt-1 w-full"
                                          type="string"
                                          name="name"
                                          :value="$paciente->name"
                                          required/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="apellidos" :value="__('Apellidos')"/>

                                <x-text-input id="apellidos" class="block mt-1 w-full"
                                          type="string"
                                          name="apellidos"
                                          :value="$paciente->apellidos"
                                          required/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')"/>

                                <x-text-input id="fecha_nacimiento" class="block mt-1 w-full"
                                          type="string"
                                          name="fecha_nacimiento"
                                          :value="$paciente->fecha_nacimiento"
                                          required/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="dni" :value="__('DNI')"/>

                                <x-text-input id="dni" class="block mt-1 w-full"
                                          type="string"
                                          name="dni"
                                          :value="$paciente->dni"
                                          required/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="direccion" :value="__('Dirección')"/>

                                <x-text-input id="direccion" class="block mt-1 w-full"
                                          type="string"
                                          name="direccion"
                                          :value="$paciente->direccion"
                                          required/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')"/>

                                <x-text-input id="email" class="block mt-1 w-full"
                                          type="string"
                                          name="email"
                                          :value="$paciente->email"
                                          required/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Contraseña')"/>

                                <x-text-input id="password" class="block mt-1 w-full"
                                          type="string"
                                          name="password"
                                          :value="$paciente->password"
                                          required/>
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
                        @endif

                        <div class="mt-4">
                            <x-input-label for="alergias_alimentarias" :value="__('alergias_alimentarias')"/>

                            <x-text-input id="alergias_alimentarias" class="block mt-1 w-full"
                                          type="string"
                                          name="alergias_alimentarias"
                                          :value="$paciente->alergias_alimentarias"
                                          required/>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="preferencias_alimentarias" :value="__('preferencias_alimentarias')"/>

                            <x-text-input id="preferencias_alimentarias" class="block mt-1 w-full"
                                          type="string"
                                          name="preferencias_alimentarias"
                                          :value="$paciente->preferencias_alimentarias"
                                          required/>
                        </div>

                        @if(Auth::user()->es_administrador)
                            <div class="mt-4">
                                <x-input-label for="motivo_hospitalizacion" :value="__('motivo_hospitalizacion')"/>

                                <x-text-input id="motivo_hospitalizacion" class="block mt-1 w-full"
                                            type="string"
                                            name="motivo_hospitalizacion"
                                            :value="$paciente->motivo_hospitalizacion"
                                            required/>
                            </div>


                            <div class="mt-4">
                                <x-input-label for="nuhsa" :value="__('nuhsa')"/>

                                <x-text-input id="nuhsa" class="block mt-1 w-full"
                                              type="integer"
                                              name="nuhsa"
                                              :value="$paciente->nuhsa"
                                            required/>
                            </div>
                        @endif

                        <div class="mt-4">
                                <x-input-label for="dietista_id" :value="__('Dietista')" />


                                <x-select id="dietista_id" name="dietista_id" required>
                                    <option value="">{{__('Elige una opción')}}</option>
                                    @foreach ($dietistas as $dietista)
                                    <option value="{{$dietista->id}}" @if ($paciente->dietista_id == $dietista->id) selected @endif>{{$dietista->nombre}}</option>
                                    @endforeach
                                </x-select>
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Menús actuales
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Instrucciones especificas</th>
                            <th class="py-3 px-6 text-left">Fecha</th>
                            <th class="py-3 px-6 text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($paciente->menus as $menu)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span
                                            class="font-medium">{{$menu->instrucciones_especificas}}</span>
                                    </div>
                                </td>
                                
                                    <div class="flex item-center justify-center">

                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <form id="detach-form-{{$paciente->id}}-{{$menu->id}}" method="POST"
                                                  action="{{ route('pacientes.detachMenu', [$paciente->id, $menu->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <a class="cursor-pointer"
                                                   onclick="getElementById('detach-form-{{$paciente->id}}-{{$menu->id}}').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </a>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
