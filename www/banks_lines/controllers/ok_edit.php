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
# Fecha de creacion del documento: 2024-09-04 10:09:08 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$my_account = (isset($_POST["my_account"]) && $_POST["my_account"] !=""  && $_POST["my_account"] !="null" ) ? clean($_POST["my_account"]) :  null  ;
$operation = (isset($_POST["operation"]) && $_POST["operation"] !=""  && $_POST["operation"] !="null" ) ? clean($_POST["operation"]) :  null  ;
$date_operation = (isset($_POST["date_operation"]) && $_POST["date_operation"] !=""  && $_POST["date_operation"] !="null" ) ? clean($_POST["date_operation"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$type = (isset($_POST["type"]) && $_POST["type"] !=""  && $_POST["type"] !="null" ) ? clean($_POST["type"]) :  null  ;
$total = (isset($_POST["total"]) && $_POST["total"] !=""  && $_POST["total"] !="null" ) ? clean($_POST["total"]) :  null  ;
$currency = (isset($_POST["currency"]) && $_POST["currency"] !=""  && $_POST["currency"] !="null" ) ? clean($_POST["currency"]) :  null  ;
$date_value = (isset($_POST["date_value"]) && $_POST["date_value"] !=""  && $_POST["date_value"] !="null" ) ? clean($_POST["date_value"]) :  null  ;
$account_sender = (isset($_POST["account_sender"]) && $_POST["account_sender"] !=""  && $_POST["account_sender"] !="null" ) ? clean($_POST["account_sender"]) :  null  ;
$sender = (isset($_POST["sender"]) && $_POST["sender"] !=""  && $_POST["sender"] !="null" ) ? clean($_POST["sender"]) :  null  ;
$comunication = (isset($_POST["comunication"]) && $_POST["comunication"] !=""  && $_POST["comunication"] !="null" ) ? clean($_POST["comunication"]) :  null  ;
$ce = (isset($_POST["ce"]) && $_POST["ce"] !=""  && $_POST["ce"] !="null" ) ? clean($_POST["ce"]) :  null  ;
$details = (isset($_POST["details"]) && $_POST["details"] !=""  && $_POST["details"] !="null" ) ? clean($_POST["details"]) :  null  ;
$message = (isset($_POST["message"]) && $_POST["message"] !=""  && $_POST["message"] !="null" ) ? clean($_POST["message"]) :  null  ;
$id_office = (isset($_POST["id_office"]) && $_POST["id_office"] !=""  && $_POST["id_office"] !="null" ) ? clean($_POST["id_office"]) :  null  ;
$office_name = (isset($_POST["office_name"]) && $_POST["office_name"] !=""  && $_POST["office_name"] !="null" ) ? clean($_POST["office_name"]) :  null  ;
$value_bankCheck_transaction = (isset($_POST["value_bankCheck_transaction"]) && $_POST["value_bankCheck_transaction"] !=""  && $_POST["value_bankCheck_transaction"] !="null" ) ? clean($_POST["value_bankCheck_transaction"]) :  null  ;
$countable_balance = (isset($_POST["countable_balance"]) && $_POST["countable_balance"] !=""  && $_POST["countable_balance"] !="null" ) ? clean($_POST["countable_balance"]) :  null  ;
$suffix_account = (isset($_POST["suffix_account"]) && $_POST["suffix_account"] !=""  && $_POST["suffix_account"] !="null" ) ? clean($_POST["suffix_account"]) :  null  ;
$sequential = (isset($_POST["sequential"]) && $_POST["sequential"] !=""  && $_POST["sequential"] !="null" ) ? clean($_POST["sequential"]) :  null  ;
$available_balance = (isset($_POST["available_balance"]) && $_POST["available_balance"] !=""  && $_POST["available_balance"] !="null" ) ? clean($_POST["available_balance"]) :  null  ;
$debit = (isset($_POST["debit"]) && $_POST["debit"] !=""  && $_POST["debit"] !="null" ) ? clean($_POST["debit"]) :  null  ;
$credit = (isset($_POST["credit"]) && $_POST["credit"] !=""  && $_POST["credit"] !="null" ) ? clean($_POST["credit"]) :  null  ;
$ref = (isset($_POST["ref"]) && $_POST["ref"] !=""  && $_POST["ref"] !="null" ) ? clean($_POST["ref"]) :  null  ;
$ref2 = (isset($_POST["ref2"]) && $_POST["ref2"] !=""  && $_POST["ref2"] !="null" ) ? clean($_POST["ref2"]) :  null  ;
$ref3 = (isset($_POST["ref3"]) && $_POST["ref3"] !=""  && $_POST["ref3"] !="null" ) ? clean($_POST["ref3"]) :  null  ;
$ref4 = (isset($_POST["ref4"]) && $_POST["ref4"] !=""  && $_POST["ref4"] !="null" ) ? clean($_POST["ref4"]) :  null  ;
$ref5 = (isset($_POST["ref5"]) && $_POST["ref5"] !=""  && $_POST["ref5"] !="null" ) ? clean($_POST["ref5"]) :  null  ;
$ref6 = (isset($_POST["ref6"]) && $_POST["ref6"] !=""  && $_POST["ref6"] !="null" ) ? clean($_POST["ref6"]) :  null  ;
$ref7 = (isset($_POST["ref7"]) && $_POST["ref7"] !=""  && $_POST["ref7"] !="null" ) ? clean($_POST["ref7"]) :  null  ;
$ref8 = (isset($_POST["ref8"]) && $_POST["ref8"] !=""  && $_POST["ref8"] !="null" ) ? clean($_POST["ref8"]) :  null  ;
$ref9 = (isset($_POST["ref9"]) && $_POST["ref9"] !=""  && $_POST["ref9"] !="null" ) ? clean($_POST["ref9"]) :  null  ;
$ref10 = (isset($_POST["ref10"]) && $_POST["ref10"] !=""  && $_POST["ref10"] !="null" ) ? clean($_POST["ref10"]) :  null  ;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] !="" ) ? clean($_POST["date_registre"]) :  date('Y-m-d G:i:s')  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$date_registre) {
    array_push($error, 'Date registre is mandatory');
}
if (!$code) {
    array_push($error, 'Code is mandatory');
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

if (! banks_lines_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! banks_lines_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! banks_lines_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! banks_lines_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( banks_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    banks_lines_edit(
        $id ,  $my_account ,  $operation ,  $date_operation ,  $description ,  $type ,  $total ,  $currency ,  $date_value ,  $account_sender ,  $sender ,  $comunication ,  $ce ,  $details ,  $message ,  $id_office ,  $office_name ,  $value_bankCheck_transaction ,  $countable_balance ,  $suffix_account ,  $sequential ,  $available_balance ,  $debit ,  $credit ,  $ref ,  $ref2 ,  $ref3 ,  $ref4 ,  $ref5 ,  $ref6 ,  $ref7 ,  $ref8 ,  $ref9 ,  $ref10 ,  $date_registre ,  $code ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=banks_lines");
            break;
            
        case 2:
            header("Location: index.php?c=banks_lines&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=banks_lines&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=banks_lines&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=banks_lines&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
