<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-10-01 09:10:44 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$contacts = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "contacts");

# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


$error = array();

#################################################################################

#################################################################################

switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $contacts = contacts_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_owner_id":
        $owner_id = (isset($_GET["owner_id"]) && $_GET["owner_id"] != "" ) ? clean($_GET["owner_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("owner_id", $owner_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_owner_id&owner_id=" . $owner_id;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("owner_id", $owner_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_office_id":
        $office_id = (isset($_GET["office_id"]) && $_GET["office_id"] != "" ) ? clean($_GET["office_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("office_id", $office_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_office_id&office_id=" . $office_id;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("office_id", $office_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("type", $type, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("type", $type, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("title", $title, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("title", $title, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("name", $name, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("name", $name, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_lastname":
        $lastname = (isset($_GET["lastname"]) && $_GET["lastname"] != "" ) ? clean($_GET["lastname"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("lastname", $lastname, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_lastname&lastname=" . $lastname;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("lastname", $lastname, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("description", $description, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("description", $description, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_birthdate":
        $birthdate = (isset($_GET["birthdate"]) && $_GET["birthdate"] != "" ) ? clean($_GET["birthdate"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("birthdate", $birthdate, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_birthdate&birthdate=" . $birthdate;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("birthdate", $birthdate, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_tva":
        $tva = (isset($_GET["tva"]) && $_GET["tva"] != "" ) ? clean($_GET["tva"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("tva", $tva, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_tva&tva=" . $tva;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("tva", $tva, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_billing_method":
        $billing_method = (isset($_GET["billing_method"]) && $_GET["billing_method"] != "" ) ? clean($_GET["billing_method"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("billing_method", $billing_method, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_billing_method&billing_method=" . $billing_method;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("billing_method", $billing_method, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_discounts":
        $discounts = (isset($_GET["discounts"]) && $_GET["discounts"] != "" ) ? clean($_GET["discounts"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("discounts", $discounts, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_discounts&discounts=" . $discounts;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("discounts", $discounts, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("code", $code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("code", $code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_language":
        $language = (isset($_GET["language"]) && $_GET["language"] != "" ) ? clean($_GET["language"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("language", $language, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_language&language=" . $language;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("language", $language, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_registre_date":
        $registre_date = (isset($_GET["registre_date"]) && $_GET["registre_date"] != "" ) ? clean($_GET["registre_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("registre_date", $registre_date, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_registre_date&registre_date=" . $registre_date;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("registre_date", $registre_date, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $contacts = contacts_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, contacts_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=contacts&a=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $contacts = contacts_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$contacts = contacts_search($txt);
        break;
}


include view("contacts", "index");      
