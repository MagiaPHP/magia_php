<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;

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
################################################################################
if (!$error) {

    contacts_update_order_by($id, contacts_field_id('order_by', $id) + 1);

    $contact = contacts_details($id);

    if (offices_is_headoffice($id)) {

        $export_data = new Company();
        $export_data->setCompany($id);

        $company = new Company();
        $company->setCompany($id);

        // Añadir elementos al breadcrumb (puedes definir los elementos según el contexto)
        $breadcrumb = array(
            array("label" => "Home", "url" => "index.php"),
            array("label" => contacts_formated($id), "url" => "index.php?c=contacts&a=details&id=$id"),
            array("label" => "Contacts", "url" => "index.php?c=contacts&a=contacts&id=$id"),
        );

        include view("contacts", "page_details_company");
    } else {

        if (patients_field_by_contact_id('id', $id)) { // es paciente
            include view("contacts", "page_details_patient");
        } else { // es contacto 
            // Todo contacto 
            $con = new Contact();
            $con->setContacts($id);

            $employee = new Employee();
            $employee->setEmployee(contacts_field_id('owner_id', $id), $id);

            include view("contacts", "page_details_contacts");
        }
    }


    // Añadir elementos al breadcrumb (puedes definir los elementos según el contexto)
    $breadcrumb = array(
        array("label" => "Home", "url" => "index.php"),
        array("label" => contacts_formated($id), "url" => "index.php?c=contacts&a=details&id=$id"),
        array("label" => "contacts", "url" => "index.php?c=contacts&a=contacts&id=$id"),
//        array("label" => "Televisions", "url" => "televisions.php"),
//        array("label" => "Samsung", "url" => "samsung.php")
    );

    //
    //
    //
    //
} else {
    include view("home", "pageError");
}