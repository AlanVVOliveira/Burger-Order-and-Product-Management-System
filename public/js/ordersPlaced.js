// Exibição dos pedidos realizados
function ordersPlaced() {
    $(document).ready(function() {
        $.get("/orders", function(data) {
            var orders = data.orders;

            // adiciona +1 cada vez que um pedido é concluido
            quantityOfOrders += orders.length

            var ordersList = '';

            // Criar a lista de produtos
            orders.forEach(function(order) {

                // Formatando dados para exibir na tela
                order.created_at_formated =  moment(order.created_at).format('HH:mm:ss');
                order.bill_formated = order.bill.replace(".", ',')
                
                // Lista
                ordersList += '<tr  class="border-b size-11" id="'+order.id+'">';
                ordersList += '<td  class="px-12 border border-slate-300 ..." id="client_name">' + order.client_name + '</td>';
                ordersList += '<td  class="px-12 border border-slate-300 ..." id="client_order">' + 

                // Mapeando e exibindo os produtos do pedido
                order.products.map((product) => 'Lanche: ' + product.name + ' \ ' + 'Preço: ' + product.price).join(' ');
                
                + '</td>';
                ordersList += '<td  class="px-12  border border-slate-300 ..." id="bill">' + order.bill_formated + '</td>';
                ordersList += '<td  class="px-12  border border-slate-300 ..." id="created_at">' + order.created_at_formated + '</td>';
                ordersList += '<td  class="px-12  border border-slate-300 ..." id="is_active">pendente</td>';
                ordersList += '<td class="flex justify-center items-center"><button  id="'+ order.id +'" name="check-order-btn" class="check-order-btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-12 border border-blue-700 rounded">Entregar pedido</button></td>';
                ordersList += '<td class="flex justify-center items-center"><button  id="'+ order.id +'" name="cancel-order-btn" class="edit-order-btn bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-12 border border-blue-700 rounded">Cancelar pedido</button></td>';
                ordersList += '</tr>';
            });
            
            // Exibir a lista de pedidos na página pedidos
            $('#generated_orders').html(ordersList);
        });
    });
}