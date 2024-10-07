<?php

/**
 * Mago de Magia PHP - Script para la creación y configuración automática de plugins.
 * 
 * Este script automatiza la creación y eliminación de plugins,
 * configurando controladores, permisos, módulos y opciones en la base de datos.
 * 
 * @version 2.0
 * @author [Tu Nombre]
 */
// Incluyendo archivos necesarios
include 'config.php';
include 'campos.php';
include 'functions.php';
include 'bd.php';
include 'contenido_clase.php';
include 'contenido_controllers.php';
include 'contenido_docs.php';
include 'contenido_functions.php';
include 'contenido_views.php';
include 'functions_extra.php'; // Incluye el archivo de funciones
//
//
// Configuraciones iniciales (se pueden configurar dinámicamente)
$config_destino = "www";
$config_db = $config_db ?? 'default_db'; // Configuración de la base de datos
$admin_id = 246;

// Inicialización del script
echo "-=- MAGIA PHP -=-\n";

// Validación de funciones necesarias
validateFunction('bd_tablas');

// Menú principal
echo "\nSeleccione una opción:\n";
echo "1) Crear un nuevo plugin\n";
echo "2) Eliminar un plugin existente\n";
echo "3) Verificar presencia de ítems de un plugin\n";
echo "4) Agregar un campo a la tabla\n";  // Nueva opción
echo "5) Crear plugins por prefijo\n";   // Nueva opción
echo "6) Crear un archivo de view, controller o model para una tabla\n";  // Opción agregada
echo "7) Modificar una sección de un archivo\n"; // Nueva opción
echo "0) Salir\n";

// Procesar opción seleccionada
$opcion = trim(fgets(STDIN));

