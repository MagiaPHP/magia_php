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
# Fecha de creacion del documento: 2024-09-21 12:09:32 
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
        <?php _menu_icon("top" , 'hr_employee_nationality'); ?>
            <?php echo _t("Hr employee nationality"); ?>
    </a>
    <a href="index.php?c=hr_employee_nationality" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_employee_nationality", "create")) { ?>
        <a href="index.php?c=hr_employee_nationality&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_nationality"); ?>
        <?php echo _t("By hr employee nationality"); ?>
    </a>
    <?php
    foreach (hr_employee_nationality_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_employee_nationality&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . $employee_id['employee_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_nationality"); ?>
        <?php echo _t("By hr employee nationality"); ?>
    </a>
    <?php
    foreach (hr_employee_nationality_unique_from_col("nationality") as $nationality) {
        if ($nationality['nationality'] != "") {
            echo '<a href="index.php?c=hr_employee_nationality&a=search&w=by_nationality&nationality=' . $nationality['nationality'] . '" class="list-group-item">' . $nationality['nationality'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_nationality"); ?>
        <?php echo _t("By hr employee nationality"); ?>
    </a>
    <?php
    foreach (hr_employee_nationality_unique_from_col("principal") as $principal) {
        if ($principal['principal'] != "") {
            echo '<a href="index.php?c=hr_employee_nationality&a=search&w=by_principal&principal=' . $principal['principal'] . '" class="list-group-item">' . $principal['principal'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_nationality"); ?>
        <?php echo _t("By hr employee nationality"); ?>
    </a>
    <?php
    foreach (hr_employee_nationality_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_employee_nationality&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_nationality"); ?>
        <?php echo _t("By hr employee nationality"); ?>
    </a>
    <?php
    foreach (hr_employee_nationality_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_employee_nationality&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

