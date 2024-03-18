<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center mt-4 ml-2">
                    <form method="GET" action="{{ route('menus.create') }}">
                        <x-primary-button type="subit" class="ml-4">
                            @if(Auth::user()->es_dietista)
                                {{ __('Crear Menu') }}
                            @endif
                        </x-primary-button>
                    </form>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">

                            <th class="py-3 px-6 text-left">instrucciones especificas</th>
                            <th class="py-3 px-6 text-left">fecha</th>
                            <th></th>


                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">

                        @foreach ($menus as $menu)
                            <tr class="border-b border-gray-200">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$menu->instrucciones_especificas}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$menu->fecha}}</span>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
