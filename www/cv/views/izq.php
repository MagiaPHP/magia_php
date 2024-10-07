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
# Fecha de creacion del documento: 2024-09-18 07:09:41 
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
        <?php _menu_icon("top" , 'cv'); ?>
            <?php echo _t("Cv"); ?>
    </a>
    <a href="index.php?c=cv" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "cv", "create")) { ?>
        <a href="index.php?c=cv&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("first_name") as $first_name) {
        if ($first_name['first_name'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_first_name&first_name=' . $first_name['first_name'] . '" class="list-group-item">' . $first_name['first_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("last_name") as $last_name) {
        if ($last_name['last_name'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_last_name&last_name=' . $last_name['last_name'] . '" class="list-group-item">' . $last_name['last_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("address") as $address) {
        if ($address['address'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_address&address=' . $address['address'] . '" class="list-group-item">' . $address['address'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("city") as $city) {
        if ($city['city'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_city&city=' . $city['city'] . '" class="list-group-item">' . $city['city'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("postal_code") as $postal_code) {
        if ($postal_code['postal_code'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_postal_code&postal_code=' . $postal_code['postal_code'] . '" class="list-group-item">' . $postal_code['postal_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("phone_number") as $phone_number) {
        if ($phone_number['phone_number'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_phone_number&phone_number=' . $phone_number['phone_number'] . '" class="list-group-item">' . $phone_number['phone_number'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("email") as $email) {
        if ($email['email'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_email&email=' . $email['email'] . '" class="list-group-item">' . $email['email'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("driver_license") as $driver_license) {
        if ($driver_license['driver_license'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_driver_license&driver_license=' . $driver_license['driver_license'] . '" class="list-group-item">' . $driver_license['driver_license'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("birth_date") as $birth_date) {
        if ($birth_date['birth_date'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_birth_date&birth_date=' . $birth_date['birth_date'] . '" class="list-group-item">' . $birth_date['birth_date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("availability") as $availability) {
        if ($availability['availability'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_availability&availability=' . $availability['availability'] . '" class="list-group-item">' . $availability['availability'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("professional_goal") as $professional_goal) {
        if ($professional_goal['professional_goal'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_professional_goal&professional_goal=' . $professional_goal['professional_goal'] . '" class="list-group-item">' . $professional_goal['professional_goal'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("summary") as $summary) {
        if ($summary['summary'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_summary&summary=' . $summary['summary'] . '" class="list-group-item">' . $summary['summary'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("hobbies") as $hobbies) {
        if ($hobbies['hobbies'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_hobbies&hobbies=' . $hobbies['hobbies'] . '" class="list-group-item">' . $hobbies['hobbies'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("created_at") as $created_at) {
        if ($created_at['created_at'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_created_at&created_at=' . $created_at['created_at'] . '" class="list-group-item">' . $created_at['created_at'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("work_experience") as $work_experience) {
        if ($work_experience['work_experience'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_work_experience&work_experience=' . $work_experience['work_experience'] . '" class="list-group-item">' . $work_experience['work_experience'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("education") as $education) {
        if ($education['education'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_education&education=' . $education['education'] . '" class="list-group-item">' . $education['education'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("technologies") as $technologies) {
        if ($technologies['technologies'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_technologies&technologies=' . $technologies['technologies'] . '" class="list-group-item">' . $technologies['technologies'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("skills") as $skills) {
        if ($skills['skills'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_skills&skills=' . $skills['skills'] . '" class="list-group-item">' . $skills['skills'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("projects") as $projects) {
        if ($projects['projects'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_projects&projects=' . $projects['projects'] . '" class="list-group-item">' . $projects['projects'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("languages") as $languages) {
        if ($languages['languages'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_languages&languages=' . $languages['languages'] . '" class="list-group-item">' . $languages['languages'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv"); ?>
        <?php echo _t("By cv"); ?>
    </a>
    <?php
    foreach (cv_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=cv&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

