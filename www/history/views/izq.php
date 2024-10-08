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
# Fecha de creacion del documento: 2024-10-06 08:10:46 
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
        <?php _menu_icon("top" , 'history'); ?>
            <?php echo _t("History"); ?>
    </a>
    <a href="index.php?c=history" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "history", "create")) { ?>
        <a href="index.php?c=history&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "history"); ?>
        <?php echo _t("By history"); ?>
    </a>
    <?php
    foreach (history_unique_from_col("details") as $details) {
        if ($details['details'] != "") {
            echo '<a href="index.php?c=history&a=search&w=by_details&details=' . $details['details'] . '" class="list-group-item">' . $details['details'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "history"); ?>
        <?php echo _t("By history"); ?>
    </a>
    <?php
    foreach (history_unique_from_col("registre_date") as $registre_date) {
        if ($registre_date['registre_date'] != "") {
            echo '<a href="index.php?c=history&a=search&w=by_registre_date&registre_date=' . $registre_date['registre_date'] . '" class="list-group-item">' . $registre_date['registre_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "history"); ?>
        <?php echo _t("By history"); ?>
    </a>
    <?php
    foreach (history_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=history&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "history"); ?>
        <?php echo _t("By history"); ?>
    </a>
    <?php
    foreach (history_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=history&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

