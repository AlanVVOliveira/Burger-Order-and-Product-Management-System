<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('dashboard') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        Voltar a tela inicial
                    </a>
                    <br>
                    <br>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="text-red-600">DETALHAMENTO DE PRODUTOS ATIVOS</th>
                            </tr>
                            <br>
                            <tr class="border-b-2 border-black">
                                <th class="px-12">Nome</th>
                                <th class="px-12">Descrição</th>
                                <th class="px-12">Preço</th>
                                <th class="px-12">Data e Hora de Cadastro</th>
                                <th class="px-12">Data e Hora de Alteração</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activeProducts as $product)
                                <tr class="border-b-2 border-black">
                                    <td class="px-12">{{ $product->name }}</td>
                                    <td class="px-12">{{ $product->description }}</td>
                                    <td class="px-12">{{ str_replace(".", ",", $product->price) }}</td>
                                    <td class="px-12">{{ $product->created_at }}</td>
                                    <td class="px-12">{{ $product->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
