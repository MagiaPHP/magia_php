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
# Fecha de creacion del documento: 2024-09-21 12:09:46 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    # y matamos el proceso 
    die("Error has permission ");
}

# El identificador `id` del elemento que deseamos el detalle
$id    = (isset($_REQUEST["id"]) && $_REQUEST["id"] !="" )      ? clean($_REQUEST["id"]) : false;

# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


# aqui vamos a guardar los posibles errores, por defecto se crea vacio
$error = array();

#################################################################################

# O B L I G A T O R I O
# Todo campo obligatorio para el funcionamento del esta página lo podemos verificar aca

// si el `id` no es enviado da error ! 
if (! $id ) {

    ## si no pasa el control, agregamos un error a `$error`
    array_push($error, "Id is mandatory");
    
}
#################################################################################

# F O R M A T O
#
if (! hr_benefits_is_id($id)) {
    array_push($error, 'Id format error');
}
#################################################################################

# C O N D I C I O N A L
# 
if (! hr_benefits_field_id("id", $id)) {
    array_push($error, "Id is mandatory");
}
#################################################################################

#################################################################################

# Si no hay error alguno 
if (!$error) {
    $hr_benefits = new Hr_benefits();
    $hr_benefits->setHr_benefits($id);

    include view("hr_benefits", "details");
        
# si `$error` tiene contenido (errores), incluimos la vista `pageError` desde `home`
} else {
    include view("home", "pageError");
}    

