<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php include "izq_address.php"; ?>
    </div>
    <div class="col-md-6">    
        <h1>
            <i class="fas fa-map-marker"></i>
            <?php _t("Edit address"); ?>
        </h1>   
        <?php
        include "formAddressUpdate.php";
        ?>
    </div>
</div>
<?php include view("home", "footer"); ?>