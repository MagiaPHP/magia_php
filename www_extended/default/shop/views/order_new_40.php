<?php include view("home", "header"); ?>
<?php farra_progreso(7, $config_orders_total_steps); ?>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "der_orderNew.php"; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <a name="form"></a>




        <?php include "order_new_00.php"; ?>

        <?php ######################################################################## ?>
        <h1><?php _t("Select forme"); ?></h1>  

        <?php
        if ($_REQUEST) {

            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include "form_order_new_select_forme.php"; ?>

        <div class="row">  


            <?php
            ///////////////////////////////////////////////////////////////
            //  $order_linked = (_options_option("order_linked"))? true : false; 
            $order_linked = false;
            if ($order_linked) {
                ?> 
                <span class="text-center">
                    <a href="index.php?c=shop&a=ok_order_linked&status=unlinked&redi=1"><i class="fas fa-linktttt"></i></a>
                </span>

                <?php
                // if not linked                
            } else {
                ?> 

                <span class="text-center">
                    <a href="index.php?c=shop&a=ok_order_linked&status=linked&redi=1"><i class="fas fa-unlinktttt"></i></a>
                </span>

                <?php
            }
            // **** JOB ***********************
            // 1) if var $order_linked == true
            // 2) if check one site and other side is not check > copy this select 
            // 3) if check one site and other side is check, > dont copy                 
            // 4) www_extended/default/shop/view/js/order_linked_order.js                
            // 5) that for order_new_40 (forme) page
            // 6) that for  (options) page
            ?>


            <script>
                function changeSrc() {
                } // changeSrc()
                document.addEventListener("DOMContentLoaded", function () {
                    changeSrc();
                    updateImages("formes", "forme_id[L]", 'l');
                    updateImages("formes", "forme_id[R]", 'r');
                });
            </script>


            <form class="form-horizontal" method="post" action="index.php">
                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="ok_order_new_forme_add">


                <?php
                if ($order['side'] == "R" || $order['side'] == "S") {
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                                                                     
                        <?php order_new_form_formes($type_r_id, "R", $modele_r_id, $forme_r_id); ?>
                    </div> 
                <?php } ?>  


                <?php
                if ($order['side'] == "L" || $order['side'] == "S") {
                    if ($order['side'] == "L") {
                        echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>';
                    }
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            
                        <?php
                        order_new_form_formes($type_l_id, "L", $modele_l_id, $forme_l_id);
                        ?>    
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
        <?php ########################################################################      ?>
        <?php shop_orders_button_cancel(); ?>


    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "izq_orderNew.php"; ?>
    </div>






</div>

<?php /*
 * Cambia de imagen
 * var image = "www/gallery/img/jiho_audio/" + module + "_" + side + "_" + id + ".jpg";
 *  
 */ ?>

<script src="www_extended/default/shop/views/js/order_linked.js" type="text/javascript"></script>

<?php include view("home", "footer"); ?>


