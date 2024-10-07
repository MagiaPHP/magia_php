
                
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
        <?php _menu_icon("top" , 'api'); ?>
            <?php echo _t("Api"); ?>
    </a>
    <a href="index.php?c=api" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "api", "create")) { ?>
        <a href="index.php?c=api&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By contact_id"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By api_key"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("api_key") as $api_key) {
        if ($api_key['api_key'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_api_key&api_key=' . $api_key['api_key'] . '" class="list-group-item">' . $api_key['api_key'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By crud"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("crud") as $crud) {
        if ($crud['crud'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_crud&crud=' . $crud['crud'] . '" class="list-group-item">' . $crud['crud'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By date_start"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("date_start") as $date_start) {
        if ($date_start['date_start'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By date_end"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("date_end") as $date_end) {
        if ($date_end['date_end'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By requests_limit"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("requests_limit") as $requests_limit) {
        if ($requests_limit['requests_limit'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_requests_limit&requests_limit=' . $requests_limit['requests_limit'] . '" class="list-group-item">' . $requests_limit['requests_limit'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By limit_period"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("limit_period") as $limit_period) {
        if ($limit_period['limit_period'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_limit_period&limit_period=' . $limit_period['limit_period'] . '" class="list-group-item">' . $limit_period['limit_period'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By requests_made"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("requests_made") as $requests_made) {
        if ($requests_made['requests_made'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_requests_made&requests_made=' . $requests_made['requests_made'] . '" class="list-group-item">' . $requests_made['requests_made'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By last_request"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("last_request") as $last_request) {
        if ($last_request['last_request'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_last_request&last_request=' . $last_request['last_request'] . '" class="list-group-item">' . $last_request['last_request'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "api"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (api_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=api&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

