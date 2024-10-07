<?php

function contenido_controllers($plugin, $archivo) {

    switch ($archivo) {
        ## add.php
        case "add.php":

            $contenido = "<?php \n";
            $contenido .= "\n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '
# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
    
}

$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;
    

';

//            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
//
//                $field = $columna['Field'];
//
//                $default = ($columna['Default']) ? $columna['Default'] : " false ";
//
//                if ($default == 'current_timestamp()') {
//                    $default = 'date("Y-m-d")';
//                }
//
//                if ($default) {
//                    $contenido .= '$' . $plugin . '["' . $columna['Field'] . '"] = ' . $default . ';' . "\n";
//                }
//            }

            $contenido .= '
# 2) si ha pasado el control anterior, incluimos la vista `add`                
include view("' . $plugin . '", "add");                 
';

            break;

        ## details.php
        case "details.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

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

' . al(80) . '
# O B L I G A T O R I O
# Todo campo obligatorio para el funcionamento del esta página lo podemos verificar aca

// si el `id` no es enviado da error ! 
if (! $id ) {

    ## si no pasa el control, agregamos un error a `$error`
    array_push($error, "Id is mandatory");
    
}
' . al(80) . '
# F O R M A T O
#
if (! ' . $plugin . '_is_id($id)) {
    array_push($error, \'Id format error\');
}
' . al(80) . '
# C O N D I C I O N A L
# 
if (! ' . $plugin . '_field_id("id", $id)) {
    array_push($error, "Id is mandatory");
}
' . al(80) . '
' . al(80) . '
# Si no hay error alguno 
if (!$error) {
    $' . $plugin . ' = new ' . ucfirst($plugin) . '();
    $' . $plugin . '->set' . ucfirst($plugin) . '($id);

    include view("' . $plugin . '", "details");
        
# si `$error` tiene contenido (errores), incluimos la vista `pageError` desde `home`
} else {
    include view("home", "pageError");
}    

';
            break;

        ## edit.php
        case "edit.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= '

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


' . al(80) . '
# REQUERIDO
' . al(80) . '
if (! $id) {
    array_push($error, "Id is mandatory");
}
' . al(80) . '
# FORMAT
' . al(80) . '
if (! ' . $plugin . '_is_id($id)) {
    array_push($error, \'Id format error\');
}
' . al(80) . '
# CONDICIONAL
' . al(80) . '
if (! ' . $plugin . '_field_id("id", $id)) {
    array_push($error, "Id not exist");
}
' . al(80) . '
' . al(80) . '
' . al(80) . '
if (!$error) {
    $' . $plugin . ' = new ' . ucfirst($plugin) . '();
    $' . $plugin . '->set' . ucfirst($plugin) . '($id);

    include view("' . $plugin . '", "edit");
} else {
    include view("home", "pageError");
}    


';
            break;

        ## export_json.php
        case "export_json.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $' . $plugin . ' = new ' . ucfirst($plugin) . '();
    $' . $plugin . '->set' . ucfirst($plugin) . '($id);

    include view("' . $plugin . '", "export_json");
} else {
    include view("home", "pageError");
}    
';
            break;

        ## export_pdf.php
        case "export_pdf.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$error = array();
$' . $plugin . ' = null;
$' . $plugin . ' = ' . $plugin . '_list();
//
include view("' . $plugin . '", "export_pdf");      
if ($debug) {
    include "www/' . $plugin . '/views/debug.php";
}';
            break;

        ## delete.php
        case "delete.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `delete` 
if (!permissions_has_permission($u_rol, $c, "delete")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$id    = (isset($_GET["id"]) && $_GET["id"] !="" )         ? clean($_GET["id"]) : false;

# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


$error = array();

' . al(80) . '
# REQUERIDO
' . al(80) . '
if (! $id) {
    array_push($error, "Id is mandatory");
}
' . al(80) . '
# FORMAT
' . al(80) . '
if (! ' . $plugin . '_is_id($id)) {
    array_push($error, \'Id format error\');
}
' . al(80) . '
# CONDICIONAL
' . al(80) . '
if (! ' . $plugin . '_field_id("id", $id)) {
    array_push($error, "Id not exist");
}
' . al(80) . '
if (!$error) {
    $' . $plugin . ' = new ' . ucfirst($plugin) . '();
    $' . $plugin . '->set' . ucfirst($plugin) . '($id);

    include view("' . $plugin . '", "delete");
} else {
    include view("home", "pageError");
}    

';
            break;

        ## index.php
        case "index.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$error = array();

' . al(80) . '
    
$' . $plugin . ' = null;
    
' . al(80) . '
    
$order_data = order_by_get_order_data($u_id, "' . $plugin . '");

$pagination = new Pagination($page, ' . $plugin . '_list(0, 9999, $order_data["col_name"], $order_data["order_way"]));

$' . $plugin . ' = ' . $plugin . '_list($pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"]);    

' . al(80) . '
    
include view("' . $plugin . '", "index");  
    
';
            break;

        ## ok_add.php
        case "ok_add.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $field = $columna['Field'];

                if ($field != 'id') {

                    switch ($field) {
                        case 'date_registre':
                            $default = " date('Y-m-d G:i:s') ";
                            break;
                        case 'code':
                            $default = " magia_uniqid() ";
                            break;

                        case 'order_by':
                        case 'status':
                            $default = "1";
                            break;

                        default:
                            $default = ($columna['Default']) ? $columna['Default'] : ' null ';
                            break;
                    }


                    $check_null = ($columna['Default'] === NULL) ? ' && $_POST["' . $field . '"] !="null" ' : "";

                    $contenido .= '$' . $field . ' = (isset($_POST["' . $field . '"]) && $_POST["' . $field . '"] !="" ' . $check_null . ') ? clean($_POST["' . $field . '"]) : ' . $default . ' ;' . "\n";
                }
            }
            $contenido .= '$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;';
            $contenido .= '  
$error = array();
' . al(80) . '
# REQUIRED
' . al(80) . '
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                // remplazo las '_' por espacios
                // Company_name = Company name
                $text_error = str_replace("_", " ", $columna['Field']);

                if ($columna['Field'] != 'id' && $columna['Null'] == 'NO') {
                    //$contenido .= '$text = (isset($_POST["'.$columna['Field'].'"])) ? clean($_POST["'.$columna['Field'].'"]) : false;';                                                                         
                    $contenido .= 'if (!$' . $columna['Field'] . ') {                        
    array_push($error, \'' . ucfirst($text_error) . ' is mandatory\');
}' . "\n";
                }
            }
            $contenido .= '
' . al(80) . '
# FORMAT
' . al(80) . '
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                // remplazo las '_' por espacios
                // Company_name = Company name
                $text_error = str_replace("_", " ", $columna['Field']);

                if ($columna['Field'] != 'id' && $columna['Null'] == 'NO') {
                    //$contenido .= '$text = (isset($_POST["'.$columna['Field'].'"])) ? clean($_POST["'.$columna['Field'].'"]) : false;';                                                                         
                    $contenido .= 'if (! ' . $plugin . '_is_' . $columna['Field'] . '($' . $columna['Field'] . ') ) {
    array_push($error, \'' . ucfirst($text_error) . ' format error\');
}' . "\n";
                }
            }
            $contenido .= '
' . al(80) . '
# CONDITIONAL
' . al(80) . '
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                // remplazo las '_' por espacios
                // Company_name = Company name
                $text_error = str_replace("_", " ", $columna['Field']);

                if ($columna['Key'] == 'UNI') {
                    $contenido .= '
if( ' . $plugin . '_search_by_unique("id","' . $columna['Field'] . '", $' . $columna['Field'] . ')){
    array_push($error, \'' . ucfirst($text_error) . ' already exists in data base\');
}
' . "\n";
                }
            }



            $contenido .= '  
//if( ' . $plugin . '_search($' . $columna['Field'] . ')){
    //array_push($error, "That text with that context the database already exists");
//}
' . al(80) . '
' . al(80) . '
' . al(80) . '
' . al(80) . '
if (!$error) {
    $lastInsertId = ' . $plugin . '_add(
        ';
            $i = 0;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
                if ($columna['Field'] != 'id') {
                    $contenido .= '$' . $columna['Field'] . ' ' . $coma . '  ';
                }

                $i++;
            }
            $contenido .= ' 
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=' . $plugin . '");
            break;
            
        case 2:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=' . $plugin . '&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=' . $plugin . '&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi[\'c\'] . "&a=" . $redi[\'a\'] . "&" . $redi[\'params\'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


';
            break;

        ## ok_edit.php
        case "ok_edit.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
';
            $i = 0;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $coma = ($i < bdd_total_columnas_segun_tabla($plugin) ) ? "," : "";
                $field = $columna['Field'];

                $default = ($columna['Default']) ? $columna['Default'] : 'false';

//                if ($field != 'id') {
//                    $contenido .= '$' . $field . ' = (isset($_REQUEST["' . $field . '"]) && $_REQUEST["' . $field . '"] !="") ? clean($_REQUEST["' . $field . '"]) : ' . $default . ';' . "\n";
//                }




                if ($field != 'id') {

                    switch ($field) {
                        case 'date_registre':
                            $default = " date('Y-m-d G:i:s') ";
                            break;
                        case 'code':
                            $default = " magia_uniqid() ";
                            break;

                        case 'order_by':
                        case 'status':
                            $default = "1";
                            break;

                        default:
                            $default = ($columna['Default']) ? $columna['Default'] : ' null ';
                            break;
                    }


                    $check_null = ($columna['Default'] === NULL) ? ' && $_POST["' . $field . '"] !="null" ' : "";

                    $contenido .= '$' . $field . ' = (isset($_POST["' . $field . '"]) && $_POST["' . $field . '"] !="" ' . $check_null . ') ? clean($_POST["' . $field . '"]) : ' . $default . ' ;' . "\n";
                }

















                //$contenido .= '$' . $columna['Field'] . ' = (isset($_POST["' . $columna['Field'] . '"]) && $_POST["' . $columna['Field'] . '"] !="" ) ? clean($_POST["' . $columna['Field'] . '"]) : false;' . "\n";
                $i++;
            }
            $contenido .= '$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false;';

            $contenido .= ' 
$error = array();
' . al(80) . '
# REQUIRED
' . al(80) . '
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                // remplazo las '_' por espacios
                // Company_name = Company name
                $text_error = str_replace("_", " ", $columna['Field']);

                if ($columna['Field'] != 'id' && $columna['Null'] == 'NO') {
                    //$contenido .= '$text = (isset($_POST["'.$columna['Field'].'"])) ? clean($_POST["'.$columna['Field'].'"]) : false;';                                                                         
                    $contenido .= 'if (!$' . $columna['Field'] . ') {
    array_push($error, \'' . ucfirst($text_error) . ' is mandatory\');
}' . "\n";
                }
            }
            $contenido .= '
' . al(80) . '
# FORMAT
' . al(80) . '
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {


                // remplazo las '_' por espacios
                // Company_name = Company name
                $text_error = str_replace("_", " ", $columna['Field']);

                if ($columna['Field'] != 'id' && $columna['Null'] == 'NO') {
                    //$contenido .= '$text = (isset($_POST["'.$columna['Field'].'"])) ? clean($_POST["'.$columna['Field'].'"]) : false;';                                                                         
                    $contenido .= 'if (! ' . $plugin . '_is_' . $columna['Field'] . '($' . $columna['Field'] . ') ) {
    array_push($error, \'' . ucfirst($text_error) . ' format error\');
}' . "\n";
                }
            }
            $contenido .= '
' . al(80) . '
# CONDITIONAL
' . al(80) . '
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                // remplazo las '_' por espacios
                // Company_name = Company name
                $text_error = str_replace("_", " ", $columna['Field']);

                if ($columna['Key'] == 'UNI') {
                    $contenido .= '
if( ' . $plugin . '_search_by_unique("id","' . $columna['Field'] . '", $' . $columna['Field'] . ')){
    array_push($error, \'' . ucfirst($text_error) . ' already exists in data base\');
}
' . "\n";
                }
            }



            $contenido .= '  
//if( ' . $plugin . '_search($' . $columna['Field'] . ')){
    //array_push($error, "That text with that context the database already exists");
//}
' . al(80) . '
if (! $error ) {
    
    ' . $plugin . '_edit(
        ';
            $i = 1;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $coma = ($i < bdd_total_columnas_segun_tabla($plugin) ) ? "," : "";
                $contenido .= '$' . $columna['Field'] . ' ' . $coma . '  ';
                $i++;
            }
            $contenido .= ' 
        );
        

' . redi($plugin) . ' 


} else {

    include view("home", "pageError");
}
';
            break;

        ## delete.php
        case "ok_delete.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `delete` 
if (!permissions_has_permission($u_rol, $c, "delete")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$id   = (isset($_REQUEST["id"])   && $_REQUEST["id"]   !="" )  ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] !="" ) ? ($_REQUEST["redi"]) : false;
$error = array();
' . al(80) . '
# REQUERIDO
' . al(80) . '
if (! $id) {
    array_push($error, "Id is mandatory");
}
' . al(80) . '
# FORMAT
' . al(80) . '
if (! ' . $plugin . '_is_id($id)) {
    array_push($error, \'Id format error\');
}
' . al(80) . '
# CONDICIONAL
' . al(80) . '
if ( !$error) {
    
        ' . $plugin . '_delete(
                $id
        );
        

' . redi($plugin) . ' 





} else {

    include view("home", "pageError");
}  
';
            break;

        ## delete.php
        case "ok_pagination_items_limit.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

$data = intval($data);

if ($data < 1 || $data > 1000) {
    array_push($error, "Must be between 1 and 1000");
}
' . al(80) . '
' . al(80) . '
' . al(80) . '
if (!$error) {

    // si no existe lo crea
    _options_push("config_' . $plugin . '_pagination_items_limit", $data, "' . $plugin . '");



' . redi($plugin) . '   






} else {

    include view("home", "pageError");
}
';
            break;

        ## delete.php
        case "ok_show_col_from_table.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '


if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");

    # y matamos el proceso 
    die("Error has permission ");
}

