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
# Fecha de creacion del documento: 2024-09-16 17:09:04 
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
        <?php _menu_icon("top" , 'veh_insurers'); ?>
            <?php echo _t("Veh insurers"); ?>
    </a>
    <a href="index.php?c=veh_insurers" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_insurers", "create")) { ?>
        <a href="index.php?c=veh_insurers&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_insurers"); ?>
        <?php echo _t("By veh insurers"); ?>
    </a>
    <?php
    foreach (veh_insurers_unique_from_col("insurer_id") as $insurer_id) {
        if ($insurer_id['insurer_id'] != "") {
            echo '<a href="index.php?c=veh_insurers&a=search&w=by_insurer_id&insurer_id=' . $insurer_id['insurer_id'] . '" class="list-group-item">' . $insurer_id['insurer_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_insurers"); ?>
        <?php echo _t("By veh insurers"); ?>
    </a>
    <?php
    foreach (veh_insurers_unique_from_col("insurer_code") as $insurer_code) {
        if ($insurer_code['insurer_code'] != "") {
            echo '<a href="index.php?c=veh_insurers&a=search&w=by_insurer_code&insurer_code=' . $insurer_code['insurer_code'] . '" class="list-group-item">' . $insurer_code['insurer_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_insurers"); ?>
        <?php echo _t("By veh insurers"); ?>
    </a>
    <?php
    foreach (veh_insurers_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_insurers&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_insurers"); ?>
        <?php echo _t("By veh insurers"); ?>
    </a>
    <?php
    foreach (veh_insurers_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_insurers&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

