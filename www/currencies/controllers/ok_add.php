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
# Fecha de creacion del documento: 2024-09-04 08:09:19 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$rate = (isset($_POST["rate"]) && $_POST["rate"] !=""  && $_POST["rate"] !="null" ) ? clean($_POST["rate"]) :  null  ;
$rate_silent = (isset($_POST["rate_silent"]) && $_POST["rate_silent"] !=""  && $_POST["rate_silent"] !="null" ) ? clean($_POST["rate_silent"]) :  null  ;
$rate_id = (isset($_POST["rate_id"]) && $_POST["rate_id"] !=""  && $_POST["rate_id"] !="null" ) ? clean($_POST["rate_id"]) :  null  ;
$accuracy = (isset($_POST["accuracy"]) && $_POST["accuracy"] !=""  && $_POST["accuracy"] !="null" ) ? clean($_POST["accuracy"]) :  null  ;
$rounding = (isset($_POST["rounding"]) && $_POST["rounding"] !=""  && $_POST["rounding"] !="null" ) ? clean($_POST["rounding"]) :  null  ;
$active = (isset($_POST["active"]) && $_POST["active"] !=""  && $_POST["active"] !="null" ) ? clean($_POST["active"]) :  null  ;
$company_id = (isset($_POST["company_id"]) && $_POST["company_id"] !=""  && $_POST["company_id"] !="null" ) ? clean($_POST["company_id"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !=""  && $_POST["date"] !="null" ) ? clean($_POST["date"]) :  null  ;
$base = (isset($_POST["base"]) && $_POST["base"] !=""  && $_POST["base"] !="null" ) ? clean($_POST["base"]) :  null  ;
$position = (isset($_POST["position"]) && $_POST["position"] !="" ) ? clean($_POST["position"]) : after ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$name) {                        
    array_push($error, 'Name is mandatory');
}
if (!$code) {                        
    array_push($error, 'Code is mandatory');
}
if (!$rate) {                        
    array_push($error, 'Rate is mandatory');
}
if (!$rate_silent) {                        
    array_push($error, 'Rate silent is mandatory');
}
if (!$rate_id) {                        
    array_push($error, 'Rate id is mandatory');
}
if (!$accuracy) {                        
    array_push($error, 'Accuracy is mandatory');
}
if (!$rounding) {                        
    array_push($error, 'Rounding is mandatory');
}
if (!$active) {                        
    array_push($error, 'Active is mandatory');
}
if (!$company_id) {                        
    array_push($error, 'Company id is mandatory');
}
if (!$date) {                        
    array_push($error, 'Date is mandatory');
}
if (!$base) {                        
    array_push($error, 'Base is mandatory');
}
if (!$position) {                        
    array_push($error, 'Position is mandatory');
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

if (! currencies_is_name($name) ) {
    array_push($error, 'Name format error');
}
if (! currencies_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! currencies_is_rate($rate) ) {
    array_push($error, 'Rate format error');
}
if (! currencies_is_rate_silent($rate_silent) ) {
    array_push($error, 'Rate silent format error');
}
if (! currencies_is_rate_id($rate_id) ) {
    array_push($error, 'Rate id format error');
}
if (! currencies_is_accuracy($accuracy) ) {
    array_push($error, 'Accuracy format error');
}
if (! currencies_is_rounding($rounding) ) {
    array_push($error, 'Rounding format error');
}
if (! currencies_is_active($active) ) {
    array_push($error, 'Active format error');
}
if (! currencies_is_company_id($company_id) ) {
    array_push($error, 'Company id format error');
}
if (! currencies_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! currencies_is_base($base) ) {
    array_push($error, 'Base format error');
}
if (! currencies_is_position($position) ) {
    array_push($error, 'Position format error');
}
if (! currencies_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! currencies_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( currencies_search_by_unique("id","code", $code)){
    array_push($error, 'Code already exists in data base');
}

  
//if( currencies_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = currencies_add(
        $name ,  $code ,  $rate ,  $rate_silent ,  $rate_id ,  $accuracy ,  $rounding ,  $active ,  $company_id ,  $date ,  $base ,  $position ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=currencies");
            break;
            
        case 2:
            header("Location: index.php?c=currencies&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=currencies&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=currencies&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=currencies&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


