<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php // include "izq_edit.php"; ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <?php _t("Contact edit"); ?>
        </h1>

        <?php
        if ($_POST && $a == "add") {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
        include "form_edit_patient.php";

        /*
          if ($contact['type'] == 1) {
          include "formEditLabo.php";
          } else {
          include "formEditPatient.php";
          }
         * 
         */
        ?>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php // include "www/contacts/views/der_edit.php";   ?>
    </div>
</div>


<?php include view("home", "footer"); ?>  

