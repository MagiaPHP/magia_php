$(".row_position").sortable({
    
    delay: 150,
    
    stop: function () {
        var selectedData = [];
    
        var invoiceId = null;

        $('.row_position>tr').each(function () {
            selectedData.push($(this).attr("id"));
            if (invoiceId === null) {
                // Asumimos que el invoice_id es el mismo para todas las filas,
                // por lo que lo tomamos de la primera fila.
                invoiceId = $(this).data('invoice-id');
            }
        });

        // Llamamos a updateOrder con el array de IDs y el invoiceId.
        updateOrder(selectedData, invoiceId);
    }
});

function updateOrder(data, invoiceId) {
    $.ajax({
        url: "www/invoices/controllers/ok_row_position.php",
        type: 'post',
        data: { position: data, invoice_id: invoiceId },
        success: function (response) {
            var result = JSON.parse(response);
            if (result.status === 'success') {
                alert('Your change was successfully saved');
            } else {
                alert('Error: ' + result.message);
            }
        },
        error: function (xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
}

