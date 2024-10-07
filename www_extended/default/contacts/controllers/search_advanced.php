<?php

if (!permissions_has_permission('root', $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contacts_list = null;
$vista = "";
$itemsByPage = 0;
$totalItems = 0;
//------------------------------------------------------------------------------
$company_id = (isset($_GET['company_id'])) ? clean($_GET['company_id']) : false;

$error = array();

include view("contacts", "search_advanced");
