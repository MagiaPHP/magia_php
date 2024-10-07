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
# Fecha de creacion del documento: 2024-09-21 12:09:04 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$hr_employee_benefits_by_month = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "hr_employee_benefits_by_month");

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
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_employee_id":
        $employee_id = (isset($_GET["employee_id"]) && $_GET["employee_id"] != "" ) ? clean($_GET["employee_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("employee_id", $employee_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_employee_id&employee_id=" . $employee_id;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("employee_id", $employee_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_year":
        $year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("year", $year, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_year&year=" . $year;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("year", $year, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_month":
        $month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("month", $month, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_month&month=" . $month;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("month", $month, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_benefit_code":
        $benefit_code = (isset($_GET["benefit_code"]) && $_GET["benefit_code"] != "" ) ? clean($_GET["benefit_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("benefit_code", $benefit_code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_benefit_code&benefit_code=" . $benefit_code;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("benefit_code", $benefit_code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_quantity":
        $quantity = (isset($_GET["quantity"]) && $_GET["quantity"] != "" ) ? clean($_GET["quantity"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("quantity", $quantity, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_quantity&quantity=" . $quantity;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("quantity", $quantity, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_price":
        $price = (isset($_GET["price"]) && $_GET["price"] != "" ) ? clean($_GET["price"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("price", $price, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_price&price=" . $price;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("price", $price, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_company_part":
        $company_part = (isset($_GET["company_part"]) && $_GET["company_part"] != "" ) ? clean($_GET["company_part"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("company_part", $company_part, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_company_part&company_part=" . $company_part;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("company_part", $company_part, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_employee_part":
        $employee_part = (isset($_GET["employee_part"]) && $_GET["employee_part"] != "" ) ? clean($_GET["employee_part"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("employee_part", $employee_part, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_employee_part&employee_part=" . $employee_part;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("employee_part", $employee_part, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_company_part_value":
        $company_part_value = (isset($_GET["company_part_value"]) && $_GET["company_part_value"] != "" ) ? clean($_GET["company_part_value"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("company_part_value", $company_part_value, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_company_part_value&company_part_value=" . $company_part_value;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("company_part_value", $company_part_value, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_employee_part_value":
        $employee_part_value = (isset($_GET["employee_part_value"]) && $_GET["employee_part_value"] != "" ) ? clean($_GET["employee_part_value"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("employee_part_value", $employee_part_value, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_employee_part_value&employee_part_value=" . $employee_part_value;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("employee_part_value", $employee_part_value, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_month&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_benefits_by_month_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=hr_employee_benefits_by_montha=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $hr_employee_benefits_by_month = hr_employee_benefits_by_month_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$hr_employee_benefits_by_month = hr_employee_benefits_by_month_search($txt);
        break;
}


include view("hr_employee_benefits_by_month", "index");      
