<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$products_extras = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $products_extras = products_extras_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_product_code":
        $product_code = (isset($_GET["product_code"]) && $_GET["product_code"] != "" ) ? clean($_GET["product_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_extras_search_by("product_code", $product_code));
        // puede hacer falta
        $url = "index.php?c=products_extras&a=search&w=by_product_code&product_code=" . $product_code;
        $pagination->setUrl($url);
        $products_extras = products_extras_search_by("product_code", $product_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_extra_name":
        $extra_name = (isset($_GET["extra_name"]) && $_GET["extra_name"] != "" ) ? clean($_GET["extra_name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_extras_search_by("extra_name", $extra_name));
        // puede hacer falta
        $url = "index.php?c=products_extras&a=search&w=by_extra_name&extra_name=" . $extra_name;
        $pagination->setUrl($url);
        $products_extras = products_extras_search_by("extra_name", $extra_name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_extra_value":
        $extra_value = (isset($_GET["extra_value"]) && $_GET["extra_value"] != "" ) ? clean($_GET["extra_value"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_extras_search_by("extra_value", $extra_value));
        // puede hacer falta
        $url = "index.php?c=products_extras&a=search&w=by_extra_value&extra_value=" . $extra_value;
        $pagination->setUrl($url);
        $products_extras = products_extras_search_by("extra_value", $extra_value, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_price":
        $price = (isset($_GET["price"]) && $_GET["price"] != "" ) ? clean($_GET["price"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_extras_search_by("price", $price));
        // puede hacer falta
        $url = "index.php?c=products_extras&a=search&w=by_price&price=" . $price;
        $pagination->setUrl($url);
        $products_extras = products_extras_search_by("price", $price, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_online":
        $online = (isset($_GET["online"]) && $_GET["online"] != "" ) ? clean($_GET["online"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_extras_search_by("online", $online));
        // puede hacer falta
        $url = "index.php?c=products_extras&a=search&w=by_online&online=" . $online;
        $pagination->setUrl($url);
        $products_extras = products_extras_search_by("online", $online, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_extras_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=products_extras&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $products_extras = products_extras_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_extras_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=products_extras&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $products_extras = products_extras_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_extras_search($txt));
        // puede hacer falta
        $url = "index.php?c=products_extrasa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $products_extras = products_extras_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$products_extras = products_extras_search($txt);
        break;
}


include view("products_extras", "index");      
