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
# Fecha de creacion del documento: 2024-09-04 08:09:04 
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
        <?php _menu_icon("top" , 'doc_sections'); ?>
            <?php echo _t("Doc sections"); ?>
    </a>
    <a href="index.php?c=doc_sections" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "doc_sections", "create")) { ?>
        <a href="index.php?c=doc_sections&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_sections"); ?>
        <?php echo _t("By doc sections"); ?>
    </a>
    <?php
    foreach (doc_sections_unique_from_col("section") as $section) {
        if ($section['section'] != "") {
            echo '<a href="index.php?c=doc_sections&a=search&w=by_section&section=' . $section['section'] . '" class="list-group-item">' . $section['section'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_sections"); ?>
        <?php echo _t("By doc sections"); ?>
    </a>
    <?php
    foreach (doc_sections_unique_from_col("open") as $open) {
        if ($open['open'] != "") {
            echo '<a href="index.php?c=doc_sections&a=search&w=by_open&open=' . $open['open'] . '" class="list-group-item">' . $open['open'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_sections"); ?>
        <?php echo _t("By doc sections"); ?>
    </a>
    <?php
    foreach (doc_sections_unique_from_col("items") as $items) {
        if ($items['items'] != "") {
            echo '<a href="index.php?c=doc_sections&a=search&w=by_items&items=' . $items['items'] . '" class="list-group-item">' . $items['items'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_sections"); ?>
        <?php echo _t("By doc sections"); ?>
    </a>
    <?php
    foreach (doc_sections_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=doc_sections&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_sections"); ?>
        <?php echo _t("By doc sections"); ?>
    </a>
    <?php
    foreach (doc_sections_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=doc_sections&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

