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
# Fecha de creacion del documento: 2024-10-01 09:10:44 
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
        <?php _menu_icon("top" , 'contacts'); ?>
            <?php echo _t("Contacts"); ?>
    </a>
    <a href="index.php?c=contacts" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "contacts", "create")) { ?>
        <a href="index.php?c=contacts&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("owner_id") as $owner_id) {
        if ($owner_id['owner_id'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_owner_id&owner_id=' . $owner_id['owner_id'] . '" class="list-group-item">' . $owner_id['owner_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("office_id") as $office_id) {
        if ($office_id['office_id'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_office_id&office_id=' . $office_id['office_id'] . '" class="list-group-item">' . $office_id['office_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("lastname") as $lastname) {
        if ($lastname['lastname'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_lastname&lastname=' . $lastname['lastname'] . '" class="list-group-item">' . $lastname['lastname'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("birthdate") as $birthdate) {
        if ($birthdate['birthdate'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_birthdate&birthdate=' . $birthdate['birthdate'] . '" class="list-group-item">' . $birthdate['birthdate'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("tva") as $tva) {
        if ($tva['tva'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_tva&tva=' . $tva['tva'] . '" class="list-group-item">' . $tva['tva'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("billing_method") as $billing_method) {
        if ($billing_method['billing_method'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_billing_method&billing_method=' . $billing_method['billing_method'] . '" class="list-group-item">' . $billing_method['billing_method'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("discounts") as $discounts) {
        if ($discounts['discounts'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_discounts&discounts=' . $discounts['discounts'] . '" class="list-group-item">' . $discounts['discounts'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("language") as $language) {
        if ($language['language'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_language&language=' . $language['language'] . '" class="list-group-item">' . $language['language'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("registre_date") as $registre_date) {
        if ($registre_date['registre_date'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_registre_date&registre_date=' . $registre_date['registre_date'] . '" class="list-group-item">' . $registre_date['registre_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "contacts"); ?>
        <?php echo _t("By contacts"); ?>
    </a>
    <?php
    foreach (contacts_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=contacts&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

