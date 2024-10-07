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
# Fecha de creacion del documento: 2024-09-04 08:09:20 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$country_tax = null;

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
        $country_tax = country_tax_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_country":
        $country = (isset($_GET["country"]) && $_GET["country"] != "" ) ? clean($_GET["country"]) : false;
        #################################################################################

        $pagination = new Pagination($page, country_tax_search_by("country", $country));
        // puede hacer falta
        $url = "index.php?c=country_tax&a=search&w=by_country&country=" . $country;
        $pagination->setUrl($url);
        $country_tax = country_tax_search_by("country", $country, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_tax":
        $tax = (isset($_GET["tax"]) && $_GET["tax"] != "" ) ? clean($_GET["tax"]) : false;
        #################################################################################

        $pagination = new Pagination($page, country_tax_search_by("tax", $tax));
        // puede hacer falta
        $url = "index.php?c=country_tax&a=search&w=by_tax&tax=" . $tax;
        $pagination->setUrl($url);
        $country_tax = country_tax_search_by("tax", $tax, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, country_tax_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=country_tax&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $country_tax = country_tax_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, country_tax_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=country_tax&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $country_tax = country_tax_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, country_tax_search($txt));
        // puede hacer falta
        $url = "index.php?c=country_taxa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $country_tax = country_tax_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$country_tax = country_tax_search($txt);
        break;
}


include view("country_tax", "index");      
