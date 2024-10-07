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
# Fecha de creacion del documento: 2024-09-04 08:09:38 
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
        <?php _menu_icon("top" , 'emails_tmp'); ?>
            <?php echo _t("Emails tmp"); ?>
    </a>
    <a href="index.php?c=emails_tmp" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "emails_tmp", "create")) { ?>
        <a href="index.php?c=emails_tmp&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails_tmp"); ?>
        <?php echo _t("By emails tmp"); ?>
    </a>
    <?php
    foreach (emails_tmp_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=emails_tmp&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails_tmp"); ?>
        <?php echo _t("By emails tmp"); ?>
    </a>
    <?php
    foreach (emails_tmp_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=emails_tmp&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails_tmp"); ?>
        <?php echo _t("By emails tmp"); ?>
    </a>
    <?php
    foreach (emails_tmp_unique_from_col("tmp") as $tmp) {
        if ($tmp['tmp'] != "") {
            echo '<a href="index.php?c=emails_tmp&a=search&w=by_tmp&tmp=' . $tmp['tmp'] . '" class="list-group-item">' . $tmp['tmp'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails_tmp"); ?>
        <?php echo _t("By emails tmp"); ?>
    </a>
    <?php
    foreach (emails_tmp_unique_from_col("body") as $body) {
        if ($body['body'] != "") {
            echo '<a href="index.php?c=emails_tmp&a=search&w=by_body&body=' . $body['body'] . '" class="list-group-item">' . $body['body'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails_tmp"); ?>
        <?php echo _t("By emails tmp"); ?>
    </a>
    <?php
    foreach (emails_tmp_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=emails_tmp&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails_tmp"); ?>
        <?php echo _t("By emails tmp"); ?>
    </a>
    <?php
    foreach (emails_tmp_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=emails_tmp&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

