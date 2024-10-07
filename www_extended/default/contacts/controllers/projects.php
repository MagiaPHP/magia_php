<?php

if (!permissions_has_permission($u_rol, "invoices", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
$status = (isset($_REQUEST['status'])) ? clean($_REQUEST['status']) : false;

$error = array();
################################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}

if (!is_id($id)) {
    array_push($error, 'Id format error send');
}
################################################################################
$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "contact not exist");
}

//switch ($status) {
//    case 'all':
//        $invoices = invoices_search_by_client_id(offices_headoffice_of_office($id));
//        break;
//    case 10:
//    case 20:
//    case 30:
//    case 40:
//    case -10:
//    case 35:
//        $invoices = invoices_search_by_client_id_status($id, $status);
//        //vardump($status);
//        break;
//
//    default:
//        $invoices = invoices_search_by_client_id(offices_headoffice_of_office($id));
//        break;
//}


if (!$error) {



    $order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
    $order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
    $error = array();
################################################################################
// Actualizo con que columna esta ordenado 
    if (isset($_GET["order_col"])) {
        $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
        _options_push("config_projects_order_col", $data, "projects");
    }
################################################################################
    $projects = null;

################################################################################
    $pagination = new Pagination($page, projects_search_by('contact_id', $id));
// puede hacer falta
//$pagination->setUrl($url);
    $projects = projects_search_by('contact_id', $id, $pagination->getStart(), $pagination->getLimit());
################################################################################    
//$projects = projects_list(10, 5);
//    $projects = projects_search_by('contact_id', $id);
    // Añadir elementos al breadcrumb (puedes definir los elementos según el contexto)
    $breadcrumb = array(
        array("label" => "Home", "url" => "index.php"),
        array("label" => contacts_formated($id), "url" => "index.php?c=contacts&a=details&id=$id"),
        array("label" => "Contacts", "url" => "index.php?c=contacts&a=contacts&id=$id"),
    );

    include view("contacts", "page_projects");
} else {

    include view("home", "pageError");
}





