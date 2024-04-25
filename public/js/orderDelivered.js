// Entregar Pedido
function orderDelivered() {
    $(document).on("click", '[name="check-order-btn"]', function() {
        var orderId = $(this).attr('id');

        $("#confirmationModal1").removeClass("hidden");
        
        // Ouvinte de evento para o botão de confirmação dentro do modal
        $("#confirmRemoveButton1").on("click", function() {
            $.ajax({
                url: '/orders/' + orderId + '/update',
                method: "POST",
                data: {
                    is_active: $("#is_active").val(),
                    _token: csrfToken 
                },
                success: function(response) {
                    var response = response.message;
                    quantityOfOrders += 1
                    $("#successMessageText1").text(response);
                    $("#successMessage1").removeClass("hidden");

                    // Remover a linha da tabela após a exclusão bem-sucedida, se necessário
                    $('#' + orderId).remove();
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    alert(errors);
                }
            });

            // Ocultar o modal de confirmação
            $("#confirmationModal1").addClass("hidden");
        });

            // Ouvinte de evento para o botão de cancelamento dentro do modal
            $("#cancelRemoveButton1").on("click", function() {
                // Ocultar o modal de confirmação
                $("#confirmationModal1").addClass("hidden");
            });
    });
}

// Ouvinte de evento para fechar a mensagem de sucesso
$("#closeSuccessMessage1").on("click", function() {
    $("#successMessage1").addClass("hidden");
});