<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:23 
#################################################################################
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
        <?php _menu_icon("top" , 'expenses_frecuencies'); ?>
            <?php echo _t("Expenses frecuencies"); ?>
    </a>
    <a href="index.php?c=expenses_frecuencies" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "expenses_frecuencies", "create")) { ?>
        <a href="index.php?c=expenses_frecuencies&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuencies"); ?>
        <?php echo _t("By expenses frecuencies"); ?>
    </a>
    <?php
    foreach (expenses_frecuencies_unique_from_col("frecuency") as $frecuency) {
        if ($frecuency['frecuency'] != "") {
            echo '<a href="index.php?c=expenses_frecuencies&a=search&w=by_frecuency&frecuency=' . $frecuency['frecuency'] . '" class="list-group-item">' . $frecuency['frecuency'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuencies"); ?>
        <?php echo _t("By expenses frecuencies"); ?>
    </a>
    <?php
    foreach (expenses_frecuencies_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=expenses_frecuencies&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_frecuencies"); ?>
        <?php echo _t("By expenses frecuencies"); ?>
    </a>
    <?php
    foreach (expenses_frecuencies_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=expenses_frecuencies&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

