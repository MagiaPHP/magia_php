<?php

###################################################### 
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
# Fecha de creacion del documento: 2024-08-22 18:08:50 
######################################################
# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `delete` 
if (!permissions_has_permission($u_rol, $c, "delete")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");

    # y matamos el proceso 
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;

$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;

$error = array();
###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (!banks_transactions_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
# Si ya esta anulado > error 
# Si es cero o null > error 
# 
# 
################################################################################
################################################################################
################################################################################

$params = [
    'id' => $id ?? null,
    'canceled_code' => $canceled_code ?? null,
        // Agregar más parámetros si es necesario
];

if (!$error) {


    // 1 obtener canceled code 
    // 2 copiar la transaction contraria a la actual 
    // 3 registrar el candeled_code en la transaccion anulada
    // 4 



// Instanciar la clase de gestión de errores
    $errorHandler = new ErrorHandler();

    try {
        // Iniciar la transacción
        $db->beginTransaction();

        try {
            // obtengo el codigo de cancelacion 
            $canceled_code = banks_transactions_next_canceled_code();
        } catch (Exception $e) {
            // Paro si no consigo el codigo
            throw new Exception('Error extracting canceled_code from database.' . $e);
        }
        
        try {
            banks_transactions_cancel($id, $canceled_code);
        } catch (Exception $e) {
            // Aquí puedes manejar la excepción, por ejemplo, mostrar un mensaje de error o registrar el error en un log.
            echo "Se produjo un error " . __FILE__ . " : " . $e->getMessage();
            $errorHandler->logError($e, $params);
            throw new Exception('Error al registrar la transaccion contraria' . $e);
        }
        
        try {
            // acrego el cancel code a la linea original
            banks_transactions_update_canceled_code($id, $canceled_code);
        } catch (Exception $e) {
            // Aquí puedes manejar la excepción, por ejemplo, mostrar un mensaje de error o registrar el error en un log.
            echo "Se produjo un error: " . vardump($e);
            //throw new Exception("Error al intentar registrar el cancel code: " . $e->getMessage());
            $errorHandler->logError($e, $params);
        }
        

        //
        // Confirmar la transacción si todas las operaciones son exitosas
        $db->commit();
        //
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $db->rollBack();

//        // Manejar el error y registrar la información usando el manejador de errores
//        $params = [
//            'valor1' => $valor1,
//            'valor2' => $valor2,
//            'nuevo_valor' => $nuevoValor,
//                // Otros parámetros relevantes
//        ];
//
//        // Loguear el error y lanzar una excepción si es necesario
//        $errorHandler->logError($e, $params);
        // Opcional: Mostrar un mensaje de error al usuario
        echo "Se ha producido un error y las operaciones han sido revertidas.";

//        vardump($e);
        
    }




    

//    $errorHandler = new ErrorHandler();
//    try {
//        try {
//            // obtengo el codigo de cancelacion 
//            $canceled_code = banks_transactions_next_canceled_code();
//        } catch (Exception $e) {
//            // Paro si no consigo el codigo
//            throw new Exception('Error extracting canceled_code from database.' . $e);
//        }
//        try {
//            banks_transactions_cancel($id, $canceled_code);
//        } catch (Exception $e) {
//            // Aquí puedes manejar la excepción, por ejemplo, mostrar un mensaje de error o registrar el error en un log.
//            echo "Se produjo un error " . __FILE__ . " : " . $e->getMessage();
//            $errorHandler->logError($e, $params);
//            throw new Exception('Error al registrar la transaccion contraria' . $e);
//        }
//        try {
//            // acrego el cancel code a la linea original
//            banks_transactions_update_canceled_code($id, $canceled_code);
//        } catch (Exception $e) {
//            // Aquí puedes manejar la excepción, por ejemplo, mostrar un mensaje de error o registrar el error en un log.
//            echo "Se produjo un error: " . vardump($e);
//            //throw new Exception("Error al intentar registrar el cancel code: " . $e->getMessage());
//            $errorHandler->logError($e, $params);
//        }
//    } catch (Exception $e) {
//        echo vardump($e);
//        $errorHandler->logError($e, $params);
//    }
//
//
//
    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=banks_transactions");
            break;

        case 2:
            header("Location: index.php?c=banks_transactions&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=banks_transactions&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=banks_transactions&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=banks_transactions&a=ok_delete&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
    //
    //
    //
} else {

    include view("home", "pageError");
}  
