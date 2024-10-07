
<?php # SAVE ##################       ?>
<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_company.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_dates.php"; ?>
        <?php include "part_date_expiration_update.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_billing_address.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php
        if (_options_option('config_address_use_delivery')) {
            include "part_details_delivery_address.php";
        }
        ?>
    </div>
</div>
