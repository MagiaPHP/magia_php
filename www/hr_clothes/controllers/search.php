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
# Fecha de creacion del documento: 2024-09-21 12:09:58 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$hr_clothes = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "hr_clothes");

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
        $hr_clothes = hr_clothes_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_clothes_search_by("code", $code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_clothes&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $hr_clothes = hr_clothes_search_by("code", $code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_clothes_search_by("name", $name, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_clothes&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $hr_clothes = hr_clothes_search_by("name", $name, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_clothes_search_by("description", $description, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_clothes&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $hr_clothes = hr_clothes_search_by("description", $description, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_clothes_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_clothes&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $hr_clothes = hr_clothes_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_clothes_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_clothes&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $hr_clothes = hr_clothes_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_clothes_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=hr_clothesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $hr_clothes = hr_clothes_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$hr_clothes = hr_clothes_search($txt);
        break;
}


include view("hr_clothes", "index");      
