// "Excluir" Pedido (Desabilitar pedido)
function disableOrder() {
    $(document).on("click", '[name="cancel-order-btn"]', function() {
        var orderId = $(this).attr('id');

        $("#confirmationModal2").removeClass("hidden");

        // Ouvinte de evento para o botão de confirmação dentro do modal
        $("#confirmRemoveButton2").on("click", function() {
            $.ajax({
                url: '/orders/' + orderId + '/destroy',
                method: "POST",
                data: {
                    is_active: $("#is_active").val(),
                    _token: csrfToken 
                },
                success: function(response) {
                    var response = response.message;
                    $("#successMessageText2").text(response);
                    $("#successMessage2").removeClass("hidden");
                    
                    // Remove a div do pedido da tela
                    $('#' + orderId).remove();
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    alert(errors);
                }
            });

            // Ocultar o modal de confirmação
            $("#confirmationModal2").addClass("hidden");
        });

        // Ouvinte de evento para o botão de cancelamento dentro do modal
        $("#cancelRemoveButton2").on("click", function() {
            // Ocultar o modal de confirmação
            $("#confirmationModal2").addClass("hidden");
        });
    });
}

// Ouvinte de evento para fechar a mensagem de sucesso
$("#closeSuccessMessage2").on("click", function() {
    $("#successMessage2").addClass("hidden");
});