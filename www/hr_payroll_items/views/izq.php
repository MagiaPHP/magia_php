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
# Fecha de creacion del documento: 2024-09-21 12:09:52 
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
        <?php _menu_icon("top" , 'hr_payroll_items'); ?>
            <?php echo _t("Hr payroll items"); ?>
    </a>
    <a href="index.php?c=hr_payroll_items" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_payroll_items", "create")) { ?>
        <a href="index.php?c=hr_payroll_items&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll_items"); ?>
        <?php echo _t("By hr payroll items"); ?>
    </a>
    <?php
    foreach (hr_payroll_items_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=hr_payroll_items&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll_items"); ?>
        <?php echo _t("By hr payroll items"); ?>
    </a>
    <?php
    foreach (hr_payroll_items_unique_from_col("in_out") as $in_out) {
        if ($in_out['in_out'] != "") {
            echo '<a href="index.php?c=hr_payroll_items&a=search&w=by_in_out&in_out=' . $in_out['in_out'] . '" class="list-group-item">' . $in_out['in_out'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll_items"); ?>
        <?php echo _t("By hr payroll items"); ?>
    </a>
    <?php
    foreach (hr_payroll_items_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=hr_payroll_items&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll_items"); ?>
        <?php echo _t("By hr payroll items"); ?>
    </a>
    <?php
    foreach (hr_payroll_items_unique_from_col("formula") as $formula) {
        if ($formula['formula'] != "") {
            echo '<a href="index.php?c=hr_payroll_items&a=search&w=by_formula&formula=' . $formula['formula'] . '" class="list-group-item">' . $formula['formula'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll_items"); ?>
        <?php echo _t("By hr payroll items"); ?>
    </a>
    <?php
    foreach (hr_payroll_items_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_payroll_items&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll_items"); ?>
        <?php echo _t("By hr payroll items"); ?>
    </a>
    <?php
    foreach (hr_payroll_items_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_payroll_items&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

