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
# Fecha de creacion del documento: 2024-09-16 12:09:41 
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
        <?php _menu_icon("top" , 'budgets_categories'); ?>
            <?php echo _t("Budgets categories"); ?>
    </a>
    <a href="index.php?c=budgets_categories" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "budgets_categories", "create")) { ?>
        <a href="index.php?c=budgets_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "budgets_categories"); ?>
        <?php echo _t("By budgets categories"); ?>
    </a>
    <?php
    foreach (budgets_categories_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=budgets_categories&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "budgets_categories"); ?>
        <?php echo _t("By budgets categories"); ?>
    </a>
    <?php
    foreach (budgets_categories_unique_from_col("father_code") as $father_code) {
        if ($father_code['father_code'] != "") {
            echo '<a href="index.php?c=budgets_categories&a=search&w=by_father_code&father_code=' . $father_code['father_code'] . '" class="list-group-item">' . $father_code['father_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "budgets_categories"); ?>
        <?php echo _t("By budgets categories"); ?>
    </a>
    <?php
    foreach (budgets_categories_unique_from_col("category") as $category) {
        if ($category['category'] != "") {
            echo '<a href="index.php?c=budgets_categories&a=search&w=by_category&category=' . $category['category'] . '" class="list-group-item">' . $category['category'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "budgets_categories"); ?>
        <?php echo _t("By budgets categories"); ?>
    </a>
    <?php
    foreach (budgets_categories_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=budgets_categories&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "budgets_categories"); ?>
        <?php echo _t("By budgets categories"); ?>
    </a>
    <?php
    foreach (budgets_categories_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=budgets_categories&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "budgets_categories"); ?>
        <?php echo _t("By budgets categories"); ?>
    </a>
    <?php
    foreach (budgets_categories_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=budgets_categories&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

