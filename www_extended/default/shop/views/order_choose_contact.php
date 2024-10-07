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
        <?php //include "izq_orders.php"; ?>
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
            <h2><?php _t("Choose a patient"); ?></h2>
            <a name="order"></a>
            <div>
                <?php if (shop_labo_contacts_list()) { ?>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" >
                            <a href="#patient_list" aria-controls="patient_list" role="tab" data-toggle="tab">
                                <?php _t("My patients"); ?>
                            </a>
                        </li>
                        <li role="presentation" class="active">
                            <a href="#new" aria-controls="new" role="tab" data-toggle="tab">
                                <?php _t("New patient"); ?>
                            </a>
                        </li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane " id="patient_list">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3><?php _t("My patients"); ?></h3>
                                    <?php //_t("Chosse a contact to make a new order");     ?>
                                </div>
                                <div class="panel-body">

                                    <?php
                                    message('info', 'New way to search');
                                    ?>
                                    <p>
                                        <?php _t("In the search result click on the button to create the order"); ?>
                                    </p>
                                    <?php
                                    include "form_choose_contact2.php";
                                    ?>

                                </div>
                            </div>
                        </div>


                        <div role="tabpanel" class="tab-pane active" id="new">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3><?php _t("New patient"); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <?php include "form_contacts_new.php"; ?>
                                </div>
                            </div>
                        </div>

                    </div>                
                <?php } else { ?>
                    <div role="tabpanel" class="tab-pane" id="new">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3><?php _t("New patient"); ?></h3>
                            </div>
                            <div class="panel-body">
                                <?php include "form_contacts_new.php"; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>













    </div>

    <div class="col-md-3">







        <?php include "der_help.php"; ?>
        <?php //include "izq_orders.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>