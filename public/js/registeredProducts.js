// Exibição dos produtos cadastrados
function registeredProducts() {
    $(document).ready(function() {
        $.get("/products", function(data) {
            
            var products = data.products;
            var productsList = '';
    
            // Criar a lista de produtos
            products.forEach(function(product) {
    
                // Formatando dados para exibir na tela
                product.price_formated = product.price.replace(".", ',')
    
                productsList += '<tr class="border-b size-11" id="'+product.id+'">';
                productsList += '<td class="px-12 border border-slate-300 ..." id="name">' + product.name + '</td>';
                productsList += '<td class="px-12 border border-slate-300 ..." id="description">' + product.description + '</td>';
                productsList += '<td class="px-12 border border-slate-300 ..." id="price">' + product.price_formated + '</td>';
                productsList += '<td><button id="'+ product.id +'" class="edit-product bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-12 border border-blue-700 rounded">Editar</button></td>';
                productsList += '<td><button id="'+ product.id +'" class="remove-product bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-12 border border-blue-700 rounded">Remover</button></td>';
                productsList += '</tr>';
    
            });
    
            // Exibir a lista de pedidos na página pedidos
            $('#generated_products').html(productsList);
        });
    });
}