<?php include view("home", "header"); ?>

<?php //farra_progreso(20, $config_orders_total_steps); ?>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php // include "der_orderNew.php"; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <a name="form"></a>

        <h1 class="text-center"><?php _t("Preview"); ?></h1>

        <?php include "order_new_00.php"; ?>

        <div class="row">

            <?php if ($side == "S") { ?> 
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php } else { ?> 
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php } ?>

                    <?php include "der_orderNew.php"; ?>
                </div>

                <?php if ($side == "S") { ?> 
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <?php } else { ?> 
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php } ?>
                        <?php include "izq_orderNew.php"; ?>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="thumbnail">
                            <img src="mapa.jpg" alt="...">
                            <div class="caption">   
                                <h2><?php _t($da['name']); ?></h2>
                                <h4><?php
                                    echo contacts_formated(contacts_work_for($u_id));
                                    // si esta direccion no tiene trasporte, 
                                    $carrier_code = addresses_transport_search_by_addresses_id($da['id']);
                                    $da_has_transport = ($carrier_code) ? true : false;
                                    $transport_name = transport_field_code('name', $carrier_code)
                                    ?></h4>                
                                <p><?php echo "$da[number], $da[address]"; ?></p>
                                <p><?php echo "$da[postcode] $da[barrio]"; ?></p>
                                <p><?php echo "$da[city], $da[country]"; ?></p>                
                                <h4><?php _t("Carrier"); ?>: <?php echo $transport_name; ?></h4>
                            </div>
                        </div>        
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="thumbnail">
                            <img src="mapa.jpg" alt="...">
                            <div class="caption">   
                                <h2><?php _t($ba['name']); ?></h2>
                                <h4><?php
                                    echo contacts_formated(contacts_work_for($u_id));
                                    // si esta direccion no tiene trasporte, 
                                    //$carrier_code = addresses_transport_search_by_addresses_id($ba['id']);
                                    //$ba_has_transport = ($carrier_code) ? true : false;
                                    //$transport_name = transport_field_code('name', $carrier_code)
                                    ?></h4>                
                                <p><?php echo "$ba[number], $ba[address]"; ?></p>
                                <p><?php echo "$ba[postcode] $ba[barrio]"; ?></p>
                                <p><?php echo "$ba[city], $ba[country]"; ?></p>                

                            </div>
                        </div>        
                    </div>

                    <?php
                    /*            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                      <h3>
                      <span class="label label-warning"><span class="glyphicon glyphicon-fire"></span></span>
                      <?php _t("Express delivery"); ?>
                      </h3>
                      <?php _t("With this modality, delivery will be made within 24 hours of receipt of the impressions, this will result in an additional charge on your invoicing"); ?>
                      <b><?php echo monedaf(10); ?></b> <?php _t('per piece'); ?> .</p>
                      <p>
                      <?php // _t("Yes, I choose this option to be delivered within 24 hours"); ?>
                      </p>
                      </div> */
                    ?>
                </div>

                <form class="form-horizontal" method="post" action="index.php">
                    <input type="hidden" name="c" value="shop">
                    <input type="hidden" name="a" value="ok_order_new_send">
                    <?php ########################################################################?>
                    <div class="row">
                        <?php if ($side == "S") { ?> 
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <?php } else { ?> 
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <?php } ?>
                                <?php if (( $order['side'] == 'R' || $order['side'] == 'S')) { ?>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php _t("Quantity"); ?> (<?php _t('Right'); ?>)</h3>
                                        </div>
                                        <div class="panel-body">
                                            <select class="form-control" name="qty_R">
                                                <?php for ($i = 1; $i < 6; $i++) { ?> 
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php ########################################################################?>
                            <?php ########################################################################?>
                            <?php if ($side == "S") { ?> 
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <?php } else { ?> 
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php } ?>


                                    <?php if (( $order['side'] == 'L' || $order['side'] == 'S')) { ?>


                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><?php _t("Quantity"); ?> (<?php _t("Left"); ?>)</h3>
                                            </div>
                                            <div class="panel-body">
                                                <select class="form-control" name="qty_L">
                                                    <?php for ($i = 1; $i < 6; $i++) { ?> 
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    <?php } ?>



                                </div>




                            </div>    
                            <?php ########################################################################?>
                            <?php ########################################################################?>
                            <?php ########################################################################?>

                            <h2><?php _t("Comments"); ?></h2>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">

                                    <div class="form-group">
                                        <label for="comments" class="col-sm-2 control-label sr-only"></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="comments" id="comments" class="form-control" placeholder="<?php _t("Something to say?"); ?>" >
                                        </div>
                                    </div>

                                    <p><?php _t("This order is registered as a draft, do you want to send it now?"); ?></p>

                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <?php _t("Send order"); ?>

                                    </button>  

                                    </form>

                                </div>        
                            </div>





                            <br><br>
                            <br><br>





                            <?php shop_orders_button_cancel(); ?>




                            <br><br><br><br><br><br><br><br><br>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <?php // include "izq_orderNew.php";   ?>
                        </div>
                    </div>


            </div>
            <?php include view("home", "footer"); ?>