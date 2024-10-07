<?php include view("home", "header"); ?>




<div class="row">

    <?php
    /*    <div class="col-md-2">
      <?php include "izq_myInfo.php"; ?>
      </div> */
    ?>

    <div class="col-md-0">
        <?php //include "izq_myContacts.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_contacts.php"; ?>
    </div>



    <div class="col-md-10"> 

        <?php include "nav_earprints_by_patient.php"; ?>




        <h3>
            <?php _t("Earprints list by patient"); ?>
        </h3>



        <?php
        if ($earprints_l) {
            $earprints = $earprints_l;
            ?> 
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#"><?php _t("Left ear"); ?></a></li>
            </ul>

            <?php
            include 'table_earprints_by_contacts.php';
        } else {
            message('info', "No items");
        }
        ?>



        <?php
// reseteo 
        $earprints = null;

        if ($earprints_r) {

            $earprints = $earprints_r;
            ?>
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#"><?php _t("Right ear"); ?></a></li>
            </ul>
            <?php
            include 'table_earprints_by_contacts.php';
        } else {
            message('info', "No items");
        }
        ?>
















    </div>





</div>
<?php include view("home", "footer"); ?>