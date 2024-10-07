<h1><?php _t("Choose a delivery address"); ?></h1>
<div class="row">
    <?php
    //vardump(shop_addresses_delivery()); 

    if (!shop_addresses_delivery_by_status(1)) {
        message('info', 'You do not have active delivery addresses');
    }



    foreach (shop_addresses_delivery_by_status(1) as $key => $value) {

        $da = addresses_details($value['id']);

        // si esta direccion no tiene trasporte, 

        $carrier_code = addresses_transport_search_by_addresses_id($da['id']);

        $da_has_transport = ($carrier_code) ? true : false;

        $transport_name = transport_field_code('name', $carrier_code)
        ?>
        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
                <img src="mapa.jpg" alt="...">
                <div class="caption">

                    <h2><?php echo contacts_formated(contacts_work_for($u_id)); ?></h2>
                    <p><?php echo "$da[number], $da[address]"; ?></p>
                    <p><?php echo "$da[postcode] $da[barrio]"; ?></p>
                    <p><?php echo "$da[city], $da[country]"; ?></p>







                    <?php if ($da_has_transport) { ?>

                        <h3><?php _t("Carrier"); ?>: <?php echo $transport_name; ?></h3>

                        <form class="form-inline" method="post" action="index.php">
                            <input type="hidden" name="c" value="shop">
                            <input type="hidden" name="a" value="ok_order_new_delivery_address_add">
                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                            <input type="hidden" name="da_id" value="<?php echo $da['id']; ?>">                       
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">
                                        <?php _t("Next"); ?>
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </button>
                                </div>
                            </div>                                                                        
                        </form>
                    <?php } else { ?>
                        <h3><?php _t("Carrier"); ?>: <?php _t("No registred"); ?></h3>
                        <?php
                        message("info", "You must register a method of transport if you want to use this address");
                        ?>

                        <form class="form-inline" method="" action="">

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger" disabled="">
                                        <?php _t("Next"); ?>
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </button>
                                </div>
                            </div>                                                                        
                        </form>
                    <?php } ?>






                </div>
            </div>
        </div>


    <?php } ?>
</div>