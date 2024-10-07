

<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'subdomains'); ?>
        <?php echo _t("Subdomains"); ?>
    </a>
    <a href="index.php?c=subdomains" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "subdomains", "create")) { ?>
        <a href="index.php?c=subdomains&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By contact_id"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By create_by"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("create_by") as $create_by) {
        if ($create_by['create_by'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_create_by&create_by=' . $create_by['create_by'] . '" class="list-group-item">' . $create_by['create_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By plan"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("plan") as $plan) {
        if ($plan['plan'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_plan&plan=' . $plan['plan'] . '" class="list-group-item">' . $plan['plan'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By prefix"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("prefix") as $prefix) {
        if ($prefix['prefix'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_prefix&prefix=' . $prefix['prefix'] . '" class="list-group-item">' . $prefix['prefix'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By subdomain"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("subdomain") as $subdomain) {
        if ($subdomain['subdomain'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_subdomain&subdomain=' . $subdomain['subdomain'] . '" class="list-group-item">' . $subdomain['subdomain'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By domain"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("domain") as $domain) {
        if ($domain['domain'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_domain&domain=' . $domain['domain'] . '" class="list-group-item">' . $domain['domain'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By code"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By date_registre"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (subdomains_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=subdomains&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

