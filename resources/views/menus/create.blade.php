<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('menus.index') }}">Menús</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                </li>
                <li>
                    <a href="#" class="text-gray-500" aria-current="page">Crear menu</a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Información del menu
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Errores de validación en servidor -->
                    <x-input-error class="mb-4" :messages="$errors->all()" />
                    <form method="POST" action="{{ route('menus.store') }}">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="instrucciones_especificas" :value="__('instrucciones especificas')" />

                            <x-text-input id="instrucciones_especificas" class="block mt-1 w-full"
                                     type="string"
                                     name="instrucciones_especificas"
                                     :value="old('instrucciones_especificas')"
                                     required />
                        </div>
                        @if(Auth::user()->es_administrador)
                            <div class="mt-4">
                                <x-select id="dietista_id" name="dietista_id" required>
                                    <option value="">{{__('Elige un dietista')}}</option>
                                    @foreach ($dietistas as $dietista)
                                        <option value="{{$dietista->id}}" @if (old('dietista_id') == $dietista->id) selected @endif>{{$dietista->user->name}} </option>
                                    @endforeach
                                </x-select>
                            </div>
                        @endif

                        




                        <div class="flex items-center justify-end mt-4">
                            <x-danger-button type="button">
                                <a href={{route('menus.index')}}>
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
