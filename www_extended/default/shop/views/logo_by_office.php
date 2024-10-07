<?php include view("home", "header"); ?>

<div class="row">

    <div class="col-md-2">
        <?php include "izq_myInfo.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_myOffices.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_offices.php"; ?>
    </div>


    <div class="col-xs-12 col-md-6 col-lg-6">  
        <?php include "nav_logo.php"; ?> 

        <h2><?php _t("Office logo"); ?></h2>



        <?php
        include "table_logo_by_contacts.php";
        // include "table_directory_by_office.php"; 
        ?>


    </div>
    <div class="col-md-3">
        <?php include "der_index.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>