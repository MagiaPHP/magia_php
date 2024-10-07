<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!permissions_has_permission($u_rol, "shop_contacts", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
if (users_can_see_others_offices($u_id)) {
    // todas las oficinas
    ################################################################################
    $pagination = new Pagination($page, shop_contacts_list_by_company());
    // puede hacer falta
    $pagination->setUrl("index.php?c=shop&a=contacts");
    $contacts = shop_contacts_list_by_company($pagination->getStart(), $pagination->getLimit());
    ################################################################################
} else {
    // solo la que estoy conectado  
    ################################################################################
    $pagination = new Pagination($page, shop_contacts_list_by_office());
    // puede hacer falta
    $pagination->setUrl("index.php?c=shop&a=contacts");
    $contacts = shop_contacts_list_by_office($pagination->getStart(), $pagination->getLimit());
    ################################################################################
}
################################################################################

include view("shop", "address_check");

include view("shop", "contacts");
