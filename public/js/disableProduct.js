// Excluir Produto (Desabilitar produto)
function disableProducts() {
    $(document).on("click", ".remove-product", function() {
        var productId = $(this).attr('id');
        $("#confirmationModal").removeClass("hidden");

        // Ouvinte de evento para o botão de confirmação dentro do modal
        $("#confirmRemoveButton").on("click", function() {
            $.ajax({
                url: "/products/" + productId + "/destroy",
                method: "POST",
                data: {
                    _token: csrfToken 
                },
                success: function(response) {
                    // Remove a div do produto da tela
                    $('#' + productId).remove();
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    alert(errors);
                }
            });

            // Ocultar o modal de confirmação
            $("#confirmationModal").addClass("hidden");
        });

        // Ouvinte de evento para o botão de cancelamento dentro do modal
        $("#cancelRemoveButton").on("click", function() {
            // Ocultar o modal de confirmação
            $("#confirmationModal").addClass("hidden");
        });
    });
}