<?php

die("Disabled");
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$addresses_id = (isset($_POST["addresses_id"])) ? clean($_POST["addresses_id"]) : false;
$transport_code = (isset($_POST["transport_code"])) ? clean($_POST["transport_code"]) : false;

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!addresses_transport_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    addresses_transport_edit(
            $id, $addresses_id, $transport_code
    );
    header("Location: index.php?c=addresses_transport&a=details&id=$id");
} else {
    include view('home', 'pageError');
}

//$addresses_transport = addresses_transport_details($id);
//
//include view("addresses_transport", "index");
