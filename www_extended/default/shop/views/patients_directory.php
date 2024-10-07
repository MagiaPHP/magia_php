<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php include "izq_patients.php"; ?>
    </div>
    <div class="col-md-9">   

        <?php include "nav_directory.php"; ?> 


        <h1><?php _t("Patients directory"); ?></h1>        
        <?php
        include "directory_by_contacts.php";
        ?>
    </div>
    <div class="col-md-0">
        <?php //include "der_contacts.php";  ?>
    </div>
</div>
<?php include view("home", "footer"); ?>