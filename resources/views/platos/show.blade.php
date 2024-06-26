<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('platos.index') }}">Platos</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li>
                    <a href="#" class="text-gray-500" aria-current="page">Ver plato</a>
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

                        <div class="mt-4">
                            <x-input-label for="nombre" :value="__('Nombre')" />

                            <x-text-input id="nombre" class="block mt-1 w-full"
                                     type="string"
                                     name="nombre"
                                     disabled
                                     :value="$plato->nombre"
                                     required />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="descripcion" :value="__('Descripcion')" />

                            <x-text-input id="descripcion" class="block mt-1 w-full"
                                         type="string"
                                         name="descripcion"
                                         disabled
                                         :value="$plato->descripcion"
                                         required />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="categoriaplato_id" :value="__('Categoría del plato')" />

                            <x-text-input id="categoriaplato_id" class="block mt-1 w-full"
                                         type="string"
                                         name="categoriaplato_id"
                                         disabled
                                         :value="$plato->categoriaplato->nombre"
                                         required />
                        </div>

                        

                        <div class="mt-4">
                            <x-input-label for="ingredientes" :value="__('Ingredientes')" />

                            <x-text-input id="ingredientes" class="block mt-1 w-full"
                                         type="string"
                                         name="ingredientes"
                                         disabled
                                         :value="$plato->ingredientes"
                                         required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="alergenos" :value="__('Alergenos')" />

                            <x-text-input id="alergenos" class="block mt-1 w-full"
                                         type="string"
                                         name="alergenos"
                                         disabled
                                         :value="$plato->alergenos"
                                         required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="grasas" :value="__('Grasas')" />

                            <x-text-input id="grasas" class="block mt-1 w-full"
                                         type="double"
                                         name="grasas"
                                         disabled
                                         :value="$plato->grasas"
                                         required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="carbohidratos" :value="__('Carbohidratos')" />

                            <x-text-input id="carbohidratos" class="block mt-1 w-full"
                                         type="double"
                                         name="carbohidratos"
                                         disabled
                                         :value="$plato->carbohidratos"
                                         required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="proteinas" :value="__('Proteinas')" />

                            <x-text-input id="proteinas" class="block mt-1 w-full"
                                         type="double"
                                         name="proteinas"
                                         disabled
                                         :value="$plato->proteinas"
                                         required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="fibra" :value="__('Fibra')" />

                            <x-text-input id="fibra" class="block mt-1 w-full"
                                         type="double"
                                         name="fibra"
                                         disabled
                                         :value="$plato->fibra"
                                         required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="calorias" :value="__('Calorias')" />

                            <x-text-input id="calorias" class="block mt-1 w-full"
                                         type="double"
                                         name="calorias"
                                         disabled
                                         :value="$plato->calorias"
                                         required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="azucares" :value="__('Azúcares')" />

                            <x-text-input id="azucares" class="block mt-1 w-full"
                                         type="double"
                                         name="azucares"
                                         disabled
                                         :value="$plato->azucares"
                                         required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="peso" :value="__('Peso')" />

                            <x-text-input id="peso" class="block mt-1 w-full"
                                         type="double"
                                         name="peso"
                                         disabled
                                         :value="$plato->peso"
                                         required />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-danger-button type="button">
                                <a href={{route('platos.index')}}>
                                    {{ __('Volver') }}
                                </a>
                            </x-danger-button>
                        </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
