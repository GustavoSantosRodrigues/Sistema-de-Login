<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>
                  
                    <div class="flex flex-col">
                        <div>
                            <a href="{{ route('meus.clientes', Auth::user()->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Meus
                                clientes
                            </a>
                        </div>
                        <div class="my-5">
                            <a href="{{ route('client.edit', ['client' => $client->id] ) }}"
                                class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar
                            </a>
                        </div>
                        <div>
                            <a href=""
                                class="bg-red-600 hover:bg-red-300 text-white font-bold py-2 px-4 rounded">Deletar
                            </a>
                        </div>
                    </div>
                  
                </div>

                <div class="px-5 py-3 text-black">
                    <p><strong class="font-bold">Nome:</strong> {{ $client->name }}</p>
                    <p><strong class="font-bold">E-mail:</strong> {{ $client->email }} |
                        <strong>Tel:</strong>{{ $client->phone }}</p>
                    <p><strong class="font-bold">Empresa:</strong> {{ $client->empresa }}</p>
                    <p><strong class="font-bold">Empresa:</strong> {{ $client->phone_commercial }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
