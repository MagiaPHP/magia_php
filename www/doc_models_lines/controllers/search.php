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
# Fecha de creacion del documento: 2024-09-04 08:09:01 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$doc_models_lines = null;

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
        $doc_models_lines = doc_models_lines_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_modele":
        $modele = (isset($_GET["modele"]) && $_GET["modele"] != "" ) ? clean($_GET["modele"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_lines_search_by("modele", $modele));
        // puede hacer falta
        $url = "index.php?c=doc_models_lines&a=search&w=by_modele&modele=" . $modele;
        $pagination->setUrl($url);
        $doc_models_lines = doc_models_lines_search_by("modele", $modele, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_doc":
        $doc = (isset($_GET["doc"]) && $_GET["doc"] != "" ) ? clean($_GET["doc"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_lines_search_by("doc", $doc));
        // puede hacer falta
        $url = "index.php?c=doc_models_lines&a=search&w=by_doc&doc=" . $doc;
        $pagination->setUrl($url);
        $doc_models_lines = doc_models_lines_search_by("doc", $doc, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_section":
        $section = (isset($_GET["section"]) && $_GET["section"] != "" ) ? clean($_GET["section"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_lines_search_by("section", $section));
        // puede hacer falta
        $url = "index.php?c=doc_models_lines&a=search&w=by_section&section=" . $section;
        $pagination->setUrl($url);
        $doc_models_lines = doc_models_lines_search_by("section", $section, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_element":
        $element = (isset($_GET["element"]) && $_GET["element"] != "" ) ? clean($_GET["element"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_lines_search_by("element", $element));
        // puede hacer falta
        $url = "index.php?c=doc_models_lines&a=search&w=by_element&element=" . $element;
        $pagination->setUrl($url);
        $doc_models_lines = doc_models_lines_search_by("element", $element, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_lines_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=doc_models_lines&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $doc_models_lines = doc_models_lines_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_params":
        $params = (isset($_GET["params"]) && $_GET["params"] != "" ) ? clean($_GET["params"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_lines_search_by("params", $params));
        // puede hacer falta
        $url = "index.php?c=doc_models_lines&a=search&w=by_params&params=" . $params;
        $pagination->setUrl($url);
        $doc_models_lines = doc_models_lines_search_by("params", $params, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_lines_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=doc_models_lines&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $doc_models_lines = doc_models_lines_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_lines_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=doc_models_lines&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $doc_models_lines = doc_models_lines_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_lines_search($txt));
        // puede hacer falta
        $url = "index.php?c=doc_models_linesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $doc_models_lines = doc_models_lines_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$doc_models_lines = doc_models_lines_search($txt);
        break;
}


include view("doc_models_lines", "index");      
