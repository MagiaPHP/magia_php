<?php include view("home", "header"); ?>

<?php farra_progreso(6, $config_orders_total_steps); ?>

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
        <h1><?php _t("Select mesure"); ?></h1>                
        <?php include "form_order_new_select_mesure.php"; ?>
        <div class="row"> 

            <script>
                function changeSrc() {
                } // changeSrc()
                document.addEventListener("DOMContentLoaded", function () {
                    changeSrc();
                    updateImages("mesures", "mesure_id[L]", 'l');
                    updateImages("mesures", "mesure_id[R]", 'r');
                });
            </script> 
            <form class="form-horizontal" method="post" action="index.php">
                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="ok_order_new_mesure_add">

                <?php
                if ($order['side'] == "R" || $order['side'] == "S") {
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">    
                        <?php order_new_form_mesures($modele_r_id, "R", $mesure_r_id); ?>
                    </div> 
                <?php } ?>  



                <?php
                if ($order['side'] == "L" || $order['side'] == "S") {

                    if ($order['side'] == "L") {
                        echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>';
                    }
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            
                        <?php order_new_form_mesures($modele_l_id, "L", $mesure_l_id); ?>    
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



    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <hr>
        <?php include "izq_orderNew.php"; ?>
    </div>


</div>

<script src="www_extended/default/shop/views/js/order_linked.js" type="text/javascript"></script>
<?php include view("home", "footer"); ?>