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

$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "contact not exist");
}

################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    // si es sede empleados de la empresa 
    // sino solo de la oficina
    ///vardump(contacts_is_headoffice($id)); 

    if (contacts_is_headoffice($id)) {

        $employees_list = employees_list_by_company($id);
    } else {

        $employees_list = employees_list_by_office($id);
    }



    // Añadir elementos al breadcrumb (puedes definir los elementos según el contexto)
    $breadcrumb = array(
        0 => array("label" => "Home", "url" => "index.php"),
        
        
        3 => array("label" => contacts_formated($id), "url" => "index.php?c=contacts&a=details&id=$id"),
        4 => array("label" => "Employees", "url" => "index.php?c=contacts&a=employees&id=$id"),
    );

    include view("contacts", "page_employees");
} else {

    include view('home', 'pageError');
}





