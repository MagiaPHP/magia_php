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
# Fecha de creacion del documento: 2024-09-27 08:09:04 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$father_id = (isset($_POST["father_id"]) && $_POST["father_id"] !=""  && $_POST["father_id"] !="null" ) ? clean($_POST["father_id"]) :  null  ;
$category = (isset($_POST["category"]) && $_POST["category"] !=""  && $_POST["category"] !="null" ) ? clean($_POST["category"]) :  null  ;
$color = (isset($_POST["color"]) && $_POST["color"] !=""  && $_POST["color"] !="null" ) ? clean($_POST["color"]) :  null  ;
$icon = (isset($_POST["icon"]) && $_POST["icon"] !=""  && $_POST["icon"] !="null" ) ? clean($_POST["icon"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$category) {                        
    array_push($error, 'Category is mandatory');
}
if (!$color) {                        
    array_push($error, 'Color is mandatory');
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

if (! tasks_categories_is_category($category) ) {
    array_push($error, 'Category format error');
}
if (! tasks_categories_is_color($color) ) {
    array_push($error, 'Color format error');
}
if (! tasks_categories_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! tasks_categories_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( tasks_categories_search_by_unique("id","category", $category)){
    array_push($error, 'Category already exists in data base');
}

  
//if( tasks_categories_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = tasks_categories_add(
        $father_id ,  $category ,  $color ,  $icon ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tasks_categories");
            break;
            
        case 2:
            header("Location: index.php?c=tasks_categories&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=tasks_categories&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=tasks_categories&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=tasks_categories&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


