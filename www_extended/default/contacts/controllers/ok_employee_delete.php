<?php

/*
 * Un empleado no deberia ser borrado
 * mejor sria de cambiar de oficina 
 * o bloquear su usuario 
 * 
if (!permissions_has_permission($u_rol, 'employees', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// id de la oficina en cuestion 
//
$employee_id = (!empty($_POST['employee_id'])) ? clean($_POST['employee_id']) : false;
$company_id = (!empty($_POST['id'])) ? clean($_POST['id']) : false;
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : null;

$error = array();


#************************************************************************
if (!$employee_id) {
    array_push($error, '$employee_id is mandatory');
}
if (!$company_id) {
    array_push($error, '$company_id is mandatory');
}

if (! employees_by_company_contact($company_id, $employee_id)) {
    array_push($error, '$company_id is mandatory');
}

################################################################################
if (!$error) {

    employees_delete_by_company_contact($company_id, $employee_id);


    if (! employees_by_company_contact($company_id, $employee_id) ) {
        $ok_delete = true;
    }


    if ($ok_delete) { // borro el usuario 
       die("Debo borrar el user"); 
    }

    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=employees&id=$id");
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
} else {


    include view("home", "pageError");
}

*/