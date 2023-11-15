<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista De Usários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, {{ Auth::user()->name }}</p>
                    {{-- pega o nome de quem está logado --}}
                </div>

                <div class="p-6 text-gray-900">
                    <div class="p-3 bg-gray-100 rounded-lg my-5">
                        {{ $users->links() }}
                    </div>

                    <table class="table-auto w-full">
                        <thead class="text-left bg-gray-100">
                            <tr>
                                <th class="text-center">Nivel de Acesso</th>
                                <th class="p-4">Nome</th>
                                <th>E-mail</th>
                                <th>Data de Cadastro</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-red-500 transition-all duration-500 cursor-pointer">
                                   <td class="text-center">icone</td>
                                   <td class="p-4">{{ $user->name }}</td>
                                   <td>{{ $user->email }}</td>
                                   <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                                   <td>
                                    <a href="">Editar</a>
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
