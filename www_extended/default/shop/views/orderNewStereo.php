<?php include view("home", "header"); ?>
<style href="www_extended/default/shop/views/css/form-style.css" type="text/css"></style>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php // include "izq_orderNew.php" ; ?>
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
        <?php include 'form_orderNewStereo.php'; ?>
        <script type="text/javascript" src="www_extended/default/shop/views/js/form-action-s.js" ></script>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php //include "der_orderNew.php" ; ?>
    </div>


</div>
<?php include view("home", "footer"); ?>