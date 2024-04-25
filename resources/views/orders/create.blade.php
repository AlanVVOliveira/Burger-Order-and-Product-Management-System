<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div class="table" id="table" name="table"></div>  
                    <form id="orderForm">
                        <!-- Nome do cliente -->
                        <label for="client_name" class="block font-medium text-sm text-gray-900 dark:text-gray-300">Nome do cliente</label>
                        <input type="text" id="client_name" name="client_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <!-- Total do pedido -->
                        <label for="bill" class="block font-medium text-sm text-gray-900 dark:text-gray-300">Total</label>
                        <input type="number" id="bill" name="bill" step="0.01" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <table>
                            <thead>
                                <tr class="border-b size-11">
                                    <th class="px-12 border border-slate-300 ...">Quantidade</th>
                                    <th class="px-12 border border-slate-300 ...">Produto</th>
                                    <th class="px-12 border border-slate-300 ...">Valor</th>
                                </tr>
                            </thead>
                            <tbody id="generateOrder">
                                <!-- Tabela de produtos gerada pelo JavaScript -->
                            </tbody>
                        </table>
                        <br>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 
                        border border-transparent rounded-md font-semibold 
                        text-xs text-white dark:text-gray-800 uppercase tracking-widest 
                        hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white 
                        active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 
                        focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 
                        transition ease-in-out duration-150" style="margin-top: 1%">Enviar Pedido</button>
                    </form>
                    <br>
                    <div id="productList">
                        <!-- Inputs para os produtos (JavaScript) -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
