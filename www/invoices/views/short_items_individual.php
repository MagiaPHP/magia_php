<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _t("Items"); ?>
    </div>


</div>
<?php
if (invoice_lines_list_without_transport_by_invoice_id($id)) {
    echo '<table class="table table-striped">';
    include "short_tabla_items_edit.php";
    include "short_table_transport.php";
    include "short_part_tva.php";
    echo "</table>";
}
?>


<?php
// Esto crea el script necesario para la ejecucion
order_by_create_javascript_html('invoice_lines');
?>




