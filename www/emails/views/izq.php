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
# Fecha de creacion del documento: 2024-09-04 08:09:26 
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
        <?php _menu_icon("top" , 'emails'); ?>
            <?php echo _t("Emails"); ?>
    </a>
    <a href="index.php?c=emails" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "emails", "create")) { ?>
        <a href="index.php?c=emails&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("father_id") as $father_id) {
        if ($father_id['father_id'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_father_id&father_id=' . $father_id['father_id'] . '" class="list-group-item">' . $father_id['father_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("sender_id") as $sender_id) {
        if ($sender_id['sender_id'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_sender_id&sender_id=' . $sender_id['sender_id'] . '" class="list-group-item">' . $sender_id['sender_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("reciver_id") as $reciver_id) {
        if ($reciver_id['reciver_id'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_reciver_id&reciver_id=' . $reciver_id['reciver_id'] . '" class="list-group-item">' . $reciver_id['reciver_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("folder") as $folder) {
        if ($folder['folder'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_folder&folder=' . $folder['folder'] . '" class="list-group-item">' . $folder['folder'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("subjet") as $subjet) {
        if ($subjet['subjet'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_subjet&subjet=' . $subjet['subjet'] . '" class="list-group-item">' . $subjet['subjet'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("message") as $message) {
        if ($message['message'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_message&message=' . $message['message'] . '" class="list-group-item">' . $message['message'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("date_read") as $date_read) {
        if ($date_read['date_read'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_date_read&date_read=' . $date_read['date_read'] . '" class="list-group-item">' . $date_read['date_read'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "emails"); ?>
        <?php echo _t("By emails"); ?>
    </a>
    <?php
    foreach (emails_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=emails&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

