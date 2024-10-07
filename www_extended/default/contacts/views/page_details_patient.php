<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-7 col-lg-7">

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

        <?php include "nav_details_contacts.php"; ?>  
        <?php include "form_details_contacts.php"; ?>  
        <?php //include "part_dropbox.php"; ?>  
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "der_patient.php"; ?>
    </div>


</div>
<?php include view("home", "footer"); ?>  