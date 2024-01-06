<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista De Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="my-5"> Olá, {{ Auth::user()->name }}</p>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="bg-gray-100 rounded p-2">
                        {{ $clients->links() }}
                    </div>

                    <table class="table-auto w-full my-4">
                        <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="p-2">Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Usuário</th>
                                <thead>

                                <tbody>
                                    @foreach ($clients as $cliente)
                                        <tr class="hovern:bg-gray-100 transition-all duration-500 cursor-pointer">
                                            <td class="p-2">{{ $cliente->name }}</td>
                                            <td>{{ $cliente->email }}</td>
                                            <td>{{ $cliente->phone }}</td>
                                            <td>{{ $cliente->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
