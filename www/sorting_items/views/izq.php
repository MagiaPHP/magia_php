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
# Fecha de creacion del documento: 2024-08-30 13:08:28 
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
        <?php _menu_icon("top" , 'sorting_items'); ?>
            <?php echo _t("Sorting_items"); ?>
    </a>
    <a href="index.php?c=sorting_items" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "sorting_items", "create")) { ?>
        <a href="index.php?c=sorting_items&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "sorting_items"); ?>
        <?php echo _t("By title"); ?>
    </a>
    <?php
    foreach (sorting_items_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=sorting_items&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "sorting_items"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (sorting_items_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=sorting_items&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "sorting_items"); ?>
        <?php echo _t("By position_order"); ?>
    </a>
    <?php
    foreach (sorting_items_unique_from_col("position_order") as $position_order) {
        if ($position_order['position_order'] != "") {
            echo '<a href="index.php?c=sorting_items&a=search&w=by_position_order&position_order=' . $position_order['position_order'] . '" class="list-group-item">' . $position_order['position_order'] . '</a>';
        }
    }
    ?>
</div>

