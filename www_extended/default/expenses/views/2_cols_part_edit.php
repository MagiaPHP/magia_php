

<div class="shadow-container">
    <?php
    if ($_REQUEST) {
        foreach ($error as $key => $value) {
            message("info", "$value");
        }
    }
    ?>

    <?php
//        $items = expense_lines_list_by_expense_id_without_transport($id);
    $items = expenses_lines_list_by_expense_id_extended($id);
    ?>




    <?php
    if (permissions_has_permission($u_rol, 'config', "update")) {
        include "2_cols_modal_edit.php";
    }
    ?>




    <?php  include "2_cols_table_items.php"; ?>

    <script src="www/expenses/views/js/order_by.js"></script>

    <a name="comments"></a>

    <?php
    include "2_cols_part_comments.php";
    ?>

</div>
