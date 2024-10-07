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
# Fecha de creacion del documento: 2024-09-04 08:09:19 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$currencies = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  

$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  

$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;


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
        $currencies = currencies_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_rate":
        $rate = (isset($_GET["rate"]) && $_GET["rate"] != "" ) ? clean($_GET["rate"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("rate", $rate));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_rate&rate=" . $rate;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("rate", $rate, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_rate_silent":
        $rate_silent = (isset($_GET["rate_silent"]) && $_GET["rate_silent"] != "" ) ? clean($_GET["rate_silent"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("rate_silent", $rate_silent));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_rate_silent&rate_silent=" . $rate_silent;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("rate_silent", $rate_silent, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_rate_id":
        $rate_id = (isset($_GET["rate_id"]) && $_GET["rate_id"] != "" ) ? clean($_GET["rate_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("rate_id", $rate_id));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_rate_id&rate_id=" . $rate_id;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("rate_id", $rate_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_accuracy":
        $accuracy = (isset($_GET["accuracy"]) && $_GET["accuracy"] != "" ) ? clean($_GET["accuracy"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("accuracy", $accuracy));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_accuracy&accuracy=" . $accuracy;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("accuracy", $accuracy, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_rounding":
        $rounding = (isset($_GET["rounding"]) && $_GET["rounding"] != "" ) ? clean($_GET["rounding"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("rounding", $rounding));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_rounding&rounding=" . $rounding;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("rounding", $rounding, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_active":
        $active = (isset($_GET["active"]) && $_GET["active"] != "" ) ? clean($_GET["active"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("active", $active));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_active&active=" . $active;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("active", $active, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_company_id":
        $company_id = (isset($_GET["company_id"]) && $_GET["company_id"] != "" ) ? clean($_GET["company_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("company_id", $company_id));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_company_id&company_id=" . $company_id;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("company_id", $company_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_base":
        $base = (isset($_GET["base"]) && $_GET["base"] != "" ) ? clean($_GET["base"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("base", $base));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_base&base=" . $base;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("base", $base, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_position":
        $position = (isset($_GET["position"]) && $_GET["position"] != "" ) ? clean($_GET["position"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("position", $position));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_position&position=" . $position;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("position", $position, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=currencies&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $currencies = currencies_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, currencies_search($txt));
        // puede hacer falta
        $url = "index.php?c=currenciesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $currencies = currencies_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$currencies = currencies_search($txt);
        break;
}


include view("currencies", "index");      
