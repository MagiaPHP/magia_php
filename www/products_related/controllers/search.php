<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$products_related = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $products_related = products_related_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_product_code":
        $product_code = (isset($_GET["product_code"]) && $_GET["product_code"] != "" ) ? clean($_GET["product_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_related_search_by("product_code", $product_code));
        // puede hacer falta
        $url = "index.php?c=products_related&a=search&w=by_product_code&product_code=" . $product_code;
        $pagination->setUrl($url);
        $products_related = products_related_search_by("product_code", $product_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_related_code":
        $related_code = (isset($_GET["related_code"]) && $_GET["related_code"] != "" ) ? clean($_GET["related_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_related_search_by("related_code", $related_code));
        // puede hacer falta
        $url = "index.php?c=products_related&a=search&w=by_related_code&related_code=" . $related_code;
        $pagination->setUrl($url);
        $products_related = products_related_search_by("related_code", $related_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_related_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=products_related&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $products_related = products_related_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_related_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=products_related&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $products_related = products_related_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_related_search($txt));
        // puede hacer falta
        $url = "index.php?c=products_relateda=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $products_related = products_related_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$products_related = products_related_search($txt);
        break;
}


include view("products_related", "index");      
