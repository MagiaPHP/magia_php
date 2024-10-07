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
# Fecha de creacion del documento: 2024-09-23 19:09:40 
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
        <?php _menu_icon("top" , 'cv_jobs'); ?>
            <?php echo _t("Cv jobs"); ?>
    </a>
    <a href="index.php?c=cv_jobs" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "cv_jobs", "create")) { ?>
        <a href="index.php?c=cv_jobs&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("job_title") as $job_title) {
        if ($job_title['job_title'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_job_title&job_title=' . $job_title['job_title'] . '" class="list-group-item">' . $job_title['job_title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("reference_number") as $reference_number) {
        if ($reference_number['reference_number'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_reference_number&reference_number=' . $reference_number['reference_number'] . '" class="list-group-item">' . $reference_number['reference_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("creation_date") as $creation_date) {
        if ($creation_date['creation_date'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_creation_date&creation_date=' . $creation_date['creation_date'] . '" class="list-group-item">' . $creation_date['creation_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("company_name") as $company_name) {
        if ($company_name['company_name'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_company_name&company_name=' . $company_name['company_name'] . '" class="list-group-item">' . $company_name['company_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("location") as $location) {
        if ($location['location'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_location&location=' . $location['location'] . '" class="list-group-item">' . $location['location'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("ciudad") as $ciudad) {
        if ($ciudad['ciudad'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_ciudad&ciudad=' . $ciudad['ciudad'] . '" class="list-group-item">' . $ciudad['ciudad'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("working_hours") as $working_hours) {
        if ($working_hours['working_hours'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_working_hours&working_hours=' . $working_hours['working_hours'] . '" class="list-group-item">' . $working_hours['working_hours'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("contract_type") as $contract_type) {
        if ($contract_type['contract_type'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_contract_type&contract_type=' . $contract_type['contract_type'] . '" class="list-group-item">' . $contract_type['contract_type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("job_family") as $job_family) {
        if ($job_family['job_family'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_job_family&job_family=' . $job_family['job_family'] . '" class="list-group-item">' . $job_family['job_family'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("job_description") as $job_description) {
        if ($job_description['job_description'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_job_description&job_description=' . $job_description['job_description'] . '" class="list-group-item">' . $job_description['job_description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("profile") as $profile) {
        if ($profile['profile'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_profile&profile=' . $profile['profile'] . '" class="list-group-item">' . $profile['profile'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("language_requirements") as $language_requirements) {
        if ($language_requirements['language_requirements'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_language_requirements&language_requirements=' . $language_requirements['language_requirements'] . '" class="list-group-item">' . $language_requirements['language_requirements'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("employer_name") as $employer_name) {
        if ($employer_name['employer_name'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_employer_name&employer_name=' . $employer_name['employer_name'] . '" class="list-group-item">' . $employer_name['employer_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("contact_person") as $contact_person) {
        if ($contact_person['contact_person'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_contact_person&contact_person=' . $contact_person['contact_person'] . '" class="list-group-item">' . $contact_person['contact_person'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("application_mode") as $application_mode) {
        if ($application_mode['application_mode'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_application_mode&application_mode=' . $application_mode['application_mode'] . '" class="list-group-item">' . $application_mode['application_mode'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("website_url") as $website_url) {
        if ($website_url['website_url'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_website_url&website_url=' . $website_url['website_url'] . '" class="list-group-item">' . $website_url['website_url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_jobs"); ?>
        <?php echo _t("By cv jobs"); ?>
    </a>
    <?php
    foreach (cv_jobs_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=cv_jobs&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

