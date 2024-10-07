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
# Fecha de creacion del documento: 2024-10-02 17:10:10 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$addresses = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "addresses");

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
        $addresses = addresses_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("contact_id", $contact_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("name", $name, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("name", $name, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_address":
        $address = (isset($_GET["address"]) && $_GET["address"] != "" ) ? clean($_GET["address"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("address", $address, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_address&address=" . $address;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("address", $address, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_number":
        $number = (isset($_GET["number"]) && $_GET["number"] != "" ) ? clean($_GET["number"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("number", $number, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_number&number=" . $number;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("number", $number, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_postcode":
        $postcode = (isset($_GET["postcode"]) && $_GET["postcode"] != "" ) ? clean($_GET["postcode"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("postcode", $postcode, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_postcode&postcode=" . $postcode;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("postcode", $postcode, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_barrio":
        $barrio = (isset($_GET["barrio"]) && $_GET["barrio"] != "" ) ? clean($_GET["barrio"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("barrio", $barrio, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_barrio&barrio=" . $barrio;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("barrio", $barrio, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_sector":
        $sector = (isset($_GET["sector"]) && $_GET["sector"] != "" ) ? clean($_GET["sector"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("sector", $sector, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_sector&sector=" . $sector;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("sector", $sector, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_ref":
        $ref = (isset($_GET["ref"]) && $_GET["ref"] != "" ) ? clean($_GET["ref"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("ref", $ref, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_ref&ref=" . $ref;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("ref", $ref, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_city":
        $city = (isset($_GET["city"]) && $_GET["city"] != "" ) ? clean($_GET["city"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("city", $city, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_city&city=" . $city;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("city", $city, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_province":
        $province = (isset($_GET["province"]) && $_GET["province"] != "" ) ? clean($_GET["province"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("province", $province, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_province&province=" . $province;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("province", $province, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_region":
        $region = (isset($_GET["region"]) && $_GET["region"] != "" ) ? clean($_GET["region"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("region", $region, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_region&region=" . $region;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("region", $region, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_country":
        $country = (isset($_GET["country"]) && $_GET["country"] != "" ) ? clean($_GET["country"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("country", $country, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_country&country=" . $country;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("country", $country, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("code", $code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("code", $code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=addresses&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $addresses = addresses_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, addresses_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=addressesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $addresses = addresses_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$addresses = addresses_search($txt);
        break;
}


include view("addresses", "index");      
