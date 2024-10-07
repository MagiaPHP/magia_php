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
# Fecha de creacion del documento: 2024-10-07 10:10:03 
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
        <?php _menu_icon("top" , 'yellow_pages'); ?>
            <?php echo _t("Yellow pages"); ?>
    </a>
    <a href="index.php?c=yellow_pages" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "yellow_pages", "create")) { ?>
        <a href="index.php?c=yellow_pages&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "yellow_pages"); ?>
        <?php echo _t("By yellow pages"); ?>
    </a>
    <?php
    foreach (yellow_pages_unique_from_col("label") as $label) {
        if ($label['label'] != "") {
            echo '<a href="index.php?c=yellow_pages&a=search&w=by_label&label=' . $label['label'] . '" class="list-group-item">' . $label['label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "yellow_pages"); ?>
        <?php echo _t("By yellow pages"); ?>
    </a>
    <?php
    foreach (yellow_pages_unique_from_col("url") as $url) {
        if ($url['url'] != "") {
            echo '<a href="index.php?c=yellow_pages&a=search&w=by_url&url=' . $url['url'] . '" class="list-group-item">' . $url['url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "yellow_pages"); ?>
        <?php echo _t("By yellow pages"); ?>
    </a>
    <?php
    foreach (yellow_pages_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=yellow_pages&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "yellow_pages"); ?>
        <?php echo _t("By yellow pages"); ?>
    </a>
    <?php
    foreach (yellow_pages_unique_from_col("category") as $category) {
        if ($category['category'] != "") {
            echo '<a href="index.php?c=yellow_pages&a=search&w=by_category&category=' . $category['category'] . '" class="list-group-item">' . $category['category'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "yellow_pages"); ?>
        <?php echo _t("By yellow pages"); ?>
    </a>
    <?php
    foreach (yellow_pages_unique_from_col("target") as $target) {
        if ($target['target'] != "") {
            echo '<a href="index.php?c=yellow_pages&a=search&w=by_target&target=' . $target['target'] . '" class="list-group-item">' . $target['target'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "yellow_pages"); ?>
        <?php echo _t("By yellow pages"); ?>
    </a>
    <?php
    foreach (yellow_pages_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=yellow_pages&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "yellow_pages"); ?>
        <?php echo _t("By yellow pages"); ?>
    </a>
    <?php
    foreach (yellow_pages_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=yellow_pages&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

