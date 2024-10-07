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
# Fecha de creacion del documento: 2024-09-04 08:09:28 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$expenses_lines = null;

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
        $expenses_lines = expenses_lines_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_expense_id":
        $expense_id = (isset($_GET["expense_id"]) && $_GET["expense_id"] != "" ) ? clean($_GET["expense_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("expense_id", $expense_id));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_expense_id&expense_id=" . $expense_id;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("expense_id", $expense_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_budget_id":
        $budget_id = (isset($_GET["budget_id"]) && $_GET["budget_id"] != "" ) ? clean($_GET["budget_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("budget_id", $budget_id));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_budget_id&budget_id=" . $budget_id;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("budget_id", $budget_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_category_code":
        $category_code = (isset($_GET["category_code"]) && $_GET["category_code"] != "" ) ? clean($_GET["category_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("category_code", $category_code));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_category_code&category_code=" . $category_code;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("category_code", $category_code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_quantity":
        $quantity = (isset($_GET["quantity"]) && $_GET["quantity"] != "" ) ? clean($_GET["quantity"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("quantity", $quantity));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_quantity&quantity=" . $quantity;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("quantity", $quantity, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_price":
        $price = (isset($_GET["price"]) && $_GET["price"] != "" ) ? clean($_GET["price"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("price", $price));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_price&price=" . $price;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("price", $price, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_discounts":
        $discounts = (isset($_GET["discounts"]) && $_GET["discounts"] != "" ) ? clean($_GET["discounts"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("discounts", $discounts));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_discounts&discounts=" . $discounts;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("discounts", $discounts, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_discounts_mode":
        $discounts_mode = (isset($_GET["discounts_mode"]) && $_GET["discounts_mode"] != "" ) ? clean($_GET["discounts_mode"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("discounts_mode", $discounts_mode));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_discounts_mode&discounts_mode=" . $discounts_mode;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("discounts_mode", $discounts_mode, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_tax":
        $tax = (isset($_GET["tax"]) && $_GET["tax"] != "" ) ? clean($_GET["tax"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("tax", $tax));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_tax&tax=" . $tax;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("tax", $tax, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=expenses_lines&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_lines_search($txt));
        // puede hacer falta
        $url = "index.php?c=expenses_linesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $expenses_lines = expenses_lines_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$expenses_lines = expenses_lines_search($txt);
        break;
}


include view("expenses_lines", "index");      
