<?php 
###################################################### 
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
# Fecha de creacion del documento: 2024-08-23 18:08:12 
######################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$inv_periods = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $inv_periods = inv_periods_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_period":
        $period = (isset($_GET["period"]) && $_GET["period"] != "" ) ? clean($_GET["period"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_periods_search_by("period", $period));
        // puede hacer falta
        $url = "index.php?c=inv_periods&a=search&w=by_period&period=" . $period;
        $pagination->setUrl($url);
        $inv_periods = inv_periods_search_by("period", $period, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_periods_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=inv_periods&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $inv_periods = inv_periods_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_periods_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=inv_periods&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $inv_periods = inv_periods_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_periods_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=inv_periods&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $inv_periods = inv_periods_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_periods_search($txt));
        // puede hacer falta
        $url = "index.php?c=inv_periodsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $inv_periods = inv_periods_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$inv_periods = inv_periods_search($txt);
        break;
}


include view("inv_periods", "index");      
