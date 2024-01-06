<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="mb-5">
                        <a href="{{ route('cliente.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voltar para página de cadastro</a>
                    </div>
                    <table class="table-auto w-full">
                        <thead class="text-left bg-gray-100">
                            <tr>
                                <th class="p-4">Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clients as $client)
                                <tr class="hover:bg-gray-100 transition-all duration-500 cursor-pointer">
                                    <td class="p-4">{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>   
                                    <td>
                                        <a href="">Detalhes</a>
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
