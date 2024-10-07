
$(".row_position").sortable({
    delay: 150,
    stop: function () {
        var selectedData = new Array();
        $('.row_position>tr').each(function () {
            selectedData.push($(this).attr("id"));
        });
        updateOrder(selectedData);
    }
});

function updateOrder(data) {

    $.ajax({
        url: "www/budgets/controllers/ok_order_by.php",
        type: 'post',
        data: {position: data},
        success: function () {
            alert('your change successfully saved');
        }
    });
}
