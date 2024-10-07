<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contacts_list = null;
$vista = "";
$itemsByPage = 0;
$totalItems = 0;

//------------------------------------------------------------------------------
$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
$w = (isset($_GET['w'])) ? clean($_GET['w']) : false;
//------------------------------------------------------------------------------
$error = array();

switch ($w) {
    case "tva":
        $txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
        ################################################################################
        $pagination = new Pagination($page, contacts_search_by_tva($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=tva&txt=" . $txt);
        $contacts = contacts_search_by_tva($txt, 'id', $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        $vista = "page_index";
        break;

    case "type":
        $type = (isset($_GET['type'])) ? clean($_GET['type']) : false;
        ################################################################################
        $pagination = new Pagination($page, contacts_search_by_type($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=type&type=" . $type);
        $contacts = contacts_search_by_type($txt, 'id', $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        $vista = "table_index_all";
        break;

    case "headoffice": // muestra solo las headoffices
        $txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
        ################################################################################
        $pagination = new Pagination($page, contacts_search_by_headoffice($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=headoffice&txt=" . $txt);
        $contacts = contacts_search_by_headoffice($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        $vista = "table_index_headoffice";
        break;

    case "headofficeandoffices": // muestra solo las headoffices
        $txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
        ################################################################################
        $pagination = new Pagination($page, contacts_search_by_headofficeandoffices($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=headofficeandoffices&txt=" . $txt);
        $contacts = contacts_search_by_headofficeandoffices($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        $vista = "table_index_headofficeandoffices";
        break;

    case "contacts": // muestra solo las headoffices
        $txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
        ################################################################################
        $pagination = new Pagination($page, contacts_search_by_contacts($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=contacts&txt=" . $txt);
        $contacts = contacts_search_by_contacts($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        $vista = "table_index_contacts";
        break;

    case "all": // en todas partes
        $txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
        ################################################################################
        $pagination = new Pagination($page, contacts_search($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=all&txt=" . $txt);
        $contacts = contacts_search($txt, "name", $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        break;

    case "owner_id":
        $id = (isset($_GET['id'])) ? clean($_GET['id']) : false;
        ################################################################################
        $pagination = new Pagination($page, contacts_list_by_owner_id($id));
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=owner_id&id=" . $id);
        $contacts = contacts_list_by_owner_id($id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $contacts_list = contacts_list_by_owner_id($id);
        $vista = "table_index_all";
        break;

    case "like_owner":
        $id = (isset($_GET['id'])) ? clean($_GET['id']) : false;
        ################################################################################
        $pagination = new Pagination($page, contacts_search_by_company_and_name_lastname_birthdate($id));
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=like_owner&id=" . $id);
        $contacts = contacts_search_by_company_and_name_lastname_birthdate($id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $contacts_list = contacts_search_by_company_and_name_lastname_birthdate($id);
        $vista = "table_index_all";
        break;

    case "bloqued":
        ################################################################################
        $pagination = new Pagination($page, contacts_search_bloqued());
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=bloqued");
        $contacts = contacts_search_bloqued($pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $contacts_list = contacts_search_bloqued();
        $vista = "table_index_all";
        break;

    case "billing_method":
        $bm = (isset($_GET['bm'])) ? clean($_GET['bm']) : 'M';
        ################################################################################
        $pagination = new Pagination($page, contacts_search_by_billing_method($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=contacts&a=search&w=billing_method&bm=" . $bm);
        $contacts = contacts_search_by_billing_method($bm, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        $vista = "table_index_all";
        break;

    default:
        ################################################################################
        $pagination = new Pagination($page, contacts_search($txt));
        // puede hacer falta
//        $pagination->setUrl("index.php?c=contacts&a=search&" . $bm);
        $contacts = contacts_search($txt, "name", $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $contacts_list = contacts_search($txt);
        $vista = "table_index_all";
        break;
}



// config_contacts_find_one

if (_options_option('config_contacts_find_one') && count($contacts) == 1) {
    $id = $contacts[0]['id'];
    header("Location: index.php?c=contacts&a=details&id=$id");
} else {

    include view("contacts", "page_index");
}

