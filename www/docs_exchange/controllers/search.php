<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$docs_exchange = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $docs_exchange = docs_exchange_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_reciver_tva":
        $reciver_tva = (isset($_GET["reciver_tva"]) && $_GET["reciver_tva"] != "" ) ? clean($_GET["reciver_tva"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("reciver_tva", $reciver_tva));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_reciver_tva&reciver_tva=" . $reciver_tva;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("reciver_tva", $reciver_tva, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_sender_name":
        $sender_name = (isset($_GET["sender_name"]) && $_GET["sender_name"] != "" ) ? clean($_GET["sender_name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("sender_name", $sender_name));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_sender_name&sender_name=" . $sender_name;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("sender_name", $sender_name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_label":
        $label = (isset($_GET["label"]) && $_GET["label"] != "" ) ? clean($_GET["label"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("label", $label));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_label&label=" . $label;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("label", $label, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_sender_tva":
        $sender_tva = (isset($_GET["sender_tva"]) && $_GET["sender_tva"] != "" ) ? clean($_GET["sender_tva"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("sender_tva", $sender_tva));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_sender_tva&sender_tva=" . $sender_tva;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("sender_tva", $sender_tva, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_doc_type":
        $doc_type = (isset($_GET["doc_type"]) && $_GET["doc_type"] != "" ) ? clean($_GET["doc_type"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("doc_type", $doc_type));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_doc_type&doc_type=" . $doc_type;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("doc_type", $doc_type, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_doc_id":
        $doc_id = (isset($_GET["doc_id"]) && $_GET["doc_id"] != "" ) ? clean($_GET["doc_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("doc_id", $doc_id));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_doc_id&doc_id=" . $doc_id;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("doc_id", $doc_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_json":
        $json = (isset($_GET["json"]) && $_GET["json"] != "" ) ? clean($_GET["json"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("json", $json));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_json&json=" . $json;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("json", $json, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_pdf_base64":
        $pdf_base64 = (isset($_GET["pdf_base64"]) && $_GET["pdf_base64"] != "" ) ? clean($_GET["pdf_base64"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("pdf_base64", $pdf_base64));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_pdf_base64&pdf_base64=" . $pdf_base64;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("pdf_base64", $pdf_base64, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_date_send":
        $date_send = (isset($_GET["date_send"]) && $_GET["date_send"] != "" ) ? clean($_GET["date_send"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("date_send", $date_send));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_date_send&date_send=" . $date_send;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("date_send", $date_send, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=docs_exchange&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docs_exchange_search($txt));
        // puede hacer falta
        $url = "index.php?c=docs_exchangea=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $docs_exchange = docs_exchange_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$docs_exchange = docs_exchange_search($txt);
        break;
}


include view("docs_exchange", "index");      
