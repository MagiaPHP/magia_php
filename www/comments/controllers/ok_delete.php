<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;

$error = array();
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}


if ($u_id !== comments_field_id("sender_id", $id)) {
    array_push($error, 'This comments is not yours');
}

if (!comments_is_id($id)) {
    array_push($error, 'Id format error');
}
################################################################################

if (!$error) {

    comments_change_status(
            $id, 0
    );

    header("Location: index.php?c=comments");
}

include view("comments", "delete");
