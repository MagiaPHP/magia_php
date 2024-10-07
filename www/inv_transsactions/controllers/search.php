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
# Fecha de creacion del documento: 2024-08-23 20:08:29 
######################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$inv_transsactions = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $inv_transsactions = inv_transsactions_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_company_id":
        $company_id = (isset($_GET["company_id"]) && $_GET["company_id"] != "" ) ? clean($_GET["company_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("company_id", $company_id));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_company_id&company_id=" . $company_id;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("company_id", $company_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_product":
        $product = (isset($_GET["product"]) && $_GET["product"] != "" ) ? clean($_GET["product"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("product", $product));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_product&product=" . $product;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("product", $product, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_transaction_number":
        $transaction_number = (isset($_GET["transaction_number"]) && $_GET["transaction_number"] != "" ) ? clean($_GET["transaction_number"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("transaction_number", $transaction_number));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_transaction_number&transaction_number=" . $transaction_number;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("transaction_number", $transaction_number, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_period":
        $period = (isset($_GET["period"]) && $_GET["period"] != "" ) ? clean($_GET["period"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("period", $period));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_period&period=" . $period;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("period", $period, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_start_date":
        $start_date = (isset($_GET["start_date"]) && $_GET["start_date"] != "" ) ? clean($_GET["start_date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("start_date", $start_date));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_start_date&start_date=" . $start_date;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("start_date", $start_date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_operation_number":
        $operation_number = (isset($_GET["operation_number"]) && $_GET["operation_number"] != "" ) ? clean($_GET["operation_number"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("operation_number", $operation_number));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_operation_number&operation_number=" . $operation_number;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("operation_number", $operation_number, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_currency":
        $currency = (isset($_GET["currency"]) && $_GET["currency"] != "" ) ? clean($_GET["currency"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("currency", $currency));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_currency&currency=" . $currency;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("currency", $currency, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_amount":
        $amount = (isset($_GET["amount"]) && $_GET["amount"] != "" ) ? clean($_GET["amount"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("amount", $amount));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_amount&amount=" . $amount;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("amount", $amount, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_percentage":
        $percentage = (isset($_GET["percentage"]) && $_GET["percentage"] != "" ) ? clean($_GET["percentage"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("percentage", $percentage));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_percentage&percentage=" . $percentage;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("percentage", $percentage, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_term":
        $term = (isset($_GET["term"]) && $_GET["term"] != "" ) ? clean($_GET["term"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("term", $term));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_term&term=" . $term;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("term", $term, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_interest":
        $interest = (isset($_GET["interest"]) && $_GET["interest"] != "" ) ? clean($_GET["interest"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("interest", $interest));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_interest&interest=" . $interest;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("interest", $interest, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_total":
        $total = (isset($_GET["total"]) && $_GET["total"] != "" ) ? clean($_GET["total"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("total", $total));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_total&total=" . $total;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("total", $total, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_retencion":
        $retencion = (isset($_GET["retencion"]) && $_GET["retencion"] != "" ) ? clean($_GET["retencion"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("retencion", $retencion));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_retencion&retencion=" . $retencion;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("retencion", $retencion, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_company_comission":
        $company_comission = (isset($_GET["company_comission"]) && $_GET["company_comission"] != "" ) ? clean($_GET["company_comission"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("company_comission", $company_comission));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_company_comission&company_comission=" . $company_comission;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("company_comission", $company_comission, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_comision_bolsa":
        $comision_bolsa = (isset($_GET["comision_bolsa"]) && $_GET["comision_bolsa"] != "" ) ? clean($_GET["comision_bolsa"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("comision_bolsa", $comision_bolsa));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_comision_bolsa&comision_bolsa=" . $comision_bolsa;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("comision_bolsa", $comision_bolsa, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_total_receivable":
        $total_receivable = (isset($_GET["total_receivable"]) && $_GET["total_receivable"] != "" ) ? clean($_GET["total_receivable"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("total_receivable", $total_receivable));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_total_receivable&total_receivable=" . $total_receivable;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("total_receivable", $total_receivable, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_expiration_date":
        $expiration_date = (isset($_GET["expiration_date"]) && $_GET["expiration_date"] != "" ) ? clean($_GET["expiration_date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("expiration_date", $expiration_date));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_expiration_date&expiration_date=" . $expiration_date;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("expiration_date", $expiration_date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=inv_transsactions&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, inv_transsactions_search($txt));
        // puede hacer falta
        $url = "index.php?c=inv_transsactionsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $inv_transsactions = inv_transsactions_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$inv_transsactions = inv_transsactions_search($txt);
        break;
}


include view("inv_transsactions", "index");      
