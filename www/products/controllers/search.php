<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$products = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $products = products_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_category_code":
        $category_code = (isset($_GET["category_code"]) && $_GET["category_code"] != "" ) ? clean($_GET["category_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_search_by("category_code", $category_code));
        // puede hacer falta
        $url = "index.php?c=products&a=search&w=by_category_code&category_code=" . $category_code;
        $pagination->setUrl($url);
        $products = products_search_by("category_code", $category_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=products&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $products = products_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=products&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $products = products_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=products&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $products = products_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_price":
        $price = (isset($_GET["price"]) && $_GET["price"] != "" ) ? clean($_GET["price"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_search_by("price", $price));
        // puede hacer falta
        $url = "index.php?c=products&a=search&w=by_price&price=" . $price;
        $pagination->setUrl($url);
        $products = products_search_by("price", $price, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_tax":
        $tax = (isset($_GET["tax"]) && $_GET["tax"] != "" ) ? clean($_GET["tax"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_search_by("tax", $tax));
        // puede hacer falta
        $url = "index.php?c=products&a=search&w=by_tax&tax=" . $tax;
        $pagination->setUrl($url);
        $products = products_search_by("tax", $tax, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=products&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $products = products_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=products&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $products = products_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_search($txt));
        // puede hacer falta
        $url = "index.php?c=productsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $products = products_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$products = products_search($txt);
        break;
}


include view("products", "index");      
