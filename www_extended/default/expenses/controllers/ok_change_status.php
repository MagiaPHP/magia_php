<?php

// Cambia de estatus
if (!permissions_has_permission($u_rol, 'expenses', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$expense_id = (isset($_POST['expense_id']) && $_POST['expense_id'] != "") ? $_POST['expense_id'] : false;
$status_code = (isset($_POST['status_code']) && $_POST['status_code'] != "") ? $_POST['status_code'] : false;
$redi = (isset($_POST['redi']) && $_POST['redi'] != "") ? $_POST['redi'] : 1;

$error = array();

### MANDATORY ##################################################################
if (!$expense_id) {
    array_push($error, 'Expense id is mandatory');
}
### FORMAT #####################################################################
if (!expenses_is_id($expense_id)) {
    array_push($error, 'Expense id format error');
}
if (!expenses_status_is_status($status_code)) {
    array_push($error, 'Status format error');
}

################################################################################
################################################################################

if (!$error) {

    expenses_change_status_to($expense_id, $status_code);

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
        'level' => 200,
        'description' => 'Change expense status to ' . $status_code . ' [' . expenses_status_by_status($status_code) . ']',
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

    logs_add_v2(
            $logData
    );
    ############################################################################
    ############################################################################
    ############################################################################  





    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c = expenses&a = details&id = $expense_id");
            break;

        case 2:
            header("Location: index.php?c = expenses&a = details&id = $expense_id");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view("home", "pageError");
}
