<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != "null" ) ? clean($_GET["id"]) : null;

$error = array();

include view("shop", "address_check");

// si la oficina no esta aprobada no puede hacer pedidos
// si la oficina no esta aprobada no puede hacer pedidos
// si la oficina no esta aprobada no puede hacer pedidos
// si la oficina no esta aprobada no puede hacer pedidos
if (contacts_field_id('status', contacts_work_at($u_id)) <= 0) {
    array_push($error, 'This office must be approved before placing a new order');
}


// la sede no puede hacer ordenes
if (offices_is_headoffice(contacts_work_at($u_id))) {
    // array_push($error , "The headoffice can not make order") ;
}

if (!$error) {

    // si puedes crear, puedes ver todas, sino solo la que trabajas
//if ( permissions_has_permission($u_rol , "shop_offices" , "create") ) {
//    if (users_can_see_others_offices($u_id)) {
//        $offices = shop_offices_list_of_my_company();
//    } else {
//
//        $offices = shop_offices_where_i_work();
//    }

    $places = shop_agenda_places_dates_search_by_address('agenda_id', $id);

    //  vardump($places);

    include view("shop", "agenda_choose_dates");
} else {

    include view("home", "pageError");
}
