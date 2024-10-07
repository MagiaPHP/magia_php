<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$my_tva = contacts_field_id('tva', $u_owner_id);

//vardump($my_tva);

$error = array();
################################################################################
$docs_exchange = null;

################################################################################
# Lista de documentos con mi tva
################################################################################
################################################################################
$pagination = new Pagination($page, docs_exchange_search_by_reciver_tva($my_tva));
// puede hacer falta
//$pagination->setUrl($url);
$docs_exchange = docs_exchange_search_by_reciver_tva($my_tva, $pagination->getStart(), $pagination->getLimit());
################################################################################    
//$docs_exchange = docs_exchange_list(10, 5);


include view("docs_exchange", "index");

if ($debug) {
    include "www/docs_exchange/views/debug.php";
}