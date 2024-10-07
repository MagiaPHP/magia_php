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
# Fecha de creacion del documento: 2024-09-18 12:09:00 
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
        <?php _menu_icon("top" , 'cv_applications'); ?>
            <?php echo _t("Cv applications"); ?>
    </a>
    <a href="index.php?c=cv_applications" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "cv_applications", "create")) { ?>
        <a href="index.php?c=cv_applications&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_applications"); ?>
        <?php echo _t("By cv applications"); ?>
    </a>
    <?php
    foreach (cv_applications_unique_from_col("job_id") as $job_id) {
        if ($job_id['job_id'] != "") {
            echo '<a href="index.php?c=cv_applications&a=search&w=by_job_id&job_id=' . $job_id['job_id'] . '" class="list-group-item">' . $job_id['job_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_applications"); ?>
        <?php echo _t("By cv applications"); ?>
    </a>
    <?php
    foreach (cv_applications_unique_from_col("applicant_name") as $applicant_name) {
        if ($applicant_name['applicant_name'] != "") {
            echo '<a href="index.php?c=cv_applications&a=search&w=by_applicant_name&applicant_name=' . $applicant_name['applicant_name'] . '" class="list-group-item">' . $applicant_name['applicant_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_applications"); ?>
        <?php echo _t("By cv applications"); ?>
    </a>
    <?php
    foreach (cv_applications_unique_from_col("applicant_email") as $applicant_email) {
        if ($applicant_email['applicant_email'] != "") {
            echo '<a href="index.php?c=cv_applications&a=search&w=by_applicant_email&applicant_email=' . $applicant_email['applicant_email'] . '" class="list-group-item">' . $applicant_email['applicant_email'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_applications"); ?>
        <?php echo _t("By cv applications"); ?>
    </a>
    <?php
    foreach (cv_applications_unique_from_col("application_date") as $application_date) {
        if ($application_date['application_date'] != "") {
            echo '<a href="index.php?c=cv_applications&a=search&w=by_application_date&application_date=' . $application_date['application_date'] . '" class="list-group-item">' . $application_date['application_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_applications"); ?>
        <?php echo _t("By cv applications"); ?>
    </a>
    <?php
    foreach (cv_applications_unique_from_col("resume") as $resume) {
        if ($resume['resume'] != "") {
            echo '<a href="index.php?c=cv_applications&a=search&w=by_resume&resume=' . $resume['resume'] . '" class="list-group-item">' . $resume['resume'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_applications"); ?>
        <?php echo _t("By cv applications"); ?>
    </a>
    <?php
    foreach (cv_applications_unique_from_col("cover_letter") as $cover_letter) {
        if ($cover_letter['cover_letter'] != "") {
            echo '<a href="index.php?c=cv_applications&a=search&w=by_cover_letter&cover_letter=' . $cover_letter['cover_letter'] . '" class="list-group-item">' . $cover_letter['cover_letter'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_applications"); ?>
        <?php echo _t("By cv applications"); ?>
    </a>
    <?php
    foreach (cv_applications_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=cv_applications&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_applications"); ?>
        <?php echo _t("By cv applications"); ?>
    </a>
    <?php
    foreach (cv_applications_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=cv_applications&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

