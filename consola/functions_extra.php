<?php

// Función para registrar logs de actividades
function logMessage($message) {
    $logFile = 'mago_log.txt';
    file_put_contents($logFile, date('[Y-m-d H:i:s] ') . $message . "\n", FILE_APPEND);
}

// Función para validar la existencia de una función antes de llamarla
function validateFunction($functionName) {
    if (!function_exists($functionName)) {
        die("Error: La función '$functionName' no está definida.\n");
    }
}

// Crear el Plugin
function createPlugin($plugin) {
    // Lógica para crear el plugin
    logMessage("[$plugin][createPlugin] Creando plugin: $plugin");
    // Código para crear el plugin...
    crear_plugin($plugin);

    echo "[$plugin][add] Creando plugin: $plugin";
}

// Registro del controlador en la base de datos
function addController($plugin) {
    if (!bdd_is_controller_in_db($plugin)) {
        echo var_dump(bdd_add_controllers($plugin));
        logMessage("[$plugin][addController] Controlador registrado para el plugin: $plugin");
    } else {
        echo "Controlador ya existe en la base de datos.\n";
        logMessage("[$plugin][add] El controlador ya estaba registrado en la base de datos.");
    }
}

// Asignación de permisos
function addPermissions($plugin) {
    if (!bdd_is_permission_in_db($plugin, 'root')) {
        bdd_add_permissions($plugin, "root", 1111);
        echo "Permisos para root agregados (111).\n";
        logMessage("[$plugin][addPermissions] Permisos agregados para root en el plugin: $plugin");
    } else {
        echo "Root ya tiene permisos.\n";
        logMessage("[$plugin][addPermissions][error] Root ya tenía permisos asignados.");
    }
}

// Registrar el módulo en la base de datos
function addModule($plugin) {
    if (!bdd_is_module_in_db($plugin)) {
        bdd_add_module($plugin);
        logMessage("[$plugin][addModule] Módulo registrado para el plugin: $plugin");
    }
}

// Agregar opciones de configuración
function addOptions($plugin) {
    $option = "config_{$plugin}_show_col_from_table";
    if (!bdd_is_options_in_db($option)) {
        bdd_add_options($option, $option, bdd_data_for_options($plugin), 1, $option);
        logMessage("[$plugin][addOptions] Opción de configuración agregada para el plugin: $plugin");
    }
}

// Agregar entrada en el menú de administración
function addMenuEntry($plugin, $admin_id) {
    if (!bdd_menu_search('top', $admin_id, $plugin)) {
        bdd_add_en_menu("top", $admin_id, $plugin, $plugin, "index.php?c=$plugin", null, "far fa-folder", 1, 1);
        logMessage("[$plugin][addMenuEntry] Entrada en el menú agregada para el plugin: $plugin");
    }
}

// Eliminar un plugin
function deletePlugin($plugin, $config_destino, $admin_id) {
    // 1. Eliminar archivos del sistema de archivos
    $plugin_path = "../$config_destino/$plugin";

    if (is_dir($plugin_path)) {
        // Recursivamente eliminar directorios y archivos
        $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($plugin_path, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileinfo->getRealPath());
        }
        rmdir($plugin_path);
        logMessage("[$plugin][deletePlugin] Archivos del plugin eliminados.");
        echo "[ok] Archivos del plugin '$plugin' eliminados.\n";
    } else {
        echo "[error] No se encontraron archivos para el plugin '$plugin'.\n";
        logMessage("[$plugin][deletePlugin][error] No se encontraron archivos para el plugin.");
    }

    // 2. Eliminar registros de la base de datos

    if (bdd_is_permission_in_db($plugin, 'root')) {
        bdd_remove_permissions($plugin, 'root');
        logMessage("[$plugin][bdd_remove_permissions] Permisos de 'root' eliminados de la base de datos.");
        echo "[ok] Permisos de 'root' para el plugin '$plugin' eliminados de la base de datos.\n";
    }


    if (bdd_is_controller_in_db($plugin)) {
        bdd_remove_controller($plugin);
        logMessage("[$plugin][bdd_remove_controller] Controlador eliminado de la base de datos.");
        echo "[ok] Controlador del plugin '$plugin' eliminado de la base de datos.\n";
    }

    if (bdd_is_module_in_db($plugin)) {
        bdd_remove_module($plugin);
        logMessage("[$plugin][bdd_remove_module] Módulo eliminado de la base de datos.");
        echo "[ok] Módulo del plugin '$plugin' eliminado de la base de datos.\n";
    }

    $option = "config_{$plugin}_show_col_from_table";
    if (bdd_is_options_in_db($option)) {
        bdd_remove_options($option);
        logMessage("[$plugin][bdd_remove_options] Opciones de configuración eliminadas de la base de datos.");
        echo "[ok] Opciones de configuración para el plugin '$plugin' eliminadas de la base de datos.\n";
    }

    if (bdd_menu_search('top', $admin_id, $plugin)) {
//        bdd_remove_menu_entry('top', $admin_id, $plugin);
//        logMessage("[$plugin] Entrada del menú eliminada.");
//        echo "Entrada del menú para el plugin '$plugin' eliminada.\n";
        echo "Entrada del menú para el plugin '$plugin' eliminada.\n";
    }
}

function checkPluginItems($plugin) {
    
    global $admin_id; 
    
    echo "Verificando presencia de ítems para el plugin: $plugin\n";

    // Verificar controlador
    if (bdd_is_controller_in_db($plugin)) {
        echo "- Controlador: Existe\n";
    } else {
        echo "- Controlador: No existe\n";
    }

    // Verificar permisos
    if (bdd_is_permission_in_db($plugin, 'root')) {
        echo "- Permisos para root: Existen\n";
    } else {
        echo "- Permisos para root: No existen\n";
    }

    // Verificar módulo
    if (bdd_is_module_in_db($plugin)) {
        echo "- Módulo: Existe\n";
    } else {
        echo "- Módulo: No existe\n";
    }

    // Verificar opciones
    $option = "config_{$plugin}_show_col_from_table";
    if (bdd_is_options_in_db($option)) {
        echo "- Opciones: Existen\n";
    } else {
        echo "- Opciones: No existen\n";
    }

    // Verificar entrada en el menú
    if (bdd_menu_search('top', $admin_id, $plugin)) { // Asumiendo que 246 es el ID del admin
        echo "- Menú: Existe\n";
    } else {
        echo "- Menú: No existe\n";
    }
}
