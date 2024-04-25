// Cadastrar novo produto
function registerNewProduct() {
    $('#registerNewProduct').submit(function(event) {
        event.preventDefault(); 
    
        $.ajax({
            url: "/products/store",
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

                    // Limpar os erros anteriores, se houver
                    $('.error-message').remove();
                    
                    // Exibir os novos erros na tela
                    $.each(errors, function(key, value) {
                        var errorDiv = $('<div class="error-message text-center text-white bg-red-600 border-double border-4">'+value[0]+'</div>');
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
        window.location.reload();
    });
}
