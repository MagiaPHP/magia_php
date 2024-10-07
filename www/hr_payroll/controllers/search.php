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
# Fecha de creacion del documento: 2024-09-26 16:09:00 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$hr_payroll = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "hr_payroll");

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
        $hr_payroll = hr_payroll_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_employee_id":
        $employee_id = (isset($_GET["employee_id"]) && $_GET["employee_id"] != "" ) ? clean($_GET["employee_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("employee_id", $employee_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_employee_id&employee_id=" . $employee_id;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("employee_id", $employee_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_entry":
        $date_entry = (isset($_GET["date_entry"]) && $_GET["date_entry"] != "" ) ? clean($_GET["date_entry"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("date_entry", $date_entry, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_date_entry&date_entry=" . $date_entry;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("date_entry", $date_entry, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_address":
        $address = (isset($_GET["address"]) && $_GET["address"] != "" ) ? clean($_GET["address"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("address", $address, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_address&address=" . $address;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("address", $address, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_fonction":
        $fonction = (isset($_GET["fonction"]) && $_GET["fonction"] != "" ) ? clean($_GET["fonction"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("fonction", $fonction, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_fonction&fonction=" . $fonction;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("fonction", $fonction, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_salary_base":
        $salary_base = (isset($_GET["salary_base"]) && $_GET["salary_base"] != "" ) ? clean($_GET["salary_base"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("salary_base", $salary_base, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_salary_base&salary_base=" . $salary_base;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("salary_base", $salary_base, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_civil_status":
        $civil_status = (isset($_GET["civil_status"]) && $_GET["civil_status"] != "" ) ? clean($_GET["civil_status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("civil_status", $civil_status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_civil_status&civil_status=" . $civil_status;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("civil_status", $civil_status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_tax_system":
        $tax_system = (isset($_GET["tax_system"]) && $_GET["tax_system"] != "" ) ? clean($_GET["tax_system"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("tax_system", $tax_system, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_tax_system&tax_system=" . $tax_system;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("tax_system", $tax_system, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("date_start", $date_start, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("date_end", $date_end, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_value_round":
        $value_round = (isset($_GET["value_round"]) && $_GET["value_round"] != "" ) ? clean($_GET["value_round"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("value_round", $value_round, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_value_round&value_round=" . $value_round;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("value_round", $value_round, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_to_pay":
        $to_pay = (isset($_GET["to_pay"]) && $_GET["to_pay"] != "" ) ? clean($_GET["to_pay"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("to_pay", $to_pay, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_to_pay&to_pay=" . $to_pay;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("to_pay", $to_pay, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_account_number":
        $account_number = (isset($_GET["account_number"]) && $_GET["account_number"] != "" ) ? clean($_GET["account_number"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("account_number", $account_number, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_account_number&account_number=" . $account_number;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("account_number", $account_number, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_notes":
        $notes = (isset($_GET["notes"]) && $_GET["notes"] != "" ) ? clean($_GET["notes"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("notes", $notes, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_notes&notes=" . $notes;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("notes", $notes, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_extras":
        $extras = (isset($_GET["extras"]) && $_GET["extras"] != "" ) ? clean($_GET["extras"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("extras", $extras, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_extras&extras=" . $extras;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("extras", $extras, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("code", $code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("code", $code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("date_registre", $date_registre, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_payroll_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=hr_payrolla=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$hr_payroll = hr_payroll_search($txt);
        break;
}


include view("hr_payroll", "index");      
