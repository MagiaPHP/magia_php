<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-md-3">
        <?php include "izq_address.php"; ?>
    </div>

    <div class="col-md-6">    
        <h1>
            <i class="fas fa-map-marker"></i>
            <?php _t("Address details"); ?>
        </h1>         
        <?php
        include "formAddressDetails.php";
        ?>
    </div>
</div>

<?php include view("home", "footer"); ?>