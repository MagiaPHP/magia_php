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
# Fecha de creacion del documento: 2024-09-16 12:09:41 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$budgets_categories = null;

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
        $budgets_categories = budgets_categories_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, budgets_categories_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=budgets_categories&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $budgets_categories = budgets_categories_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_father_code":
        $father_code = (isset($_GET["father_code"]) && $_GET["father_code"] != "" ) ? clean($_GET["father_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, budgets_categories_search_by("father_code", $father_code));
        // puede hacer falta
        $url = "index.php?c=budgets_categories&a=search&w=by_father_code&father_code=" . $father_code;
        $pagination->setUrl($url);
        $budgets_categories = budgets_categories_search_by("father_code", $father_code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_category":
        $category = (isset($_GET["category"]) && $_GET["category"] != "" ) ? clean($_GET["category"]) : false;
        #################################################################################

        $pagination = new Pagination($page, budgets_categories_search_by("category", $category));
        // puede hacer falta
        $url = "index.php?c=budgets_categories&a=search&w=by_category&category=" . $category;
        $pagination->setUrl($url);
        $budgets_categories = budgets_categories_search_by("category", $category, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, budgets_categories_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=budgets_categories&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $budgets_categories = budgets_categories_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, budgets_categories_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=budgets_categories&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $budgets_categories = budgets_categories_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, budgets_categories_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=budgets_categories&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $budgets_categories = budgets_categories_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, budgets_categories_search($txt));
        // puede hacer falta
        $url = "index.php?c=budgets_categoriesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $budgets_categories = budgets_categories_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$budgets_categories = budgets_categories_search($txt);
        break;
}


include view("budgets_categories", "index");      
