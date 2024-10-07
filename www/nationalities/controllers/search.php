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
# Fecha de creacion del documento: 2024-09-27 12:09:58 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$nationalities = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "nationalities");

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
        $nationalities = nationalities_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_num_code":
        $num_code = (isset($_GET["num_code"]) && $_GET["num_code"] != "" ) ? clean($_GET["num_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, nationalities_search_by("num_code", $num_code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=nationalities&a=search&w=by_num_code&num_code=" . $num_code;
        $pagination->setUrl($url);
        $nationalities = nationalities_search_by("num_code", $num_code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_alpha_2_code":
        $alpha_2_code = (isset($_GET["alpha_2_code"]) && $_GET["alpha_2_code"] != "" ) ? clean($_GET["alpha_2_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, nationalities_search_by("alpha_2_code", $alpha_2_code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=nationalities&a=search&w=by_alpha_2_code&alpha_2_code=" . $alpha_2_code;
        $pagination->setUrl($url);
        $nationalities = nationalities_search_by("alpha_2_code", $alpha_2_code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_alpha_3_code":
        $alpha_3_code = (isset($_GET["alpha_3_code"]) && $_GET["alpha_3_code"] != "" ) ? clean($_GET["alpha_3_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, nationalities_search_by("alpha_3_code", $alpha_3_code, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=nationalities&a=search&w=by_alpha_3_code&alpha_3_code=" . $alpha_3_code;
        $pagination->setUrl($url);
        $nationalities = nationalities_search_by("alpha_3_code", $alpha_3_code, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_en_short_name":
        $en_short_name = (isset($_GET["en_short_name"]) && $_GET["en_short_name"] != "" ) ? clean($_GET["en_short_name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, nationalities_search_by("en_short_name", $en_short_name, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=nationalities&a=search&w=by_en_short_name&en_short_name=" . $en_short_name;
        $pagination->setUrl($url);
        $nationalities = nationalities_search_by("en_short_name", $en_short_name, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_nationality":
        $nationality = (isset($_GET["nationality"]) && $_GET["nationality"] != "" ) ? clean($_GET["nationality"]) : false;
        #################################################################################

        $pagination = new Pagination($page, nationalities_search_by("nationality", $nationality, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=nationalities&a=search&w=by_nationality&nationality=" . $nationality;
        $pagination->setUrl($url);
        $nationalities = nationalities_search_by("nationality", $nationality, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, nationalities_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=nationalities&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $nationalities = nationalities_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, nationalities_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=nationalities&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $nationalities = nationalities_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, nationalities_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=nationalitiesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $nationalities = nationalities_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$nationalities = nationalities_search($txt);
        break;
}


include view("nationalities", "index");      
