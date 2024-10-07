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
# Fecha de creacion del documento: 2024-09-04 08:09:56 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$doc_models = null;

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
        $doc_models = doc_models_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=doc_models&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $doc_models = doc_models_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=doc_models&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $doc_models = doc_models_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_params":
        $params = (isset($_GET["params"]) && $_GET["params"] != "" ) ? clean($_GET["params"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search_by("params", $params));
        // puede hacer falta
        $url = "index.php?c=doc_models&a=search&w=by_params&params=" . $params;
        $pagination->setUrl($url);
        $doc_models = doc_models_search_by("params", $params, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_author":
        $author = (isset($_GET["author"]) && $_GET["author"] != "" ) ? clean($_GET["author"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search_by("author", $author));
        // puede hacer falta
        $url = "index.php?c=doc_models&a=search&w=by_author&author=" . $author;
        $pagination->setUrl($url);
        $doc_models = doc_models_search_by("author", $author, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_author_email":
        $author_email = (isset($_GET["author_email"]) && $_GET["author_email"] != "" ) ? clean($_GET["author_email"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search_by("author_email", $author_email));
        // puede hacer falta
        $url = "index.php?c=doc_models&a=search&w=by_author_email&author_email=" . $author_email;
        $pagination->setUrl($url);
        $doc_models = doc_models_search_by("author_email", $author_email, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_url":
        $url = (isset($_GET["url"]) && $_GET["url"] != "" ) ? clean($_GET["url"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search_by("url", $url));
        // puede hacer falta
        $url = "index.php?c=doc_models&a=search&w=by_url&url=" . $url;
        $pagination->setUrl($url);
        $doc_models = doc_models_search_by("url", $url, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_version":
        $version = (isset($_GET["version"]) && $_GET["version"] != "" ) ? clean($_GET["version"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search_by("version", $version));
        // puede hacer falta
        $url = "index.php?c=doc_models&a=search&w=by_version&version=" . $version;
        $pagination->setUrl($url);
        $doc_models = doc_models_search_by("version", $version, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=doc_models&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $doc_models = doc_models_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=doc_models&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $doc_models = doc_models_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, doc_models_search($txt));
        // puede hacer falta
        $url = "index.php?c=doc_modelsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $doc_models = doc_models_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$doc_models = doc_models_search($txt);
        break;
}


include view("doc_models", "index");      
