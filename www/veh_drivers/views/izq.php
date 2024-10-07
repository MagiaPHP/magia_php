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
# Fecha de creacion del documento: 2024-09-16 17:09:56 
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
        <?php _menu_icon("top" , 'veh_drivers'); ?>
            <?php echo _t("Veh drivers"); ?>
    </a>
    <a href="index.php?c=veh_drivers" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_drivers", "create")) { ?>
        <a href="index.php?c=veh_drivers&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("country") as $country) {
        if ($country['country'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_country&country=' . $country['country'] . '" class="list-group-item">' . $country['country'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("license") as $license) {
        if ($license['license'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_license&license=' . $license['license'] . '" class="list-group-item">' . $license['license'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("number") as $number) {
        if ($number['number'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_number&number=' . $number['number'] . '" class="list-group-item">' . $number['number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("date_start") as $date_start) {
        if ($date_start['date_start'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("date_end") as $date_end) {
        if ($date_end['date_end'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("expired") as $expired) {
        if ($expired['expired'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_expired&expired=' . $expired['expired'] . '" class="list-group-item">' . $expired['expired'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_drivers"); ?>
        <?php echo _t("By veh drivers"); ?>
    </a>
    <?php
    foreach (veh_drivers_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_drivers&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

