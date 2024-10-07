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
# Fecha de creacion del documento: 2024-09-16 17:09:09 
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
        <?php _menu_icon("top" , 'veh_maintenance'); ?>
            <?php echo _t("Veh maintenance"); ?>
    </a>
    <a href="index.php?c=veh_maintenance" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_maintenance", "create")) { ?>
        <a href="index.php?c=veh_maintenance&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("vehicle_id") as $vehicle_id) {
        if ($vehicle_id['vehicle_id'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_vehicle_id&vehicle_id=' . $vehicle_id['vehicle_id'] . '" class="list-group-item">' . $vehicle_id['vehicle_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("workshop_id") as $workshop_id) {
        if ($workshop_id['workshop_id'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_workshop_id&workshop_id=' . $workshop_id['workshop_id'] . '" class="list-group-item">' . $workshop_id['workshop_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("next_visit") as $next_visit) {
        if ($next_visit['next_visit'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_next_visit&next_visit=' . $next_visit['next_visit'] . '" class="list-group-item">' . $next_visit['next_visit'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("total") as $total) {
        if ($total['total'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("kl") as $kl) {
        if ($kl['kl'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_kl&kl=' . $kl['kl'] . '" class="list-group-item">' . $kl['kl'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("notes") as $notes) {
        if ($notes['notes'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_notes&notes=' . $notes['notes'] . '" class="list-group-item">' . $notes['notes'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_maintenance"); ?>
        <?php echo _t("By veh maintenance"); ?>
    </a>
    <?php
    foreach (veh_maintenance_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_maintenance&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

