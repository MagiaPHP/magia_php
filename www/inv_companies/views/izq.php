<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:09 
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
        <?php _menu_icon("top" , 'inv_companies'); ?>
            <?php echo _t("Inv_companies"); ?>
    </a>
    <a href="index.php?c=inv_companies" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "inv_companies", "create")) { ?>
        <a href="index.php?c=inv_companies&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_companies"); ?>
        <?php echo _t("By company_id"); ?>
    </a>
    <?php
    foreach (inv_companies_unique_from_col("company_id") as $company_id) {
        if ($company_id['company_id'] != "") {
            echo '<a href="index.php?c=inv_companies&a=search&w=by_company_id&company_id=' . $company_id['company_id'] . '" class="list-group-item">' . $company_id['company_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_companies"); ?>
        <?php echo _t("By company_type"); ?>
    </a>
    <?php
    foreach (inv_companies_unique_from_col("company_type") as $company_type) {
        if ($company_type['company_type'] != "") {
            echo '<a href="index.php?c=inv_companies&a=search&w=by_company_type&company_type=' . $company_type['company_type'] . '" class="list-group-item">' . $company_type['company_type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_companies"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (inv_companies_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=inv_companies&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "inv_companies"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (inv_companies_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=inv_companies&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

