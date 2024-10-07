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
# Fecha de creacion del documento: 2024-09-04 08:09:28 
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
        <?php _menu_icon("top" , 'expenses_lines'); ?>
            <?php echo _t("Expenses lines"); ?>
    </a>
    <a href="index.php?c=expenses_lines" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "expenses_lines", "create")) { ?>
        <a href="index.php?c=expenses_lines&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("expense_id") as $expense_id) {
        if ($expense_id['expense_id'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_expense_id&expense_id=' . $expense_id['expense_id'] . '" class="list-group-item">' . $expense_id['expense_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("budget_id") as $budget_id) {
        if ($budget_id['budget_id'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_budget_id&budget_id=' . $budget_id['budget_id'] . '" class="list-group-item">' . $budget_id['budget_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("category_code") as $category_code) {
        if ($category_code['category_code'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_category_code&category_code=' . $category_code['category_code'] . '" class="list-group-item">' . $category_code['category_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("quantity") as $quantity) {
        if ($quantity['quantity'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_quantity&quantity=' . $quantity['quantity'] . '" class="list-group-item">' . $quantity['quantity'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("price") as $price) {
        if ($price['price'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_price&price=' . $price['price'] . '" class="list-group-item">' . $price['price'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("discounts") as $discounts) {
        if ($discounts['discounts'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_discounts&discounts=' . $discounts['discounts'] . '" class="list-group-item">' . $discounts['discounts'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("discounts_mode") as $discounts_mode) {
        if ($discounts_mode['discounts_mode'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_discounts_mode&discounts_mode=' . $discounts_mode['discounts_mode'] . '" class="list-group-item">' . $discounts_mode['discounts_mode'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("tax") as $tax) {
        if ($tax['tax'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_tax&tax=' . $tax['tax'] . '" class="list-group-item">' . $tax['tax'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_lines"); ?>
        <?php echo _t("By expenses lines"); ?>
    </a>
    <?php
    foreach (expenses_lines_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=expenses_lines&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

