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
# Fecha de creacion del documento: 2024-09-21 12:09:14 
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
$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] !=""  && $_POST["employee_id"] !="null" ) ? clean($_POST["employee_id"]) :  null  ;
$document = (isset($_POST["document"]) && $_POST["document"] !=""  && $_POST["document"] !="null" ) ? clean($_POST["document"]) :  null  ;
$document_number = (isset($_POST["document_number"]) && $_POST["document_number"] !=""  && $_POST["document_number"] !="null" ) ? clean($_POST["document_number"]) :  null  ;
$date_delivery = (isset($_POST["date_delivery"]) && $_POST["date_delivery"] !=""  && $_POST["date_delivery"] !="null" ) ? clean($_POST["date_delivery"]) :  null  ;
$date_expiration = (isset($_POST["date_expiration"]) && $_POST["date_expiration"] !=""  && $_POST["date_expiration"] !="null" ) ? clean($_POST["date_expiration"]) :  null  ;
$follow = (isset($_POST["follow"]) && $_POST["follow"] !=""  && $_POST["follow"] !="null" ) ? clean($_POST["follow"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$employee_id) {
    array_push($error, 'Employee id is mandatory');
}
if (!$document) {
    array_push($error, 'Document is mandatory');
}
if (!$document_number) {
    array_push($error, 'Document number is mandatory');
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

if (! hr_employee_documents_is_employee_id($employee_id) ) {
    array_push($error, 'Employee id format error');
}
if (! hr_employee_documents_is_document($document) ) {
    array_push($error, 'Document format error');
}
if (! hr_employee_documents_is_document_number($document_number) ) {
    array_push($error, 'Document number format error');
}
if (! hr_employee_documents_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_employee_documents_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( hr_employee_documents_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    hr_employee_documents_edit(
        $id ,  $employee_id ,  $document ,  $document_number ,  $date_delivery ,  $date_expiration ,  $follow ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_documents");
            break;
            
        case 2:
            header("Location: index.php?c=hr_employee_documents&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_employee_documents&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_employee_documents&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=hr_employee_documents&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
