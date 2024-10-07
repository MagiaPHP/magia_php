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
# Fecha de creacion del documento: 2024-09-04 08:09:09 
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
        <?php _menu_icon("top" , 'doc_tags'); ?>
            <?php echo _t("Doc tags"); ?>
    </a>
    <a href="index.php?c=doc_tags" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "doc_tags", "create")) { ?>
        <a href="index.php?c=doc_tags&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_tags"); ?>
        <?php echo _t("By doc tags"); ?>
    </a>
    <?php
    foreach (doc_tags_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=doc_tags&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_tags"); ?>
        <?php echo _t("By doc tags"); ?>
    </a>
    <?php
    foreach (doc_tags_unique_from_col("tag") as $tag) {
        if ($tag['tag'] != "") {
            echo '<a href="index.php?c=doc_tags&a=search&w=by_tag&tag=' . $tag['tag'] . '" class="list-group-item">' . $tag['tag'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_tags"); ?>
        <?php echo _t("By doc tags"); ?>
    </a>
    <?php
    foreach (doc_tags_unique_from_col("replace_by") as $replace_by) {
        if ($replace_by['replace_by'] != "") {
            echo '<a href="index.php?c=doc_tags&a=search&w=by_replace_by&replace_by=' . $replace_by['replace_by'] . '" class="list-group-item">' . $replace_by['replace_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_tags"); ?>
        <?php echo _t("By doc tags"); ?>
    </a>
    <?php
    foreach (doc_tags_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=doc_tags&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_tags"); ?>
        <?php echo _t("By doc tags"); ?>
    </a>
    <?php
    foreach (doc_tags_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=doc_tags&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_tags"); ?>
        <?php echo _t("By doc tags"); ?>
    </a>
    <?php
    foreach (doc_tags_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=doc_tags&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

