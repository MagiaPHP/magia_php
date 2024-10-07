<?php

$archivos_views = array(
    "add.php",
    "delete.php",
    "details.php",
    "edit.php",
    "export_json.php",
    "export_pdf.php",
    "form_add.php",
    "form_edit.php",
    "form_details.php",
    "form_delete.php",
    "form_search.php",
    "modal_index_cols_to_show.php",
    "form_search_advanced.php",
    "form_search_simple.php",
    "form_search_simple_multi.php",
    "form_pagination_items_limit.php",
    "form_show_col_from_table.php",
    "form_index_cols_to_show.php",
    "index.php",
    "izq.php",
    "izq_add.php",
    "izq_details.php",
    "izq_delete.php",
    "izq_edit.php",
    "der.php",
    "der_add.php",
    "der_details.php",
    "der_edit.php",
    "der_delete.php",
    "modal_add.php",
    "modal_edit.php",
    "modal_delete.php",
    "modal_search.php",
    "modal_index_cols_to_show.php",
    "nav.php",
    "search.php",
    "search_advanced.php",
    "table_index.php",
    "top.php",
    "table_index_form_add.php"
);

$archivos_controllers = array(
    "add.php",
    "delete.php",
    "details.php",
    "edit.php",
    "export_json.php",
    "export_pdf.php",
    "index.php",
    "ok_add.php",
    "ok_delete.php",
    "ok_edit.php",
    "ok_index_cols_to_show.php",
    "ok_show_col_from_table.php",
    "search.php",
    "search_advanced.php",
);

function remove_underscores($string) {
    // Reemplazar todos los guiones bajos con una cadena vacía
    return str_replace('_', ' ', $string);
}

