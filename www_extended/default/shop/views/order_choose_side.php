<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-md-0">
        <?php //include "izq_orders.php"; ?>
        <?php //include "izq_orderNew.php"; ?>
    </div>

    <div class="col-md-12">

        <?php
        farra_progreso(3, $config_orders_total_steps);
        //   vardump($_SESSION); 
        ?>

        <h1><?php _t("Select side"); ?></h1>  
        <a name="order"></a>

        <div class="row">
            <div class="col-sm-6 col-md-4 text-center">
                <div class="thumbnail">
                    <img src="r.jpg" alt="...">
                    <div class="caption">
                        <h3><?php _t("Rigth"); ?></h3>
                        <p>
                        </p>
                        <p>
                            <a href="index.php?c=shop&a=ok_order_new_choose_side&s=R&" class="btn btn-danger" role="button">
                                <?php _t("Next"); ?>
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>         
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 text-center">
                <div class="thumbnail">
                    <img src="s.jpeg" alt="...">
                    <div class="caption">
                        <h3><?php _t("Stereo"); ?></h3>
                        <p>

                        </p>
                        <p>
                            <a href="index.php?c=shop&a=ok_order_new_choose_side&s=S&" class="btn btn-warning" role="button">
                                <?php _t("Next"); ?> 
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>         
                        </p>
                    </div>
                </div>
            </div>






            <div class="col-sm-6 col-md-4 text-center">
                <div class="thumbnail">
                    <img src="l.jpg" alt="...">
                    <div class="caption">
                        <h3><?php _t("Left"); ?></h3>
                        <p>

                        </p>
                        <p>
                            <a href="index.php?c=shop&a=ok_order_new_choose_side&s=L&" class="btn btn-primary" role="button">
                                <?php _t("Next"); ?> 
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>         
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php shop_orders_button_cancel(); ?>






    </div>


    <div class="col-md-2">
        <?php include "der_help.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>