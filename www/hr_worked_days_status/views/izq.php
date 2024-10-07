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
# Fecha de creacion del documento: 2024-09-21 12:09:01 
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
        <?php _menu_icon("top" , 'hr_worked_days_status'); ?>
            <?php echo _t("Hr worked days status"); ?>
    </a>
    <a href="index.php?c=hr_worked_days_status" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_worked_days_status", "create")) { ?>
        <a href="index.php?c=hr_worked_days_status&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_worked_days_status"); ?>
        <?php echo _t("By hr worked days status"); ?>
    </a>
    <?php
    foreach (hr_worked_days_status_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=hr_worked_days_status&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_worked_days_status"); ?>
        <?php echo _t("By hr worked days status"); ?>
    </a>
    <?php
    foreach (hr_worked_days_status_unique_from_col("status_name") as $status_name) {
        if ($status_name['status_name'] != "") {
            echo '<a href="index.php?c=hr_worked_days_status&a=search&w=by_status_name&status_name=' . $status_name['status_name'] . '" class="list-group-item">' . $status_name['status_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_worked_days_status"); ?>
        <?php echo _t("By hr worked days status"); ?>
    </a>
    <?php
    foreach (hr_worked_days_status_unique_from_col("color") as $color) {
        if ($color['color'] != "") {
            echo '<a href="index.php?c=hr_worked_days_status&a=search&w=by_color&color=' . $color['color'] . '" class="list-group-item">' . $color['color'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_worked_days_status"); ?>
        <?php echo _t("By hr worked days status"); ?>
    </a>
    <?php
    foreach (hr_worked_days_status_unique_from_col("icon") as $icon) {
        if ($icon['icon'] != "") {
            echo '<a href="index.php?c=hr_worked_days_status&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_worked_days_status"); ?>
        <?php echo _t("By hr worked days status"); ?>
    </a>
    <?php
    foreach (hr_worked_days_status_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_worked_days_status&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_worked_days_status"); ?>
        <?php echo _t("By hr worked days status"); ?>
    </a>
    <?php
    foreach (hr_worked_days_status_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_worked_days_status&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