function crearArchivoEspecifico($tabla, $tipoArchivo) {
    global $config_destino;
    global $archivos_views;
    global $archivos_controllers;

    $archivo = '';
    $contenido = '';

    // Definir la ruta base como "www_extended"
    $rutaBase = "../www_extended/default/$tabla";

    // Crear la estructura de carpetas si no existe
    crear_carpeta("$rutaBase/controllers");
    crear_carpeta("$rutaBase/models");
    crear_carpeta("$rutaBase/views");

    switch ($tipoArchivo) {
        case 'controller':


            // Mostrar opciones de archivos de controllers disponibles
            echo "Seleccione el archivo de controller que desea crear para la tabla '$tabla':\n";
            foreach ($archivos_controllers as $key => $controllerFile) {
                echo "$key) $controllerFile\n";
            }

            // Validación y selección del archivo de controller
            do {
                $controllerSeleccionado = trim(fgets(STDIN));
                if (!is_numeric($controllerSeleccionado) || $controllerSeleccionado < 0 || $controllerSeleccionado >= count($archivos_controllers)) {
                    echo "Opción no válida. Intente de nuevo.\n";
                    $controllerSeleccionado = null;
                }
            } while ($controllerSeleccionado === null);

            $archivo = "controllers/" . $archivos_controllers[$controllerSeleccionado];
            $contenido = contenido_controllers($tabla, $archivos_controllers[$controllerSeleccionado]);  // Generar el contenido del archivo de controller seleccionado
            break;

        //
        //
        //
        //

        case 'model':
            $archivo = "models/$tabla.php";  // Puedes cambiar el nombre del archivo según tus necesidades
            $contenido = contenido_clase($tabla);  // Debes definir cómo generas el contenido del archivo
            break;

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        case 'view':
            // Lista de archivos de views
            // Mostrar opciones de archivos de views disponibles
            echo "Seleccione el archivo de view que desea crear para la tabla '$tabla':\n";
            foreach ($archivos_views as $key => $viewFile) {
                echo "$key) $viewFile\n";
            }

            // Validación y selección del archivo de view
            do {
                $viewSeleccionado = trim(fgets(STDIN));
                if (!is_numeric($viewSeleccionado) || $viewSeleccionado < 0 || $viewSeleccionado >= count($archivos_views)) {
                    echo "Opción no válida. Intente de nuevo.\n";
                    $viewSeleccionado = null;
                }
            } while ($viewSeleccionado === null);

            $archivo = "views/" . $archivos_views[$viewSeleccionado];

            $contenido = contenido_views($tabla, $archivos_views[$viewSeleccionado]);  // Generar el contenido del archivo de view seleccionado


            break;
        default:
            echo "Tipo de archivo no válido.\n";
            return;
    }

    // Crear el archivo en la carpeta correspondiente
    $rutaArchivo = "$rutaBase/$archivo";

    crear_archivo($rutaArchivo, $contenido);
    echo "\n";
    echo "\n";

    echo $contenido;

    echo "\n";
    echo "\n";

    echo "Archivo creado en: $rutaArchivo\n";

    echo "\n";
    echo "\n";
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// Función para listar secciones en el archivo
function listarSecciones($archivo) {
    $contenido = file_get_contents($archivo);

    // Expresión regular para encontrar secciones
    $patron = '/<!--\s*mg_start\s*(\w+)\s*-->.*?<!--\s*mg_end\s*\1\s*-->/s';

    // Busca las secciones en el contenido del archivo
    preg_match_all($patron, $contenido, $coincidencias, PREG_OFFSET_CAPTURE);

    // Mostrar secciones encontradas
    echo "Secciones disponibles en '$archivo':\n";
    foreach ($coincidencias[1] as $key => $seccion) {
        echo "$key) " . $seccion[0] . "\n";
    }

    // Devolver la lista de secciones encontradas
    return $coincidencias[1];
}

// Función para seleccionar sección
function seleccionarSeccion($secciones) {
    echo "Seleccione la sección que desea modificar:\n";
    $eleccion = trim(fgets(STDIN));

    if (!is_numeric($eleccion) || $eleccion < 0 || $eleccion >= count($secciones)) {
        echo "Opción no válida.\n";
        return null;
    }

    return $secciones[$eleccion];
}

// Función para mostrar opciones de contenido
function mostrarOpcionesContenido() {
    $opciones = [
        '1' => 'Checkbox',
        '2' => 'Texto',
        '3' => 'Área de Texto',
    ];

    echo "Seleccione el tipo de contenido nuevo:\n";
    foreach ($opciones as $key => $tipo) {
        echo "$key) $tipo\n";
    }

    return $opciones;
}

// Función para seleccionar tipo de contenido
function seleccionarContenido($opciones) {
    echo "Ingrese el número de la opción deseada:\n";
    $eleccion = trim(fgets(STDIN));

    if (!isset($opciones[$eleccion])) {
        echo "Opción no válida.\n";
        return null;
    }

    return $opciones[$eleccion];
}

// Función para reemplazar contenido en la sección seleccionada
function reemplazarContenido($archivo, $seccion, $tipoContenido) {
    $contenido = file_get_contents($archivo);

    switch ($tipoContenido) {
        case 'Checkbox':
            $nuevoContenido = <<<EOD
<?php # $seccion  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="target"><?php _t("Target"); ?></label>
        <div class="col-sm-8">
            <input type="checkbox" name="target" class="form-control" id="target" value="1" >
        </div>  
    </div>
    <?php # /$seccion  ?>
EOD;
            break;
        case 'Texto':
            $nuevoContenido = <<<EOD
<?php # $seccion  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="target"><?php _t("Target"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="target" class="form-control" id="target" placeholder="target" value="_new" >
        </div>  
    </div>
    <?php # /$seccion  ?>
EOD;
            break;
        case 'Área de Texto':
            $nuevoContenido = <<<EOD
<?php # $seccion  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="target"><?php _t("Target"); ?></label>
        <div class="col-sm-8">
            <textarea name="target" class="form-control" id="target" placeholder="target"></textarea>
        </div>  
    </div>
    <?php # /$seccion  ?>
EOD;
            break;
        default:
            echo "Tipo de contenido no válido.\n";
            return;
    }


    // Expresión regular para encontrar secciones
    $patron = '/<!--\s*mg_start\s*(\w+)\s*-->.*?<!--\s*mg_end\s*\1\s*-->/s';

    $contenidoModificado = preg_replace($patron, $nuevoContenido, $contenido);

    file_put_contents($archivo, $contenidoModificado);

    echo "El contenido en la sección '$seccion' ha sido reemplazado con éxito.\n";
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
function contenido_install($plugin) {

    $contenido = "-- \n";
    $contenido .= "-- Documento creado con mago de Magia_PHP \n";
    $contenido .= "-- http://magiaphp.com \n";
    $contenido .= "-- Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
    $contenido .= "--\n";
    $contenido .= ' 
--
INSERT INTO `_options` 
(`id`, `option`, `description`, `data`, `group`, `controller`, `order_by`, `status`) ';

//    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
    //      $contenido .= " `" . $columna['Field'] . "`, ";
    // }

    $contenido .= ' VALUES (' . "\n";

    $contenido .= " (NULL, '" . $plugin . "_index_cols_to_show', NULL, '[ ";

    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= ' \"' . $columna['Field'] . '\",';
    }

    $contenido .= " ]', '123456789', '$plugin', '1', '1' ";

    $contenido .= ');
--        
--        
-- 

INSERT INTO `modules` 
(`id`, `label`, `father`, `module`, `description`, `author`, `author_email`, `url`, `version`, `order_by`, `status`) 
VALUES 
(NULL, \'' . $plugin . '\', NULL, \'' . $plugin . '\', \'' . $plugin . '\', \'robinson coello\', \'robincoello@hotmail.com\', \'https://coello.be\', \'1\', \'1\', \'1\') ; 

--
--
--

INSERT INTO `controllers` 
(`id`, `controller`, `title`, `description`) 
VALUES 
(NULL, \'' . $plugin . '\', \'' . $plugin . '\', \'' . $plugin . '\') ; 

--
--
--
INSERT INTO `permissions` 
(`id`, `rol`, `controller`, `crud`) 
VALUES 
(NULL, \'root\', \'' . $plugin . '\', \'1111\'); 

-- 
-- 
-- 
INSERT INTO `_menus` 
(`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
VALUES 
(NULL, \'top\', NULL, \'' . $plugin . '\', \'' . $plugin . '\', \'index.php?c=' . $plugin . '\', NULL, \'glyphicon glyphicon-file\', \'1\', \'1\');  
    

        
';

    return $contenido;
}

function contenido_readme($plugin) {
    $contenido = '#' . $plugin . '
## ' . $plugin . ' Una corta descripción
Escribe aca tu documentación

## ' . $plugin . ' ayuda
Ayuda, por que o pones algo para guiar al que lo va a usar?

## ' . $plugin . ' más info
Aca puedes poner tu web

## Información de : ' . $plugin . ' ' . "\n";
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? ", \n" : "\n";

        $contenido .= '' . $columna['Field'] . ' ' . $coma . '  ';

        $i++;
    }


    return $contenido;
}

function crear_carpeta($carpeta) {
    $cmd = "mkdir -p $carpeta";
    shell_exec($cmd);
}

function crear_archivo($archivo, $contenido) {
    $fh = fopen($archivo, 'w') or die("Se produjo un error al crear el archivo");
    fwrite($fh, $contenido) or die("No se pudo escribir en el archivo $archivo \n");
    fclose($fh);
    //echo "file ok: '$archivo'  \n";
}

function copiar_archivo($archivo_origen, $archivo_destino = null, $crear = "0", $despues_de = null) {
    $file_array = file($archivo_origen);

    $new_lines = array();

    foreach ($file_array as $line) {
//        echo "$line\n";
        array_push($new_lines, $line);

        if (stristr($line, $despues_de)) {
            //echo "*************************************************************\n";
            //echo "Aca copio el nuevo field\n";
            array_push($new_lines, crear_parte_de_formulario($crear));
            //echo "*************************************************************\n";
        }
    }

    // con esto creo el nuevo archivo 
    // paso de array a un string
    crear_archivo($archivo_destino, implode(" ", $new_lines));
}

function busca_y_borra_parte_de_documento($documento, $desde, $hasta) {
    $file_array = file($documento);
    $new_lines = array();
    $saltarse = false;
    // asi si no se manda hasta donde borrar, 
    // borra el bloque desde-hasta


    foreach ($file_array as $line) {

        if (stristr($line, $desde)) {
            $saltarse = true;
        }

        if (!$saltarse) {
            array_push($new_lines, $line);
        }
        if (stristr($line, $hasta)) {
            $saltarse = false;
        }
    }
    // con esto creo el nuevo archivo 
    // paso de array a un string
    crear_archivo($documento, implode(" ", $new_lines));
}

function crear_parte_de_formulario($new_field) {
    $data = '
    <?php # ' . $new_field . ' ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contexto"><?php _t("' . $new_field . '"); ?></label>
        <div class="col-sm-8">
            <input type="text"   name="titulo" class="form-control" id="titulo" placeholder="titulo" value="" >
        </div>	
    </div>
    <?php # /' . $new_field . ' ?>
    
';
    return $data;
}

function columna_info($plugin, $columna) {
    $info = array();
    //REFERENCED_TABLE_NAME, 
    //REFERENCED_COLUMN_NAME 
    $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
    $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
    $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;
    //
    $marca_agua = ($columna['Field']) ? $columna['Field'] : "";
    $valor = ($columna['Default']) ? $columna['Default'] : "";
    $valor = '<?php echo $' . $plugin . '[\'' . $columna['Field'] . '\']; ?>';
    $campos_tipo = campos_tipo($columna['Type']);
    $nombre = $columna['Field'];
    $id = $columna['Field'];

    $info = array(
        'bdd_referencias' => $bdd_referencias,
        'bdd_ref_tabla_externa' => $bdd_ref_tabla_externa,
        'bdd_col_externa' => $bdd_col_externa,
        'marca_agua' => $marca_agua,
        'valor' => $valor,
        'campos_tipo' => $campos_tipo,
        'nombre' => $nombre,
        "id" => $id,
    );

    return $info;
}

function crear_plugin($plugin) {
    global $config_destino;
    global $archivos_views;
    global $archivos_controllers;

    crear_carpeta("../$config_destino/$plugin");
    crear_carpeta("../$config_destino/$plugin/controllers");
    crear_carpeta("../$config_destino/$plugin/models");
    crear_carpeta("../$config_destino/$plugin/views");
    //
    crear_carpeta("../$config_destino/$plugin/docs");
    crear_carpeta("../$config_destino/$plugin/docs/es");
    crear_carpeta("../$config_destino/$plugin/docs/es/controllers");
    crear_carpeta("../$config_destino/$plugin/docs/es/models");
    crear_carpeta("../$config_destino/$plugin/docs/es/views");
    //
    crear_carpeta("../$config_destino/$plugin/views/js");

    if ($config_destino == "www") {
        crear_archivo("../$config_destino/$plugin/functions.php", contenido_functions($plugin));
        // separar las funciones en C R U D  
//        crear_archivo("../$config_destino/$plugin/fun_update.php", contenido_functions($plugin));
//        crear_archivo("../$config_destino/$plugin/fun_select.php", contenido_functions($plugin));
//        crear_archivo("../$config_destino/$plugin/fun_delete.php", contenido_functions($plugin));
//        crear_archivo("../$config_destino/$plugin/fun_insert.php", contenido_functions($plugin));
        crear_archivo("../$config_destino/$plugin/views/js/order_by.js", "// js order file create by magia_php");
    } else {


        $contenido_functions = "<?php \n";
        $contenido_functions .= "# Documento creado con mago de Magia_PHP \n";
        $contenido_functions .= "# http://magiaphp.com \n";
        $contenido_functions .= "# Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
        $contenido_functions .= "# Aca puedes agregar tus funciones  \n";
        $contenido_functions .= "\n";

        crear_archivo("../$config_destino/$plugin/functions.php", $contenido_functions);
    }

    crear_archivo("../$config_destino/$plugin/install.sql", contenido_install($plugin));

    crear_archivo("../$config_destino/$plugin/readme.md", contenido_readme($plugin));
////////////////////////////////////////////////////////////////////////////////
    // Creamos la classe     
    $archivo_clase = ucfirst($plugin) . '.php';
    crear_archivo("../$config_destino/$plugin/models/$archivo_clase", contenido_clase($plugin));
////////////////////////////////////////////////////////////////////////////////
    $contenido = "<?php";
    foreach ($archivos_controllers as $archivo) {
        crear_archivo("../$config_destino/$plugin/controllers/$archivo", contenido_controllers($plugin, $archivo));
    }

    //echo "## VIEWS -- \n "; 
    foreach ($archivos_views as $archivo) {
        crear_archivo("../$config_destino/$plugin/views/$archivo", contenido_views($plugin, $archivo));
    }

    // Creamos la documentacion         
    // Creamos la documentacion         
    // Creamos la documentacion         
    // Creamos la documentacion         
    // Creamos la documentacion         

    foreach ($archivos_controllers as $archivo) {

        crear_archivo("../$config_destino/$plugin/docs/es/controllers/$archivo.md", contenido_docs('controllers', $plugin, $archivo));
        crear_archivo("../$config_destino/$plugin/docs/es/models/$archivo.md", contenido_docs('models', $plugin, $archivo));
        crear_archivo("../$config_destino/$plugin/docs/es/views/$archivo.md", contenido_docs('views', $plugin, $archivo));
    }
}

function crear_docs($plugin) {

    global $config_destino;

//    crear_carpeta("../$config_destino/$plugin");
//    crear_carpeta("../$config_destino/$plugin/controllers");
//    crear_carpeta("../$config_destino/$plugin/models");
//    crear_carpeta("../$config_destino/$plugin/views");
    //
    crear_carpeta("../$config_destino/$plugin/docs");
    crear_carpeta("../$config_destino/$plugin/docs/es");
    crear_carpeta("../$config_destino/$plugin/docs/es/controllers");
    crear_carpeta("../$config_destino/$plugin/docs/es/models");
    crear_carpeta("../$config_destino/$plugin/docs/es/views");
    //
    //crear_carpeta("../$config_destino/$plugin/views/js");

    $contenido_functions = "# functions.php \n";
    $contenido_functions .= "Documento creado con mago de Magia_PHP \n";
    $contenido_functions .= "http://magiaphp.com \n";
    $contenido_functions .= "Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
    $contenido_functions .= "Aca puedes agregar tus funciones  \n";
    $contenido_functions .= "\n";

    crear_archivo("../$config_destino/$plugin/docs/es/functions.php.md", $contenido_functions);

    $contenido_install = "# functions.php \n";
    $contenido_install .= "Documento creado con mago de Magia_PHP \n";
    $contenido_install .= "http://magiaphp.com \n";
    $contenido_install .= "Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
    $contenido_install .= "Aca puedes agregar tus funciones  \n";
    $contenido_install .= "\n";

    crear_archivo("../$config_destino/$plugin/docs/es/install.sql.md", $contenido_install);
    //crear_archivo("../$config_destino/$plugin/readme.md", contenido_readme($plugin));
////////////////////////////////////////////////////////////////////////////////
//    // Creamos la classe     
//    $archivo_clase = ucfirst($plugin) . '.php';
//    crear_archivo("../$config_destino/$plugin/models/$archivo_clase", contenido_clase($plugin));
////////////////////////////////////////////////////////////////////////////////


    $archivos_controllers = array(
        "add.php",
        "delete.php",
        "details.php",
        "edit.php",
        "export_json.php",
        "export_pdf.php",
        "index.php",
        "ok_add.php",
        "ok_delete.php",
        "ok_edit.php",
        "ok_index_cols_to_show.php",
        "ok_show_col_from_table.php",
        "search.php",
        "search_advanced.php",
    );

    $contenido = "<?php";

//    foreach ($archivos_controllers as $archivo) {
//        crear_archivo("../$config_destino/$plugin/controllers/$archivo", contenido_controllers($plugin, $archivo));
//    }


    $archivos_views = array(
        "add.php",
        "delete.php",
        "details.php",
        "edit.php",
        "export_json.php",
        "export_pdf.php",
        "form_add.php",
        "form_edit.php",
        "form_details.php",
        "form_delete.php",
        "form_search.php",
        "modal_index_cols_to_show.php",
        "form_search_advanced.php",
        "form_pagination_items_limit.php",
        "form_show_col_from_table.php",
        "form_index_cols_to_show.php",
        "index.php",
        "izq.php",
        "izq_add.php",
        "izq_details.php",
        "izq_delete.php",
        "izq_edit.php",
        "der.php",
        "der_add.php",
        "der_details.php",
        "der_edit.php",
        "der_delete.php",
        "modal_add.php",
        "modal_edit.php",
        "modal_delete.php",
        "modal_search.php",
        "modal_index_cols_to_show.php",
        "nav.php",
        "search.php",
        "search_advanced.php",
        "table_index.php",
        "top.php",
        "table_index_form_add.php"
    );

//
//    foreach ($archivos_views as $archivo) {
//        crear_archivo("../$config_destino/$plugin/views/$archivo", contenido_views($plugin, $archivo));
//    }
    // Creamos la documentacion         
    // Creamos la documentacion         
    // Creamos la documentacion         
    // Creamos la documentacion         
    // Creamos la documentacion         

    foreach ($archivos_controllers as $archivo) {
        crear_archivo("../$config_destino/$plugin/docs/es/controllers/$archivo.md", contenido_docs('controllers', $plugin, $archivo));
//        crear_archivo("../$config_destino/$plugin/docs/es/models/$archivo.md", contenido_docs('models', $plugin, $archivo));
//        crear_archivo("../$config_destino/$plugin/docs/es/views/$archivo.md", contenido_docs('views', $plugin, $archivo));
    }
}

function crear_clase($plugin, $preview = false) {
    global $config_destino;

    if ($preview) {
        print contenido_clase($plugin);
    } else {

        crear_carpeta("../$config_destino/$plugin");
        crear_carpeta("../$config_destino/$plugin/models");

        $class_file_name = ucfirst($plugin) . ".php";

        crear_archivo("../$config_destino/$plugin/models/$class_file_name", contenido_clase($plugin));
    }
}

function crear_mvc_esqueleto($plugin) {
    global $config_destino;
    crear_carpeta("../$config_destino/$plugin");
    crear_carpeta("../$config_destino/$plugin/controllers");
    crear_carpeta("../$config_destino/$plugin/models");
    crear_carpeta("../$config_destino/$plugin/views");
    if ($config_destino == "www") {
        crear_archivo("../$config_destino/$plugin/functions.php", contenido_functions($plugin));
    } else {

        $contenido_functions = "<?php \n";
        $contenido_functions .= "# Documento creado con mago de Magia_PHP \n";
        $contenido_functions .= "# http://magiaphp.com \n";
        $contenido_functions .= "# Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
        $contenido_functions .= "# Aca puedes agregar tus funciones  \n";
        $contenido_functions .= "\n";

        crear_archivo("../$config_destino/$plugin/functions.php", "$contenido_functions");
    }
    crear_archivo("../$config_destino/$plugin/readme.md", bdd_total_columnas_segun_tabla($plugin));

    ////////////////////////////////////////////////////////////////////////////////
    // Creamos la classe     
    $archivo_clase = ucfirst($plugin) . '.php';
//    crear_archivo("../$config_destino/$plugin/models/$archivo_clase", contenido_clase($plugin));
    crear_archivo("../$config_destino/$plugin/models/$archivo_clase", "<?php ");
////////////////////////////////////////////////////////////////////////////////
}

function magia_registrar_en_tabla($plugin) {
    global $config_db;

    foreach (bdd_columnas_segun_tabla($plugin) as $campo) {
        //echo "Field: " . $campo['Field'] . " \n";

        $tipo = campos_tipo($campo['Type']);

        $te = bdd_referencias($plugin, $campo['Field']);
        //echo var_dump($tabla_externa);
        $tabla_externa = (isset($te['REFERENCED_TABLE_NAME'])) ? $te['REFERENCED_TABLE_NAME'] : false;
        $columna_externa = (isset($te['REFERENCED_COLUMN_NAME'])) ? $te['REFERENCED_COLUMN_NAME'] : false;

        //    echo ($tabla_externa) ? "La tabla externa es: $tabla_externa \n" : "No \n";
        //    echo ($columna_externa) ? "la columlna externa es: $columna_externa \n" : "No \n";

        foreach (array("ver", "crear", "editar", "borrar") as $crud) {
            bdd_add_en_magia($config_db, $plugin, $campo['Field'], $crud, $campo['Field'], $tipo, $tabla_externa, $columna_externa, "form-control", $campo['Field'], $campo['Field'], $campo['Field'], "valor");
        }
        //echo " \n";

        $tabla_externa = null;
        $columna_externa = null;
    }
}

function magia_analiza_tabla($plugin) {

    //echo "COLS:\n";

    $i = 1;
    foreach (bdd_columnas_segun_tabla($plugin) as $col) {
        echo $i++ . ') ' . $col['Field'] . " \n";
        $tipo = campos_tipo($col['Type']);
        $te = bdd_referencias($plugin, $col['Field']);
        $tabla_externa = (isset($te['REFERENCED_TABLE_NAME'])) ? $te['REFERENCED_TABLE_NAME'] : false;
        $columna_externa = (isset($te['REFERENCED_COLUMN_NAME'])) ? $te['REFERENCED_COLUMN_NAME'] : false;
        echo ($tabla_externa) ? "La tabla externa es: $tabla_externa \n" : "";
        echo ($columna_externa) ? "la columna externa es: $columna_externa \n" : "";
        echo $tipo . "\n";
        echo " \n";
    }
}