$data = (isset($_POST)) ? json_encode($_POST) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

' . al(80) . '
' . al(80) . '
' . al(80) . '    
if (!$error) {

    if (isset($_POST["selected_columns"])) {

        // Obtener el array de columnas seleccionadas y ordenadas
        $selectedColumns = json_decode($_POST["selected_columns"], true);

        if ($selectedColumns && is_array($selectedColumns)) {
            // Aquí puedes guardar el array en la base de datos o en la sesión del usuario

            user_options_push_data($u_id, "' . $plugin . '_show_col_from_table", json_encode($selectedColumns));
            //
            //
        } else {
            echo "No se enviaron datos válidos.";
        }
    }

    //
    //
    //
        switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=' . $plugin . '");
            break;

        case 2:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=' . $plugin . '&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=yellow_pages&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi[\'c\'] . "&a=" . $redi[\'a\'] . "&" . $redi[\'params\'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
    //
    //
    //




' . redi($plugin) . '    
    

} else {

    include view("home", "pageError");
}

';
            break;

        case 'ok_index_cols_to_show.php':
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? ($_REQUEST["redi"]) : false;


$error = array();

if ($data == "") {
    array_push($error, "Data is mandatory");
}

' . al(80) . '
' . al(80) . '
' . al(80) . '
if (!$error) {
    
    _options_push("' . $plugin . '_index_cols_to_show", json_encode($data), "' . $plugin . '");




' . redi($plugin) . '  
    



} else {

    include view("home", "pageError");
}







';
            break;

        ## search.php
        case "search.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$' . $plugin . ' = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "' . $plugin . '");

# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


$error = array();

' . al(80) . '
' . al(80) . '
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $' . $plugin . ' = ' . $plugin . '_search_by_id($txt);
        break;
        

    ' . al(80) . '
';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                $field = $columna['Field'];
                $default = ($columna['Default']) ? $columna['Default'] : false;

                if ($field != 'id') {
                    $contenido .= '    case "by_' . $field . '":
        $' . $field . ' = (isset($_GET["' . $field . '"]) && $_GET["' . $field . '"] != "" ) ? clean($_GET["' . $field . '"]) : false;
        ' . al(80) . '
        $pagination = new Pagination($page, ' . $plugin . '_search_by("' . $field . '", $' . $field . ', 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=' . $plugin . '&a=search&w=by_' . $field . '&' . $field . '=" . $' . $field . ';
        $pagination->setUrl($url);
        $' . $plugin . ' = ' . $plugin . '_search_by("' . $field . '", $' . $field . ', $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        ' . al(80) . ' 
        break;
            
';
                }
            }
            $contenido .= '
        ' . al(80) . '
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ' . al(80) . '
        $pagination = new Pagination($page, ' . $plugin . '_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=' . $plugin . 'a=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $' . $plugin . ' = ' . $plugin . '_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        ' . al(80) . ' 
        //$' . $plugin . ' = ' . $plugin . '_search($txt);
        break;
}


include view("' . $plugin . '", "index");      
';
            break;

        ## search_advanced.php
        case "search_advanced.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= '

# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}


# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;



include view("' . $plugin . '", "search_advanced");      
';
            break;

        default:
            $contenido = "------------";
            break;
    }

    return "$contenido";
}
