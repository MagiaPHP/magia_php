<?php

if (!permissions_has_permission($u_rol, 'contacts', "read")) {
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

################################################################################

$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "Contact not exist");
}

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    //$contacts_list = contacts_list_according_company($id);
    // si es headoffice muestra de toda su empresa
    
    
    //vardump(offices_is_headoffice($id)); 
    
    if (offices_is_headoffice($id)) {
        $contacts_list = contacts_list_according_company_and_type($id, 0);
        // sino solo de su oficina 
    } else {
        $contacts_list = contacts_list_by_office_type($id, 0);
    }

    //$contacts_list = contacts_list_according_company_and_type($id, 0);
//
//    if ($u_rol == 'root') {
//        $contacts_list = contacts_list_according_company_and_type($id, 0);
//    } else {
//        $contacts_list = contacts_list_according_company_and_type_no_root($id, 0);
//    }
    //
    //
    //
    //
    // Añadir elementos al breadcrumb (puedes definir los elementos según el contexto)
    $breadcrumb = array(
        array("label" => "Home", "url" => "index.php"),
        array("label" => contacts_formated($id), "url" => "index.php?c=contacts&a=details&id=$id"),
        array("label" => "Contacts", "url" => "index.php?c=contacts&a=contacts&id=$id"),
    );

    include view("contacts", "page_contacts");
} else {

    include view("home", "pageError");
}





