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
# Fecha de creacion del documento: 2024-09-22 18:09:50 
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
        <?php _menu_icon("top" , 'docu_images'); ?>
            <?php echo _t("Docu images"); ?>
    </a>
    <a href="index.php?c=docu_images" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "docu_images", "create")) { ?>
        <a href="index.php?c=docu_images&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_images"); ?>
        <?php echo _t("By docu images"); ?>
    </a>
    <?php
    foreach (docu_images_unique_from_col("docu_id") as $docu_id) {
        if ($docu_id['docu_id'] != "") {
            echo '<a href="index.php?c=docu_images&a=search&w=by_docu_id&docu_id=' . $docu_id['docu_id'] . '" class="list-group-item">' . $docu_id['docu_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_images"); ?>
        <?php echo _t("By docu images"); ?>
    </a>
    <?php
    foreach (docu_images_unique_from_col("bloc_id") as $bloc_id) {
        if ($bloc_id['bloc_id'] != "") {
            echo '<a href="index.php?c=docu_images&a=search&w=by_bloc_id&bloc_id=' . $bloc_id['bloc_id'] . '" class="list-group-item">' . $bloc_id['bloc_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_images"); ?>
        <?php echo _t("By docu images"); ?>
    </a>
    <?php
    foreach (docu_images_unique_from_col("image") as $image) {
        if ($image['image'] != "") {
            echo '<a href="index.php?c=docu_images&a=search&w=by_image&image=' . $image['image'] . '" class="list-group-item">' . $image['image'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_images"); ?>
        <?php echo _t("By docu images"); ?>
    </a>
    <?php
    foreach (docu_images_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=docu_images&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_images"); ?>
        <?php echo _t("By docu images"); ?>
    </a>
    <?php
    foreach (docu_images_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=docu_images&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

