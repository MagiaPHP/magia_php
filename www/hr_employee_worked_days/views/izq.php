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
# Fecha de creacion del documento: 2024-09-21 12:09:42 
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
        <?php _menu_icon("top" , 'hr_employee_worked_days'); ?>
            <?php echo _t("Hr employee worked days"); ?>
    </a>
    <a href="index.php?c=hr_employee_worked_days" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_employee_worked_days", "create")) { ?>
        <a href="index.php?c=hr_employee_worked_days&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . $employee_id['employee_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("start_am") as $start_am) {
        if ($start_am['start_am'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_start_am&start_am=' . $start_am['start_am'] . '" class="list-group-item">' . $start_am['start_am'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("end_am") as $end_am) {
        if ($end_am['end_am'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_end_am&end_am=' . $end_am['end_am'] . '" class="list-group-item">' . $end_am['end_am'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("lunch") as $lunch) {
        if ($lunch['lunch'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_lunch&lunch=' . $lunch['lunch'] . '" class="list-group-item">' . $lunch['lunch'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("start_pm") as $start_pm) {
        if ($start_pm['start_pm'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_start_pm&start_pm=' . $start_pm['start_pm'] . '" class="list-group-item">' . $start_pm['start_pm'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("end_pm") as $end_pm) {
        if ($end_pm['end_pm'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_end_pm&end_pm=' . $end_pm['end_pm'] . '" class="list-group-item">' . $end_pm['end_pm'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("total_hours") as $total_hours) {
        if ($total_hours['total_hours'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_total_hours&total_hours=' . $total_hours['total_hours'] . '" class="list-group-item">' . $total_hours['total_hours'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("project_id") as $project_id) {
        if ($project_id['project_id'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_project_id&project_id=' . $project_id['project_id'] . '" class="list-group-item">' . $project_id['project_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("notes") as $notes) {
        if ($notes['notes'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_notes&notes=' . $notes['notes'] . '" class="list-group-item">' . $notes['notes'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("year") as $year) {
        if ($year['year'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_year&year=' . $year['year'] . '" class="list-group-item">' . $year['year'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_worked_days"); ?>
        <?php echo _t("By hr employee worked days"); ?>
    </a>
    <?php
    foreach (hr_employee_worked_days_unique_from_col("month") as $month) {
        if ($month['month'] != "") {
            echo '<a href="index.php?c=hr_employee_worked_days&a=search&w=by_month&month=' . $month['month'] . '" class="list-group-item">' . $month['month'] . '</a>';
        }
    }
    ?>
</div>

