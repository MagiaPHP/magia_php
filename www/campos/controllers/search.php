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
# Fecha de creacion del documento: 2024-09-16 19:09:41 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$campos = null;

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
        $campos = campos_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_base_datos":
        $base_datos = (isset($_GET["base_datos"]) && $_GET["base_datos"] != "" ) ? clean($_GET["base_datos"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("base_datos", $base_datos));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_base_datos&base_datos=" . $base_datos;
        $pagination->setUrl($url);
        $campos = campos_search_by("base_datos", $base_datos, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_tabla":
        $tabla = (isset($_GET["tabla"]) && $_GET["tabla"] != "" ) ? clean($_GET["tabla"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("tabla", $tabla));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_tabla&tabla=" . $tabla;
        $pagination->setUrl($url);
        $campos = campos_search_by("tabla", $tabla, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_campo":
        $campo = (isset($_GET["campo"]) && $_GET["campo"] != "" ) ? clean($_GET["campo"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("campo", $campo));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_campo&campo=" . $campo;
        $pagination->setUrl($url);
        $campos = campos_search_by("campo", $campo, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_accion":
        $accion = (isset($_GET["accion"]) && $_GET["accion"] != "" ) ? clean($_GET["accion"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("accion", $accion));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_accion&accion=" . $accion;
        $pagination->setUrl($url);
        $campos = campos_search_by("accion", $accion, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_label":
        $label = (isset($_GET["label"]) && $_GET["label"] != "" ) ? clean($_GET["label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("label", $label));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_label&label=" . $label;
        $pagination->setUrl($url);
        $campos = campos_search_by("label", $label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_tipo":
        $tipo = (isset($_GET["tipo"]) && $_GET["tipo"] != "" ) ? clean($_GET["tipo"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("tipo", $tipo));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_tipo&tipo=" . $tipo;
        $pagination->setUrl($url);
        $campos = campos_search_by("tipo", $tipo, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_clase":
        $clase = (isset($_GET["clase"]) && $_GET["clase"] != "" ) ? clean($_GET["clase"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("clase", $clase));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_clase&clase=" . $clase;
        $pagination->setUrl($url);
        $campos = campos_search_by("clase", $clase, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_nombre":
        $nombre = (isset($_GET["nombre"]) && $_GET["nombre"] != "" ) ? clean($_GET["nombre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("nombre", $nombre));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_nombre&nombre=" . $nombre;
        $pagination->setUrl($url);
        $campos = campos_search_by("nombre", $nombre, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_identificador":
        $identificador = (isset($_GET["identificador"]) && $_GET["identificador"] != "" ) ? clean($_GET["identificador"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("identificador", $identificador));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_identificador&identificador=" . $identificador;
        $pagination->setUrl($url);
        $campos = campos_search_by("identificador", $identificador, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_marca_agua":
        $marca_agua = (isset($_GET["marca_agua"]) && $_GET["marca_agua"] != "" ) ? clean($_GET["marca_agua"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("marca_agua", $marca_agua));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_marca_agua&marca_agua=" . $marca_agua;
        $pagination->setUrl($url);
        $campos = campos_search_by("marca_agua", $marca_agua, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_valor":
        $valor = (isset($_GET["valor"]) && $_GET["valor"] != "" ) ? clean($_GET["valor"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("valor", $valor));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_valor&valor=" . $valor;
        $pagination->setUrl($url);
        $campos = campos_search_by("valor", $valor, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_solo_lectura":
        $solo_lectura = (isset($_GET["solo_lectura"]) && $_GET["solo_lectura"] != "" ) ? clean($_GET["solo_lectura"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("solo_lectura", $solo_lectura));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_solo_lectura&solo_lectura=" . $solo_lectura;
        $pagination->setUrl($url);
        $campos = campos_search_by("solo_lectura", $solo_lectura, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_obligatorio":
        $obligatorio = (isset($_GET["obligatorio"]) && $_GET["obligatorio"] != "" ) ? clean($_GET["obligatorio"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("obligatorio", $obligatorio));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_obligatorio&obligatorio=" . $obligatorio;
        $pagination->setUrl($url);
        $campos = campos_search_by("obligatorio", $obligatorio, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_seleccionado":
        $seleccionado = (isset($_GET["seleccionado"]) && $_GET["seleccionado"] != "" ) ? clean($_GET["seleccionado"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("seleccionado", $seleccionado));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_seleccionado&seleccionado=" . $seleccionado;
        $pagination->setUrl($url);
        $campos = campos_search_by("seleccionado", $seleccionado, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_desactivado":
        $desactivado = (isset($_GET["desactivado"]) && $_GET["desactivado"] != "" ) ? clean($_GET["desactivado"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("desactivado", $desactivado));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_desactivado&desactivado=" . $desactivado;
        $pagination->setUrl($url);
        $campos = campos_search_by("desactivado", $desactivado, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_orden":
        $orden = (isset($_GET["orden"]) && $_GET["orden"] != "" ) ? clean($_GET["orden"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("orden", $orden));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_orden&orden=" . $orden;
        $pagination->setUrl($url);
        $campos = campos_search_by("orden", $orden, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_estatus":
        $estatus = (isset($_GET["estatus"]) && $_GET["estatus"] != "" ) ? clean($_GET["estatus"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search_by("estatus", $estatus));
        // puede hacer falta
        $url = "index.php?c=campos&a=search&w=by_estatus&estatus=" . $estatus;
        $pagination->setUrl($url);
        $campos = campos_search_by("estatus", $estatus, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, campos_search($txt));
        // puede hacer falta
        $url = "index.php?c=camposa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $campos = campos_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$campos = campos_search($txt);
        break;
}


include view("campos", "index");      
