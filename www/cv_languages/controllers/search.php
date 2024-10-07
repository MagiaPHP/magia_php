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
# Fecha de creacion del documento: 2024-09-18 06:09:37 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$cv_languages = null;

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
        $cv_languages = cv_languages_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_cv_id":
        $cv_id = (isset($_GET["cv_id"]) && $_GET["cv_id"] != "" ) ? clean($_GET["cv_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_languages_search_by("cv_id", $cv_id));
        // puede hacer falta
        $url = "index.php?c=cv_languages&a=search&w=by_cv_id&cv_id=" . $cv_id;
        $pagination->setUrl($url);
        $cv_languages = cv_languages_search_by("cv_id", $cv_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_language":
        $language = (isset($_GET["language"]) && $_GET["language"] != "" ) ? clean($_GET["language"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_languages_search_by("language", $language));
        // puede hacer falta
        $url = "index.php?c=cv_languages&a=search&w=by_language&language=" . $language;
        $pagination->setUrl($url);
        $cv_languages = cv_languages_search_by("language", $language, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_level":
        $level = (isset($_GET["level"]) && $_GET["level"] != "" ) ? clean($_GET["level"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_languages_search_by("level", $level));
        // puede hacer falta
        $url = "index.php?c=cv_languages&a=search&w=by_level&level=" . $level;
        $pagination->setUrl($url);
        $cv_languages = cv_languages_search_by("level", $level, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_languages_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=cv_languages&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $cv_languages = cv_languages_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_languages_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=cv_languages&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $cv_languages = cv_languages_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_languages_search($txt));
        // puede hacer falta
        $url = "index.php?c=cv_languagesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $cv_languages = cv_languages_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$cv_languages = cv_languages_search($txt);
        break;
}


include view("cv_languages", "index");      
