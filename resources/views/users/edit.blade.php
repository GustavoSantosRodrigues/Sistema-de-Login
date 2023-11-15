<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Editando nivel de acesso do usuário: <b>{{ $user->name }} </b></p>

                    <p>Nivel Acesso: <b>{{ $user->level }}</b> </p>
                </div>


                <div class="px-5 py-3 text-gray-900">
                    <form action=" {{ route('users.update', $user->id) }}" method="POST">
                        @csrf 
                        {{-- @csrf um campo de token ao form --}}
                        {{-- @csrf contra ataques de falsificação de formulários --}}

                        @method('PUT')
                        {{-- @put especifica o método a ser usado na solitação --}}
                        {{-- @put permite enviar um form com metodo http diferente por ex: put, patch, delete em vez de POST --}}

                        <label for="level">Selecione o nivel</label> <br>
                        <select name="level" required class="py-1 px-8 rounded ">
                            <option value="" selected disabled>Selecione uma opção</option>
                            <option value="user"> Usuário</option>
                            <option value="admin">Administrador</option>
                        </select>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar alteração</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
