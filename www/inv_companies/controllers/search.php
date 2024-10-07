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
# Fecha de creacion del documento: 2024-08-23 18:08:09 
######################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$inv_companies = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $inv_companies = inv_companies_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_company_id":
        $company_id = (isset($_GET["company_id"]) && $_GET["company_id"] != "" ) ? clean($_GET["company_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_companies_search_by("company_id", $company_id));
        // puede hacer falta
        $url = "index.php?c=inv_companies&a=search&w=by_company_id&company_id=" . $company_id;
        $pagination->setUrl($url);
        $inv_companies = inv_companies_search_by("company_id", $company_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_company_type":
        $company_type = (isset($_GET["company_type"]) && $_GET["company_type"] != "" ) ? clean($_GET["company_type"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_companies_search_by("company_type", $company_type));
        // puede hacer falta
        $url = "index.php?c=inv_companies&a=search&w=by_company_type&company_type=" . $company_type;
        $pagination->setUrl($url);
        $inv_companies = inv_companies_search_by("company_type", $company_type, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_companies_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=inv_companies&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $inv_companies = inv_companies_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_companies_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=inv_companies&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $inv_companies = inv_companies_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_companies_search($txt));
        // puede hacer falta
        $url = "index.php?c=inv_companiesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $inv_companies = inv_companies_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$inv_companies = inv_companies_search($txt);
        break;
}


include view("inv_companies", "index");      
