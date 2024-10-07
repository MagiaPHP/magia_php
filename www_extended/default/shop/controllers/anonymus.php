<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// si tengo permiso de ver oficinas veo todas sino solo la mia
//if ( permissions_has_permission($u_rol , "shop_offices" , "read") ) {
//
if (users_can_see_others_offices($u_id)) {
    // todas las oficinas
    $orders = shop_orders_list_by_company();
} else {
    // solo la que estoy conectado
    $orders = shop_orders_list_by_office();
}



// este es el contacto anonymus

$anonumus_id = (contacts_search_contact_anonymus($u_owner_id)['id']);
//vardump(contacts_search_contact_anonymus($u_owner_id));
//orders_list_behalf_of($anonumus_id);

if (!orders_list_behalf_of($anonumus_id)) {
    // header("Location index.php?c=shop");
}

//vardump($anonumus_id); 

orders_list_behalf_of($anonumus_id);

if (!orders_list_behalf_of($anonumus_id)) {
    header("Location: index.php?c=shop");
}



include view("shop", "address_check");

include view("shop", "anonymus");
