<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;

$error = array();
################################################################################
if (!$c) {
    array_push($error, "Controller don't send");
}
if (!$a) {
    array_push($error, "Action don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################

if ($a != "delete") {
    array_push($error, "Action error");
}

if (!credit_note_lines_is_id($id)) {
    array_push($error, 'Id format error ');
}
################################################################################
$credit_note_lines = credit_note_lines_details($id);

//include "www/credit_note_lines/views/delete.php"; 
include view("credit_note_lines", "delete");
