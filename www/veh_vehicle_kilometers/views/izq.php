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
# Fecha de creacion del documento: 2024-09-16 17:09:26 
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
        <?php _menu_icon("top" , 'veh_vehicle_kilometers'); ?>
            <?php echo _t("Veh vehicle kilometers"); ?>
    </a>
    <a href="index.php?c=veh_vehicle_kilometers" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_vehicle_kilometers", "create")) { ?>
        <a href="index.php?c=veh_vehicle_kilometers&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_kilometers"); ?>
        <?php echo _t("By veh vehicle kilometers"); ?>
    </a>
    <?php
    foreach (veh_vehicle_kilometers_unique_from_col("vehicle_id") as $vehicle_id) {
        if ($vehicle_id['vehicle_id'] != "") {
            echo '<a href="index.php?c=veh_vehicle_kilometers&a=search&w=by_vehicle_id&vehicle_id=' . $vehicle_id['vehicle_id'] . '" class="list-group-item">' . $vehicle_id['vehicle_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_kilometers"); ?>
        <?php echo _t("By veh vehicle kilometers"); ?>
    </a>
    <?php
    foreach (veh_vehicle_kilometers_unique_from_col("event_date") as $event_date) {
        if ($event_date['event_date'] != "") {
            echo '<a href="index.php?c=veh_vehicle_kilometers&a=search&w=by_event_date&event_date=' . $event_date['event_date'] . '" class="list-group-item">' . $event_date['event_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_kilometers"); ?>
        <?php echo _t("By veh vehicle kilometers"); ?>
    </a>
    <?php
    foreach (veh_vehicle_kilometers_unique_from_col("kl") as $kl) {
        if ($kl['kl'] != "") {
            echo '<a href="index.php?c=veh_vehicle_kilometers&a=search&w=by_kl&kl=' . $kl['kl'] . '" class="list-group-item">' . $kl['kl'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_kilometers"); ?>
        <?php echo _t("By veh vehicle kilometers"); ?>
    </a>
    <?php
    foreach (veh_vehicle_kilometers_unique_from_col("event_type") as $event_type) {
        if ($event_type['event_type'] != "") {
            echo '<a href="index.php?c=veh_vehicle_kilometers&a=search&w=by_event_type&event_type=' . $event_type['event_type'] . '" class="list-group-item">' . $event_type['event_type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_kilometers"); ?>
        <?php echo _t("By veh vehicle kilometers"); ?>
    </a>
    <?php
    foreach (veh_vehicle_kilometers_unique_from_col("event_id") as $event_id) {
        if ($event_id['event_id'] != "") {
            echo '<a href="index.php?c=veh_vehicle_kilometers&a=search&w=by_event_id&event_id=' . $event_id['event_id'] . '" class="list-group-item">' . $event_id['event_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_kilometers"); ?>
        <?php echo _t("By veh vehicle kilometers"); ?>
    </a>
    <?php
    foreach (veh_vehicle_kilometers_unique_from_col("created_at") as $created_at) {
        if ($created_at['created_at'] != "") {
            echo '<a href="index.php?c=veh_vehicle_kilometers&a=search&w=by_created_at&created_at=' . $created_at['created_at'] . '" class="list-group-item">' . $created_at['created_at'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_kilometers"); ?>
        <?php echo _t("By veh vehicle kilometers"); ?>
    </a>
    <?php
    foreach (veh_vehicle_kilometers_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_vehicle_kilometers&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicle_kilometers"); ?>
        <?php echo _t("By veh vehicle kilometers"); ?>
    </a>
    <?php
    foreach (veh_vehicle_kilometers_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_vehicle_kilometers&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

