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
# Fecha de creacion del documento: 2024-09-04 14:09:33 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] !="" ) ? clean($_REQUEST["id"]) : false;


# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


$error = array();


#################################################################################

# REQUERIDO
#################################################################################

if (! $id) {
    array_push($error, "Id is mandatory");
}
#################################################################################

# FORMAT
#################################################################################

if (! panels_lines_is_id($id)) {
    array_push($error, 'Id format error');
}
#################################################################################

# CONDICIONAL
#################################################################################

if (! panels_lines_field_id("id", $id)) {
    array_push($error, "Id not exist");
}
#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $panels_lines = new Panels_lines();
    $panels_lines->setPanels_lines($id);

    include view("panels_lines", "edit");
} else {
    include view("home", "pageError");
}    


