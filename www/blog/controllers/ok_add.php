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
# Fecha de creacion del documento: 2024-09-27 12:09:30 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$controller = (isset($_POST["controller"]) && $_POST["controller"] !=""  && $_POST["controller"] !="null" ) ? clean($_POST["controller"]) :  null  ;
$title = (isset($_POST["title"]) && $_POST["title"] !=""  && $_POST["title"] !="null" ) ? clean($_POST["title"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$author_id = (isset($_POST["author_id"]) && $_POST["author_id"] !=""  && $_POST["author_id"] !="null" ) ? clean($_POST["author_id"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !="" ) ? clean($_POST["date"]) : current_timestamp() ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$title) {                        
    array_push($error, 'Title is mandatory');
}
if (!$description) {                        
    array_push($error, 'Description is mandatory');
}
if (!$author_id) {                        
    array_push($error, 'Author id is mandatory');
}
if (!$date) {                        
    array_push($error, 'Date is mandatory');
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

if (! blog_is_title($title) ) {
    array_push($error, 'Title format error');
}
if (! blog_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! blog_is_author_id($author_id) ) {
    array_push($error, 'Author id format error');
}
if (! blog_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! blog_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! blog_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( blog_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = blog_add(
        $controller ,  $title ,  $description ,  $author_id ,  $date ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=blog");
            break;
            
        case 2:
            header("Location: index.php?c=blog&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=blog&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=blog&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=blog&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


