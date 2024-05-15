<x-app-layout>
    <x-slot name="header">
        <div class="bg-blue-900">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-white text-2xl font-semibold">
                    {{ __('Gestión del Comedor Hospitalario') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    {{ __("¡Bienvenido!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
