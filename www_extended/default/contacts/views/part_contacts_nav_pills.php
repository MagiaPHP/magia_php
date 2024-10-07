<?php
$active_contacts = "";
$active_patients = "";
$active_employees = "";
$active_users = "";

$active_contacts = ($a == "contacts") ? " active " : "";
$active_patients = ($a == "patients") ? " active " : "";
$active_employees = ($a == "employees") ? " active " : "";
$active_users = ($a == "users") ? " active " : "";
?>
<ul class="nav nav-pills" role="tablist">

    <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>
        <li role="presentation" class="<?php echo $active_contacts; ?>"><a href="index.php?c=contacts&a=contacts&id=<?php echo $id; ?>"><?php _t("Contacts"); ?></a></li>
    <?php } ?>



    <?php if (permissions_has_permission($u_rol, "patients", "read") && modules_field_module('status', 'audio')) { ?>    
        <li role="presentation" class="<?php echo $active_patients; ?>"><a href="index.php?c=contacts&a=patients&id=<?php echo $id; ?>"><?php _t("Patients"); ?></a></li>
    <?php } ?>



    <?php if (permissions_has_permission($u_rol, "employees", "read")) { ?>
        <li role="presentation" class="<?php echo $active_employees; ?>"><a href="index.php?c=contacts&a=employees&id=<?php echo $id; ?>"><?php _t("Employees"); ?></a></li>  
    <?php } ?>


    <?php if (permissions_has_permission($u_rol, "users", "read")) { ?>
        <li role="presentation" class="<?php echo $active_users; ?>" ><a href="index.php?c=contacts&a=users&id=<?php echo $id; ?>"><?php _t("Users"); ?></a></li>  
    <?php } ?>


</ul>

