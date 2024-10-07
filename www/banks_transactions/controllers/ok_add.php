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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$client_id = (isset($_POST["client_id"]) && $_POST["client_id"] !=""  && $_POST["client_id"] !="null" ) ? clean($_POST["client_id"]) :  null  ;
$document = (isset($_POST["document"]) && $_POST["document"] !=""  && $_POST["document"] !="null" ) ? clean($_POST["document"]) :  null  ;
$document_id = (isset($_POST["document_id"]) && $_POST["document_id"] !=""  && $_POST["document_id"] !="null" ) ? clean($_POST["document_id"]) :  null  ;
$type = (isset($_POST["type"]) && $_POST["type"] !=""  && $_POST["type"] !="null" ) ? clean($_POST["type"]) :  null  ;
$account_number = (isset($_POST["account_number"]) && $_POST["account_number"] !=""  && $_POST["account_number"] !="null" ) ? clean($_POST["account_number"]) :  null  ;
$total = (isset($_POST["total"]) && $_POST["total"] !=""  && $_POST["total"] !="null" ) ? clean($_POST["total"]) :  null  ;
$operation_number = (isset($_POST["operation_number"]) && $_POST["operation_number"] !=""  && $_POST["operation_number"] !="null" ) ? clean($_POST["operation_number"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !=""  && $_POST["date"] !="null" ) ? clean($_POST["date"]) :  null  ;
$ref = (isset($_POST["ref"]) && $_POST["ref"] !=""  && $_POST["ref"] !="null" ) ? clean($_POST["ref"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$ce = (isset($_POST["ce"]) && $_POST["ce"] !=""  && $_POST["ce"] !="null" ) ? clean($_POST["ce"]) :  null  ;
$details = (isset($_POST["details"]) && $_POST["details"] !=""  && $_POST["details"] !="null" ) ? clean($_POST["details"]) :  null  ;
$message = (isset($_POST["message"]) && $_POST["message"] !=""  && $_POST["message"] !="null" ) ? clean($_POST["message"]) :  null  ;
$currency = (isset($_POST["currency"]) && $_POST["currency"] !=""  && $_POST["currency"] !="null" ) ? clean($_POST["currency"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$registre_date = (isset($_POST["registre_date"]) && $_POST["registre_date"] !="" ) ? clean($_POST["registre_date"]) : current_timestamp() ;
$created_date = (isset($_POST["created_date"]) && $_POST["created_date"] !="" ) ? clean($_POST["created_date"]) : current_timestamp() ;
$updated_date = (isset($_POST["updated_date"]) && $_POST["updated_date"] !="" ) ? clean($_POST["updated_date"]) : current_timestamp() ;
$canceled_code = (isset($_POST["canceled_code"]) && $_POST["canceled_code"] !=""  && $_POST["canceled_code"] !="null" ) ? clean($_POST["canceled_code"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$total) {                        
    array_push($error, 'Total is mandatory');
}
if (!$operation_number) {                        
    array_push($error, 'Operation number is mandatory');
}
if (!$date) {                        
    array_push($error, 'Date is mandatory');
}
if (!$registre_date) {                        
    array_push($error, 'Registre date is mandatory');
}
if (!$created_date) {                        
    array_push($error, 'Created date is mandatory');
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

if (! banks_transactions_is_total($total) ) {
    array_push($error, 'Total format error');
}
if (! banks_transactions_is_operation_number($operation_number) ) {
    array_push($error, 'Operation number format error');
}
if (! banks_transactions_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! banks_transactions_is_registre_date($registre_date) ) {
    array_push($error, 'Registre date format error');
}
if (! banks_transactions_is_created_date($created_date) ) {
    array_push($error, 'Created date format error');
}
if (! banks_transactions_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! banks_transactions_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( banks_transactions_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = banks_transactions_add(
        $client_id ,  $document ,  $document_id ,  $type ,  $account_number ,  $total ,  $operation_number ,  $date ,  $ref ,  $description ,  $ce ,  $details ,  $message ,  $currency ,  $code ,  $registre_date ,  $created_date ,  $updated_date ,  $canceled_code ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=banks_transactions");
            break;
            
        case 2:
            header("Location: index.php?c=banks_transactions&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=banks_transactions&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=banks_transactions&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=banks_transactions&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


