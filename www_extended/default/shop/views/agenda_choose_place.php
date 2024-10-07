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

            <?php
            include "agenda_part_choose_place.php";
            ?>


        <?php } ?>

        <a href="index.php?c=shop&a=agenda_choose_dates">agenda_choose_dates</a>






    </div>

    <div class="col-md-3">







        <?php include "der_help.php"; ?>
        <?php //include "izq_orders.php";  ?>
    </div>
</div>

<?php include view("home", "footer"); ?>