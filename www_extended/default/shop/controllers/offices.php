<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// si puedes crear, puedes ver todas, sino solo la que trabajas
//if ( permissions_has_permission($u_rol , "shop_offices" , "create") ) {
if (users_can_see_others_offices($u_id)) {
    $offices = shop_offices_list_of_my_company();
} else {

    $offices = shop_offices_where_i_work();
}

include view("shop", "address_check");
include view("shop", "offices");

