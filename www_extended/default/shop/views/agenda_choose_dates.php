<?php include view("home", "header"); ?>

<?php farra_progreso(1, $config_orders_total_steps); ?>

<div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-8">
    </div>

    <div class="col-md-2">

    </div>
</div>

<div class="row">

    <div class="col-md-2">
        <?php include "izq_agenda.php"; ?>
    </div>


    <div class="col-md-7">

        <?php
        if (!shop_addresses_delivery_by_status(1)) {
            message('info', 'You do not have active delivery addresses');
            message('info', 'Activate or add a delivery address');
        } else {
            ?>


            <h2><?php _t("Event place"); ?></h2>
            <a name="order"></a>



            <?php
            foreach ($places as $key => $place) {
                include "agenda_part_choose_dates.php";
            }
            ?>

            <?php
            include "agenda_part_choose_place.php";
            ?>








            <hr>


            <a href="index.php?c=shop&a=agenda_choose_place" class="btn btn-primary">Add other place</a>






        <?php } ?>


        <a href="index.php?c=shop&a=agenda_choose_price">agenda_choose_price</a>






    </div>

    <div class="col-md-3">







        <?php include "der_help.php"; ?>
        <?php //include "izq_orders.php";  ?>
    </div>
</div>

<?php include view("home", "footer"); ?>