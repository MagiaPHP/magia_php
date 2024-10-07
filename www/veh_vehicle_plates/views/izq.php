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
# Fecha de creacion del documento: 2024-09-16 17:09:32 
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
        <?php _menu_icon("top" , 'veh_vehicle_plates'); ?>
            <?php echo _t("Veh vehicle plates"); ?>
    </a>
    <a href="index.php?c=veh_vehicle_plates" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_vehicle_plates", "create")) { ?>
        <a href="index.php?c=veh_vehicle_plates&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_plates"); ?>
        <?php echo _t("By veh vehicle plates"); ?>
    </a>
    <?php
    foreach (veh_vehicle_plates_unique_from_col("vehicle_id") as $vehicle_id) {
        if ($vehicle_id['vehicle_id'] != "") {
            echo '<a href="index.php?c=veh_vehicle_plates&a=search&w=by_vehicle_id&vehicle_id=' . $vehicle_id['vehicle_id'] . '" class="list-group-item">' . $vehicle_id['vehicle_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_plates"); ?>
        <?php echo _t("By veh vehicle plates"); ?>
    </a>
    <?php
    foreach (veh_vehicle_plates_unique_from_col("plate") as $plate) {
        if ($plate['plate'] != "") {
            echo '<a href="index.php?c=veh_vehicle_plates&a=search&w=by_plate&plate=' . $plate['plate'] . '" class="list-group-item">' . $plate['plate'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_plates"); ?>
        <?php echo _t("By veh vehicle plates"); ?>
    </a>
    <?php
    foreach (veh_vehicle_plates_unique_from_col("date_start") as $date_start) {
        if ($date_start['date_start'] != "") {
            echo '<a href="index.php?c=veh_vehicle_plates&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_plates"); ?>
        <?php echo _t("By veh vehicle plates"); ?>
    </a>
    <?php
    foreach (veh_vehicle_plates_unique_from_col("date_end") as $date_end) {
        if ($date_end['date_end'] != "") {
            echo '<a href="index.php?c=veh_vehicle_plates&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_plates"); ?>
        <?php echo _t("By veh vehicle plates"); ?>
    </a>
    <?php
    foreach (veh_vehicle_plates_unique_from_col("old_plate") as $old_plate) {
        if ($old_plate['old_plate'] != "") {
            echo '<a href="index.php?c=veh_vehicle_plates&a=search&w=by_old_plate&old_plate=' . $old_plate['old_plate'] . '" class="list-group-item">' . $old_plate['old_plate'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_plates"); ?>
        <?php echo _t("By veh vehicle plates"); ?>
    </a>
    <?php
    foreach (veh_vehicle_plates_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=veh_vehicle_plates&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_plates"); ?>
        <?php echo _t("By veh vehicle plates"); ?>
    </a>
    <?php
    foreach (veh_vehicle_plates_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_vehicle_plates&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_plates"); ?>
        <?php echo _t("By veh vehicle plates"); ?>
    </a>
    <?php
    foreach (veh_vehicle_plates_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_vehicle_plates&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

