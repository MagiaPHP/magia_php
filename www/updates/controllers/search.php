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
# Fecha de creacion del documento: 2024-09-23 09:09:43 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$updates = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "updates");

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
        $updates = updates_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("code", $code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $updates = updates_search_by("code", $code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("date", $date, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $updates = updates_search_by("date", $date, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("controller", $controller, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $updates = updates_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_version":
        $version = (isset($_GET["version"]) && $_GET["version"] != "" ) ? clean($_GET["version"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("version", $version, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_version&version=" . $version;
        $pagination->setUrl($url);
        $updates = updates_search_by("version", $version, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("name", $name, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $updates = updates_search_by("name", $name, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("description", $description, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $updates = updates_search_by("description", $description, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_code_install":
        $code_install = (isset($_GET["code_install"]) && $_GET["code_install"] != "" ) ? clean($_GET["code_install"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("code_install", $code_install, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_code_install&code_install=" . $code_install;
        $pagination->setUrl($url);
        $updates = updates_search_by("code_install", $code_install, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_code_uninstall":
        $code_uninstall = (isset($_GET["code_uninstall"]) && $_GET["code_uninstall"] != "" ) ? clean($_GET["code_uninstall"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("code_uninstall", $code_uninstall, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_code_uninstall&code_uninstall=" . $code_uninstall;
        $pagination->setUrl($url);
        $updates = updates_search_by("code_uninstall", $code_uninstall, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_code_check":
        $code_check = (isset($_GET["code_check"]) && $_GET["code_check"] != "" ) ? clean($_GET["code_check"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("code_check", $code_check, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_code_check&code_check=" . $code_check;
        $pagination->setUrl($url);
        $updates = updates_search_by("code_check", $code_check, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_installed":
        $installed = (isset($_GET["installed"]) && $_GET["installed"] != "" ) ? clean($_GET["installed"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("installed", $installed, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_installed&installed=" . $installed;
        $pagination->setUrl($url);
        $updates = updates_search_by("installed", $installed, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_pass":
        $pass = (isset($_GET["pass"]) && $_GET["pass"] != "" ) ? clean($_GET["pass"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("pass", $pass, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_pass&pass=" . $pass;
        $pagination->setUrl($url);
        $updates = updates_search_by("pass", $pass, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $updates = updates_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=updates&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $updates = updates_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, updates_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=updatesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $updates = updates_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$updates = updates_search($txt);
        break;
}


include view("updates", "index");      
