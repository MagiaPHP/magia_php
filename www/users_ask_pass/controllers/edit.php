<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


include view("home", "disabled");
die();

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
if (!$a) {
    array_push($error, "Action Don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
################################################################################
################################################################################

if ($a != "edit") {
    array_push($error, "Action format error");
}
if (!users_ask_pass_is_id($id)) {
    array_push($error, "ID format error");
}

################################################################################
if (!$error) {
    $users_ask_pass = users_ask_pass_details($id);

    include view("users_ask_pass", "edit");
} else {
    array_push($error, "Check your form");

    include view("users_ask_pass", "index");
}

