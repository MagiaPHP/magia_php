<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$credit_note_id = (isset($_POST["credit_note_id"]) && $_POST["credit_note_id"] != "") ? clean($_POST["credit_note_id"]) : false;
$year = (isset($_POST["year"]) && $_POST["year"] != "") ? clean($_POST["year"]) : false;
$counter = (isset($_POST["counter"]) && $_POST["counter"] != "") ? clean($_POST["counter"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$credit_note_id) {
    array_push($error, '$credit_note_id is mandatory');
}
if (!$year) {
    array_push($error, '$year is mandatory');
}
if (!$counter) {
    array_push($error, '$counter is mandatory');
}

###############################################################################
# FORMAT
################################################################################
//
###############################################################################
# CONDICIONAL
################################################################################

if (credit_notes_counter_search($counter)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = credit_notes_counter_add(
            $credit_note_id, $year, $counter
    );

    header("Location: index.php?c=credit_notes_counter&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


