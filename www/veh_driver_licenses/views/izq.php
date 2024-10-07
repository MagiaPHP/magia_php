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
# Fecha de creacion del documento: 2024-09-16 17:09:51 
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
        <?php _menu_icon("top" , 'veh_driver_licenses'); ?>
            <?php echo _t("Veh driver licenses"); ?>
    </a>
    <a href="index.php?c=veh_driver_licenses" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_driver_licenses", "create")) { ?>
        <a href="index.php?c=veh_driver_licenses&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_driver_licenses"); ?>
        <?php echo _t("By veh driver licenses"); ?>
    </a>
    <?php
    foreach (veh_driver_licenses_unique_from_col("category") as $category) {
        if ($category['category'] != "") {
            echo '<a href="index.php?c=veh_driver_licenses&a=search&w=by_category&category=' . $category['category'] . '" class="list-group-item">' . $category['category'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_driver_licenses"); ?>
        <?php echo _t("By veh driver licenses"); ?>
    </a>
    <?php
    foreach (veh_driver_licenses_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=veh_driver_licenses&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_driver_licenses"); ?>
        <?php echo _t("By veh driver licenses"); ?>
    </a>
    <?php
    foreach (veh_driver_licenses_unique_from_col("min_age") as $min_age) {
        if ($min_age['min_age'] != "") {
            echo '<a href="index.php?c=veh_driver_licenses&a=search&w=by_min_age&min_age=' . $min_age['min_age'] . '" class="list-group-item">' . $min_age['min_age'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_driver_licenses"); ?>
        <?php echo _t("By veh driver licenses"); ?>
    </a>
    <?php
    foreach (veh_driver_licenses_unique_from_col("max_weight") as $max_weight) {
        if ($max_weight['max_weight'] != "") {
            echo '<a href="index.php?c=veh_driver_licenses&a=search&w=by_max_weight&max_weight=' . $max_weight['max_weight'] . '" class="list-group-item">' . $max_weight['max_weight'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_driver_licenses"); ?>
        <?php echo _t("By veh driver licenses"); ?>
    </a>
    <?php
    foreach (veh_driver_licenses_unique_from_col("max_passengers") as $max_passengers) {
        if ($max_passengers['max_passengers'] != "") {
            echo '<a href="index.php?c=veh_driver_licenses&a=search&w=by_max_passengers&max_passengers=' . $max_passengers['max_passengers'] . '" class="list-group-item">' . $max_passengers['max_passengers'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_driver_licenses"); ?>
        <?php echo _t("By veh driver licenses"); ?>
    </a>
    <?php
    foreach (veh_driver_licenses_unique_from_col("notes") as $notes) {
        if ($notes['notes'] != "") {
            echo '<a href="index.php?c=veh_driver_licenses&a=search&w=by_notes&notes=' . $notes['notes'] . '" class="list-group-item">' . $notes['notes'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_driver_licenses"); ?>
        <?php echo _t("By veh driver licenses"); ?>
    </a>
    <?php
    foreach (veh_driver_licenses_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_driver_licenses&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_driver_licenses"); ?>
        <?php echo _t("By veh driver licenses"); ?>
    </a>
    <?php
    foreach (veh_driver_licenses_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_driver_licenses&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

