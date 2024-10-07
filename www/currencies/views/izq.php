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
# Fecha de creacion del documento: 2024-09-04 08:09:19 
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
        <?php _menu_icon("top" , 'currencies'); ?>
            <?php echo _t("Currencies"); ?>
    </a>
    <a href="index.php?c=currencies" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "currencies", "create")) { ?>
        <a href="index.php?c=currencies&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("rate") as $rate) {
        if ($rate['rate'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_rate&rate=' . $rate['rate'] . '" class="list-group-item">' . $rate['rate'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("rate_silent") as $rate_silent) {
        if ($rate_silent['rate_silent'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_rate_silent&rate_silent=' . $rate_silent['rate_silent'] . '" class="list-group-item">' . $rate_silent['rate_silent'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("rate_id") as $rate_id) {
        if ($rate_id['rate_id'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_rate_id&rate_id=' . $rate_id['rate_id'] . '" class="list-group-item">' . $rate_id['rate_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("accuracy") as $accuracy) {
        if ($accuracy['accuracy'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_accuracy&accuracy=' . $accuracy['accuracy'] . '" class="list-group-item">' . $accuracy['accuracy'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("rounding") as $rounding) {
        if ($rounding['rounding'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_rounding&rounding=' . $rounding['rounding'] . '" class="list-group-item">' . $rounding['rounding'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("active") as $active) {
        if ($active['active'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_active&active=' . $active['active'] . '" class="list-group-item">' . $active['active'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("company_id") as $company_id) {
        if ($company_id['company_id'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_company_id&company_id=' . $company_id['company_id'] . '" class="list-group-item">' . $company_id['company_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("base") as $base) {
        if ($base['base'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_base&base=' . $base['base'] . '" class="list-group-item">' . $base['base'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("position") as $position) {
        if ($position['position'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_position&position=' . $position['position'] . '" class="list-group-item">' . $position['position'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "currencies"); ?>
        <?php echo _t("By currencies"); ?>
    </a>
    <?php
    foreach (currencies_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=currencies&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

