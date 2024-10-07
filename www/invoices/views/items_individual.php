<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _t("Items"); ?>
    </div>
    <div class="panel-body">

        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'items_individual');
        }
        ?>



        <?php
        if (invoice_lines_list_without_transport_by_invoice_id($id)) {
            echo '<table class="table table-striped" >';
            include "tabla_items_edit.php";
            include "table_transport.php";
            include "part_tva.php";
            echo "</table>";
        }
        ?>


        <?php
        // Esto crea el script necesario para la ejecucion
//        order_by_create_javascript_html('invoice_lines');
        ?>


        <a name = "items_add"></a>
    </div>
</div>
