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
# Fecha de creacion del documento: 2024-09-29 09:09:19 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$title = (isset($_POST["title"]) && $_POST["title"] !=""  && $_POST["title"] !="null" ) ? clean($_POST["title"]) :  null  ;
$abbreviation = (isset($_POST["abbreviation"]) && $_POST["abbreviation"] !=""  && $_POST["abbreviation"] !="null" ) ? clean($_POST["abbreviation"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !=""  && $_POST["order_by"] !="null" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$title) {                        
    array_push($error, 'Title is mandatory');
}
if (!$abbreviation) {                        
    array_push($error, 'Abbreviation is mandatory');
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

if (! contacts_titles_is_title($title) ) {
    array_push($error, 'Title format error');
}
if (! contacts_titles_is_abbreviation($abbreviation) ) {
    array_push($error, 'Abbreviation format error');
}
if (! contacts_titles_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! contacts_titles_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( contacts_titles_search_by_unique("id","title", $title)){
    array_push($error, 'Title already exists in data base');
}

  
//if( contacts_titles_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = contacts_titles_add(
        $title ,  $abbreviation ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=contacts_titles");
            break;
            
        case 2:
            header("Location: index.php?c=contacts_titles&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=contacts_titles&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=contacts_titles&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=contacts_titles&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


