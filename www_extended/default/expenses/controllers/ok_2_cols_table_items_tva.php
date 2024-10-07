<?php

if (!permissions_has_permission($u_rol, 'config', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = ($_REQUEST["data"] !== '' ) ? clean($_REQUEST["data"]) : null;
$redi = (isset($_REQUEST["redi"])) ? ($_REQUEST["redi"]) : false;
$error = array();

if ($data !== 'v' && $data !== 'h') {
    array_push($error, "Data must be v or h");
}



//if ($data < 1 || $data > 1000) {
//    array_push($error, "Must be between 1 and 1000");
//}
################################################################################
################################################################################
################################################################################

if (!$error) {

    // si no existe lo crea
    _options_push("config_expenses_2_cols_table_items_tva", $data, "expenses");
    ############################################################################


    $level = null;
    $date = null; // kill
    $u_id = null;
    $u_rol = null;
    //$c = 'public_html';
    //$a = 'search';
    //$w = null;
    $description = "";
    $doc_id = null;
    $crud = "update";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request,
    );
############################################################################
############################################################################
############################################################################
// Datos para el registro

    $logLevels = [
        'DEBUG' => 100,
        'INFO' => 200,
        'NOTICE' => 250,
        'WARNING' => 300,
        'ERROR' => 400,
        'CRITICAL' => 500,
        'ALERT' => 550,
        'EMERGENCY' => 600
    ];

    $logData = [
        'level' => 'info',
        'description' => 'User viewed the invoice list',
        'u_id' => $u_id ?? null, // ID del usuario
        'u_rol' => $u_rol ?? null, // Rol del usuario
        'c' => $c ?? null, // Controller
        'a' => $a ?? null, // Acción
        'w' => $w ?? null, // Where, donde se busca        
        'doc_id' => $id ?? null, // ID del documento asociado
        'crud' => $a ?? null, // Tipo de operación (CRUD)
        'error' => $error ? json_encode($error) : null, // Error, si hay alguno
        'val_get' => json_encode($_GET ?? null), // Parámetros GET
        'val_post' => json_encode($_POST ?? null), // Parámetros POST
        'val_request' => json_encode($_REQUEST ?? null), // Parámetros REQUEST
    ];

// Llamada a la función para registrar el log
    try {
        $logId = logs_add_v2($logData);
        echo "Log registrado con éxito. ID del registro: $logId";
    } catch (Exception $e) {
        echo "Error al registrar el log: " . $e->getMessage();
    }

################################################################################
################################################################################
################################################################################



    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses#1");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=details&id=$redi[id]#2");
            break;

        case 3:
            header("Location: index.php?c=expenses&a=edit&id=$redi[id]#3");
            break;

        case 4:
            header("Location: index.php?c=expenses&a=delete&id=$redi[id]#4");
            break;

        case 5:
            header("Location: index.php?c=expenses&a=aaaaaaaa&id=$redi[id]#5");
            break;

        default:
            header("Location: index.php?c=config#default");
            break;
    }
} else {

    include view("home", "pageError");
}
