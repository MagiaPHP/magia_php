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
# Fecha de creacion del documento: 2024-09-04 08:09:04 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$doc_sections = null;

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
        $doc_sections = doc_sections_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_section":
        $section = (isset($_GET["section"]) && $_GET["section"] != "" ) ? clean($_GET["section"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_sections_search_by("section", $section));
        // puede hacer falta
        $url = "index.php?c=doc_sections&a=search&w=by_section&section=" . $section;
        $pagination->setUrl($url);
        $doc_sections = doc_sections_search_by("section", $section, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_open":
        $open = (isset($_GET["open"]) && $_GET["open"] != "" ) ? clean($_GET["open"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_sections_search_by("open", $open));
        // puede hacer falta
        $url = "index.php?c=doc_sections&a=search&w=by_open&open=" . $open;
        $pagination->setUrl($url);
        $doc_sections = doc_sections_search_by("open", $open, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_items":
        $items = (isset($_GET["items"]) && $_GET["items"] != "" ) ? clean($_GET["items"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_sections_search_by("items", $items));
        // puede hacer falta
        $url = "index.php?c=doc_sections&a=search&w=by_items&items=" . $items;
        $pagination->setUrl($url);
        $doc_sections = doc_sections_search_by("items", $items, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_sections_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=doc_sections&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $doc_sections = doc_sections_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_sections_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=doc_sections&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $doc_sections = doc_sections_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_sections_search($txt));
        // puede hacer falta
        $url = "index.php?c=doc_sectionsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $doc_sections = doc_sections_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$doc_sections = doc_sections_search($txt);
        break;
}


include view("doc_sections", "index");      
