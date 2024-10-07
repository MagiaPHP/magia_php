<?php include view("home", "header"); ?>

<style href="www_extended/default/shop/views/css/form-style.css" type="text/css"></style>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php //include "izq_orderNew.php" ; ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h1><?php _t("New order"); ?></h1>

        <?php /*
          <div class="progress">
          <div class="progress-bar"
          role="progressbar" aria-valuenow="33"
          aria-valuemin="0"
          aria-valuemax="100"
          style="width: 66%;">
          <span class="sr-only">2</span>
          </div>
          </div> */ ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php include 'form_10_order_new_select_side.php'; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php // include "der_orderNew.php" ;  ?>
    </div>


</div>
<script src="www_extended/default/shop/views/js/form-action.js"  type="text/javascript" ></script>
<?php include view("home", "footer"); ?>