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
        //   vardump($_SESSION); 
//        
//       // vardump(shop_orders_waiting()); 
//        
//        $order_waiting_id = shop_orders_waiting(); 
//        
//        
//        if( $order_waiting_id  ){
//            message('info', 'You have unregistered orders, you must complete them before creating a new order');
//     
//            echo "<h3>"._tr("Orders")."</h3>"; 
//            echo '<a href="index.php?c=shop&a=order_choose_date&order_id='.$order_waiting_id.'">'._tr("Click here to finalize this order").' : '.$order_waiting_id.'</a>';  
//     
//        }else{ 
//            
//        }
        ?>




        <?php
        if (!shop_addresses_delivery_by_status(1)) {
            message('info', 'You do not have active delivery addresses');
            message('info', 'Activate or add a delivery address');
        } else {
            ?>


            <h2><?php _t("Event place"); ?></h2>
            <a name="order"></a>



            <div class="media">
                <div class="media-left media-middle">
                    <a href="#">
                        <img class="media-object" src="https://picsum.photos/100" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Casa de la cultura Ecuatoriana sede Loja</h4>
                    av seis de diciembre y patria <br>
                    Conocoto - Quito - pichincha <br>
                    Tel: 621951
                </div>
            </div>



            <hr>

            <h3><?php _t("Fechas del evento"); ?></h3>

            <p>
                <?php _t("If it is not on the list, you can add a new place"); ?>
            </p>





            <div class="media">
                <div class="media-left media-middle">
                    <a href="#">
                        <img class="media-object" src="https://picsum.photos/50" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Fecha de inicio</h4>
                    Lunes 12 de diciembre de 2023<br>
                    Hora: 13h15
                </div>
            </div>


            <div class="media">
                <div class="media-left media-middle">
                    <a href="#">
                        <img class="media-object" src="https://picsum.photos/50" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Fecha de fin</h4>
                    Miercoles 14 de diciembre de 2023<br>
                    Hora: 23h45
                </div>
            </div>


            <h3><?php _t("Precio de las entradas"); ?></h3>

            <p>
                <?php _t("Si este evento es gratis, pon cero en el precio"); ?>
            </p>



            <table class="table table-border">
                <thead>
                    <tr>
                        <th><?php _t("Sector"); ?></th>
                        <th><?php _t("Price"); ?></th>
                        <th><?php _t("Delete"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Generales</td>
                        <td>Free</td>
                        <td><a href="index.php"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                    <tr>
                        <td>Gradas</td>
                        <td>25</td>
                        <td><a href="index.php"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                    <tr>
                        <td>Palco</td>
                        <td>45</td>
                        <td><a href="index.php"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                </tbody>
            </table>















        <?php } ?>


        <a href="index.php?c=shop&a=agenda_choose_dates">agenda_choose_dates</a>






    </div>

    <div class="col-md-3">







        <?php include "der_help.php"; ?>
        <?php //include "izq_orders.php";  ?>
    </div>
</div>

<?php include view("home", "footer"); ?>