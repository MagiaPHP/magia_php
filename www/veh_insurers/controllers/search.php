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
# Fecha de creacion del documento: 2024-09-16 17:09:04 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_insurers = null;

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
        $veh_insurers = veh_insurers_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_insurer_id":
        $insurer_id = (isset($_GET["insurer_id"]) && $_GET["insurer_id"] != "" ) ? clean($_GET["insurer_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_insurers_search_by("insurer_id", $insurer_id));
        // puede hacer falta
        $url = "index.php?c=veh_insurers&a=search&w=by_insurer_id&insurer_id=" . $insurer_id;
        $pagination->setUrl($url);
        $veh_insurers = veh_insurers_search_by("insurer_id", $insurer_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_insurer_code":
        $insurer_code = (isset($_GET["insurer_code"]) && $_GET["insurer_code"] != "" ) ? clean($_GET["insurer_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_insurers_search_by("insurer_code", $insurer_code));
        // puede hacer falta
        $url = "index.php?c=veh_insurers&a=search&w=by_insurer_code&insurer_code=" . $insurer_code;
        $pagination->setUrl($url);
        $veh_insurers = veh_insurers_search_by("insurer_code", $insurer_code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_insurers_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_insurers&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_insurers = veh_insurers_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_insurers_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_insurers&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_insurers = veh_insurers_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_insurers_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_insurersa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_insurers = veh_insurers_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_insurers = veh_insurers_search($txt);
        break;
}


include view("veh_insurers", "index");      
