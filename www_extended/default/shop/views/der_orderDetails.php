<div class="panel panel-primary">
    <div class="panel-body text-center" >
        <h3><?php echo _t("Order") . ":"; ?> <?php echo shop_orders_id_formated($id); ?></h3>
        <?php
        //  echo orders_QRcode_show($id);
        //echo "<img src="qr.php?id=$id">";
        //orders_QRcode_create($id);
        //<img src="<?php echo "img/QR/$id.png"; " width="150">
        ?>
    </div>
</div>

<?php ###################################################################### ?>
<?php ###################################################################### ?>
<?php ###################################################################### ?>
<?php ###################################################################### ?>
<?php ###################################################################### ?>


<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php echo _t("Order details"); ?>
        </h3>
    </div>





    <ul class="list-group">
        <li class="list-group-item">
            <b><?php _t("Number"); ?>: </b>
            <?php echo shop_orders_id_formated($id); ?>
        </li>


        <?php
        /*        <li class="list-group-item">
          <b><?php _t("Remake from") ; ?>: </b>
          <a href="index.php?c=shop&a=orderDetails&id=<?php echo $order['remake'] ; ?>"><?php echo $order['remake'] ; ?></a>
          </li>
         */
        ?>


        <li class="list-group-item">
            <b><?php _t("Status"); ?>: </b>
            <?php _t(orders_status_field_code("status", $order['status'])); ?>
        </li>


        <li class="list-group-item">
            <b><?php _t("Registred"); ?>: </b>
            <?php echo $order['date']; ?>
        </li>



        <?php if (!$order['date_delivery']) { ?>
            <li class="list-group-item">
                <b><?php _t("Delivery"); ?>: </b>
                <?php echo $order['delivery_days']; ?>                 
                <?php
                echo ( $order['delivery_days'] > 1 ) ? _tr("Working days after reception") : _tr("Working day after reception");
                ?>            
            </li>
        <?php } ?>



        <?php if ($order['date_delivery']) { ?>
            <li class="list-group-item">
                <b><?php _t("shipping date"); ?>: </b>
                <?php
                // echo $order['date_delivery'] . " +" . $dif_day = ceil((magia_dates_day_between(substr($order['date'] , 0 , 10) , $order['date_delivery'])) / 86400) ;
                echo $order['date_delivery'];
                ?>
            </li>
        <?php } ?>









        <li class="list-group-item">
            <b><?php _t("Discount requested"); ?>: </b>
            <?php echo ($order['discount']) ? " $order[discount] %" : ""; ?> 
        </li>
        <?php /*
          <li class="list-group-item">
          <b><?php _t("Remake from"); ?>: </b>
          <?php echo $order['remake'] ?>
          </li> */ ?>        
    </ul>
</div>

<?php ###################################################################### ?>
<?php ###################################################################### ?>
<?php ###################################################################### ?>
<?php ###################################################################### ?>
<?php ###################################################################### ?>


<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-duplicate"></span>
        <?php _t("Remake"); ?> 
    </div>
    <div class="panel-body">

        <?php
        // ORIGINAL
        // ORIGINAL
        // ORIGINAL
        // ORIGINAL
        // ORIGINAL
        // ORIGINAL
        // ORIGINAL
        // vardump($order['remake']);

        if (!$order['remake']) {

            echo "<h3>" . _tr("List of remakes made from this order") . "</h3>";

            include 'table_remake_list_by_order_id.php';

            echo "<h3>" . _tr("New remake") . "</h3>";

            if (orders_total_remake_by_order($id) < 3) {



                echo '<p>' . _tr("Remake this order max. 3 times") . '</p>';

                echo '

<a class="btn btn-primary" href="index.php?c=shop&a=orderRemake&id=' . $id . '">
    ' . _tr("Click here to make a new remake") . '
</a>';
            } else {

                message("info", 'You can make max 3 copies of an order, and this limit has been reached');
            }
        } else {

            // REMAKE
            // REMAKE
            // REMAKE
            // REMAKE
            // REMAKE
            // REMAKE
            // REMAKE
            // REMAKE
            //    include "part_remake_this_order_disabled.php";
            //        vardump($order['remake']);

            echo "<h3>" . _tr("Remake from") . " " . shop_orders_id_formated($order['remake'], 1) . "</h3>";

            echo "<p>" . _tr("This order is a copy of order");

            echo " <a href=\"index.php?c=shop&a=orderDetails&id=" . $order['remake'] . "\">" . shop_orders_id_formated($order['remake']) . "</a>";

            echo " " . _tr("and the reasons why this copy was made are") . ":</p>";

            $motifs = orders_remake_list_by_order_id($id);

            if ($motifs) {
                foreach ($motifs as $key => $motif) {
                    echo "<p><span class=\"glyphicon glyphicon-chevron-right\"></span> $motif[motif]</p> ";
                }
            } else {
                message('info', 'No envio ningun motivo');
            }



            // BOTON REMAKE
            // BOTON REMAKE
            // BOTON REMAKE
            // BOTON REMAKE
            echo "<hr>";

            echo "<h3>" . _tr("New remake") . "</h3>";

            echo "<p>" . _tr("If you want to make another copy you must do it from the original") . "</p>";

            if (orders_total_remake_by_order($order['remake']) < 3) {

                include "part_remake_this_order.php";
            } else {

                message("info", 'You can make max 3 copies of an order, and this limit has been reached');
            }
        }






        /*
          <?php if ( offices_is_headoffice(contacts_work_at($u_id)) ) { ?>
          <a class="btn btn-primary" disabled="disabled" href="#" ><?php _t("Yes, remake now") ; ?></a>

          <?php } else { ?>
          <a class="btn btn-primary" href="index.php?c=shop&a=orderRemake&id=<?php echo $id ; ?>"><?php _t("Yes, remake now") ; ?></a>
          <?php } ?>
         */
        ?>


        <?php // include "tabRemake.php";             ?>

        <?php //include "modalRemake.php" ;             ?>


    </div>
