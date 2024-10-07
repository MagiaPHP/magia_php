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
# Fecha de creacion del documento: 2024-09-21 12:09:43 
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
        <?php _menu_icon("top" , 'hr_employee_worked_days_formule'); ?>
            <?php echo _t("Hr employee worked days formule"); ?>
    </a>
    <a href="index.php?c=hr_employee_worked_days_formule" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_employee_worked_days_formule", "create")) { ?>
        <a href="index.php?c=hr_employee_worked_days_formule&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . $employee_id['employee_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("month") as $month) {
        if ($month['month'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_month&month=' . $month['month'] . '" class="list-group-item">' . $month['month'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("year") as $year) {
        if ($year['year'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_year&year=' . $year['year'] . '" class="list-group-item">' . $year['year'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("column") as $column) {
        if ($column['column'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_column&column=' . $column['column'] . '" class="list-group-item">' . $column['column'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("value") as $value) {
        if ($value['value'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_value&value=' . $value['value'] . '" class="list-group-item">' . $value['value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("formule") as $formule) {
        if ($formule['formule'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_formule&formule=' . $formule['formule'] . '" class="list-group-item">' . $formule['formule'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("notes") as $notes) {
        if ($notes['notes'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_notes&notes=' . $notes['notes'] . '" class="list-group-item">' . $notes['notes'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days_formule"); ?>
        <?php echo _t("By hr employee worked days formule"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_formule_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days_formule&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

