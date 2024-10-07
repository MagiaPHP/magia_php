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
# Fecha de creacion del documento: 2024-09-04 08:09:09 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$doc_tags = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  

$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  

$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;


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
        $doc_tags = doc_tags_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_tags_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=doc_tags&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $doc_tags = doc_tags_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_tag":
        $tag = (isset($_GET["tag"]) && $_GET["tag"] != "" ) ? clean($_GET["tag"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_tags_search_by("tag", $tag));
        // puede hacer falta
        $url = "index.php?c=doc_tags&a=search&w=by_tag&tag=" . $tag;
        $pagination->setUrl($url);
        $doc_tags = doc_tags_search_by("tag", $tag, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_replace_by":
        $replace_by = (isset($_GET["replace_by"]) && $_GET["replace_by"] != "" ) ? clean($_GET["replace_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_tags_search_by("replace_by", $replace_by));
        // puede hacer falta
        $url = "index.php?c=doc_tags&a=search&w=by_replace_by&replace_by=" . $replace_by;
        $pagination->setUrl($url);
        $doc_tags = doc_tags_search_by("replace_by", $replace_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_tags_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=doc_tags&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $doc_tags = doc_tags_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_tags_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=doc_tags&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $doc_tags = doc_tags_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_tags_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=doc_tags&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $doc_tags = doc_tags_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_tags_search($txt));
        // puede hacer falta
        $url = "index.php?c=doc_tagsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $doc_tags = doc_tags_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$doc_tags = doc_tags_search($txt);
        break;
}


include view("doc_tags", "index");      
