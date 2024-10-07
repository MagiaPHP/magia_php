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
# Fecha de creacion del documento: 2024-09-16 19:09:36 
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
        <?php _menu_icon("top" , 'chat'); ?>
            <?php echo _t("Chat"); ?>
    </a>
    <a href="index.php?c=chat" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "chat", "create")) { ?>
        <a href="index.php?c=chat&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "chat"); ?>
        <?php echo _t("By chat"); ?>
    </a>
    <?php
    foreach (chat_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=chat&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "chat"); ?>
        <?php echo _t("By chat"); ?>
    </a>
    <?php
    foreach (chat_unique_from_col("order_id") as $order_id) {
        if ($order_id['order_id'] != "") {
            echo '<a href="index.php?c=chat&a=search&w=by_order_id&order_id=' . $order_id['order_id'] . '" class="list-group-item">' . $order_id['order_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "chat"); ?>
        <?php echo _t("By chat"); ?>
    </a>
    <?php
    foreach (chat_unique_from_col("message") as $message) {
        if ($message['message'] != "") {
            echo '<a href="index.php?c=chat&a=search&w=by_message&message=' . $message['message'] . '" class="list-group-item">' . $message['message'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "chat"); ?>
        <?php echo _t("By chat"); ?>
    </a>
    <?php
    foreach (chat_unique_from_col("user") as $user) {
        if ($user['user'] != "") {
            echo '<a href="index.php?c=chat&a=search&w=by_user&user=' . $user['user'] . '" class="list-group-item">' . $user['user'] . '</a>';
        }
    }
    ?>
</div>

