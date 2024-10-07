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
# Fecha de creacion del documento: 2024-09-29 09:09:19 
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
        <?php _menu_icon("top" , 'contacts_titles'); ?>
            <?php echo _t("Contacts titles"); ?>
    </a>
    <a href="index.php?c=contacts_titles" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "contacts_titles", "create")) { ?>
        <a href="index.php?c=contacts_titles&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts_titles"); ?>
        <?php echo _t("By contacts titles"); ?>
    </a>
    <?php
    foreach (contacts_titles_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=contacts_titles&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts_titles"); ?>
        <?php echo _t("By contacts titles"); ?>
    </a>
    <?php
    foreach (contacts_titles_unique_from_col("abbreviation") as $abbreviation) {
        if ($abbreviation['abbreviation'] != "") {
            echo '<a href="index.php?c=contacts_titles&a=search&w=by_abbreviation&abbreviation=' . $abbreviation['abbreviation'] . '" class="list-group-item">' . $abbreviation['abbreviation'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts_titles"); ?>
        <?php echo _t("By contacts titles"); ?>
    </a>
    <?php
    foreach (contacts_titles_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=contacts_titles&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts_titles"); ?>
        <?php echo _t("By contacts titles"); ?>
    </a>
    <?php
    foreach (contacts_titles_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=contacts_titles&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

