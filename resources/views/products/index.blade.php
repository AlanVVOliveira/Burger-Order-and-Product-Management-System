<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto">
                        <thead>
                            <tr class="border-b size-11">
                                <th class="px-12">Produto</th>
                                <th class="px-12">Descrição</th>
                                <th class="px-12">Preço</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="generated_products" name="generated_products">
                            <!-- Tabela de produtos gerada pelo JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação -->
    <div id="confirmationModal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded shadow-lg">
            <p class="mb-4">Tem certeza que deseja remover este produto?</p>
            <div class="flex justify-end">
                <button id="confirmRemoveButton" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mr-2 rounded">Confirmar</button>
                <button id="cancelRemoveButton" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</button>
            </div>
        </div>
    </div>
</x-app-layout>
