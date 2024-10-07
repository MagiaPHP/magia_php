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
# Fecha de creacion del documento: 2024-09-26 16:09:00 
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
        <?php _menu_icon("top" , 'hr_payroll'); ?>
            <?php echo _t("Hr payroll"); ?>
    </a>
    <a href="index.php?c=hr_payroll" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_payroll", "create")) { ?>
        <a href="index.php?c=hr_payroll&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . $employee_id['employee_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("date_entry") as $date_entry) {
        if ($date_entry['date_entry'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_date_entry&date_entry=' . $date_entry['date_entry'] . '" class="list-group-item">' . $date_entry['date_entry'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("address") as $address) {
        if ($address['address'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_address&address=' . $address['address'] . '" class="list-group-item">' . $address['address'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("fonction") as $fonction) {
        if ($fonction['fonction'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_fonction&fonction=' . $fonction['fonction'] . '" class="list-group-item">' . $fonction['fonction'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("salary_base") as $salary_base) {
        if ($salary_base['salary_base'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_salary_base&salary_base=' . $salary_base['salary_base'] . '" class="list-group-item">' . $salary_base['salary_base'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("civil_status") as $civil_status) {
        if ($civil_status['civil_status'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_civil_status&civil_status=' . $civil_status['civil_status'] . '" class="list-group-item">' . $civil_status['civil_status'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("tax_system") as $tax_system) {
        if ($tax_system['tax_system'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_tax_system&tax_system=' . $tax_system['tax_system'] . '" class="list-group-item">' . $tax_system['tax_system'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("date_start") as $date_start) {
        if ($date_start['date_start'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("date_end") as $date_end) {
        if ($date_end['date_end'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("value_round") as $value_round) {
        if ($value_round['value_round'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_value_round&value_round=' . $value_round['value_round'] . '" class="list-group-item">' . $value_round['value_round'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("to_pay") as $to_pay) {
        if ($to_pay['to_pay'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_to_pay&to_pay=' . $to_pay['to_pay'] . '" class="list-group-item">' . $to_pay['to_pay'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("account_number") as $account_number) {
        if ($account_number['account_number'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_account_number&account_number=' . $account_number['account_number'] . '" class="list-group-item">' . $account_number['account_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("notes") as $notes) {
        if ($notes['notes'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_notes&notes=' . $notes['notes'] . '" class="list-group-item">' . $notes['notes'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("extras") as $extras) {
        if ($extras['extras'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_extras&extras=' . $extras['extras'] . '" class="list-group-item">' . $extras['extras'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_payroll"); ?>
        <?php echo _t("By hr payroll"); ?>
    </a>
    <?php
    foreach (hr_payroll_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_payroll&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