switch ($opcion) {
    ############################################################################
    ############################################################################
    # 1
    ############################################################################
    ############################################################################
    case '1':
        // Crear un nuevo plugin
        $plugins = [];
        $i = 1;

        foreach (bd_tablas($config_db) as $key => $value) {
            $ti = "Tables_in_$config_db";
            if (!file_exists("../$config_destino/$value[$ti]")) {
                array_push($plugins, $value[$ti]);
            }
            $i++;
        }

        echo "\n-- Tablas disponibles para crear el plugin\n";
        echo "$config_destino \n";

        foreach ($plugins as $index => $pluginName) {
            echo "$index) $pluginName\n";
        }

        echo "Tablas en: $config_db \n";
        echo "Escoja un plugin para crear:\n";

        do {
            $opcion = trim(fgets(STDIN));
            if (!is_numeric($opcion) || $opcion < 0 || $opcion >= count($plugins)) {
                echo "Opción no válida. Intente de nuevo.\n";
                $opcion = null;
            }
        } while ($opcion === null);

        $plugin = $plugins[$opcion];
        logMessage("[$plugin][add] Plugin seleccionado: $plugin");

        createPlugin($plugin);
        addController($plugin);
        addPermissions($plugin);
        addModule($plugin);
        addOptions($plugin);
        addMenuEntry($plugin, $admin_id);

        break;

    case '2':
        #######################################################################
        #######################################################################
        # 2
        #######################################################################
        #######################################################################        
        // Eliminar un plugin existente
        $plugins = [];
        $i = 1;

        foreach (bd_tablas($config_db) as $key => $value) {
            $ti = "Tables_in_$config_db";
            if (file_exists("../$config_destino/$value[$ti]")) {
                array_push($plugins, $value[$ti]);
            }
            $i++;
        }

        echo "\nSeleccione el plugin que desea eliminar:\n";
        foreach ($plugins as $index => $pluginName) {
            echo "$index) $pluginName\n";
        }

        echo "\nSeleccione el plugin que desea eliminar:\n";

        do {
            $opcion = trim(fgets(STDIN));
            if (!is_numeric($opcion) || $opcion < 0 || $opcion >= count($plugins)) {
                echo "Opción no válida. Intente de nuevo.\n";
                $opcion = null;
            }
        } while ($opcion === null);

        $plugin = $plugins[$opcion];
        deletePlugin($plugin, $config_destino, $admin_id);
        break;

    case '3':
        #######################################################################
        #######################################################################
        # 3
        #######################################################################
        #######################################################################  
        // Verificar presencia de ítems de un plugin
        $plugins = [];
        $i = 1;

        foreach (bd_tablas($config_db) as $key => $value) {
            $ti = "Tables_in_$config_db";
            array_push($plugins, $value[$ti]);
            $i++;
        }

        echo "\nSeleccione el plugin para verificar:\n";
        foreach ($plugins as $index => $pluginName) {
            echo "$index) $pluginName\n";
        }

        echo "\nSeleccione el plugin para verificar:\n";

        do {
            $opcion = trim(fgets(STDIN));
            if (!is_numeric($opcion) || $opcion < 0 || $opcion >= count($plugins)) {
                echo "Opción no válida. Intente de nuevo.\n";
                $opcion = null;
            }
        } while ($opcion === null);

        $plugin = $plugins[$opcion];
        checkPluginItems($plugin);
        break;

    case '4':
        #######################################################################
        #######################################################################
        # 4
        #######################################################################
        #######################################################################  
        // Agregar un campo a la tabla
        $tablas = bd_tablas($config_db);

        echo "\nSeleccione la tabla a la que desea agregar un campo:\n";
        foreach ($tablas as $index => $tabla) {
            $ti = "Tables_in_$config_db";
            echo "$index) " . $tabla[$ti] . "\n";
        }

        do {
            $tablaSeleccionada = trim(fgets(STDIN));
            if (!is_numeric($tablaSeleccionada) || $tablaSeleccionada < 0 || $tablaSeleccionada >= count($tablas)) {
                echo "Opción no válida. Intente de nuevo.\n";
                $tablaSeleccionada = null;
            }
        } while ($tablaSeleccionada === null);

        $tabla = $tablas[$tablaSeleccionada]["Tables_in_$config_db"];

        echo "Ingrese el nombre del nuevo campo: ";
        $nuevoCampo = trim(fgets(STDIN));

        $tiposDeDatos = [
            '1' => 'INT',
            '2' => 'VARCHAR(255)',
            '3' => 'TEXT',
            '4' => 'DATE',
            '5' => 'BOOLEAN',
            '6' => 'FLOAT',
            '7' => 'DATETIME'
        ];

        echo "Seleccione el tipo de datos para el nuevo campo:\n";
        foreach ($tiposDeDatos as $key => $tipo) {
            echo "$key) $tipo\n";
        }

        do {
            $tipoSeleccionado = trim(fgets(STDIN));
            if (!array_key_exists($tipoSeleccionado, $tiposDeDatos)) {
                echo "Opción no válida. Intente de nuevo.\n";
                $tipoSeleccionado = null;
            }
        } while ($tipoSeleccionado === null);

        $tipoCampo = $tiposDeDatos[$tipoSeleccionado];

        bdd_addFieldToTable($tabla, $nuevoCampo, $tipoCampo, $config_db);
        break;

    case '5':
        #######################################################################
        #######################################################################
        # 5
        #######################################################################
        #######################################################################  
        logMessage("[$tabla][********** 5 **********] Crear plugins por prefijo : $tabla");
        // Crear plugins por prefijo
        $tablas = bd_tablas($config_db);
        $prefijos = [];

        foreach ($tablas as $key => $value) {
            $ti = "Tables_in_$config_db";
            $tabla = $value[$ti];
            $prefijo = explode('_', $tabla)[0];
            if (!in_array($prefijo, $prefijos)) {
                $prefijos[] = $prefijo;
            }
        }

        echo "\nSeleccione el prefijo para crear plugins:\n";
        foreach ($prefijos as $index => $prefijo) {
            echo "$index) $prefijo\n";
        }

        do {
            $opcion = trim(fgets(STDIN));
            if (!is_numeric($opcion) || $opcion < 0 || $opcion >= count($prefijos)) {
                echo "Opción no válida. Intente de nuevo.\n";
                $opcion = null;
            }
        } while ($opcion === null);

        $prefijoSeleccionado = $prefijos[$opcion];

        $tablasPrefijo = [];
        foreach ($tablas as $key => $value) {
            $ti = "Tables_in_$config_db";
            if (strpos($value[$ti], $prefijoSeleccionado . '_') === 0) {
                $tablasPrefijo[] = $value[$ti];
            }
        }

        foreach ($tablasPrefijo as $tabla) {
            
            
            
            logMessage("[$tabla][Option 5][table]$tabla");

            createPlugin($tabla);

            addController($tabla);
            addPermissions($tabla);
            addModule($tabla);
            addOptions($tabla);
            addMenuEntry($tabla, $admin_id);
        }
        break;

    case '6':
        #######################################################################
        #######################################################################
        # 6
        #######################################################################
        #######################################################################  
        //
        // Crear archivo específico en una tabla
        $tablas = bd_tablas($config_db);

        echo "\nSeleccione la tabla para la que desea crear un archivo:\n";
        foreach ($tablas as $index => $tabla) {
            $ti = "Tables_in_$config_db";
            echo "$index) " . $tabla[$ti] . "\n";
        }

        do {
            $tablaSeleccionada = trim(fgets(STDIN));
            if (!is_numeric($tablaSeleccionada) || $tablaSeleccionada < 0 || $tablaSeleccionada >= count($tablas)) {
                echo "Opción no válida. Intente de nuevo.\n";
                $tablaSeleccionada = null;
            }
        } while ($tablaSeleccionada === null);

        $tabla = $tablas[$tablaSeleccionada]["Tables_in_$config_db"];

        $tiposDeArchivos = [
            '1' => 'controller',
            '2' => 'model',
            '3' => 'view'
        ];

        echo "Seleccione el tipo de archivo que desea crear para la tabla '$tabla':\n";
        foreach ($tiposDeArchivos as $key => $tipo) {
            echo "$key) $tipo\n";
        }

        do {
            $tipoSeleccionado = trim(fgets(STDIN));
            if (!array_key_exists($tipoSeleccionado, $tiposDeArchivos)) {
                echo "Opción no válida. Intente de nuevo.\n";
                $tipoSeleccionado = null;
            }
        } while ($tipoSeleccionado === null);

        $tipoArchivo = $tiposDeArchivos[$tipoSeleccionado];

        crearArchivoEspecifico($tabla, $tipoArchivo);
        break;

    case '7':
        #######################################################################
        #######################################################################
        # 7
        #######################################################################
        #######################################################################  
        //
        // Modificar una sección de un archivo
        echo "Ingrese la ruta del archivo que desea modificar:\n";
        $archivo = trim(fgets(STDIN));
        if (!file_exists($archivo)) {
            echo "El archivo no existe.\n";
            break;
        }

        $secciones = listarSecciones($archivo);
        if (empty($secciones)) {
            echo "No se encontraron secciones para modificar.\n";
            break;
        }

        $seccionSeleccionada = seleccionarSeccion($secciones);
        if ($seccionSeleccionada === null) {
            break;
        }

        $opcionesContenido = mostrarOpcionesContenido();
        $tipoContenidoSeleccionado = seleccionarContenido($opcionesContenido);
        if ($tipoContenidoSeleccionado === null) {
            break;
        }

        reemplazarContenido($archivo, $seccionSeleccionada, $tipoContenidoSeleccionado);
        break;

    case '0':
        // Salir
        echo "Saliendo...\n";
        exit;

    default:
        echo "Opción no válida. Intente de nuevo.\n";
        break;
}



