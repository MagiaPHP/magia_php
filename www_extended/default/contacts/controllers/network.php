<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$vista = "";
$itemsByPage = 0;
$totalItems = 0;

$pagination = new Pagination($page, contacts_list_by_type_without_my_company(0));

$contacts = contacts_list_by_type_without_my_company(0, $pagination->getStart(), $pagination->getLimit());

//vardump($contacts);


include view("contacts", "page_network");

