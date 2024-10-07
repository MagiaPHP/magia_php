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
# Fecha de creacion del documento: 2024-09-16 17:09:42 
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
        <?php _menu_icon("top" , 'veh_vehicles_fuel'); ?>
            <?php echo _t("Veh vehicles fuel"); ?>
    </a>
    <a href="index.php?c=veh_vehicles_fuel" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_vehicles_fuel", "create")) { ?>
        <a href="index.php?c=veh_vehicles_fuel&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("vehicle_id") as $vehicle_id) {
        if ($vehicle_id['vehicle_id'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_vehicle_id&vehicle_id=' . $vehicle_id['vehicle_id'] . '" class="list-group-item">' . $vehicle_id['vehicle_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("fuel_code") as $fuel_code) {
        if ($fuel_code['fuel_code'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_fuel_code&fuel_code=' . $fuel_code['fuel_code'] . '" class="list-group-item">' . $fuel_code['fuel_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("price") as $price) {
        if ($price['price'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_price&price=' . $price['price'] . '" class="list-group-item">' . $price['price'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("paid_by") as $paid_by) {
        if ($paid_by['paid_by'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_paid_by&paid_by=' . $paid_by['paid_by'] . '" class="list-group-item">' . $paid_by['paid_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("ref") as $ref) {
        if ($ref['ref'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_ref&ref=' . $ref['ref'] . '" class="list-group-item">' . $ref['ref'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("notes") as $notes) {
        if ($notes['notes'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_notes&notes=' . $notes['notes'] . '" class="list-group-item">' . $notes['notes'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("registred_by") as $registred_by) {
        if ($registred_by['registred_by'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_registred_by&registred_by=' . $registred_by['registred_by'] . '" class="list-group-item">' . $registred_by['registred_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("kl") as $kl) {
        if ($kl['kl'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_kl&kl=' . $kl['kl'] . '" class="list-group-item">' . $kl['kl'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles_fuel"); ?>
        <?php echo _t("By veh vehicles fuel"); ?>
    </a>
    <?php
    foreach (veh_vehicles_fuel_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_vehicles_fuel&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

