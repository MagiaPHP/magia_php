<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$hr_payroll = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $hr_payroll = hr_payroll_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_employee_id":
        $employee_id = (isset($_GET["employee_id"]) && $_GET["employee_id"] != "" ) ? clean($_GET["employee_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("employee_id", $employee_id));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_employee_id&employee_id=" . $employee_id;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("employee_id", $employee_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_entry":
        $date_entry = (isset($_GET["date_entry"]) && $_GET["date_entry"] != "" ) ? clean($_GET["date_entry"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("date_entry", $date_entry));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_date_entry&date_entry=" . $date_entry;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("date_entry", $date_entry, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_address":
        $address = (isset($_GET["address"]) && $_GET["address"] != "" ) ? clean($_GET["address"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("address", $address));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_address&address=" . $address;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("address", $address, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_fonction":
        $fonction = (isset($_GET["fonction"]) && $_GET["fonction"] != "" ) ? clean($_GET["fonction"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("fonction", $fonction));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_fonction&fonction=" . $fonction;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("fonction", $fonction, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_salary_base":
        $salary_base = (isset($_GET["salary_base"]) && $_GET["salary_base"] != "" ) ? clean($_GET["salary_base"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("salary_base", $salary_base));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_salary_base&salary_base=" . $salary_base;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("salary_base", $salary_base, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_civil_status":
        $civil_status = (isset($_GET["civil_status"]) && $_GET["civil_status"] != "" ) ? clean($_GET["civil_status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("civil_status", $civil_status));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_civil_status&civil_status=" . $civil_status;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("civil_status", $civil_status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_tax_system":
        $tax_system = (isset($_GET["tax_system"]) && $_GET["tax_system"] != "" ) ? clean($_GET["tax_system"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("tax_system", $tax_system));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_tax_system&tax_system=" . $tax_system;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("tax_system", $tax_system, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("date_start", $date_start));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("date_end", $date_end));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_value_round":
        $value_round = (isset($_GET["value_round"]) && $_GET["value_round"] != "" ) ? clean($_GET["value_round"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("value_round", $value_round));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_value_round&value_round=" . $value_round;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("value_round", $value_round, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_to_pay":
        $to_pay = (isset($_GET["to_pay"]) && $_GET["to_pay"] != "" ) ? clean($_GET["to_pay"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("to_pay", $to_pay));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_to_pay&to_pay=" . $to_pay;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("to_pay", $to_pay, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_account_number":
        $account_number = (isset($_GET["account_number"]) && $_GET["account_number"] != "" ) ? clean($_GET["account_number"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("account_number", $account_number));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_account_number&account_number=" . $account_number;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("account_number", $account_number, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_notes":
        $notes = (isset($_GET["notes"]) && $_GET["notes"] != "" ) ? clean($_GET["notes"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("notes", $notes));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_notes&notes=" . $notes;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("notes", $notes, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_extras":
        $extras = (isset($_GET["extras"]) && $_GET["extras"] != "" ) ? clean($_GET["extras"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("extras", $extras));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_extras&extras=" . $extras;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("extras", $extras, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################
    case "worked_days":
        // lista de personas que han trabajado un mes y ano determinados 

        $month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : false;
        $year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : false;

        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by_from_to("{$year}-{$month}-00", "{$year}-{$month}-31"));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=worked_days&month=$month&year=$year";
        $pagination->setUrl($url);
        $workers_list = hr_employee_worked_days_search_by_from_to("{$year}-{$month}-01", "{$year}-{$month}-31", $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################
    case "month_year":
        // lista de personas que han trabajado un mes y ano determinados 

        $month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : false;
        $year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : false;

        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by_month_year($month, $year));
        // puede hacer falta
        $url = "index.php?c=hr_payroll&a=search&w=month_year&month=$month&year=$year";
        $pagination->setUrl($url);
        $workers_list = hr_employee_worked_days_search_by_month_year($month, $year, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_payroll_search($txt));
        // puede hacer falta
        $url = "index.php?c=hr_payrolla=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $hr_payroll = hr_payroll_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$hr_payroll = hr_payroll_search($txt);
        break;
}

switch ($w) {
    case 'worked_days':
        include view("hr_payroll", "worked_days");
        break;

    default:
        include view("hr_payroll", "index");
        break;
}


