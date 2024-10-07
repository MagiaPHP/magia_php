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
# Fecha de creacion del documento: 2024-09-16 17:09:36 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_vehicles = null;

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
        $veh_vehicles = veh_vehicles_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_marca":
        $marca = (isset($_GET["marca"]) && $_GET["marca"] != "" ) ? clean($_GET["marca"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("marca", $marca));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_marca&marca=" . $marca;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("marca", $marca, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_modelo":
        $modelo = (isset($_GET["modelo"]) && $_GET["modelo"] != "" ) ? clean($_GET["modelo"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("modelo", $modelo));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_modelo&modelo=" . $modelo;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("modelo", $modelo, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_serie":
        $serie = (isset($_GET["serie"]) && $_GET["serie"] != "" ) ? clean($_GET["serie"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("serie", $serie));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_serie&serie=" . $serie;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("serie", $serie, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("type", $type));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("type", $type, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_pasangers":
        $pasangers = (isset($_GET["pasangers"]) && $_GET["pasangers"] != "" ) ? clean($_GET["pasangers"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("pasangers", $pasangers));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_pasangers&pasangers=" . $pasangers;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("pasangers", $pasangers, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_year":
        $year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("year", $year));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_year&year=" . $year;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("year", $year, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_chasis":
        $chasis = (isset($_GET["chasis"]) && $_GET["chasis"] != "" ) ? clean($_GET["chasis"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("chasis", $chasis));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_chasis&chasis=" . $chasis;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("chasis", $chasis, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_color":
        $color = (isset($_GET["color"]) && $_GET["color"] != "" ) ? clean($_GET["color"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("color", $color));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_color&color=" . $color;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("color", $color, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_alto":
        $alto = (isset($_GET["alto"]) && $_GET["alto"] != "" ) ? clean($_GET["alto"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("alto", $alto));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_alto&alto=" . $alto;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("alto", $alto, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_ancho":
        $ancho = (isset($_GET["ancho"]) && $_GET["ancho"] != "" ) ? clean($_GET["ancho"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("ancho", $ancho));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_ancho&ancho=" . $ancho;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("ancho", $ancho, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_largo":
        $largo = (isset($_GET["largo"]) && $_GET["largo"] != "" ) ? clean($_GET["largo"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("largo", $largo));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_largo&largo=" . $largo;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("largo", $largo, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_buy":
        $date_buy = (isset($_GET["date_buy"]) && $_GET["date_buy"] != "" ) ? clean($_GET["date_buy"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("date_buy", $date_buy));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_date_buy&date_buy=" . $date_buy;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("date_buy", $date_buy, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mma":
        $mma = (isset($_GET["mma"]) && $_GET["mma"] != "" ) ? clean($_GET["mma"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("mma", $mma));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_mma&mma=" . $mma;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("mma", $mma, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_towing_system":
        $towing_system = (isset($_GET["towing_system"]) && $_GET["towing_system"] != "" ) ? clean($_GET["towing_system"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("towing_system", $towing_system));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_towing_system&towing_system=" . $towing_system;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("towing_system", $towing_system, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_towing_system_kl":
        $towing_system_kl = (isset($_GET["towing_system_kl"]) && $_GET["towing_system_kl"] != "" ) ? clean($_GET["towing_system_kl"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("towing_system_kl", $towing_system_kl));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_towing_system_kl&towing_system_kl=" . $towing_system_kl;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("towing_system_kl", $towing_system_kl, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_vehiclesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_vehicles = veh_vehicles_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_vehicles = veh_vehicles_search($txt);
        break;
}


include view("veh_vehicles", "index");      
