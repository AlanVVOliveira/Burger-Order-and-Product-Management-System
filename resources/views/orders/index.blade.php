<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto">
                        <thead>
                            <tr class="border-b size-11">
                                <th class="px-12">Cliente</th>
                                <th class="px-12">Pedido</th>
                                <th class="px-12">Total</th>
                                <th class="px-12">Horário do Pedido</th>
                                <th class="px-12">Status</th>
                            </tr>
                        </thead>
                        <tbody id="generated_orders" name="generated_orders">
                            {{-- return javascript --}}
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação de entrega de pedido-->
    <div id="confirmationModal1" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded shadow-lg">
            <p class="mb-4">Você deseja confirmar a entrega do pedido?</p>
            <div class="flex justify-end">
                <button id="confirmRemoveButton1" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mr-2 rounded">Confirmar</button>
                <button id="cancelRemoveButton1" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</button>
            </div>
        </div>
    </div>

    <!-- Mensagem de sucesso do Modal de confirmação de entrega de pedido-->
    <div id="successMessage1" class="hidden bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded shadow-md fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <strong class="font-bold">Sucesso!</strong>
        <span class="block sm:inline" id="successMessageText1"></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" id="closeSuccessMessage1">&times;</span>
    </div>

    <!-- Modal de Cancelamento de pedido -->
    <div id="confirmationModal2" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded shadow-lg">
            <p class="mb-4">Tem certeza que deseja cancelar o pedido?</p>
            <div class="flex justify-end">
                <button id="confirmRemoveButton2" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mr-2 rounded">Confirmar</button>
                <button id="cancelRemoveButton2" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</button>
            </div>
        </div>
    </div>

    <!-- Mensagem de sucesso do Modal de Cancelamento de pedido-->
    <div id="successMessage2" class="hidden bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded shadow-md fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <strong class="font-bold">Sucesso!</strong>
        <span class="block sm:inline" id="successMessageText2"></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" id="closeSuccessMessage2">&times;</span>
    </div>
</x-app-layout>
