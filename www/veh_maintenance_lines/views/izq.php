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
# Fecha de creacion del documento: 2024-09-16 17:09:13 
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
        <?php _menu_icon("top" , 'veh_maintenance_lines'); ?>
            <?php echo _t("Veh maintenance lines"); ?>
    </a>
    <a href="index.php?c=veh_maintenance_lines" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_maintenance_lines", "create")) { ?>
        <a href="index.php?c=veh_maintenance_lines&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance_lines"); ?>
        <?php echo _t("By veh maintenance lines"); ?>
    </a>
    <?php
    foreach (veh_maintenance_lines_unique_from_col("maintenance_id") as $maintenance_id) {
        if ($maintenance_id['maintenance_id'] != "") {
            echo '<a href="index.php?c=veh_maintenance_lines&a=search&w=by_maintenance_id&maintenance_id=' . $maintenance_id['maintenance_id'] . '" class="list-group-item">' . $maintenance_id['maintenance_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance_lines"); ?>
        <?php echo _t("By veh maintenance lines"); ?>
    </a>
    <?php
    foreach (veh_maintenance_lines_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=veh_maintenance_lines&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance_lines"); ?>
        <?php echo _t("By veh maintenance lines"); ?>
    </a>
    <?php
    foreach (veh_maintenance_lines_unique_from_col("price") as $price) {
        if ($price['price'] != "") {
            echo '<a href="index.php?c=veh_maintenance_lines&a=search&w=by_price&price=' . $price['price'] . '" class="list-group-item">' . $price['price'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance_lines"); ?>
        <?php echo _t("By veh maintenance lines"); ?>
    </a>
    <?php
    foreach (veh_maintenance_lines_unique_from_col("quantity") as $quantity) {
        if ($quantity['quantity'] != "") {
            echo '<a href="index.php?c=veh_maintenance_lines&a=search&w=by_quantity&quantity=' . $quantity['quantity'] . '" class="list-group-item">' . $quantity['quantity'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance_lines"); ?>
        <?php echo _t("By veh maintenance lines"); ?>
    </a>
    <?php
    foreach (veh_maintenance_lines_unique_from_col("total") as $total) {
        if ($total['total'] != "") {
            echo '<a href="index.php?c=veh_maintenance_lines&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance_lines"); ?>
        <?php echo _t("By veh maintenance lines"); ?>
    </a>
    <?php
    foreach (veh_maintenance_lines_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_maintenance_lines&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance_lines"); ?>
        <?php echo _t("By veh maintenance lines"); ?>
    </a>
    <?php
    foreach (veh_maintenance_lines_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_maintenance_lines&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

