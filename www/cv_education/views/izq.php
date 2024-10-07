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
# Fecha de creacion del documento: 2024-09-18 06:09:28 
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
        <?php _menu_icon("top" , 'cv_education'); ?>
            <?php echo _t("Cv education"); ?>
    </a>
    <a href="index.php?c=cv_education" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "cv_education", "create")) { ?>
        <a href="index.php?c=cv_education&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_education"); ?>
        <?php echo _t("By cv education"); ?>
    </a>
    <?php
    foreach (cv_education_unique_from_col("cv_id") as $cv_id) {
        if ($cv_id['cv_id'] != "") {
            echo '<a href="index.php?c=cv_education&a=search&w=by_cv_id&cv_id=' . $cv_id['cv_id'] . '" class="list-group-item">' . $cv_id['cv_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_education"); ?>
        <?php echo _t("By cv education"); ?>
    </a>
    <?php
    foreach (cv_education_unique_from_col("program") as $program) {
        if ($program['program'] != "") {
            echo '<a href="index.php?c=cv_education&a=search&w=by_program&program=' . $program['program'] . '" class="list-group-item">' . $program['program'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_education"); ?>
        <?php echo _t("By cv education"); ?>
    </a>
    <?php
    foreach (cv_education_unique_from_col("institution") as $institution) {
        if ($institution['institution'] != "") {
            echo '<a href="index.php?c=cv_education&a=search&w=by_institution&institution=' . $institution['institution'] . '" class="list-group-item">' . $institution['institution'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_education"); ?>
        <?php echo _t("By cv education"); ?>
    </a>
    <?php
    foreach (cv_education_unique_from_col("start_date") as $start_date) {
        if ($start_date['start_date'] != "") {
            echo '<a href="index.php?c=cv_education&a=search&w=by_start_date&start_date=' . $start_date['start_date'] . '" class="list-group-item">' . $start_date['start_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_education"); ?>
        <?php echo _t("By cv education"); ?>
    </a>
    <?php
    foreach (cv_education_unique_from_col("end_date") as $end_date) {
        if ($end_date['end_date'] != "") {
            echo '<a href="index.php?c=cv_education&a=search&w=by_end_date&end_date=' . $end_date['end_date'] . '" class="list-group-item">' . $end_date['end_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_education"); ?>
        <?php echo _t("By cv education"); ?>
    </a>
    <?php
    foreach (cv_education_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=cv_education&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_education"); ?>
        <?php echo _t("By cv education"); ?>
    </a>
    <?php
    foreach (cv_education_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=cv_education&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_education"); ?>
        <?php echo _t("By cv education"); ?>
    </a>
    <?php
    foreach (cv_education_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=cv_education&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

