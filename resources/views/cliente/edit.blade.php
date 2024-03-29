<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                    @can('level')
                        <p class="mb-4">
                            <a href="{{ route('cliente.index') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lista de
                                clientes</a>
                        </p>
                    @endcan

                    <p class="mb-4">
                        <a href="{{ route('meus.clientes', Auth::user()->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Meus
                            clientes</a>
                    </p>

                    @if (session('msg'))
                        <p class="bg-blue-500 p-2 rounded text-center text-white my-5">{{ session('msg') }} </p>
                    @endif

                    <form action="{{ route('client.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <fieldset class="border-2 rounded p-6">
                            <legend class="w-auto text-lg">Preencha o formulário</legend>

                            <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>

                            <div class="bg-gray-100 p-4 roudend overflow-hidden mb-4">
                                <label for="name" id="name">Nome</label>
                                <input type="text" name="name" id="name" value="{{ $client->name }}"
                                    class="w-full rounded" required autofocus>
                            </div>

                            <div class="bg-gray-100 p-4 roudend overflow-hidden mb-4">
                                <label for="email" id="email">E-MAIL</label>
                                <input type="email" name="email" id="email" value="{{ $client->email }}"
                                    class="w-full rounded" required>
                            </div>

                            <div class="bg-gray-100 p-4 roudend overflow-hidden mb-4">
                                <label for="phone" id="phone">Telefone</label>
                                <input type="tel" name="phone" id="phone" value="{{ $client->phone }}"
                                    class="w-full rounded" required>
                            </div>

                            <div class="bg-gray-100 p-4 roudend overflow-hidden mb-4">
                                <label for="empresa" id="empresa">Empresa</label>
                                <input type="text" name="empresa" id="empresa" value="{{ $client->empresa }}"
                                    class="w-full rounded" required>
                            </div>

                            <div class="bg-gray-100 p-4 roudend overflow-hidden mb-4">
                                <label for="phone_commercial" id="phone_commercial">Telefone Comercial</label>
                                <input type="tel" name="phone_commercial" id="phone_commercial"
                                    class="w-full rounded" value="{{ $client->phone_commercial }}" required>
                            </div>

                            <div class="bg-gray-100 p-4 roudend overflow-hidden">
                                <input type="submit" value="Salvar Alterações"
                                    class="bg-blue-500 rounded text-white p-2 hover:bg-blue-400 cursor-pointer hover:text-black duration-500">
                               
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
