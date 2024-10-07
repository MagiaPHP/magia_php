<?php include view('hr', 'izq') ?>


<?php 
/**
                
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
        <?php _menu_icon("top" , 'hr_employee_money_advance'); ?>
            <?php echo _t("Hr_employee_money_advance"); ?>
    </a>
    <a href="index.php?c=hr_employee_money_advance" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_employee_money_advance", "create")) { ?>
        <a href="index.php?c=hr_employee_money_advance&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_money_advance"); ?>
        <?php echo _t("By employee_id"); ?>
    </a>
    <?php
    foreach (hr_employee_money_advance_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_employee_money_advance&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . $employee_id['employee_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_money_advance"); ?>
        <?php echo _t("By date"); ?>
    </a>
    <?php
    foreach (hr_employee_money_advance_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=hr_employee_money_advance&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_money_advance"); ?>
        <?php echo _t("By value"); ?>
    </a>
    <?php
    foreach (hr_employee_money_advance_unique_from_col("value") as $value) {
        if ($value['value'] != "") {
            echo '<a href="index.php?c=hr_employee_money_advance&a=search&w=by_value&value=' . $value['value'] . '" class="list-group-item">' . $value['value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_money_advance"); ?>
        <?php echo _t("By way"); ?>
    </a>
    <?php
    foreach (hr_employee_money_advance_unique_from_col("way") as $way) {
        if ($way['way'] != "") {
            echo '<a href="index.php?c=hr_employee_money_advance&a=search&w=by_way&way=' . $way['way'] . '" class="list-group-item">' . $way['way'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_money_advance"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (hr_employee_money_advance_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_employee_money_advance&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_money_advance"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (hr_employee_money_advance_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_employee_money_advance&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

*/ 