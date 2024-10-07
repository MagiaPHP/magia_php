<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$products_stock = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $products_stock = products_stock_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_product_code":
        $product_code = (isset($_GET["product_code"]) && $_GET["product_code"] != "" ) ? clean($_GET["product_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_stock_search_by("product_code", $product_code));
        // puede hacer falta
        $url = "index.php?c=products_stock&a=search&w=by_product_code&product_code=" . $product_code;
        $pagination->setUrl($url);
        $products_stock = products_stock_search_by("product_code", $product_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_office_id":
        $office_id = (isset($_GET["office_id"]) && $_GET["office_id"] != "" ) ? clean($_GET["office_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_stock_search_by("office_id", $office_id));
        // puede hacer falta
        $url = "index.php?c=products_stock&a=search&w=by_office_id&office_id=" . $office_id;
        $pagination->setUrl($url);
        $products_stock = products_stock_search_by("office_id", $office_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_stock":
        $stock = (isset($_GET["stock"]) && $_GET["stock"] != "" ) ? clean($_GET["stock"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_stock_search_by("stock", $stock));
        // puede hacer falta
        $url = "index.php?c=products_stock&a=search&w=by_stock&stock=" . $stock;
        $pagination->setUrl($url);
        $products_stock = products_stock_search_by("stock", $stock, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_stock_min":
        $stock_min = (isset($_GET["stock_min"]) && $_GET["stock_min"] != "" ) ? clean($_GET["stock_min"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_stock_search_by("stock_min", $stock_min));
        // puede hacer falta
        $url = "index.php?c=products_stock&a=search&w=by_stock_min&stock_min=" . $stock_min;
        $pagination->setUrl($url);
        $products_stock = products_stock_search_by("stock_min", $stock_min, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_stock_max":
        $stock_max = (isset($_GET["stock_max"]) && $_GET["stock_max"] != "" ) ? clean($_GET["stock_max"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_stock_search_by("stock_max", $stock_max));
        // puede hacer falta
        $url = "index.php?c=products_stock&a=search&w=by_stock_max&stock_max=" . $stock_max;
        $pagination->setUrl($url);
        $products_stock = products_stock_search_by("stock_max", $stock_max, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_stock_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=products_stock&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $products_stock = products_stock_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_stock_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=products_stock&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $products_stock = products_stock_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_stock_search($txt));
        // puede hacer falta
        $url = "index.php?c=products_stocka=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $products_stock = products_stock_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$products_stock = products_stock_search($txt);
        break;
}


include view("products_stock", "index");      
