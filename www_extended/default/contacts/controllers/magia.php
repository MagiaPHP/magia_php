<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();

$contacts_list = null;

$campos = contacts_extructure();

//include "www/contacts/views/magia.php";
include view("contacts", "magia");

//include "./www/home/views/index.php";
if ($debug) {
    //include "www/contacts/views/debug.php";
    include view("contacts", "debug");
}
