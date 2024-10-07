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
# Fecha de creacion del documento: 2024-10-01 09:10:44 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$owner_id = (isset($_POST["owner_id"]) && $_POST["owner_id"] !=""  && $_POST["owner_id"] !="null" ) ? clean($_POST["owner_id"]) :  null  ;
$office_id = (isset($_POST["office_id"]) && $_POST["office_id"] !=""  && $_POST["office_id"] !="null" ) ? clean($_POST["office_id"]) :  null  ;
$type = (isset($_POST["type"]) && $_POST["type"] !=""  && $_POST["type"] !="null" ) ? clean($_POST["type"]) :  null  ;
$title = (isset($_POST["title"]) && $_POST["title"] !=""  && $_POST["title"] !="null" ) ? clean($_POST["title"]) :  null  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$lastname = (isset($_POST["lastname"]) && $_POST["lastname"] !=""  && $_POST["lastname"] !="null" ) ? clean($_POST["lastname"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$birthdate = (isset($_POST["birthdate"]) && $_POST["birthdate"] !=""  && $_POST["birthdate"] !="null" ) ? clean($_POST["birthdate"]) :  null  ;
$tva = (isset($_POST["tva"]) && $_POST["tva"] !=""  && $_POST["tva"] !="null" ) ? clean($_POST["tva"]) :  null  ;
$billing_method = (isset($_POST["billing_method"]) && $_POST["billing_method"] !=""  && $_POST["billing_method"] !="null" ) ? clean($_POST["billing_method"]) :  null  ;
$discounts = (isset($_POST["discounts"]) && $_POST["discounts"] !=""  && $_POST["discounts"] !="null" ) ? clean($_POST["discounts"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$language = (isset($_POST["language"]) && $_POST["language"] !=""  && $_POST["language"] !="null" ) ? clean($_POST["language"]) :  null  ;
$registre_date = (isset($_POST["registre_date"]) && $_POST["registre_date"] !="" ) ? clean($_POST["registre_date"]) : current_timestamp() ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !=""  && $_POST["order_by"] !="null" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$registre_date) {                        
    array_push($error, 'Registre date is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! contacts_is_registre_date($registre_date) ) {
    array_push($error, 'Registre date format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( contacts_search_by_unique("id","tva", $tva)){
    array_push($error, 'Tva already exists in data base');
}


if( contacts_search_by_unique("id","code", $code)){
    array_push($error, 'Code already exists in data base');
}

  
//if( contacts_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = contacts_add(
        $owner_id ,  $office_id ,  $type ,  $title ,  $name ,  $lastname ,  $description ,  $birthdate ,  $tva ,  $billing_method ,  $discounts ,  $code ,  $language ,  $registre_date ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=contacts");
            break;
            
        case 2:
            header("Location: index.php?c=contacts&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=contacts&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=contacts&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=contacts&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


