<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-0">
        <?php //    include "izq_orders.php"; ?>
    </div>
    <div class="col-md-9">  
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

        <?php include 'formOrderDetails.php'; ?>  

        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Comments"); ?></div>
            <div class="panel-body">
                <?php
                include "comments.php";
                ?>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <?php include "der_orderDetails.php"; ?>
    </div>
</div>
<?php include view("home", "footer"); ?>