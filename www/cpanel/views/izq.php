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
# Fecha de creacion del documento: 2024-09-04 08:09:40 
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
        <?php _menu_icon("top" , 'cpanel'); ?>
            <?php echo _t("Cpanel"); ?>
    </a>
    <a href="index.php?c=cpanel" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "cpanel", "create")) { ?>
        <a href="index.php?c=cpanel&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cpanel"); ?>
        <?php echo _t("By cpanel"); ?>
    </a>
    <?php
    foreach (cpanel_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=cpanel&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cpanel"); ?>
        <?php echo _t("By cpanel"); ?>
    </a>
    <?php
    foreach (cpanel_unique_from_col("domain") as $domain) {
        if ($domain['domain'] != "") {
            echo '<a href="index.php?c=cpanel&a=search&w=by_domain&domain=' . $domain['domain'] . '" class="list-group-item">' . $domain['domain'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cpanel"); ?>
        <?php echo _t("By cpanel"); ?>
    </a>
    <?php
    foreach (cpanel_unique_from_col("subdomain") as $subdomain) {
        if ($subdomain['subdomain'] != "") {
            echo '<a href="index.php?c=cpanel&a=search&w=by_subdomain&subdomain=' . $subdomain['subdomain'] . '" class="list-group-item">' . $subdomain['subdomain'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cpanel"); ?>
        <?php echo _t("By cpanel"); ?>
    </a>
    <?php
    foreach (cpanel_unique_from_col("db") as $db) {
        if ($db['db'] != "") {
            echo '<a href="index.php?c=cpanel&a=search&w=by_db&db=' . $db['db'] . '" class="list-group-item">' . $db['db'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cpanel"); ?>
        <?php echo _t("By cpanel"); ?>
    </a>
    <?php
    foreach (cpanel_unique_from_col("user_db") as $user_db) {
        if ($user_db['user_db'] != "") {
            echo '<a href="index.php?c=cpanel&a=search&w=by_user_db&user_db=' . $user_db['user_db'] . '" class="list-group-item">' . $user_db['user_db'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cpanel"); ?>
        <?php echo _t("By cpanel"); ?>
    </a>
    <?php
    foreach (cpanel_unique_from_col("user_db_pass") as $user_db_pass) {
        if ($user_db_pass['user_db_pass'] != "") {
            echo '<a href="index.php?c=cpanel&a=search&w=by_user_db_pass&user_db_pass=' . $user_db_pass['user_db_pass'] . '" class="list-group-item">' . $user_db_pass['user_db_pass'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cpanel"); ?>
        <?php echo _t("By cpanel"); ?>
    </a>
    <?php
    foreach (cpanel_unique_from_col("email") as $email) {
        if ($email['email'] != "") {
            echo '<a href="index.php?c=cpanel&a=search&w=by_email&email=' . $email['email'] . '" class="list-group-item">' . $email['email'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cpanel"); ?>
        <?php echo _t("By cpanel"); ?>
    </a>
    <?php
    foreach (cpanel_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=cpanel&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cpanel"); ?>
        <?php echo _t("By cpanel"); ?>
    </a>
    <?php
    foreach (cpanel_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=cpanel&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

