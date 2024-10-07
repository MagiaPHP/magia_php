<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php if (_options_option('config_orders_copy')) { ?>
            <?php include view("orders", 'izq_remake_copy'); ?>
        <?php } ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

    </div>



    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">  
        <?php
        if ($error) {
            foreach ($error as $key => $value) {
                message("info", $value);
            }
        }
        ?>
        <?php
        if ($mensajes) {
            foreach ($mensajes as $key => $value) {
                message("info", $value);
            }
        }
        ?>  


        <?php if (_options_option('config_orders_copy')) { ?>
            <a class="btn btn-default btn-lg" href="index.php?c=shop&a=orderCopy&id=<?php echo "$id"; ?>">
                <?php _t("Copy"); ?>
            </a>

            <a class="btn btn-primary btn-lg" href="index.php?c=shop&a=orderRemake&id=<?php echo "$id"; ?>">
                <span class="glyphicon glyphicon-ok"></span>
                <?php _t("Remake"); ?>
            </a>

        <?php } ?>



        <h2><?php _t("Remake order"); ?>: <?php echo shop_orders_id_formated($id); ?></h2>

        <h3><?php _t("Please chosse the delivery option"); ?></h3>
        <?php //include 'formOrderDetails.php'; ?>    

        <?php
        include 'tabRemake.php';
        ?>    


    </div>
    <div class="col-md-3">


        <?php //include "der_orderDetails.php"; ?>
    </div>
</div>
<?php include view("home", "footer"); ?>