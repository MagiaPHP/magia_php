<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:12 
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
        <?php _menu_icon("top" , 'inv_periods'); ?>
            <?php echo _t("Inv_periods"); ?>
    </a>
    <a href="index.php?c=inv_periods" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "inv_periods", "create")) { ?>
        <a href="index.php?c=inv_periods&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_periods"); ?>
        <?php echo _t("By period"); ?>
    </a>
    <?php
    foreach (inv_periods_unique_from_col("period") as $period) {
        if ($period['period'] != "") {
            echo '<a href="index.php?c=inv_periods&a=search&w=by_period&period=' . $period['period'] . '" class="list-group-item">' . $period['period'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_periods"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (inv_periods_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=inv_periods&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_periods"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (inv_periods_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=inv_periods&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_periods"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (inv_periods_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=inv_periods&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

