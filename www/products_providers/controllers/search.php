<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$products_providers = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $products_providers = products_providers_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_product_code":
        $product_code = (isset($_GET["product_code"]) && $_GET["product_code"] != "" ) ? clean($_GET["product_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_providers_search_by("product_code", $product_code));
        // puede hacer falta
        $url = "index.php?c=products_providers&a=search&w=by_product_code&product_code=" . $product_code;
        $pagination->setUrl($url);
        $products_providers = products_providers_search_by("product_code", $product_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_provider_id":
        $provider_id = (isset($_GET["provider_id"]) && $_GET["provider_id"] != "" ) ? clean($_GET["provider_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_providers_search_by("provider_id", $provider_id));
        // puede hacer falta
        $url = "index.php?c=products_providers&a=search&w=by_provider_id&provider_id=" . $provider_id;
        $pagination->setUrl($url);
        $products_providers = products_providers_search_by("provider_id", $provider_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_provider_code":
        $provider_code = (isset($_GET["provider_code"]) && $_GET["provider_code"] != "" ) ? clean($_GET["provider_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_providers_search_by("provider_code", $provider_code));
        // puede hacer falta
        $url = "index.php?c=products_providers&a=search&w=by_provider_code&provider_code=" . $provider_code;
        $pagination->setUrl($url);
        $products_providers = products_providers_search_by("provider_code", $provider_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_url":
        $url = (isset($_GET["url"]) && $_GET["url"] != "" ) ? clean($_GET["url"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_providers_search_by("url", $url));
        // puede hacer falta
        $url = "index.php?c=products_providers&a=search&w=by_url&url=" . $url;
        $pagination->setUrl($url);
        $products_providers = products_providers_search_by("url", $url, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_price":
        $price = (isset($_GET["price"]) && $_GET["price"] != "" ) ? clean($_GET["price"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_providers_search_by("price", $price));
        // puede hacer falta
        $url = "index.php?c=products_providers&a=search&w=by_price&price=" . $price;
        $pagination->setUrl($url);
        $products_providers = products_providers_search_by("price", $price, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_notes":
        $notes = (isset($_GET["notes"]) && $_GET["notes"] != "" ) ? clean($_GET["notes"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_providers_search_by("notes", $notes));
        // puede hacer falta
        $url = "index.php?c=products_providers&a=search&w=by_notes&notes=" . $notes;
        $pagination->setUrl($url);
        $products_providers = products_providers_search_by("notes", $notes, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_providers_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=products_providers&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $products_providers = products_providers_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_providers_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=products_providers&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $products_providers = products_providers_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_providers_search($txt));
        // puede hacer falta
        $url = "index.php?c=products_providersa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $products_providers = products_providers_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$products_providers = products_providers_search($txt);
        break;
}


include view("products_providers", "index");      
