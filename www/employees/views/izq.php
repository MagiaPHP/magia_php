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
# Fecha de creacion del documento: 2024-10-03 18:10:04 
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
        <?php _menu_icon("top" , 'employees'); ?>
            <?php echo _t("Employees"); ?>
    </a>
    <a href="index.php?c=employees" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "employees", "create")) { ?>
        <a href="index.php?c=employees&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "employees"); ?>
        <?php echo _t("By employees"); ?>
    </a>
    <?php
    foreach (employees_unique_from_col("company_id") as $company_id) {
        if ($company_id['company_id'] != "") {
            echo '<a href="index.php?c=employees&a=search&w=by_company_id&company_id=' . $company_id['company_id'] . '" class="list-group-item">' . $company_id['company_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "employees"); ?>
        <?php echo _t("By employees"); ?>
    </a>
    <?php
    foreach (employees_unique_from_col("contact_id") as $contact_id) {
        if ($contact_id['contact_id'] != "") {
            echo '<a href="index.php?c=employees&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "employees"); ?>
        <?php echo _t("By employees"); ?>
    </a>
    <?php
    foreach (employees_unique_from_col("owner_ref") as $owner_ref) {
        if ($owner_ref['owner_ref'] != "") {
            echo '<a href="index.php?c=employees&a=search&w=by_owner_ref&owner_ref=' . $owner_ref['owner_ref'] . '" class="list-group-item">' . $owner_ref['owner_ref'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "employees"); ?>
        <?php echo _t("By employees"); ?>
    </a>
    <?php
    foreach (employees_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=employees&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "employees"); ?>
        <?php echo _t("By employees"); ?>
    </a>
    <?php
    foreach (employees_unique_from_col("cargo") as $cargo) {
        if ($cargo['cargo'] != "") {
            echo '<a href="index.php?c=employees&a=search&w=by_cargo&cargo=' . $cargo['cargo'] . '" class="list-group-item">' . $cargo['cargo'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "employees"); ?>
        <?php echo _t("By employees"); ?>
    </a>
    <?php
    foreach (employees_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=employees&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "employees"); ?>
        <?php echo _t("By employees"); ?>
    </a>
    <?php
    foreach (employees_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=employees&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

