<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>


    <div class="col-sm-10 col-md-10 col-lg-10">

        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }
        ?>

        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>



        <?php include "nav_details_company.php"; ?>   
        <?php include "top_details_company.php"; ?>   

        <?php //include "form_details_company.php";   ?>
        <?php include "form_details_company.php"; ?>

        <?php include "form_update_subdomain.php"; ?>
        <?php include "form_update_db.php"; ?>
        <?php include "form_update_userdb.php"; ?>
        <?php include "form_update_email.php"; ?>



    </div>

</div>


<?php include view("home", "footer"); ?>  

