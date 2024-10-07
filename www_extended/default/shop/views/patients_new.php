<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-md-3">
        <?php //include "izq_patients.php"; ?>
    </div>

    <div class="col-md-6">    
        <h1><?php _t("New patient"); ?></h1>
        <?php
        include "form_patient_new.php";
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?>