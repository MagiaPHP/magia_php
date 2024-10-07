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
# Fecha de creacion del documento: 2024-09-23 11:09:25 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$expenses = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "expenses");

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
        $expenses = expenses_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_office_id":
        $office_id = (isset($_GET["office_id"]) && $_GET["office_id"] != "" ) ? clean($_GET["office_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("office_id", $office_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_office_id&office_id=" . $office_id;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("office_id", $office_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_office_id_counter_year_month":
        $office_id_counter_year_month = (isset($_GET["office_id_counter_year_month"]) && $_GET["office_id_counter_year_month"] != "" ) ? clean($_GET["office_id_counter_year_month"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("office_id_counter_year_month", $office_id_counter_year_month, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_office_id_counter_year_month&office_id_counter_year_month=" . $office_id_counter_year_month;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("office_id_counter_year_month", $office_id_counter_year_month, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_office_id_counter_year_trimestre":
        $office_id_counter_year_trimestre = (isset($_GET["office_id_counter_year_trimestre"]) && $_GET["office_id_counter_year_trimestre"] != "" ) ? clean($_GET["office_id_counter_year_trimestre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("office_id_counter_year_trimestre", $office_id_counter_year_trimestre, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_office_id_counter_year_trimestre&office_id_counter_year_trimestre=" . $office_id_counter_year_trimestre;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("office_id_counter_year_trimestre", $office_id_counter_year_trimestre, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_office_id_counter":
        $office_id_counter = (isset($_GET["office_id_counter"]) && $_GET["office_id_counter"] != "" ) ? clean($_GET["office_id_counter"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("office_id_counter", $office_id_counter, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_office_id_counter&office_id_counter=" . $office_id_counter;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("office_id_counter", $office_id_counter, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_my_ref":
        $my_ref = (isset($_GET["my_ref"]) && $_GET["my_ref"] != "" ) ? clean($_GET["my_ref"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("my_ref", $my_ref, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_my_ref&my_ref=" . $my_ref;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("my_ref", $my_ref, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_father_id":
        $father_id = (isset($_GET["father_id"]) && $_GET["father_id"] != "" ) ? clean($_GET["father_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("father_id", $father_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_father_id&father_id=" . $father_id;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("father_id", $father_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_category_code":
        $category_code = (isset($_GET["category_code"]) && $_GET["category_code"] != "" ) ? clean($_GET["category_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("category_code", $category_code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_category_code&category_code=" . $category_code;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("category_code", $category_code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_invoice_number":
        $invoice_number = (isset($_GET["invoice_number"]) && $_GET["invoice_number"] != "" ) ? clean($_GET["invoice_number"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("invoice_number", $invoice_number, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_invoice_number&invoice_number=" . $invoice_number;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("invoice_number", $invoice_number, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_budget_id":
        $budget_id = (isset($_GET["budget_id"]) && $_GET["budget_id"] != "" ) ? clean($_GET["budget_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("budget_id", $budget_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_budget_id&budget_id=" . $budget_id;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("budget_id", $budget_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_credit_note_id":
        $credit_note_id = (isset($_GET["credit_note_id"]) && $_GET["credit_note_id"] != "" ) ? clean($_GET["credit_note_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("credit_note_id", $credit_note_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_credit_note_id&credit_note_id=" . $credit_note_id;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("credit_note_id", $credit_note_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_provider_id":
        $provider_id = (isset($_GET["provider_id"]) && $_GET["provider_id"] != "" ) ? clean($_GET["provider_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("provider_id", $provider_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_provider_id&provider_id=" . $provider_id;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("provider_id", $provider_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_seller_id":
        $seller_id = (isset($_GET["seller_id"]) && $_GET["seller_id"] != "" ) ? clean($_GET["seller_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("seller_id", $seller_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_seller_id&seller_id=" . $seller_id;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("seller_id", $seller_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_clon_from_id":
        $clon_from_id = (isset($_GET["clon_from_id"]) && $_GET["clon_from_id"] != "" ) ? clean($_GET["clon_from_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("clon_from_id", $clon_from_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_clon_from_id&clon_from_id=" . $clon_from_id;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("clon_from_id", $clon_from_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("title", $title, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("title", $title, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_addresses_billing":
        $addresses_billing = (isset($_GET["addresses_billing"]) && $_GET["addresses_billing"] != "" ) ? clean($_GET["addresses_billing"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("addresses_billing", $addresses_billing, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_addresses_billing&addresses_billing=" . $addresses_billing;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("addresses_billing", $addresses_billing, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_addresses_delivery":
        $addresses_delivery = (isset($_GET["addresses_delivery"]) && $_GET["addresses_delivery"] != "" ) ? clean($_GET["addresses_delivery"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("addresses_delivery", $addresses_delivery, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_addresses_delivery&addresses_delivery=" . $addresses_delivery;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("addresses_delivery", $addresses_delivery, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("date", $date, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("date", $date, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("date_registre", $date_registre, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_deadline":
        $deadline = (isset($_GET["deadline"]) && $_GET["deadline"] != "" ) ? clean($_GET["deadline"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("deadline", $deadline, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_deadline&deadline=" . $deadline;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("deadline", $deadline, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_total":
        $total = (isset($_GET["total"]) && $_GET["total"] != "" ) ? clean($_GET["total"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("total", $total, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_total&total=" . $total;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("total", $total, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_tax":
        $tax = (isset($_GET["tax"]) && $_GET["tax"] != "" ) ? clean($_GET["tax"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("tax", $tax, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_tax&tax=" . $tax;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("tax", $tax, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_advance":
        $advance = (isset($_GET["advance"]) && $_GET["advance"] != "" ) ? clean($_GET["advance"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("advance", $advance, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_advance&advance=" . $advance;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("advance", $advance, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_balance":
        $balance = (isset($_GET["balance"]) && $_GET["balance"] != "" ) ? clean($_GET["balance"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("balance", $balance, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_balance&balance=" . $balance;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("balance", $balance, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_comments":
        $comments = (isset($_GET["comments"]) && $_GET["comments"] != "" ) ? clean($_GET["comments"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("comments", $comments, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_comments&comments=" . $comments;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("comments", $comments, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_comments_private":
        $comments_private = (isset($_GET["comments_private"]) && $_GET["comments_private"] != "" ) ? clean($_GET["comments_private"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("comments_private", $comments_private, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_comments_private&comments_private=" . $comments_private;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("comments_private", $comments_private, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_r1":
        $r1 = (isset($_GET["r1"]) && $_GET["r1"] != "" ) ? clean($_GET["r1"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("r1", $r1, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_r1&r1=" . $r1;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("r1", $r1, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_r2":
        $r2 = (isset($_GET["r2"]) && $_GET["r2"] != "" ) ? clean($_GET["r2"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("r2", $r2, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_r2&r2=" . $r2;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("r2", $r2, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_r3":
        $r3 = (isset($_GET["r3"]) && $_GET["r3"] != "" ) ? clean($_GET["r3"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("r3", $r3, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_r3&r3=" . $r3;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("r3", $r3, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_fc":
        $fc = (isset($_GET["fc"]) && $_GET["fc"] != "" ) ? clean($_GET["fc"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("fc", $fc, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_fc&fc=" . $fc;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("fc", $fc, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_update":
        $date_update = (isset($_GET["date_update"]) && $_GET["date_update"] != "" ) ? clean($_GET["date_update"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("date_update", $date_update, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_date_update&date_update=" . $date_update;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("date_update", $date_update, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_days":
        $days = (isset($_GET["days"]) && $_GET["days"] != "" ) ? clean($_GET["days"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("days", $days, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_days&days=" . $days;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("days", $days, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_ce":
        $ce = (isset($_GET["ce"]) && $_GET["ce"] != "" ) ? clean($_GET["ce"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("ce", $ce, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_ce&ce=" . $ce;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("ce", $ce, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("code", $code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("code", $code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("type", $type, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("type", $type, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_every":
        $every = (isset($_GET["every"]) && $_GET["every"] != "" ) ? clean($_GET["every"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("every", $every, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_every&every=" . $every;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("every", $every, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_times":
        $times = (isset($_GET["times"]) && $_GET["times"] != "" ) ? clean($_GET["times"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("times", $times, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_times&times=" . $times;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("times", $times, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("date_start", $date_start, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("date_end", $date_end, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=expenses&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $expenses = expenses_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=expensesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $expenses = expenses_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$expenses = expenses_search($txt);
        break;
}


include view("expenses", "index");      
