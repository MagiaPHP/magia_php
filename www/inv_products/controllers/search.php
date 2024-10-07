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
# Fecha de creacion del documento: 2024-08-23 18:08:14 
######################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$inv_products = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $inv_products = inv_products_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_product":
        $product = (isset($_GET["product"]) && $_GET["product"] != "" ) ? clean($_GET["product"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_products_search_by("product", $product));
        // puede hacer falta
        $url = "index.php?c=inv_products&a=search&w=by_product&product=" . $product;
        $pagination->setUrl($url);
        $inv_products = inv_products_search_by("product", $product, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_products_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=inv_products&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $inv_products = inv_products_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_products_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=inv_products&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $inv_products = inv_products_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_products_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=inv_products&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $inv_products = inv_products_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_products_search($txt));
        // puede hacer falta
        $url = "index.php?c=inv_productsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $inv_products = inv_products_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$inv_products = inv_products_search($txt);
        break;
}


include view("inv_products", "index");      
