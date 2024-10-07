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
# Fecha de creacion del documento: 2024-09-26 08:09:54 
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
        <?php _menu_icon("top" , 'messages'); ?>
            <?php echo _t("Messages"); ?>
    </a>
    <a href="index.php?c=messages" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "messages", "create")) { ?>
        <a href="index.php?c=messages&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("message") as $message) {
        if ($message['message'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_message&message=' . $message['message'] . '" class="list-group-item">' . $message['message'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("url_action") as $url_action) {
        if ($url_action['url_action'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_url_action&url_action=' . $url_action['url_action'] . '" class="list-group-item">' . $url_action['url_action'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("url_label") as $url_label) {
        if ($url_label['url_label'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_url_label&url_label=' . $url_label['url_label'] . '" class="list-group-item">' . $url_label['url_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("doc_id") as $doc_id) {
        if ($doc_id['doc_id'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_doc_id&doc_id=' . $doc_id['doc_id'] . '" class="list-group-item">' . $doc_id['doc_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("rol") as $rol) {
        if ($rol['rol'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_rol&rol=' . $rol['rol'] . '" class="list-group-item">' . $rol['rol'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("date_start") as $date_start) {
        if ($date_start['date_start'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("date_end") as $date_end) {
        if ($date_end['date_end'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("read_by") as $read_by) {
        if ($read_by['read_by'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_read_by&read_by=' . $read_by['read_by'] . '" class="list-group-item">' . $read_by['read_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("is_logued") as $is_logued) {
        if ($is_logued['is_logued'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_is_logued&is_logued=' . $is_logued['is_logued'] . '" class="list-group-item">' . $is_logued['is_logued'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "messages"); ?>
        <?php echo _t("By messages"); ?>
    </a>
    <?php
    foreach (messages_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=messages&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

