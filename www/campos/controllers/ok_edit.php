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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$base_datos = (isset($_POST["base_datos"]) && $_POST["base_datos"] !=""  && $_POST["base_datos"] !="null" ) ? clean($_POST["base_datos"]) :  null  ;
$tabla = (isset($_POST["tabla"]) && $_POST["tabla"] !=""  && $_POST["tabla"] !="null" ) ? clean($_POST["tabla"]) :  null  ;
$campo = (isset($_POST["campo"]) && $_POST["campo"] !=""  && $_POST["campo"] !="null" ) ? clean($_POST["campo"]) :  null  ;
$accion = (isset($_POST["accion"]) && $_POST["accion"] !=""  && $_POST["accion"] !="null" ) ? clean($_POST["accion"]) :  null  ;
$label = (isset($_POST["label"]) && $_POST["label"] !=""  && $_POST["label"] !="null" ) ? clean($_POST["label"]) :  null  ;
$tipo = (isset($_POST["tipo"]) && $_POST["tipo"] !=""  && $_POST["tipo"] !="null" ) ? clean($_POST["tipo"]) :  null  ;
$clase = (isset($_POST["clase"]) && $_POST["clase"] !="" ) ? clean($_POST["clase"]) : form-control ;
$nombre = (isset($_POST["nombre"]) && $_POST["nombre"] !=""  && $_POST["nombre"] !="null" ) ? clean($_POST["nombre"]) :  null  ;
$identificador = (isset($_POST["identificador"]) && $_POST["identificador"] !=""  && $_POST["identificador"] !="null" ) ? clean($_POST["identificador"]) :  null  ;
$marca_agua = (isset($_POST["marca_agua"]) && $_POST["marca_agua"] !=""  && $_POST["marca_agua"] !="null" ) ? clean($_POST["marca_agua"]) :  null  ;
$valor = (isset($_POST["valor"]) && $_POST["valor"] !=""  && $_POST["valor"] !="null" ) ? clean($_POST["valor"]) :  null  ;
$solo_lectura = (isset($_POST["solo_lectura"]) && $_POST["solo_lectura"] !=""  && $_POST["solo_lectura"] !="null" ) ? clean($_POST["solo_lectura"]) :  null  ;
$obligatorio = (isset($_POST["obligatorio"]) && $_POST["obligatorio"] !=""  && $_POST["obligatorio"] !="null" ) ? clean($_POST["obligatorio"]) :  null  ;
$seleccionado = (isset($_POST["seleccionado"]) && $_POST["seleccionado"] !=""  && $_POST["seleccionado"] !="null" ) ? clean($_POST["seleccionado"]) :  null  ;
$desactivado = (isset($_POST["desactivado"]) && $_POST["desactivado"] !=""  && $_POST["desactivado"] !="null" ) ? clean($_POST["desactivado"]) :  null  ;
$orden = (isset($_POST["orden"]) && $_POST["orden"] !=""  && $_POST["orden"] !="null" ) ? clean($_POST["orden"]) :  null  ;
$estatus = (isset($_POST["estatus"]) && $_POST["estatus"] !=""  && $_POST["estatus"] !="null" ) ? clean($_POST["estatus"]) :  null  ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$base_datos) {
    array_push($error, 'Base datos is mandatory');
}
if (!$tabla) {
    array_push($error, 'Tabla is mandatory');
}
if (!$campo) {
    array_push($error, 'Campo is mandatory');
}
if (!$accion) {
    array_push($error, 'Accion is mandatory');
}
if (!$label) {
    array_push($error, 'Label is mandatory');
}
if (!$tipo) {
    array_push($error, 'Tipo is mandatory');
}
if (!$clase) {
    array_push($error, 'Clase is mandatory');
}
if (!$nombre) {
    array_push($error, 'Nombre is mandatory');
}
if (!$identificador) {
    array_push($error, 'Identificador is mandatory');
}
if (!$marca_agua) {
    array_push($error, 'Marca agua is mandatory');
}
if (!$valor) {
    array_push($error, 'Valor is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! campos_is_base_datos($base_datos) ) {
    array_push($error, 'Base datos format error');
}
if (! campos_is_tabla($tabla) ) {
    array_push($error, 'Tabla format error');
}
if (! campos_is_campo($campo) ) {
    array_push($error, 'Campo format error');
}
if (! campos_is_accion($accion) ) {
    array_push($error, 'Accion format error');
}
if (! campos_is_label($label) ) {
    array_push($error, 'Label format error');
}
if (! campos_is_tipo($tipo) ) {
    array_push($error, 'Tipo format error');
}
if (! campos_is_clase($clase) ) {
    array_push($error, 'Clase format error');
}
if (! campos_is_nombre($nombre) ) {
    array_push($error, 'Nombre format error');
}
if (! campos_is_identificador($identificador) ) {
    array_push($error, 'Identificador format error');
}
if (! campos_is_marca_agua($marca_agua) ) {
    array_push($error, 'Marca agua format error');
}
if (! campos_is_valor($valor) ) {
    array_push($error, 'Valor format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( campos_search_by_unique("id","campo", $campo)){
    array_push($error, 'Campo already exists in data base');
}

  
//if( campos_search($estatus)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    campos_edit(
        $id ,  $base_datos ,  $tabla ,  $campo ,  $accion ,  $label ,  $tipo ,  $clase ,  $nombre ,  $identificador ,  $marca_agua ,  $valor ,  $solo_lectura ,  $obligatorio ,  $seleccionado ,  $desactivado ,  $orden ,  $estatus    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=campos");
            break;
            
        case 2:
            header("Location: index.php?c=campos&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=campos&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=campos&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=campos&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