</div>






<?php if (_options_option('config_orders_copy')) { ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-duplicate"></span>
            <?php _t("Copy"); ?> 
        </div>
        <div class="panel-body">
            <h3><?php _t("Make a copy from this order"); ?></h3>

            <?php if (permissions_has_permission($u_rol, "shop", "create")) { ?>
                <form class="navbar-form navbar-right" action="index.php" method="get">
                    <input type="hidden" name="c" value="shop"> 
                    <input type="hidden" name="a" value="orderCopy"> 
                    <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 
                    <div class="form-group">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-copy"></span> 
                        <?php _t("Copy"); ?>
                    </button>
                </form>
                <?php
            } else {
                // no tiene permisos para remake
                message('info', 'You do not have permission to remake');
            }
            ?>
        </div>
    </div>
<?php } ?>




<?php
/*
  <div class="panel panel-primary">
  <div class="panel-heading">
  <span class="glyphicon glyphicon-calendar"></span>
  <?php _t("Express"); ?>
  </div>
  <div class="panel-body">

  <p><?php //echo $order['date_delivery'];  ?></p>
  <?php
  if ($order['express']) {
  echo _t("Your order is Express now.");
  include "form_express_no_express.php";
  } else {
  echo _t("<p>Make your order express.</p>");
  include "modalForm_express_update.php";
  }
  ?>

  </div>
  </div>
 */
?>





<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("My reference"); ?></div>
    <div class="panel-body">
        <?php
        if ($order['client_ref']) {
            //echo var_dump($order['client_ref']); 
            include "modalOrderUpdateClientRef.php";
        } else {
            include "formOrderUpdateClientRef.php";
        }
        ?>
    </div>
</div>










<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("Print"); ?></div>
    <div class="panel-body">

        <form target="_print" action="index.php" method="get">
            <input type="hidden" name="c" value="shop">
            <input type="hidden" name="a" value="pdfOrderDetails">
            <input type="hidden" name="id" value="<?php echo "$id"; ?>">
            <button class="btn btn-default" type="submit"> <span class="glyphicon glyphicon-print"></span> <?php echo _t("PDF"); ?> </button>            
        </form> 


    </div>
</div>



<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-user"></span>
        <?php _t("Create by"); ?>
    </div>
    <div class="panel-body">


        <p><?php _t("This order has been created by"); ?>?</p>






        <?php if ($order['behalf_of']) { ?>                
            <p>
                <?php echo contacts_formated($order['create_by']); ?> <?php _t("on behalf of"); ?>                    
                <a href="index.php?c=shop&a=contacts_details&id=<?php echo $order['behalf_of']; ?>">
                    <?php echo contacts_formated($order['behalf_of']); ?>
                </a>

            </p>
        <?php } else { ?>

            <a href="index.php?c=shop&a=contacts_details&id=<?php echo $order['create_by']; ?>">
                <?php echo contacts_formated($order['create_by']); ?>
            </a>

        <?php } ?>



    </div>
</div>


