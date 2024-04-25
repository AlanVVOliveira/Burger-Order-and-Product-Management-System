// Botão que redireciona usuario para página de atualização de produto
function clickButtonUpdateProduct() {
    $(document).on("click", ".edit-product", function() {
        var productId = $(this).attr('id');
        window.location.href = "/products/" + productId + "/edit";
    });
}

// Atualizar produto
function updateProduct() {
    window.history.replaceState(null, null, window.location.href);

    $('form[name="updateProduct"]').submit(function(event) {
        event.preventDefault();
        var productId = $(this).attr('id');
        $.ajax({
            url: '/products/' + productId + '/update',
            method: "POST",
            data: {
                name: $("#name").val(),
                description: $("#description").val(),
                price: $("#price").val(),
                _token: csrfToken 
            },
            success: function(response) {
                var response = response.message;
                showMessage('Sucesso!', ' ' + response + ' ', 'bg-green-100', 'border-green-400', 'text-green-700');
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    // Limpa os erros anteriores, se houver
                    $('.error-message').remove();
                    
                    // Exibir os novos erros na tela
                    $.each(errors, function(key, value) {
                        var errorDiv = $('<div class="error-message">'+value[0]+'</div>');
                        $('#'+key).after(errorDiv);
                    });
                }
            }
        });
    });
}

// Função para exibir a mensagem
function showMessage(title, message, bgColor, borderColor, textColor) {
    // Criar a div da mensagem com as classes do Tailwind CSS
    var alertDiv = $('<div>').addClass('bg-opacity-75 fixed top-0 left-0 w-full h-full flex items-center justify-center');
    var alertContent = $('<div>').addClass('bg-white border-l-4 relative text-sm text-left '+ bgColor +' border '+ borderColor +' text-gray-700 px-4 py-3 rounded shadow-md max-w-xs');
    var alertTitle = $('<strong>').addClass('font-bold').text(title);
    var alertMessage = $('<span>').addClass('block sm:inline').text(message);
    var closeButton = $('<span>').addClass('absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer').html('&times;');

    // Adicionar elementos à div da mensagem
    alertContent.append(alertTitle).append(alertMessage).append(closeButton);
    alertDiv.append(alertContent);

    // Adicionar a div da mensagem ao corpo da página
    $('body').append(alertDiv);

    // Fechar a mensagem ao clicar no botão "Fechar"
    closeButton.on('click', function() {
        alertDiv.remove();
        window.location.href = "/products";
    });
}
