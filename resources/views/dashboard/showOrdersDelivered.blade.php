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
                                <th class="text-red-600">DETALHAMENTO DE PEDIDOS ENTREGUES</th>
                            </tr>
                            <br>
                            <tr class="border-b-2 border-black">
                                <th class="px-12">Nome do Cliente</th>
                                <th class="px-12">Pedido</th>
                                <th class="px-12">Total</th>
                                <th class="px-12">Data e Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="border-b-2 border-black">
                                    <td class="px-12">{{ $order->client_name }}</td>
                                    <td class="px-12">
                                        <ul>
                                        @foreach ($order->products as $product)
                                            <li>{{ $product->pivot->quantity }}x  "{{ $product->name }}" {{ str_replace(".", ",", $product->price) }}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-12">{{ str_replace(".", ",", $order->bill) }}</td>
                                    <td class="px-12">{{ $order->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
