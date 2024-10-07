<?php

/**
// no tiene direccion de facturacion

if( ! shop_addresses_billing()){
    header("Location: index.php?c=shop&a=addressBillingNew&smst=danger&smsm=Please add your Billing's address");
}


// no tiene direccion de facturacion
if( ! shop_addresses_delivery() ){
    header("Location: index.php?c=shop&a=addressDeliveryNew&smst=danger&smsm=Please add your Delivery's address");
}
 * 
 */


