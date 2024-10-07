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
# Fecha de creacion del documento: 2024-09-18 06:09:31 
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
        <?php _menu_icon("top" , 'cv_experiences'); ?>
            <?php echo _t("Cv experiences"); ?>
    </a>
    <a href="index.php?c=cv_experiences" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "cv_experiences", "create")) { ?>
        <a href="index.php?c=cv_experiences&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_experiences"); ?>
        <?php echo _t("By cv experiences"); ?>
    </a>
    <?php
    foreach (cv_experiences_unique_from_col("cv_id") as $cv_id) {
        if ($cv_id['cv_id'] != "") {
            echo '<a href="index.php?c=cv_experiences&a=search&w=by_cv_id&cv_id=' . $cv_id['cv_id'] . '" class="list-group-item">' . $cv_id['cv_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_experiences"); ?>
        <?php echo _t("By cv experiences"); ?>
    </a>
    <?php
    foreach (cv_experiences_unique_from_col("role") as $role) {
        if ($role['role'] != "") {
            echo '<a href="index.php?c=cv_experiences&a=search&w=by_role&role=' . $role['role'] . '" class="list-group-item">' . $role['role'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_experiences"); ?>
        <?php echo _t("By cv experiences"); ?>
    </a>
    <?php
    foreach (cv_experiences_unique_from_col("company") as $company) {
        if ($company['company'] != "") {
            echo '<a href="index.php?c=cv_experiences&a=search&w=by_company&company=' . $company['company'] . '" class="list-group-item">' . $company['company'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_experiences"); ?>
        <?php echo _t("By cv experiences"); ?>
    </a>
    <?php
    foreach (cv_experiences_unique_from_col("employment_type") as $employment_type) {
        if ($employment_type['employment_type'] != "") {
            echo '<a href="index.php?c=cv_experiences&a=search&w=by_employment_type&employment_type=' . $employment_type['employment_type'] . '" class="list-group-item">' . $employment_type['employment_type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_experiences"); ?>
        <?php echo _t("By cv experiences"); ?>
    </a>
    <?php
    foreach (cv_experiences_unique_from_col("start_date") as $start_date) {
        if ($start_date['start_date'] != "") {
            echo '<a href="index.php?c=cv_experiences&a=search&w=by_start_date&start_date=' . $start_date['start_date'] . '" class="list-group-item">' . $start_date['start_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_experiences"); ?>
        <?php echo _t("By cv experiences"); ?>
    </a>
    <?php
    foreach (cv_experiences_unique_from_col("end_date") as $end_date) {
        if ($end_date['end_date'] != "") {
            echo '<a href="index.php?c=cv_experiences&a=search&w=by_end_date&end_date=' . $end_date['end_date'] . '" class="list-group-item">' . $end_date['end_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_experiences"); ?>
        <?php echo _t("By cv experiences"); ?>
    </a>
    <?php
    foreach (cv_experiences_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=cv_experiences&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_experiences"); ?>
        <?php echo _t("By cv experiences"); ?>
    </a>
    <?php
    foreach (cv_experiences_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=cv_experiences&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_experiences"); ?>
        <?php echo _t("By cv experiences"); ?>
    </a>
    <?php
    foreach (cv_experiences_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=cv_experiences&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

