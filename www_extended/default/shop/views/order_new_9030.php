<?php include view("home", "header"); ?>

<?php farra_progreso(15, $config_orders_total_steps); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "der_orderNew.php"; ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <a name="form"></a>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include "order_new_00.php"; ?>


        <?php
        /*        <?php ######################################################################## ?>
          <h1><?php _t("Options"); ?></h1>
          <?php  include "form_order_new_select_options.php"; ?>
          <div class="row">
          <form class="form-horizontal" method="post" action="index.php">
          <input type="hidden" name="c" value="shop">
          <input type="hidden" name="a" value="ok_order_new_options_add">

          <?php if ($order['side'] == "L" || $order['side'] == "S") { ?>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <?php order_new_form_types($type_id, "L"); ?>
          </div>
          <?php } ?>
          <?php
          if ($order['side'] == "R" || $order['side'] == "S") {
          if ($order['side'] == "R") {
          echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>';
          }
          ?>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <?php order_new_form_types($type_id, "R"); ?>
          </div>
          <?php } ?>
          <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10 text-center">
          <button type="submit" class="btn btn-primary">
          <?php _t("Next"); ?>
          </button>
          </div>
          </div>
          </form>
          </div>
          <?php ######################################################################## ?> */
        ?>
        <?php shop_orders_button_cancel(); ?>







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
        <?php //include "form_order_new_select_options.php"; ?>

        <?php //include 'form_order_new_9030.php' ; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "izq_orderNew.php"; ?>
    </div>


</div>
<script src="www_extended/default/shop/views/js/form-action.js"  type="text/javascript" ></script>
<script src="www_extended/default/shop/views/js/order_linked.js" type="text/javascript"></script>
<?php include view("home", "footer"); ?>