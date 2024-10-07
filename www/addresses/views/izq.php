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
# Fecha de creacion del documento: 2024-10-02 17:10:10 
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
        <?php _menu_icon("top" , 'addresses'); ?>
            <?php echo _t("Addresses"); ?>
    </a>
    <a href="index.php?c=addresses" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "addresses", "create")) { ?>
        <a href="index.php?c=addresses&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("address") as $address) {
        if ($address['address'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_address&address=' . $address['address'] . '" class="list-group-item">' . $address['address'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("number") as $number) {
        if ($number['number'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_number&number=' . $number['number'] . '" class="list-group-item">' . $number['number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("postcode") as $postcode) {
        if ($postcode['postcode'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_postcode&postcode=' . $postcode['postcode'] . '" class="list-group-item">' . $postcode['postcode'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("barrio") as $barrio) {
        if ($barrio['barrio'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_barrio&barrio=' . $barrio['barrio'] . '" class="list-group-item">' . $barrio['barrio'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("sector") as $sector) {
        if ($sector['sector'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_sector&sector=' . $sector['sector'] . '" class="list-group-item">' . $sector['sector'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("ref") as $ref) {
        if ($ref['ref'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_ref&ref=' . $ref['ref'] . '" class="list-group-item">' . $ref['ref'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("city") as $city) {
        if ($city['city'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_city&city=' . $city['city'] . '" class="list-group-item">' . $city['city'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("province") as $province) {
        if ($province['province'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_province&province=' . $province['province'] . '" class="list-group-item">' . $province['province'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("region") as $region) {
        if ($region['region'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_region&region=' . $region['region'] . '" class="list-group-item">' . $region['region'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("country") as $country) {
        if ($country['country'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_country&country=' . $country['country'] . '" class="list-group-item">' . $country['country'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "addresses"); ?>
        <?php echo _t("By addresses"); ?>
    </a>
    <?php
    foreach (addresses_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=addresses&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

