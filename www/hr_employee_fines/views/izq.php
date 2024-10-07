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
# Fecha de creacion del documento: 2024-09-21 12:09:22 
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
        <?php _menu_icon("top" , 'hr_employee_fines'); ?>
            <?php echo _t("Hr employee fines"); ?>
    </a>
    <a href="index.php?c=hr_employee_fines" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_employee_fines", "create")) { ?>
        <a href="index.php?c=hr_employee_fines&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_fines"); ?>
        <?php echo _t("By hr employee fines"); ?>
    </a>
    <?php
    foreach (hr_employee_fines_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_employee_fines&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . $employee_id['employee_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_fines"); ?>
        <?php echo _t("By hr employee fines"); ?>
    </a>
    <?php
    foreach (hr_employee_fines_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=hr_employee_fines&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_fines"); ?>
        <?php echo _t("By hr employee fines"); ?>
    </a>
    <?php
    foreach (hr_employee_fines_unique_from_col("category_code") as $category_code) {
        if ($category_code['category_code'] != "") {
            echo '<a href="index.php?c=hr_employee_fines&a=search&w=by_category_code&category_code=' . $category_code['category_code'] . '" class="list-group-item">' . $category_code['category_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_fines"); ?>
        <?php echo _t("By hr employee fines"); ?>
    </a>
    <?php
    foreach (hr_employee_fines_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=hr_employee_fines&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_fines"); ?>
        <?php echo _t("By hr employee fines"); ?>
    </a>
    <?php
    foreach (hr_employee_fines_unique_from_col("value") as $value) {
        if ($value['value'] != "") {
            echo '<a href="index.php?c=hr_employee_fines&a=search&w=by_value&value=' . $value['value'] . '" class="list-group-item">' . $value['value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_fines"); ?>
        <?php echo _t("By hr employee fines"); ?>
    </a>
    <?php
    foreach (hr_employee_fines_unique_from_col("way") as $way) {
        if ($way['way'] != "") {
            echo '<a href="index.php?c=hr_employee_fines&a=search&w=by_way&way=' . $way['way'] . '" class="list-group-item">' . $way['way'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_fines"); ?>
        <?php echo _t("By hr employee fines"); ?>
    </a>
    <?php
    foreach (hr_employee_fines_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_employee_fines&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_fines"); ?>
        <?php echo _t("By hr employee fines"); ?>
    </a>
    <?php
    foreach (hr_employee_fines_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_employee_fines&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

