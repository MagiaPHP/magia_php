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
# Fecha de creacion del documento: 2024-09-21 12:09:17 
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
        <?php _menu_icon("top" , 'hr_employee_family_dependents'); ?>
            <?php echo _t("Hr employee family dependents"); ?>
    </a>
    <a href="index.php?c=hr_employee_family_dependents" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_employee_family_dependents", "create")) { ?>
        <a href="index.php?c=hr_employee_family_dependents&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . $employee_id['employee_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("lastname") as $lastname) {
        if ($lastname['lastname'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_lastname&lastname=' . $lastname['lastname'] . '" class="list-group-item">' . $lastname['lastname'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("birthday") as $birthday) {
        if ($birthday['birthday'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_birthday&birthday=' . $birthday['birthday'] . '" class="list-group-item">' . $birthday['birthday'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("relation") as $relation) {
        if ($relation['relation'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_relation&relation=' . $relation['relation'] . '" class="list-group-item">' . $relation['relation'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("in_charge") as $in_charge) {
        if ($in_charge['in_charge'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_in_charge&in_charge=' . $in_charge['in_charge'] . '" class="list-group-item">' . $in_charge['in_charge'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("handicap") as $handicap) {
        if ($handicap['handicap'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_handicap&handicap=' . $handicap['handicap'] . '" class="list-group-item">' . $handicap['handicap'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("notes") as $notes) {
        if ($notes['notes'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_notes&notes=' . $notes['notes'] . '" class="list-group-item">' . $notes['notes'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_family_dependents"); ?>
        <?php echo _t("By hr employee family dependents"); ?>
    </a>
    <?php
    foreach (hr_employee_family_dependents_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_employee_family_dependents&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

