<?php include view("home", "header"); ?>


<?php farra_progreso(19, $config_orders_total_steps); ?>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "der_orderNew.php"; ?>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <a name="order"></a>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php //include "order_new_00.php"; ?>






        <?php // include "form_order_new_select_exp.php";  ?>
        <?php // include "form_order_new_select_perte.php";  ?>
        <?php // include "form_order_new_select_lon.php";  ?>
        <?php // include "form_order_new_select_con.php"; ?>
        <?php // include "form_order_new_select_type.php"; ?>
        <?php // include "form_order_new_select_modele.php"; ?>
        <?php // include "form_order_new_select_mesure.php"; ?>
        <?php // include "form_order_new_select_forme.php"; ?>
        <?php // include "form_order_new_select_material.php"; ?>
        <?php // include "form_order_new_select_color.php"; ?>
        <?php // include "form_order_new_select_marque.php"; ?>
        <?php // include "form_order_new_select_ecouteur.php"; ?>
        <?php // include "form_order_new_select_event.php"; ?>
        <?php // include "form_order_new_select_diametre.php"; ?>
        <?php // include "form_order_new_select_options.php"; ?>
        <?php include "form_order_new_select_address.php"; ?>
        <?php //include "form_order_new_select_preview.php"; ?>

        <?php shop_orders_button_cancel(); ?>


        <?php //include 'form_order_new_9060.php' ; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "izq_orderNew.php"; ?>
    </div>

    <?php /**
      <div class="col-md-2">
      <?php include "der_help.php"; ?>
      </div>
     */ ?>




</div>

<script src="www_extended/default/shop/views/js/order_linked.js" type="text/javascript"></script>
<?php include view("home", "footer"); ?>