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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$office_id = (isset($_POST["office_id"]) && $_POST["office_id"] !=""  && $_POST["office_id"] !="null" ) ? clean($_POST["office_id"]) :  null  ;
$office_id_counter_year_month = (isset($_POST["office_id_counter_year_month"]) && $_POST["office_id_counter_year_month"] !=""  && $_POST["office_id_counter_year_month"] !="null" ) ? clean($_POST["office_id_counter_year_month"]) :  null  ;
$office_id_counter_year_trimestre = (isset($_POST["office_id_counter_year_trimestre"]) && $_POST["office_id_counter_year_trimestre"] !=""  && $_POST["office_id_counter_year_trimestre"] !="null" ) ? clean($_POST["office_id_counter_year_trimestre"]) :  null  ;
$office_id_counter = (isset($_POST["office_id_counter"]) && $_POST["office_id_counter"] !=""  && $_POST["office_id_counter"] !="null" ) ? clean($_POST["office_id_counter"]) :  null  ;
$my_ref = (isset($_POST["my_ref"]) && $_POST["my_ref"] !=""  && $_POST["my_ref"] !="null" ) ? clean($_POST["my_ref"]) :  null  ;
$father_id = (isset($_POST["father_id"]) && $_POST["father_id"] !=""  && $_POST["father_id"] !="null" ) ? clean($_POST["father_id"]) :  null  ;
$category_code = (isset($_POST["category_code"]) && $_POST["category_code"] !=""  && $_POST["category_code"] !="null" ) ? clean($_POST["category_code"]) :  null  ;
$invoice_number = (isset($_POST["invoice_number"]) && $_POST["invoice_number"] !=""  && $_POST["invoice_number"] !="null" ) ? clean($_POST["invoice_number"]) :  null  ;
$budget_id = (isset($_POST["budget_id"]) && $_POST["budget_id"] !=""  && $_POST["budget_id"] !="null" ) ? clean($_POST["budget_id"]) :  null  ;
$credit_note_id = (isset($_POST["credit_note_id"]) && $_POST["credit_note_id"] !=""  && $_POST["credit_note_id"] !="null" ) ? clean($_POST["credit_note_id"]) :  null  ;
$provider_id = (isset($_POST["provider_id"]) && $_POST["provider_id"] !=""  && $_POST["provider_id"] !="null" ) ? clean($_POST["provider_id"]) :  null  ;
$seller_id = (isset($_POST["seller_id"]) && $_POST["seller_id"] !=""  && $_POST["seller_id"] !="null" ) ? clean($_POST["seller_id"]) :  null  ;
$clon_from_id = (isset($_POST["clon_from_id"]) && $_POST["clon_from_id"] !=""  && $_POST["clon_from_id"] !="null" ) ? clean($_POST["clon_from_id"]) :  null  ;
$title = (isset($_POST["title"]) && $_POST["title"] !=""  && $_POST["title"] !="null" ) ? clean($_POST["title"]) :  null  ;
$addresses_billing = (isset($_POST["addresses_billing"]) && $_POST["addresses_billing"] !=""  && $_POST["addresses_billing"] !="null" ) ? clean($_POST["addresses_billing"]) :  null  ;
$addresses_delivery = (isset($_POST["addresses_delivery"]) && $_POST["addresses_delivery"] !=""  && $_POST["addresses_delivery"] !="null" ) ? clean($_POST["addresses_delivery"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !=""  && $_POST["date"] !="null" ) ? clean($_POST["date"]) :  null  ;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] !="" ) ? clean($_POST["date_registre"]) :  date('Y-m-d G:i:s')  ;
$deadline = (isset($_POST["deadline"]) && $_POST["deadline"] !=""  && $_POST["deadline"] !="null" ) ? clean($_POST["deadline"]) :  null  ;
$total = (isset($_POST["total"]) && $_POST["total"] !=""  && $_POST["total"] !="null" ) ? clean($_POST["total"]) :  null  ;
$tax = (isset($_POST["tax"]) && $_POST["tax"] !=""  && $_POST["tax"] !="null" ) ? clean($_POST["tax"]) :  null  ;
$advance = (isset($_POST["advance"]) && $_POST["advance"] !=""  && $_POST["advance"] !="null" ) ? clean($_POST["advance"]) :  null  ;
$balance = (isset($_POST["balance"]) && $_POST["balance"] !=""  && $_POST["balance"] !="null" ) ? clean($_POST["balance"]) :  null  ;
$comments = (isset($_POST["comments"]) && $_POST["comments"] !=""  && $_POST["comments"] !="null" ) ? clean($_POST["comments"]) :  null  ;
$comments_private = (isset($_POST["comments_private"]) && $_POST["comments_private"] !=""  && $_POST["comments_private"] !="null" ) ? clean($_POST["comments_private"]) :  null  ;
$r1 = (isset($_POST["r1"]) && $_POST["r1"] !=""  && $_POST["r1"] !="null" ) ? clean($_POST["r1"]) :  null  ;
$r2 = (isset($_POST["r2"]) && $_POST["r2"] !=""  && $_POST["r2"] !="null" ) ? clean($_POST["r2"]) :  null  ;
$r3 = (isset($_POST["r3"]) && $_POST["r3"] !=""  && $_POST["r3"] !="null" ) ? clean($_POST["r3"]) :  null  ;
$fc = (isset($_POST["fc"]) && $_POST["fc"] !=""  && $_POST["fc"] !="null" ) ? clean($_POST["fc"]) :  null  ;
$date_update = (isset($_POST["date_update"]) && $_POST["date_update"] !=""  && $_POST["date_update"] !="null" ) ? clean($_POST["date_update"]) :  null  ;
$days = (isset($_POST["days"]) && $_POST["days"] !=""  && $_POST["days"] !="null" ) ? clean($_POST["days"]) :  null  ;
$ce = (isset($_POST["ce"]) && $_POST["ce"] !=""  && $_POST["ce"] !="null" ) ? clean($_POST["ce"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$type = (isset($_POST["type"]) && $_POST["type"] !=""  && $_POST["type"] !="null" ) ? clean($_POST["type"]) :  null  ;
$every = (isset($_POST["every"]) && $_POST["every"] !=""  && $_POST["every"] !="null" ) ? clean($_POST["every"]) :  null  ;
$times = (isset($_POST["times"]) && $_POST["times"] !=""  && $_POST["times"] !="null" ) ? clean($_POST["times"]) :  null  ;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] !=""  && $_POST["date_start"] !="null" ) ? clean($_POST["date_start"]) :  null  ;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] !=""  && $_POST["date_end"] !="null" ) ? clean($_POST["date_end"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$provider_id) {                        
    array_push($error, 'Provider id is mandatory');
}
if (!$date_registre) {                        
    array_push($error, 'Date registre is mandatory');
}
if (!$order_by) {                        
    array_push($error, 'Order by is mandatory');
}
if (!$status) {                        
    array_push($error, 'Status is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! expenses_is_provider_id($provider_id) ) {
    array_push($error, 'Provider id format error');
}
if (! expenses_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! expenses_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! expenses_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( expenses_search_by_unique("id","code", $code)){
    array_push($error, 'Code already exists in data base');
}

  
//if( expenses_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = expenses_add(
        $office_id ,  $office_id_counter_year_month ,  $office_id_counter_year_trimestre ,  $office_id_counter ,  $my_ref ,  $father_id ,  $category_code ,  $invoice_number ,  $budget_id ,  $credit_note_id ,  $provider_id ,  $seller_id ,  $clon_from_id ,  $title ,  $addresses_billing ,  $addresses_delivery ,  $date ,  $date_registre ,  $deadline ,  $total ,  $tax ,  $advance ,  $balance ,  $comments ,  $comments_private ,  $r1 ,  $r2 ,  $r3 ,  $fc ,  $date_update ,  $days ,  $ce ,  $code ,  $type ,  $every ,  $times ,  $date_start ,  $date_end ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=expenses");
            break;
            
        case 2:
            header("Location: index.php?c=expenses&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=expenses&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=expenses&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=expenses&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


