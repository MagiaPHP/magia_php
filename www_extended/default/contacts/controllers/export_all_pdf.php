<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$only = (isset($_REQUEST["only"])) ? clean($_REQUEST["only"]) : false;
$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : $u_language;
$error = array();
$contacts = null;

// pongo tipo 1 ya que asi sea u particular se crea un empresa a su nombre
// osea tipo 1
//$contacts = contacts_list_by_type(1);
//Solo empresas 
// solo empresas con contactos internos
// Solo individuales
//vardump($only);


switch ($only) {
    case 'billed': // Solo empresas las que he facturado
        // en este caso saco los id de las facturas
        $contacts = invoices_list_clients_id();
        break;

    case 'with_tva': // solo empresas
        // Solo empresas que tienen tva
        $contacts = contacts_list_with_tva();
        break;

    case 'without_tva': // solo empresas
        // Solo empresas que tienen tva
        $contacts = contacts_list_without_tva();
        break;
//
//    case 'individuals': // solo particulates
//        // empresas sin tva
//        $contacts = contacts_list_by_type(0);
//        break;
//
//    case 'all': // all
//        // todos los contactos que su id 
//        $contacts = contacts_list();
//        break;

    default:
        $contacts = contacts_list();
        break;
}

include view("contacts", "export_all_pdf");

