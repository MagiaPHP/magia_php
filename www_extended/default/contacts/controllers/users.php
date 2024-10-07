<?php

if (!permissions_has_permission($u_rol, "employees", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
// last insert
$li = (isset($_REQUEST['li'])) ? clean($_REQUEST['li']) : false;

$error = array();

if (!$id) {
    array_push($error, 'id dont send');
}

if (!is_id($id)) {
    array_push($error, 'id format error send');
}


if ($e) {
    array_push($error, "$e");
}
#################################################################################
#################################################################################
#################################################################################
#################################################################################
if (!$error) {

    // si mi rol es root,ve a los root, sino naranjas
    if ($u_rol == 'root') {
        $users = users_list_by_office($id);
    } else {
        $users = users_list_by_office_no_root($id);
    }



    include view("contacts", "page_users");
} else {

    include view('home', 'pageError');
}





