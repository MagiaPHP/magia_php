<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:26 
?>

                
<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php  include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'inv_types'); ?>
            <?php echo _t("Inv_types"); ?>
    </a>
    <a href="index.php?c=inv_types" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "inv_types", "create")) { ?>
        <a href="index.php?c=inv_types&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_types"); ?>
        <?php echo _t("By type"); ?>
    </a>
    <?php
    foreach (inv_types_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=inv_types&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_types"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (inv_types_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=inv_types&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_types"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (inv_types_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=inv_types&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_types"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (inv_types_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=inv_types&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

