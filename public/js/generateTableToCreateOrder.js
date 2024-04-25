// Tabela para criar pedido
function generateTableToCreateOrder() {
    $(document).ready(function() {
        $.get("/orders/create", function(data) {
            var products = data.products;
            var tagTable = '<table class="table-auto">';
            var tagThead = '<thead>';
            var tagTr = '<tr class="border-b size-11">';
            var tagThProducts = '<th class="px-12 border border-slate-300 ...">Produto</th>';
            var tagThDescription = '<th class="px-12 border border-slate-300 ...">Descrição</th>';
            var tagThPrice = '<th class="px-12 border border-slate-300 ...">Preço</th>';
            var tagThAdd = '<th class="px-12 border border-slate-300 ..."></th>';
            var tagThRemv = '<th class="px-12 border border-slate-300 ..."></th>';
            var tagTrEnd = '</tr>';
            var tagTheadEnd = '</thead>';
            var tagTbody = '<tbody>';
    
            var productList = tagTable + tagThead + tagTr + tagThProducts + tagThDescription + 
            tagThPrice + tagThAdd + tagThRemv + tagTrEnd + tagTheadEnd + tagTbody;

            // Criar a lista de produtos
            products.forEach(function(product) {
    
                // Formatando dados para exibir na tela
                product.price_formated = product.price.replace(".", ',')
    
                productList += '<tr class="border-b size-11" id="'+product.id+'">';
                productList += '<td class="px-12 border border-slate-300 ..." id="name">' + product.name + '</td>';
                productList += '<td class="px-12 border border-slate-300 ..." id="description">' + product.description + '</td>';
                productList += '<td class="px-12 border border-slate-300 ..." id="price">' + product.price_formated + '</td>';
                productList += '<td><button  id="'+ product.id +'" name="'+ product.name +'" value="'+ product.price +'" class="add-btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-12 border border-blue-700 rounded">+</button></td>';
                productList += '<td><button id="'+ product.id +'" name="'+ product.name +'" value="'+ product.price +'" class="remove-btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-12 border border-blue-700 rounded">-</button></td>';
                productList += '</tr>';
            });
            productList += '</tbody></table>';
    
            $('#productList').html(productList);
        });
    });

    // Botao de adicionar item ao pedido
    $(document).on("click", ".add-btn", function() {
        event.preventDefault(); 

        var productId = $(this).attr('id');
        var productName = $(this).attr('name');
        var productPrice = parseFloat($(this).attr('value'));

        // Verificar se o produto já está no pedido
        var existingProduct = arrayOrder.find(function(item) {
            return item.id === productId;
        });

        // Se o produto já está no pedido, apenas incrementa a quantidade
        if (existingProduct) {
            existingProduct.quantity++;
        } else {
            // Se o produto não está no pedido, adiciona ao pedido com quantidade 1
            arrayOrder.push({id:productId, name:productName, price:productPrice, quantity: 1});
        }

        refreshOrderTable(); // Atualiza a tabela de pedidos
    });

    // Botao de remover item do pedido
    $(document).on("click", ".remove-btn", function() {
        event.preventDefault(); 

        var productId = $(this).attr('id');

        // Encontrar o índice do primeiro item com o mesmo id
        var indexToRemove = arrayOrder.findIndex(function(item) {
            return item.id === productId;
        });

        // Remover o item encontrado
        if (indexToRemove !== -1) {
            // Se a quantidade for maior que 1, apenas decrementa a quantidade
            if (arrayOrder[indexToRemove].quantity > 1) {
                arrayOrder[indexToRemove].quantity--;
            } else {
                // Se a quantidade for 1, remove o item do pedido
                arrayOrder.splice(indexToRemove, 1);
            }
            refreshOrderTable(); // Atualiza a tabela de pedidos
        }
    });

    // Função para atualizar a tabela de pedidos
    function refreshOrderTable() {
        var bill = 0;
        var exibir = '';
    
        arrayOrder.forEach(function(element) {
            var subtotal = element.quantity * element.price;
            bill += subtotal;
    
            exibir += '<tr class="border-b size-11">';
            exibir += '<td class="px-12 border border-slate-300 ...">' + element.quantity + '</td>';
            exibir += '<td class="px-12 border border-slate-300 ...">' + element.name + '</td>';
            exibir += '<td class="px-12 border border-slate-300 ...">' + element.price.toFixed(2).replace(".", ',') + '</td>';
            exibir += '</tr>';
        });
    
        // Exibir o total do pedido no input
        $('#bill').val(bill.toFixed(2));
        $('#generateOrder').html(exibir);
    }
}