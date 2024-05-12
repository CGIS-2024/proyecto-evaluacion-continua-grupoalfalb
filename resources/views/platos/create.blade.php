<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('platos.index') }}">Platos</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li>
                    <a href="#" class="text-gray-500" aria-current="page">Crear plato</a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Información del plato
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Errores de validación en servidor -->
                    <x-input-error class="mb-4" :messages="$errors->all()" />
                    <form method="POST" action="{{ route('platos.store') }}">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="nombre" :value="__('Nombre')" />

                            <div class="flex items-center">
                                <x-text-input id="nombre" class="block mt-1 w-full"
                                             type="double"
                                             name="nombre"
                                             :value="old('nombre')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="descripcion" :value="__('Descripcion')" />

                            <div class="flex items-center">
                                <x-text-input id="descripcion" class="block mt-1 w-full"
                                             type="string"
                                             name="descripcion"
                                             :value="old('descripcion')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="alergenos" :value="__('Alergenos')" />

                            <div class="flex items-center">
                                <x-text-input id="alergenos" class="block mt-1 w-full"
                                             type="double"
                                             name="alergenos"
                                             :value="old('alergenos')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="grasas" :value="__('Grasas')" />

                            <div class="flex items-center">
                                <x-text-input id="grasas" class="block mt-1 w-full"
                                             type="double"
                                             name="grasas"
                                             :value="old('grasas')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="carbohidratos" :value="__('Carbohidratos')" />

                            <div class="flex items-center">
                                <x-text-input id="carbohidratos" class="block mt-1 w-full"
                                             type="double"
                                             name="carbohidratos"
                                             :value="old('carbohidratos')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="proteinas" :value="__('Proteinas')" />

                            <div class="flex items-center">
                                <x-text-input id="proteinas" class="block mt-1 w-full"
                                             type="double"
                                             name="proteinas"
                                             :value="old('proteinas')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="fibra" :value="__('Fibra')" />

                            <div class="flex items-center">
                                <x-text-input id="fibra" class="block mt-1 w-full"
                                             type="double"
                                             name="fibra"
                                             :value="old('fibra')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="calorias" :value="__('Calorias')" />

                            <div class="flex items-center">
                                <x-text-input id="calorias" class="block mt-1 w-full"
                                             type="double"
                                             name="calorias"
                                             :value="old('calorias')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="azucares" :value="__('Azucares')" />

                            <div class="flex items-center">
                                <x-text-input id="azucares" class="block mt-1 w-full"
                                             type="double"
                                             name="azucares"
                                             :value="old('azucares')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="peso" :value="__('Peso')" />

                            <div class="flex items-center">
                                <x-text-input id="peso" class="block mt-1 w-full"
                                             type="double"
                                             name="peso"
                                             :value="old('peso')"
                                             required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="ingredientes" :value="__('Ingredientes')" />

                            <div class="flex items-center">
                                <x-text-input id="ingredientes" class="block mt-1 w-full"
                                             type="string"
                                             name="ingredientes"
                                             :value="old('ingredientes')"
                                             required />
                            </div>
                        </div>




                        <div class="mt-4">
                            <x-input-label for="categoriaplato_id" :value="__('Categoria plato')" />


                            <x-select id="categoriaplato_id" name="categoriaplato_id" required>
                                <option value="">{{__('Elige un tipo de plato')}}</option>
                                @foreach ($categoriaplatos as $categoriaplato)
                                <option value="{{$categoriaplato->id}}" @if (old('categoriaplato_id') == $categoriaplato->id) selected @endif>{{$categoriaplato->nombre}}</option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-button type="button">
                                <a href={{route('platos.index')}}>
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
