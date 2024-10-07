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
# Fecha de creacion del documento: 2024-09-27 12:09:05 
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
$blog_id = (isset($_POST["blog_id"]) && $_POST["blog_id"] !=""  && $_POST["blog_id"] !="null" ) ? clean($_POST["blog_id"]) :  null  ;
$title = (isset($_POST["title"]) && $_POST["title"] !=""  && $_POST["title"] !="null" ) ? clean($_POST["title"]) :  null  ;
$comment = (isset($_POST["comment"]) && $_POST["comment"] !=""  && $_POST["comment"] !="null" ) ? clean($_POST["comment"]) :  null  ;
$author_id = (isset($_POST["author_id"]) && $_POST["author_id"] !=""  && $_POST["author_id"] !="null" ) ? clean($_POST["author_id"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !="" ) ? clean($_POST["date"]) : current_timestamp() ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$blog_id) {
    array_push($error, 'Blog id is mandatory');
}
if (!$title) {
    array_push($error, 'Title is mandatory');
}
if (!$comment) {
    array_push($error, 'Comment is mandatory');
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

if (! blog_comments_is_blog_id($blog_id) ) {
    array_push($error, 'Blog id format error');
}
if (! blog_comments_is_title($title) ) {
    array_push($error, 'Title format error');
}
if (! blog_comments_is_comment($comment) ) {
    array_push($error, 'Comment format error');
}
if (! blog_comments_is_author_id($author_id) ) {
    array_push($error, 'Author id format error');
}
if (! blog_comments_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! blog_comments_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! blog_comments_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( blog_comments_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    blog_comments_edit(
        $id ,  $blog_id ,  $title ,  $comment ,  $author_id ,  $date ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=blog_comments");
            break;
            
        case 2:
            header("Location: index.php?c=blog_comments&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=blog_comments&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=blog_comments&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=blog_comments&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
