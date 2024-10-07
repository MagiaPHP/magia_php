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
# Fecha de creacion del documento: 2024-08-31 17:08:56 
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
        <?php _menu_icon("top" , 'magia_tables'); ?>
            <?php echo _t("Magia_tables"); ?>
    </a>
    <a href="index.php?c=magia_tables" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "magia_tables", "create")) { ?>
        <a href="index.php?c=magia_tables&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_tables"); ?>
        <?php echo _t("By label"); ?>
    </a>
    <?php
    foreach (magia_tables_unique_from_col("label") as $label) {
        if ($label['label'] != "") {
            echo '<a href="index.php?c=magia_tables&a=search&w=by_label&label=' . $label['label'] . '" class="list-group-item">' . $label['label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_tables"); ?>
        <?php echo _t("By controller"); ?>
    </a>
    <?php
    foreach (magia_tables_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=magia_tables&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_tables"); ?>
        <?php echo _t("By action"); ?>
    </a>
    <?php
    foreach (magia_tables_unique_from_col("action") as $action) {
        if ($action['action'] != "") {
            echo '<a href="index.php?c=magia_tables&a=search&w=by_action&action=' . $action['action'] . '" class="list-group-item">' . $action['action'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_tables"); ?>
        <?php echo _t("By name"); ?>
    </a>
    <?php
    foreach (magia_tables_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=magia_tables&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_tables"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (magia_tables_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=magia_tables&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_tables"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (magia_tables_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=magia_tables&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_tables"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (magia_tables_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=magia_tables&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

