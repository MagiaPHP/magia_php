<?php 
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
# Fecha de creacion del documento: 2024-09-16 12:09:23 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$banks_transactions = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  

$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  

$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;


# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


$error = array();

#################################################################################

#################################################################################

switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $banks_transactions = banks_transactions_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_client_id":
        $client_id = (isset($_GET["client_id"]) && $_GET["client_id"] != "" ) ? clean($_GET["client_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("client_id", $client_id));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_client_id&client_id=" . $client_id;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("client_id", $client_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_document":
        $document = (isset($_GET["document"]) && $_GET["document"] != "" ) ? clean($_GET["document"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("document", $document));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_document&document=" . $document;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("document", $document, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_document_id":
        $document_id = (isset($_GET["document_id"]) && $_GET["document_id"] != "" ) ? clean($_GET["document_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("document_id", $document_id));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_document_id&document_id=" . $document_id;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("document_id", $document_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("type", $type));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("type", $type, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_account_number":
        $account_number = (isset($_GET["account_number"]) && $_GET["account_number"] != "" ) ? clean($_GET["account_number"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("account_number", $account_number));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_account_number&account_number=" . $account_number;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("account_number", $account_number, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_total":
        $total = (isset($_GET["total"]) && $_GET["total"] != "" ) ? clean($_GET["total"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("total", $total));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_total&total=" . $total;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("total", $total, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_operation_number":
        $operation_number = (isset($_GET["operation_number"]) && $_GET["operation_number"] != "" ) ? clean($_GET["operation_number"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("operation_number", $operation_number));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_operation_number&operation_number=" . $operation_number;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("operation_number", $operation_number, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_ref":
        $ref = (isset($_GET["ref"]) && $_GET["ref"] != "" ) ? clean($_GET["ref"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("ref", $ref));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_ref&ref=" . $ref;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("ref", $ref, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_ce":
        $ce = (isset($_GET["ce"]) && $_GET["ce"] != "" ) ? clean($_GET["ce"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("ce", $ce));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_ce&ce=" . $ce;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("ce", $ce, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_details":
        $details = (isset($_GET["details"]) && $_GET["details"] != "" ) ? clean($_GET["details"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("details", $details));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_details&details=" . $details;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("details", $details, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_message":
        $message = (isset($_GET["message"]) && $_GET["message"] != "" ) ? clean($_GET["message"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("message", $message));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_message&message=" . $message;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("message", $message, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_currency":
        $currency = (isset($_GET["currency"]) && $_GET["currency"] != "" ) ? clean($_GET["currency"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("currency", $currency));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_currency&currency=" . $currency;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("currency", $currency, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_registre_date":
        $registre_date = (isset($_GET["registre_date"]) && $_GET["registre_date"] != "" ) ? clean($_GET["registre_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("registre_date", $registre_date));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_registre_date&registre_date=" . $registre_date;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("registre_date", $registre_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_created_date":
        $created_date = (isset($_GET["created_date"]) && $_GET["created_date"] != "" ) ? clean($_GET["created_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("created_date", $created_date));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_created_date&created_date=" . $created_date;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("created_date", $created_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_updated_date":
        $updated_date = (isset($_GET["updated_date"]) && $_GET["updated_date"] != "" ) ? clean($_GET["updated_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("updated_date", $updated_date));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_updated_date&updated_date=" . $updated_date;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("updated_date", $updated_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_canceled_code":
        $canceled_code = (isset($_GET["canceled_code"]) && $_GET["canceled_code"] != "" ) ? clean($_GET["canceled_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("canceled_code", $canceled_code));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_canceled_code&canceled_code=" . $canceled_code;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("canceled_code", $canceled_code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=banks_transactions&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, banks_transactions_search($txt));
        // puede hacer falta
        $url = "index.php?c=banks_transactionsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $banks_transactions = banks_transactions_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$banks_transactions = banks_transactions_search($txt);
        break;
}


include view("banks_transactions", "index");      
