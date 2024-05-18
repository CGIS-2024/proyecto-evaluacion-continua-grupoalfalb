<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('menus.index') }}">Menus</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li>
                    <a href="#" class="text-gray-500" aria-current="page">Ver menú</a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Información del menú
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                        <div class="mt-4">
                            <x-input-label for="instrucciones_especificas" :value="__('Instrucciones especificas')" />

                            <x-text-input id="instrucciones_especificas" class="block mt-1 w-full"
                                     type="string"
                                     name="instrucciones_especificas"
                                     disabled
                                     :value="$menu->instrucciones_especificas"
                                     required />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="dietista_id" :value="__('Dietista')" />

                            <x-text-input id="dietista_id" class="block mt-1 w-full"
                                     type="string"
                                     name="dietista_id"
                                     disabled
                                     :value="$menu->dietista->user->name"
                                     required />
                        </div>
                        @if(Auth::user()->es_paciente)
                            <div class="mt-4">
                                <x-input-label for="fecha" :value="__('Fecha')" />
                                @if ($menu->pivot && $menu->pivot->fecha)
                                    <x-text-input id="fecha" class="block mt-1 w-full"
                                            type="date"
                                            name="fecha"
                                            disabled
                                            :value="$menu->pivot->fecha"
                                            required />
                                @else
                                    <p>No hay fecha asociada a este menú.</p>
                                @endif
                            </div>
                        @endif



                        <div class="flex items-center justify-end mt-4">
                            <x-danger-button type="button">
                                <a href={{route('menus.index')}}>
                                    {{ __('Volver') }}
                                </a>
                            </x-danger-button>
                        </div>
                </div>
            </div>
        </div>
    </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                        Platos
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Nombre</th>
                                <th class="py-3 px-6 text-left">Categoría plato</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($menu->platos as $plato)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{$plato->nombre}} </span>
                                        </div>
                                    </td>

                                    <td class="py-3 px-6 text-center whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{$plato->categoriaplato->nombre}} </span>
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
