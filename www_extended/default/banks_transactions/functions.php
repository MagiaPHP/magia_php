<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Magia_PHP 0.0.1
 * Factuz.com
 * Robinson Coello 
 * www.coello.be
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function banks_transactions_list_by_document_document_id($document, $document_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `client_id`,  `document`,  `document_id`,  `type`,  `account_number`,  `total`,  `operation_number`,  `ref`,  `description`,  `ce`,  `details`,  `message`,  `date`,  `registre_date`,  `code`,   `canceled_code`,  `order_by`,  `status`   
    
    FROM `banks_transactions` 
    
    WHERE `document` = :document AND `document_id` = :document_id
    
    ORDER BY `order_by` , `id` DESC  
    
    Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':document', $document, PDO::PARAM_STR);
    $query->bindValue(':document_id', (int) $document_id, PDO::PARAM_INT);

    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

/**
 * Obtiene el total acumulado de transacciones bancarias para un documento y ID de documento específicos.
 * 
 * @param string $document El documento por el cual filtrar las transacciones.
 * @param int $document_id El ID del documento por el cual filtrar las transacciones.
 * @return float|null El total acumulado de las transacciones que cumplen con los criterios, o NULL si no hay resultados.
 * 
 * Esta función suma los valores de la columna `total` para las transacciones que coinciden con los parámetros dados
 * y no tienen un `canceled_code`. No se aplica paginación en esta versión.
 */
function banks_transactions_get_total_by_document_document_id($document, $document_id) {
    global $db;
    $data = null;

    try {
        // Consulta SQL para obtener el total de las transacciones que coinciden con el documento y ID, sin cancelaciones.
        $sql = "SELECT SUM(`total`) 
                FROM `banks_transactions` 
                WHERE (`document` = :document AND `document_id` = :document_id) 
                  AND `canceled_code` IS NULL";

        // Preparar la consulta
        $query = $db->prepare($sql);

        // Vincular los parámetros de la consulta
        $query->bindValue(':document', $document, PDO::PARAM_STR);
        $query->bindValue(':document_id', (int) $document_id, PDO::PARAM_INT);

        // Ejecutar la consulta
        $query->execute();

        // Obtener el resultado
        $data = $query->fetch();

        // Retornar el total acumulado, o NULL si no hay resultados
        return $data[0] ?? 0;
        
    } catch (PDOException $e) {
        // Manejar el error de base de datos
        // 0: Enviar al sistema de log del servidor web (por defecto).
        // 1: Enviar por correo electrónico (se requiere configuración de sendmail o similar).
        // 2: Enviar al sistema de log del sistema de errores de PHP.
        // 3: Enviar a un archivo de log personalizado, especificado en el tercer parámetro.
        error_log("Error en la consulta de transacciones: " . $e->getMessage(), 3, '/path/to/error.log');

        // Opcional: Puedes lanzar una excepción personalizada o manejar el error de otra manera
        throw new Exception("Error al obtener el total de transacciones. Intenta nuevamente más tarde.");
        
    } catch (Exception $e) {

        // Manejar otros errores generales
        error_log("Error inesperado: " . $e->getMessage(), 3, '/path/to/error.log');

        // Opcional: Puedes lanzar una excepción personalizada o manejar el error de otra manera
        throw new Exception("Error inesperado. Intenta nuevamente más tarde.");
    }
}

/**
 * Cancela una transacción bancaria duplicando la transacción original con un valor negativo.
 * 
 * @param int $id El ID de la transacción a cancelar.
 * @param int $canceled_code El código de cancelación a aplicar a la transacción cancelada.
 * 
 * Esta función selecciona los datos de la transacción original con el ID proporcionado,
 * inserta una nueva fila en la tabla `banks_transactions` con los mismos datos pero con 
 * un valor contratio ( negativo o positivo segun el caso ) en la columna `total`, y añade un código de cancelación específico.
 */
function banks_transactions_cancel($id, $canceled_code) {
    global $db;

    try {
        // Preparar la consulta para duplicar la transacción con valores negativos y agregar el código de cancelación.
        $req = $db->prepare("
                INSERT INTO `banks_transactions` (`client_id`, `document`, `document_id`, `type`,  `account_number`, `total`,   `operation_number`,  `date`, `ref`, `description`, `ce`, `details`, `message`, `currency`, `code`, `canceled_code`, `order_by`, `status`) 
                                           SELECT `client_id`, `document`, `document_id`, -`type`, `account_number`, -`total`,    `operation_number`,  `date`, `ref`, `description`, `ce`, `details`, `message`, `currency`, :code, :canceled_code,  `order_by`,  `status` 
                                           FROM `banks_transactions` WHERE `id` = :id");

        // Ejecutar la consulta con los parámetros proporcionados.
        $req->execute(array(
            "id" => $id,
            "code" => magia_uniqid(),
            "canceled_code" => $canceled_code
        ));
    } catch (Exception $e) {

        throw new Exception($e);
    }
}

function banks_transactions_next_canceled_code() {
    global $db;

    try {
        // Prepara la consulta para obtener el valor máximo de `canceled_code`
        $req = $db->prepare("SELECT MAX(`canceled_code`) FROM `banks_transactions`");

        // Ejecuta la consulta
        $req->execute();

        // Recupera el resultado
        $data = $req->fetch();

        // Retorna el siguiente código de cancelación, si no existe, retorna 1
        return $data[0] + 1 ?? 1;
    } catch (Exception $e) {

        throw new Exception($e);

        // Maneja cualquier excepción que ocurra
        //error_log("Error obteniendo el próximo código de cancelación: " . $e->getMessage());
        // return null; // O un valor que consideres adecuado en caso de error
    }
}
