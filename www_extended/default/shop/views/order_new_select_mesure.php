<?php include view("home", "header"); ?>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "izq_orderNew.php"; ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h1><?php _t("New order"); ?></h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php include 'form_order_new_mesure.php'; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "der_orderNew.php"; ?>
    </div>


</div>
<script src="www_extended/default/shop/views/js/form-action.js"  type="text/javascript" ></script>
<?php include view("home", "footer"); ?>