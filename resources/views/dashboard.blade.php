<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto">
                        <thead>
                            <tr class="border-b size-11">
                                <th class="px-12">Total de Produtos Ativos</th>
                                <th class="px-12">Total de Produtos Inativos</th>
                                <th class="px-12">Total de Pedidos Entregues</th>
                                <th class="px-12">Total de Pedidos Cancelados</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="px-12">{{ $numberOfActiveProducts }}</th>
                                <th class="px-12">{{ $numberOfInactiveProducts }}</th>
                                <th class="px-12">{{ $numberOfOrdersDelivered }}</th>
                                <th class="px-12">{{ $numberOfCanceledOrders }}</th>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <th class="px-12">                                    
                                    <a href="{{ route('dashboard.showActiveProducts') }}" class="text-red-500">
                                        Detalhamento de Produtos Ativos
                                    </a>
                                </th>
                                <th class="px-12">
                                    <a href="{{ route('dashboard.showInactiveProducts') }}" class="text-red-500">
                                        Detalhamento de Produtos Inativos
                                    </a>
                                </th>
                                <th class="px-12">
                                    <a href="{{ route('dashboard.showOrdersDelivered') }}" class="text-red-500">
                                        Detalhamento de pedidos entregues
                                    </a>
                                </th>
                
                                <th class="px-12">
                                    <a href="{{ route('dashboard.showCanceledOrders') }}" class="text-red-500">
                                        Detalhamento de pedidos cancelados
                                    </a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
