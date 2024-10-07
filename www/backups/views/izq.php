
                
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
        <?php _menu_icon("top" , 'backups'); ?>
            <?php echo _t("Backups"); ?>
    </a>
    <a href="index.php?c=backups" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "backups", "create")) { ?>
        <a href="index.php?c=backups&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "backups"); ?>
        <?php echo _t("By date"); ?>
    </a>
    <?php
    foreach (backups_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=backups&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "backups"); ?>
        <?php echo _t("By subdomain"); ?>
    </a>
    <?php
    foreach (backups_unique_from_col("subdomain") as $subdomain) {
        if ($subdomain['subdomain'] != "") {
            echo '<a href="index.php?c=backups&a=search&w=by_subdomain&subdomain=' . $subdomain['subdomain'] . '" class="list-group-item">' . $subdomain['subdomain'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "backups"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (backups_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=backups&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "backups"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (backups_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=backups&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

