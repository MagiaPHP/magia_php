<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php include "izq_myInfo.php"; ?>
    </div>
    <div class="col-md-6">              
        <?php // include "nav_address.php"; ?>
        <?php
        if ($error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <h2><?php _t("My info"); ?></h2>

        <?php include "form_myInfo_profile.php"; ?>

    </div> 
</div> 
<?php include view("home", "footer"); ?>