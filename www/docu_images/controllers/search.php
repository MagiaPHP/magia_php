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
# Fecha de creacion del documento: 2024-09-22 18:09:50 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$docu_images = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "docu_images");

# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


$error = array();

#################################################################################

#################################################################################

switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $docu_images = docu_images_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_docu_id":
        $docu_id = (isset($_GET["docu_id"]) && $_GET["docu_id"] != "" ) ? clean($_GET["docu_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_images_search_by("docu_id", $docu_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu_images&a=search&w=by_docu_id&docu_id=" . $docu_id;
        $pagination->setUrl($url);
        $docu_images = docu_images_search_by("docu_id", $docu_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_bloc_id":
        $bloc_id = (isset($_GET["bloc_id"]) && $_GET["bloc_id"] != "" ) ? clean($_GET["bloc_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_images_search_by("bloc_id", $bloc_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu_images&a=search&w=by_bloc_id&bloc_id=" . $bloc_id;
        $pagination->setUrl($url);
        $docu_images = docu_images_search_by("bloc_id", $bloc_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_image":
        $image = (isset($_GET["image"]) && $_GET["image"] != "" ) ? clean($_GET["image"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_images_search_by("image", $image, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu_images&a=search&w=by_image&image=" . $image;
        $pagination->setUrl($url);
        $docu_images = docu_images_search_by("image", $image, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_images_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu_images&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $docu_images = docu_images_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_images_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu_images&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $docu_images = docu_images_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_images_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=docu_imagesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $docu_images = docu_images_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$docu_images = docu_images_search($txt);
        break;
}


include view("docu_images", "index");      
