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
# Fecha de creacion del documento: 2024-09-04 14:09:33 
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
        <?php _menu_icon("top" , 'panels_lines'); ?>
            <?php echo _t("Panels lines"); ?>
    </a>
    <a href="index.php?c=panels_lines" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "panels_lines", "create")) { ?>
        <a href="index.php?c=panels_lines&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("panel_id") as $panel_id) {
        if ($panel_id['panel_id'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_panel_id&panel_id=' . $panel_id['panel_id'] . '" class="list-group-item">' . $panel_id['panel_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("icon") as $icon) {
        if ($icon['icon'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("label") as $label) {
        if ($label['label'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_label&label=' . $label['label'] . '" class="list-group-item">' . $label['label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("translate") as $translate) {
        if ($translate['translate'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_translate&translate=' . $translate['translate'] . '" class="list-group-item">' . $translate['translate'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("url") as $url) {
        if ($url['url'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_url&url=' . $url['url'] . '" class="list-group-item">' . $url['url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("badge") as $badge) {
        if ($badge['badge'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_badge&badge=' . $badge['badge'] . '" class="list-group-item">' . $badge['badge'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("action") as $action) {
        if ($action['action'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_action&action=' . $action['action'] . '" class="list-group-item">' . $action['action'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "panels_lines"); ?>
        <?php echo _t("By panels lines"); ?>
    </a>
    <?php
    foreach (panels_lines_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=panels_lines&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

