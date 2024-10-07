<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$products_presentation = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $products_presentation = products_presentation_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_product_code":
        $product_code = (isset($_GET["product_code"]) && $_GET["product_code"] != "" ) ? clean($_GET["product_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("product_code", $product_code));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_product_code&product_code=" . $product_code;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("product_code", $product_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_presentation_code":
        $presentation_code = (isset($_GET["presentation_code"]) && $_GET["presentation_code"] != "" ) ? clean($_GET["presentation_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("presentation_code", $presentation_code));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_presentation_code&presentation_code=" . $presentation_code;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("presentation_code", $presentation_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_contains_total":
        $contains_total = (isset($_GET["contains_total"]) && $_GET["contains_total"] != "" ) ? clean($_GET["contains_total"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("contains_total", $contains_total));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_contains_total&contains_total=" . $contains_total;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("contains_total", $contains_total, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_contains_code":
        $contains_code = (isset($_GET["contains_code"]) && $_GET["contains_code"] != "" ) ? clean($_GET["contains_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("contains_code", $contains_code));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_contains_code&contains_code=" . $contains_code;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("contains_code", $contains_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_height":
        $height = (isset($_GET["height"]) && $_GET["height"] != "" ) ? clean($_GET["height"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("height", $height));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_height&height=" . $height;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("height", $height, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_width":
        $width = (isset($_GET["width"]) && $_GET["width"] != "" ) ? clean($_GET["width"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("width", $width));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_width&width=" . $width;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("width", $width, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_depth":
        $depth = (isset($_GET["depth"]) && $_GET["depth"] != "" ) ? clean($_GET["depth"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("depth", $depth));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_depth&depth=" . $depth;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("depth", $depth, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_weight":
        $weight = (isset($_GET["weight"]) && $_GET["weight"] != "" ) ? clean($_GET["weight"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("weight", $weight));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_weight&weight=" . $weight;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("weight", $weight, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=products_presentation&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, products_presentation_search($txt));
        // puede hacer falta
        $url = "index.php?c=products_presentationa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $products_presentation = products_presentation_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$products_presentation = products_presentation_search($txt);
        break;
}


include view("products_presentation", "index");      
