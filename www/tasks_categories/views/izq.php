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
# Fecha de creacion del documento: 2024-09-27 08:09:04 
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
        <?php _menu_icon("top" , 'tasks_categories'); ?>
            <?php echo _t("Tasks categories"); ?>
    </a>
    <a href="index.php?c=tasks_categories" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "tasks_categories", "create")) { ?>
        <a href="index.php?c=tasks_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_categories"); ?>
        <?php echo _t("By tasks categories"); ?>
    </a>
    <?php
    foreach (tasks_categories_unique_from_col("father_id") as $father_id) {
        if ($father_id['father_id'] != "") {
            echo '<a href="index.php?c=tasks_categories&a=search&w=by_father_id&father_id=' . $father_id['father_id'] . '" class="list-group-item">' . $father_id['father_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_categories"); ?>
        <?php echo _t("By tasks categories"); ?>
    </a>
    <?php
    foreach (tasks_categories_unique_from_col("category") as $category) {
        if ($category['category'] != "") {
            echo '<a href="index.php?c=tasks_categories&a=search&w=by_category&category=' . $category['category'] . '" class="list-group-item">' . $category['category'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_categories"); ?>
        <?php echo _t("By tasks categories"); ?>
    </a>
    <?php
    foreach (tasks_categories_unique_from_col("color") as $color) {
        if ($color['color'] != "") {
            echo '<a href="index.php?c=tasks_categories&a=search&w=by_color&color=' . $color['color'] . '" class="list-group-item">' . $color['color'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_categories"); ?>
        <?php echo _t("By tasks categories"); ?>
    </a>
    <?php
    foreach (tasks_categories_unique_from_col("icon") as $icon) {
        if ($icon['icon'] != "") {
            echo '<a href="index.php?c=tasks_categories&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_categories"); ?>
        <?php echo _t("By tasks categories"); ?>
    </a>
    <?php
    foreach (tasks_categories_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=tasks_categories&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "tasks_categories"); ?>
        <?php echo _t("By tasks categories"); ?>
    </a>
    <?php
    foreach (tasks_categories_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=tasks_categories&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

