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
# Fecha de creacion del documento: 2024-09-18 03:09:07 
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
        <?php _menu_icon("top" , 'cv_motivation_letter'); ?>
            <?php echo _t("Cv motivation letter"); ?>
    </a>
    <a href="index.php?c=cv_motivation_letter" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "cv_motivation_letter", "create")) { ?>
        <a href="index.php?c=cv_motivation_letter&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("sender_name") as $sender_name) {
        if ($sender_name['sender_name'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_sender_name&sender_name=' . $sender_name['sender_name'] . '" class="list-group-item">' . $sender_name['sender_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("sender_email") as $sender_email) {
        if ($sender_email['sender_email'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_sender_email&sender_email=' . $sender_email['sender_email'] . '" class="list-group-item">' . $sender_email['sender_email'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("sender_phone") as $sender_phone) {
        if ($sender_phone['sender_phone'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_sender_phone&sender_phone=' . $sender_phone['sender_phone'] . '" class="list-group-item">' . $sender_phone['sender_phone'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("sender_address") as $sender_address) {
        if ($sender_address['sender_address'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_sender_address&sender_address=' . $sender_address['sender_address'] . '" class="list-group-item">' . $sender_address['sender_address'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("letter_date") as $letter_date) {
        if ($letter_date['letter_date'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_letter_date&letter_date=' . $letter_date['letter_date'] . '" class="list-group-item">' . $letter_date['letter_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("recipient_name") as $recipient_name) {
        if ($recipient_name['recipient_name'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_recipient_name&recipient_name=' . $recipient_name['recipient_name'] . '" class="list-group-item">' . $recipient_name['recipient_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("recipient_position") as $recipient_position) {
        if ($recipient_position['recipient_position'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_recipient_position&recipient_position=' . $recipient_position['recipient_position'] . '" class="list-group-item">' . $recipient_position['recipient_position'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("recipient_company") as $recipient_company) {
        if ($recipient_company['recipient_company'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_recipient_company&recipient_company=' . $recipient_company['recipient_company'] . '" class="list-group-item">' . $recipient_company['recipient_company'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("recipient_address") as $recipient_address) {
        if ($recipient_address['recipient_address'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_recipient_address&recipient_address=' . $recipient_address['recipient_address'] . '" class="list-group-item">' . $recipient_address['recipient_address'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("greeting") as $greeting) {
        if ($greeting['greeting'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_greeting&greeting=' . $greeting['greeting'] . '" class="list-group-item">' . $greeting['greeting'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("introduction") as $introduction) {
        if ($introduction['introduction'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_introduction&introduction=' . $introduction['introduction'] . '" class="list-group-item">' . $introduction['introduction'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("body_experience") as $body_experience) {
        if ($body_experience['body_experience'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_body_experience&body_experience=' . $body_experience['body_experience'] . '" class="list-group-item">' . $body_experience['body_experience'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("body_achievements") as $body_achievements) {
        if ($body_achievements['body_achievements'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_body_achievements&body_achievements=' . $body_achievements['body_achievements'] . '" class="list-group-item">' . $body_achievements['body_achievements'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("motivation") as $motivation) {
        if ($motivation['motivation'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_motivation&motivation=' . $motivation['motivation'] . '" class="list-group-item">' . $motivation['motivation'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("closing") as $closing) {
        if ($closing['closing'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_closing&closing=' . $closing['closing'] . '" class="list-group-item">' . $closing['closing'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("farewell") as $farewell) {
        if ($farewell['farewell'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_farewell&farewell=' . $farewell['farewell'] . '" class="list-group-item">' . $farewell['farewell'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("signature") as $signature) {
        if ($signature['signature'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_signature&signature=' . $signature['signature'] . '" class="list-group-item">' . $signature['signature'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_motivation_letter"); ?>
        <?php echo _t("By cv motivation letter"); ?>
    </a>
    <?php
    foreach (cv_motivation_letter_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=cv_motivation_letter&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

