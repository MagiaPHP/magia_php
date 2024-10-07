<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
//        $items = budget_lines_list_by_budget_id_without_transport($id);
        $items = budgets_lines_list_by_budget_id_extended($id);
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">

                <?php
                if (modules_field_module('status', "docu")) {
                    echo docu_modal_bloc($c, $a, 'items');
                }
                ?>

                <a name="items_details"></a>
                <?php _t("items"); ?>                                                                                
                <?php
                if (permissions_has_permission($u_rol, 'config', "update")) {
                    include "2_cols_modal_edit.php";
                }
                ?>
            </div>
            <div class="panel-body">
                <?php include "2_cols_table_items.php"; ?>

                <script src="www/budgets/views/js/order_by.js"></script>

            </div>
        </div>

        <a name="comments"></a>
        <?php
        include "2_cols_part_comments.php";
        ?>
    </div>
</div>