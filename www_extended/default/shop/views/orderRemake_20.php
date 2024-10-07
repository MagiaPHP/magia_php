<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-0">
        <?php //    include "izq_orders.php"; ?>
    </div>
    <div class="col-md-8">  
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

        <h2><?php _t("Remake order"); ?>: <?php echo "$id"; ?></h2>
        <h4><?php _t("Please chosse the delivery option"); ?></h4>
        <?php //include 'formOrderDetails.php'; ?>    

        <?php
        include 'tabRemake.php';
        ?>    


    </div>
    <div class="col-md-4">


        <?php include "der_order_remake.php"; ?>
    </div>
</div>
<?php include view("home", "footer"); ?>