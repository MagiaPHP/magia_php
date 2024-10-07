<?php include view("home", "header"); ?>

<?php farra_progreso(18, $config_orders_total_steps); ?>

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
        <?php ########################################################################  ?>        
        <h1><?php _t("Choose one or more options"); ?></h1> 
        <p><?php _t("You have the possibility to select none to several options"); ?></p>
        <?php include "form_order_new_select_options.php"; ?>
        <div class="row"> 
            <?php
            ///////////////////////////////////////////////////////////////
            //  $order_linked = (_options_option("order_linked"))? true : false;             
            $order_linked = false;
            if ($order_linked) {
                ?> 
                <span class="text-center">
                    <a href="index.php?c=shop&a=ok_order_linked&status=unlinked&redi=1"><i class="fas fa-linkttt"></i></a>
                </span>

                <?php
                // if not linked                
            } else {
                ?> 

                <span class="text-center">
                    <a href="index.php?c=shop&a=ok_order_linked&status=linked&redi=1"><i class="fas fa-unlinkttt"></i></a>
                </span>

                <?php
            }
            // **** JOB ***********************
            // 1) if var $order_linked == true
            // 2) if check one site and other side is not check > copy this select 
            // 3) if check one site and other side is check, > dont copy                 
            ?>

            <form class="form-horizontal" method="post" action="index.php">
                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="ok_order_new_options_add">
                <?php
                if ($order['side'] == "R" || $order['side'] == "S") {
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">    
                        <?php order_new_form_options($tmf_r_id, $material_r_id, "R", $option_r_id) ?>    
                    </div> 
                <?php } ?>

                <?php
                if ($order['side'] == "L" || $order['side'] == "S") {
                    if ($order['side'] == "L") {
                        echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>';
                    }
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            
                        <?php order_new_form_options($tmf_l_id, $material_l_id, "L", $option_l_id) ?>    
                    </div>
                <?php } ?> 








                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  

                    <div class="form-group text-center" >
                        <button type="submit" class="btn btn-primary">
                            <?php _t("Next"); ?>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </button>
                    </div>

                </div> 






            </form>
        </div>
        <?php ########################################################################  ?>  
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


<script src="www_extended/default/shop/views/js/op3.js" type="text/javascript"></script>

<?php
// <script src="www_extended/default/shop/views/js/order_linked_options.js" type="text/javascript"></script>
?>


<?php include view("home", "footer"); ?>