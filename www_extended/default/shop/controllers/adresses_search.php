<?php

/*
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;



$error = array();
################################################################################
################################################################################
################################################################################

if (! $error ) {
    
  $patients = shop_labo_orders_search($txt);

    //include 'www/shop/views/patients.php';
    include  view("shop", "patients"); 
} else {

    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}

*/