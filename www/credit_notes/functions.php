<?php

// 
function credit_notes_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT $field 
            FROM credit_notes
           
    WHERE id = ?
            ");
    $req->execute(array($id));
    $data = $req->fetch();
//return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_notes_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
//return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_notes_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
//return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_notes_listxxxxxx() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM credit_notes ORDER BY id DESC   ");

    $req->execute(array());
    $data = $req->fetchall();
    return $data;
}

function credit_notes_list($start = 0, $limit = 999999, $order_col = 'id', $order_way = 'desc') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $sql = "
            SELECT *
            
            FROM `credit_notes` 
            
            ORDER BY $order_col $order_way  
        
            Limit $limit OFFSET $start  ";

    $query = $db->prepare($sql);

    $query->execute();

    $data = $query->fetchall();

    return $data;
}

function credit_notes_details($id) {
    global $db;

    $req = $db->prepare("
        SELECT 
            *, 
            YEAR(date) AS year  -- Extraer el año como un campo adicional
        FROM credit_notes 
        WHERE id = ?
    ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function credit_notes_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM credit_notes WHERE id=? ");
    $req->execute(array($id));
}

function credit_notes_edit($id, $client_id, $invoice_id, $addresses_billing, $addresses_delivery, $date_registre, $total, $tax, $returned, $comments, $code, $status) {

    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET "
            . "client_id=:client_id , "
            . "invoice_id=:invoice_id , "
            . "addresses_billing=:addresses_billing , "
            . "addresses_delivery=:addresses_delivery , "
            . "date_registre=:date_registre , "
            . "total=:total , "
            . "tax=:tax , "
            . "returned=:returned , "
            . "comments=:comments , "
            . "code=:code , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "client_id" => $client_id,
        "invoice_id" => $invoice_id,
        "addresses_billing" => $addresses_billing,
        "addresses_delivery" => $addresses_delivery,
        "date_registre" => date("Y-m-d h:m:s"),
        "total" => $total,
        "tax" => $tax,
        "returned" => $returned,
        "comments" => $comments,
        "code" => $code,
        "status" => $status,
    ));
}

function credit_notes_add($client_id, $invoice_id, $addresses_billing, $addresses_delivery, $date_registre, $total, $tax, $returned, $comments, $code, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_notes` ( `id` ,   `client_id` ,   `invoice_id` ,   `addresses_billing` ,   `addresses_delivery` ,  `date`, `date_registre` ,   `total` ,   `tax` ,   `returned` ,   `comments` ,   `code` ,   `status`   )
                                              VALUES  (:id ,     :client_id ,    :invoice_id ,   :addresses_billing ,     :addresses_delivery ,   :date,  :date_registre ,    :total ,     :tax ,  :returned ,     :comments ,    :code ,    :status   ) ");

    $req->execute(array(
        "id" => null,
        "client_id" => $client_id,
        "invoice_id" => $invoice_id,
        "addresses_billing" => $addresses_billing,
        "addresses_delivery" => $addresses_delivery,
        "date" => date("Y-m-d"),
        "date_registre" => date("Y-m-d h:m:s"),
        "total" => $total,
        "tax" => $tax,
        "returned" => $returned,
        "comments" => $comments,
        "code" => $code,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function credit_notes_add_with_credit_note_number($id, $client_id, $invoice_id, $addresses_billing, $addresses_delivery, $date_registre, $total, $tax, $returned, $comments, $code, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_notes` 
                        (`id`,  `client_id`,  `invoice_id`,  `addresses_billing`,  `addresses_delivery`, `date`, `date_registre`,  `total`,  `tax`,  `returned`,  `comments`,  `code`,  `status`   )
                VALUES  (:id ,  :client_id ,  :invoice_id ,  :addresses_billing ,  :addresses_delivery , :date,  :date_registre ,  :total ,  :tax ,  :returned ,  :comments ,  :code ,  :status   ) ");

    $req->execute(array(
        "id" => $id,
        "client_id" => $client_id,
        "invoice_id" => $invoice_id,
        "addresses_billing" => $addresses_billing,
        "addresses_delivery" => $addresses_delivery,
        "date" => date("Y-m-d"),
        "date_registre" => date("Y-m-d H:m:s"),
        "total" => $total,
        "tax" => $tax,
        "returned" => $returned,
        "comments" => $comments,
        "code" => $code,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

/**
 * Inserta una nueva nota de crédito en la base de datos con el número de la nota de crédito especificado.
 *
 * Esta función toma varios parámetros relacionados con la información de la nota de crédito, 
 * la prepara e inserta en la tabla `credit_notes` de la base de datos. 
 * Retorna el ID de la última nota de crédito insertada.
 *
 * @param int $id Identificador único de la nota de crédito.
 * @param int $office_id ID del propietario de la nota de crédito.
 * @param int $client_id ID del cliente asociado a la nota de crédito.
 * @param int $invoice_id ID de la factura asociada a la nota de crédito.
 * @param string $addresses_billing Dirección de facturación del cliente.
 * @param string $addresses_delivery Dirección de entrega del cliente.
 * @param string $date_registre Fecha de registro de la nota de crédito.
 * @param float $total Monto total de la nota de crédito.
 * @param float $tax Monto del impuesto de la nota de crédito.
 * @param float $returned Monto devuelto.
 * @param string $comments Comentarios adicionales sobre la nota de crédito.
 * @param string $code Código de la nota de crédito.
 * @param string $status Estado de la nota de crédito (por ejemplo, "pendiente", "completada", etc.).
 *
 * @global object $db Conexión a la base de datos.
 *
 * @return int El ID de la última nota de crédito insertada.
 */
function credit_notes_add_with_credit_note_number_multi(
        $office_id, $client_id, $invoice_id, $addresses_billing, $addresses_delivery,
        $date, $total, $tax, $returned, $comments, $code, $status
) {


    global $db;

    $req = $db->prepare("INSERT INTO `credit_notes` 
                               (`id`, `office_id`, `client_id`, `invoice_id`, `addresses_billing`, `addresses_delivery`, `date`, `date_registre`, `total`, `tax`, `returned`, `comments`, `code`, `status`)
                        VALUES (:id,  :office_id,  :client_id,  :invoice_id,  :addresses_billing,  :addresses_delivery, :date,  :date_registre,  :total,  :tax,  :returned, :comments,  :code,  :status)");

    $req->execute(array(
        "id" => null,
        "office_id" => $office_id,
        "client_id" => $client_id,
        "invoice_id" => $invoice_id,
        "addresses_billing" => $addresses_billing,
        "addresses_delivery" => $addresses_delivery,
        "date" => $date,
        "date_registre" => date("Y-m-d H:i:s"), // Corrección de formato de fecha
        "total" => $total,
        "tax" => $tax,
        "returned" => $returned,
        "comments" => $comments,
        "code" => $code,
        "status" => $status
    ));

    return $db->lastInsertId();
}

function credit_notes_search($txt, $start = 0, $limit = 999999, $order_col = 'id', $order_way = 'desc') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $data = null;

    $req = $db->prepare("SELECT * FROM credit_notes 
    
        WHERE id like :txt 
        OR id like :txt
        OR office_id like :txt
        OR client_id like :txt
        OR invoice_id like :txt
        OR addresses_billing like :txt
        OR addresses_delivery like :txt
        OR date like :txt
        OR date_registre like :txt
        OR total like :txt
        OR tax like :txt
        OR returned like :txt
        OR comments like :txt
        OR code like :txt
        OR status like :txt
        ORDER BY $order_col $order_way  
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (credit_notes_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function credit_notes_is_id($id) {
    return true;
}

function credit_notes_is_client_id($client_id) {
    return true;
}

function credit_notes_is_invoice_id($invoice_id) {
    return true;
}

function credit_notes_is_addresses_billing($addresses_billing) {
    return true;
}

function credit_notes_is_addresses_delivery($addresses_delivery) {
    return true;
}

function credit_notes_is_date_registre($date_registre) {
    return true;
}

function credit_notes_is_total($total) {
    return true;
}

function credit_notes_is_tax($tax) {
    return true;
}

function credit_notes_is_returned($returned) {
    return true;
}

function credit_notes_is_comments($comments) {
    return true;
}

function credit_notes_is_code($code) {
    return true;
}

function credit_notes_is_status($status) {
    return true;
}

function credit_notes_can_be_edit($credit_notes_id) {
// determina si puede ser editada   
    if (!$credit_notes_id) {
        return false;
    }

// si la suma de los pagos es diferente de cero
    if ((int) balance_total_total_by_credit_note($credit_notes_id)) {
        return false;
    }


    if (credit_notes_field_id('invoice_id', $credit_notes_id)) {
        return false;
    }

// si proviene de una factura 

    $status = credit_notes_field_id("status", $credit_notes_id);

    switch ($status) {
        case 10:
            $can = true;
            break;

        case 20:
            $can = false;
            break;

        case -10:
            $can = false;
            break;

        default:
            $can = false;
            break;
    }

    return $can;
}

/**
 * 
 * @param type $credit_notes_id
 * @return string
 */
function credit_notes_why_cannot_be_edit($credit_notes_id) {

    $error = array("demo");

// determina si puede ser editada   
    if (!$credit_notes_id) {
        array_push($error, "Credit note id dont send");
    }

// si la suma de los pagos es diferente de cero
    if ((int) balance_total_total_by_credit_note($credit_notes_id)) {
        array_push($error, "If there are payments made, you cannot change the holder of the credit note");
    }

    if (credit_notes_field_id('invoice_id', $credit_notes_id)) {
        array_push($error, "Credit note that comes from an invoice cannot change the customer");
    }

    if (credit_notes_field_id("status", $credit_notes_id) != 10) {
        array_push($error, "Only credit notes with registered status can change the recipient");
    }

    return $error;
}

function credit_notes_add_by_client_id($client_id, $code, $status, $budget_id = null) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_notes` ( `client_id`,  `date`, `code`, `status`   )
                                             VALUES  (:client_id ,   :date,  :code,  :status  ) ");
    $req->execute(array(
        "client_id" => $client_id,
        "date" => date("Y-m-d"),
        "code" => $code,
        "status" => $status
            )
    );
    return $db->lastInsertId();
}

function credit_notes_add_individual_by_client_id($client_id, $ab, $ad, $code, $status, $budget_id) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_notes` ( `client_id`, `budget_id`, `addresses_billing`, `addresses_delivery`, `date`, `code`, `type`, `status`   )
                                          VALUES    (  :client_id , :budget_id,  :addresses_billing,  :addresses_delivery,  :date,  :code,  :type,  :status  ) ");
    $req->execute(array(
        "client_id" => $client_id,
        "budget_id" => $budget_id,
        "addresses_billing" => $ab,
        "addresses_delivery" => $ad,
        "date" => date("Y-m-d"),
        "code" => $code,
        "type" => "I",
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function credit_notes_search_by_id($id) {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $req = $db->prepare("SELECT * FROM credit_notes WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_search_by_office_id($office_id, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

// Crear la consulta con LIMIT y OFFSET concatenados
    $query = "
        SELECT * 
        FROM `credit_notes` 
        WHERE `office_id` = :office_id      
        ORDER BY $col_name $order_way
        LIMIT $limit OFFSET $start
    ";

// Preparar la consulta
    $req = $db->prepare($query);

// Enlazar los valores
    $req->bindValue(':office_id', (int) $office_id, PDO::PARAM_INT);

// Ejecutar la consulta
    $req->execute();

// Obtener todos los resultados
    $data = $req->fetchAll();

    return $data;
}

function credit_notes_search_by_from_to_office_id($from, $to, $office_id, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

    // Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    // Validar que col_name y order_way sean seguros
    $allowed_columns = ['id', 'date', 'total', 'status']; // Agrega las columnas permitidas
    $allowed_order_ways = ['ASC', 'DESC'];

    if (!in_array($col_name, $allowed_columns)) {
        $col_name = 'id'; // Valor por defecto
    }

    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = 'DESC'; // Valor por defecto
    }

    // Crear la consulta con LIMIT y OFFSET
    $query = "
        SELECT * 
        FROM `credit_notes` 
        WHERE `date` BETWEEN :from AND :to AND `office_id` = :office_id      
        ORDER BY $col_name $order_way
        LIMIT :limit OFFSET :start
    ";

    // Preparar la consulta
    $req = $db->prepare($query);

    // Enlazar los valores
    $req->bindValue(':from', $from, PDO::PARAM_STR);
    $req->bindValue(':to', $to, PDO::PARAM_STR);
    $req->bindValue(':office_id', (int) $office_id, PDO::PARAM_INT);
    $req->bindValue(':limit', $limit, PDO::PARAM_INT);
    $req->bindValue(':start', $start, PDO::PARAM_INT);

    // Ejecutar la consulta
    $req->execute();

    // Obtener todos los resultados
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}


function credit_notes_search_by_client_id($client_id, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $req = $db->prepare("SELECT * FROM credit_notes WHERE client_id= ? ORDER BY $order_col $order_way  ");
    $req->execute(array($client_id));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_search_registre_by_cliente_id_type($client_id, $type, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $req = $db->prepare("SELECT id FROM credit_notes WHERE type= :type AND ( client_id = :client_id AND :status = :status ) ORDER BY $order_col $order_way  ");
    $req->execute(array(
        "client_id" => $client_id,
        "type" => $type,
        "status" => 10
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function credit_notes_search_by_year_month_status($year, $month, $status_array, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $status_str = implode(",", $status_array);

    $query = $db->prepare(
            "   SELECT * 
            FROM credit_notes 
            WHERE 
            (YEAR(date) =:year AND MONTH(date)=:month)  
            AND status IN ($status_str)
            ORDER BY $order_col $order_way 
            Limit  $limit OFFSET $start
                         
        ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function credit_notes_search_by_year_trimestre_status($year, $tri, $status_array, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    switch ($tri) {
        case 't1': // enero, feb, marzo
            $m1 = 1;
            $m2 = 2;
            $m3 = 3;
            break;
        case 't2': // abril, mayo, junio
            $m1 = 4;
            $m2 = 5;
            $m3 = 6;
            break;
        case 't3': // julio, agos, sept
            $m1 = 7;
            $m2 = 8;
            $m3 = 9;
            break;
        case 't4': // oct, nov , dic
            $m1 = 10;
            $m2 = 11;
            $m3 = 12;
            break;

        default:
            break;
    }

    $status_str = implode(",", $status_array);

    $req = $db->prepare(
            "   SELECT * 
            FROM credit_notes 
            WHERE YEAR(date) =:year AND 
            (
            MONTH(date)=:m1 OR 
            MONTH(date)=:m2 OR 
            MONTH(date)=:m3 
            )
            AND status IN ($status_str)
            
            ORDER BY $order_col $order_way 
            
            Limit  $limit OFFSET $start
                         
        ");
    $req->execute(array(
        "year" => $year,
        "m1" => $m1,
        "m2" => $m2,
        "m3" => $m3,
//        "status_str" => $status_str,
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function credit_notes_search_by_client_id_type_status($client_id, $type, $status, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $req = $db->prepare("SELECT * FROM credit_notes WHERE type= :type AND ( client_id = :client_id AND status = :status ) ORDER BY $order_col $order_way  ");
    $req->execute(array(
        "client_id" => $client_id,
        "type" => $type,
        "status" => $status
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function credit_notes_search_by_client_status($client_id, $status, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $req = $db->prepare("SELECT * FROM credit_notes WHERE ( `client_id` = :client_id AND status = :status ) ORDER BY $order_col $order_way ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function credit_notes_search_by_client_credit_note_id($client_id, $credit_note_id, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $req = $db->prepare(" SELECT * FROM credit_notes WHERE ( client_id = :client_id AND id = :id )  ORDER BY $order_col $order_way  ");
    $req->execute(array(
        "client_id" => $client_id,
        "id" => $credit_note_id
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function credit_notes_total_by_client_id_multi_code_year($client_id, $code_array, $year, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

// Forzar que los valores de limit y start sean enteros
    $start = (int) $start;
    $limit = (int) $limit;

    $query = $db->prepare(
            "
            SELECT SUM(total) + sum(tax) as total 
            
            FROM credit_notes 
            
            WHERE client_id = :client_id AND ( status IN (" . implode(',', $code_array) . ") 

            AND
            
            YEAR(date) =:year ) 
            
            ORDER BY $order_col $order_way 
            
            LIMIT :start, :limit ");

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
//    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

function credit_notes_total_by_client_id_multi_code_year_field($client_id, $code_array, $year, $field, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;
    $query = $db->prepare(
            "
            SELECT SUM(:field) as total 
            
            FROM credit_notes 
            
            WHERE client_id = :client_id 
            
            AND ( 
                status IN (" . implode(',', $code_array) . ") 
                    AND YEAR(date) =:year 
                ) 
            
            ORDER BY $order_col $order_way 
            
            LIMIT :start, :limit ");

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
//    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

function credit_notes_comments_update($credit_note_id, $comments) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET comments=:comments WHERE id=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "comments" => $comments
            )
    );
}

function credit_notes_update_ce($credit_note_id, $ce) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET ce=:ce WHERE id=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "ce" => $ce
            )
    );
//return $db->lastInsertId();
}

/**
 * Recalcula la suma de los items de una factura y los registra en la factura 
 * @global type $db
 * @param type $credit_note_id
 * @param type $ce
 */
function credit_notes_update_total_credit_notexxxxxxxxxxxxxx($credit_note_id) {
    /**
     * valtax = (tax/100+1)
     * 
     * if( discounts_mode = '%') 
     *      total_discount = precio - ((precio * discounts)/100)
     * 
     * if( discounts_mode != '%')
     *      total_discount = precio - discounts
     * 
     * 
     * if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts) as total_discount 
     * 
     * 
     * (quantity * (price - if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts))) * (tax/100+1)
     */
//if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts))) * (tax/100+1)) 

    global $db;
    $req = $db->prepare("
            UPDATE credit_notes 
            SET 
            
            total = (SELECT SUM(quantity * price) FROM credit_note_lines WHERE credit_note_id=:id ), 
            
            tax   = (SELECT SUM(quantity * price) FROM credit_note_lines WHERE credit_note_id=:id )
        
            WHERE id=:id  ");

    $req->execute(array(
        "id" => $credit_note_id,
            )
    );
//return $db->lastInsertId();
}

function credit_notes_update_type($credit_note_id, $type) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET type=:type WHERE id=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "type" => $type
            )
    );
//return $db->lastInsertId();
}

function credit_notes_update_total_tax($id, $total, $tax) {
    global $db;
    $req = $db->prepare(" UPDATE `credit_notes` SET `total` = :total, `tax` = :tax WHERE `id` = :id  ");
    $req->execute(array(
        "total" => $total,
        "tax" => $tax,
        "id" => $id
            )
    );
}

function credit_note_lines_totalHTVA($credit_note_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT SUM( quantity * value  ) as total  FROM credit_note_lines WHERE credit_note_id=:credit_note_id ");

    $req->execute(array(
        "credit_note_id" => $credit_note_id
    ));

    $data = $req->fetch();
    return ($data[0]) ?: 0;
}

function credit_note_lines_totalTVA($credit_note_id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT SUM(( quantity * value  * tax )/100) as total  FROM credit_note_lines WHERE credit_note_id=:credit_note_id ");
    $req->execute(array(
        "credit_note_id" => $credit_note_id
    ));
    $data = $req->fetch();
    return ($data[0]) ?: 0;
}

function credit_notes_update_total_advance($id, $advance) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET advance=:advance WHERE id=:id  ");
    $req->execute(array(
        "advance" => $advance,
        "id" => $id
            )
    );
//return $db->lastInsertId();
}

function credit_notes_modal_reminder_send($r, $credit_note_id) {
    include view("credit_notes", "modal_reminder_send");
}

function credit_notes_search_by_budget_id($budget_id, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE budget_id= ? ORDER BY $order_col $order_way  ");
    $req->execute(array($budget_id));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_total_credit_noted_budget_id($budget_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(total + tax) as total FROM credit_notes WHERE budget_id= ? ");
    $req->execute(array($budget_id));
    $data = $req->fetchall();
    return doubleval($data[0][0]);
}

function credit_notes_update_billing_address($credit_note_id, $new_address_json) {
    global $db;
    $req = $db->prepare(" UPDATE `credit_notes` SET `addresses_billing` =:addresses_billing WHERE `id`=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "addresses_billing" => $new_address_json
            )
    );
}

function credit_notes_update_delivery_address($credit_note_id, $new_address_json) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET addresses_delivery =:addresses_delivery WHERE id=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "addresses_delivery" => $new_address_json
            )
    );
//return $db->lastInsertId();
}

function credit_note_status_list_e() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM credit_note_status ORDER BY order_by   ");

    $req->execute(array());
    $data = $req->fetchall();
    return $data;
}

function credit_notes_numberf($id) {

    if (!$id) {
        return false;
    }
// saco la fecha segun el $id de la factura
    $date = credit_notes_field_id('date', $id);
//
    $year = magia_dates_get_year_from_date($date);
//
//    $counter = credit_notes_counter_by_credit_note_year($id, $year);
    //$counter = credit_notes_counter_by_credit_note_year($id, $year);
//
    if (_options_option("config_credit_notes_print_counter")) {
// imprime el contador
        return "$year-$counter";
    } else {
// sino el id
        return "$year-$id";
    }
}

function credit_notes_numberf_to_ptint($id, $format = 1) {

    if (!$id) {
        return false;
    }
// saco la fecha segun el $id de la factura
    $date = credit_notes_field_id('date', $id);
//
    $year = magia_dates_get_year_from_date($date);
//
    $counter = credit_notes_counter_by_credit_note_year($id, $year);
//
    if (_options_option("config_credit_notes_print_counter")) {
// $number_to_print = "$year" . "$counter";
        $number_to_print = $counter;
    } else {
//        $number_to_print = "$year-$id";
        $number_to_print = "$id";
    }



    $length = 4;
    $number_to_print_formated = $string = substr(str_repeat(0, $length) . $number_to_print, - $length);

    switch ($format) {
        case 1: // ano-[contador | id] // segun config
            $number_to_print = "$year-$number_to_print";
            break;

        case 2:
            $number_to_print = "$year-$number_to_print_formated";
            break;

        case 3:
            $number_to_print = "$year" . "$number_to_print";
            break;

        case 4:
            $number_to_print = "$year" . "$number_to_print_formated";
            break;

        default:
            $number_to_print = "$year-$number_to_print";
            break;
    }

    return $number_to_print;
}

function credit_notes_search_advanced($client_id, $status, $year, $month, $monthly, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;
/////////////
// no facturados unicamente
//    
    if ($monthly) {
        $req = $db->prepare(" SELECT * FROM credit_notes WHERE client_id =:client_id AND status = :status  AND (date BETWEEN :start AND :end) AND type = :type ORDER BY $order_col $order_way  ");
        $req->execute(array(
            'client_id' => $client_id,
            'status' => $status,
            'start' => "$year-$month-01 00:00:00",
            'end' => "$year-$month-31 23:59:59",
            'type' => 'M'
        ));
    } else {
        $req = $db->prepare("SELECT * FROM credit_notes WHERE client_id =:client_id AND status = :status  AND (date BETWEEN :start AND :end) ORDER BY $order_col $order_way ");
        $req->execute(array(
            'client_id' => $client_id,
            'status' => $status,
            'start' => "$year-$month-01 00:00:00",
            'end' => "$year-$month-31 23:59:59"
        ));
    }
//////////////    
    $data = $req->fetchall();
    return $data;
}

function credit_note_remove_items_by_budget_id($budget_id) {
    global $db;

    $req = $db->prepare(" DELETE  FROM `credit_note_lines` WHERE `budget_id` = :budget_id ");

    $req->execute(array(
        "budget_id" => $budget_id
    ));
}

// PDF FILES
function credit_notes_pdf_formated_id($id) {

    $y = date('Y', strtotime(credit_notes_field_id("date", $id)));
// extraigo el año de la factura 
// la agrego antes del numero 
    return $y . "" . $id;
}

function credit_note_lines_add_with_budget_id(
        $credit_note_id, $budget_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_note_lines` ( `id` ,   `credit_note_id` , `budget_id`,  `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :credit_note_id , :budget_id, :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "credit_note_id" => $credit_note_id,
        "budget_id" => $budget_id,
        "code" => $code,
        "quantity" => $quantity,
        "description" => $description,
        "price" => $price,
        "discounts" => $discounts,
        "discounts_mode" => $discounts_mode,
        "tax" => $tax,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function credit_notes_add_r1($credit_note_id) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET r1=:r1 WHERE id=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "r1" => date("Y-m-d"),
            )
    );
}

function credit_notes_add_r2($credit_note_id) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET r2=:r2 WHERE id=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "r2" => date("Y-m-d"),
            )
    );
}

function credit_notes_add_r3($credit_note_id) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET r3=:r3 WHERE id=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "r3" => date("Y-m-d"),
            )
    );
}

function credit_notes_total_by_status($status) {
    global $db;
    $req = $db->prepare(" SELECT COUNT(*)  FROM credit_notes  WHERE status=?  ");
    $req->execute(array($status));
    $data = $req->fetch();
    return $data[0];
}

function credit_notes_search_by_code($code) {
    global $db;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE code= ? ");
    $req->execute(array($code));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_search_by_status($status) {
    global $db;
    $req = $db->prepare("SELECT * FROM credit_notes WHERE status= ? ORDER BY id DESC ");
    $req->execute(array($status));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_change_status_to($id, $status) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET status=:status WHERE id=:id  ");
    $req->execute(array(
        "status" => $status,
        "id" => $id
            )
    );
//return $db->lastInsertId();
}

function credit_notes_change_date($id, $date) {
    global $db;
    $req = $db->prepare(
            "UPDATE `credit_notes` 
            SET `date` =:date 
            WHERE `id` =:id          
        ");
    $req->execute(array(
        "date" => $date,
        "id" => $id
            )
    );
}

function credit_notes_update_returned($id, $returned) {
    global $db;
    $req = $db->prepare(" UPDATE credit_notes SET returned=:returned WHERE id=:id  ");
    $req->execute(array(
        "returned" => $returned,
        "id" => $id
            )
    );
    return $db->lastInsertId();
}

function credit_notes_update($id, $total, $description) {

    global $db;
    $req = $db->prepare(" UPDATE credit_note_lines SET value=:value, description=:description  WHERE credit_note_id=:id ");
    $req->execute(array(
        "id" => $id,
        "value" => $total,
        "description" => $description
    ));
}

function credit_notes_update_total($id) {
    global $db;
    $req = $db->prepare("UPDATE credit_notes SET total= (SELECT SUM(value) FROM credit_note_lines WHERE credit_note_id=:id ), tax =(SELECT SUM(tax) FROM credit_note_lines WHERE credit_note_id=:id ) WHERE id=:id  ");
    $req->execute(array(
        "id" => $id,
            )
    );
}

function credit_notes_update_office_id($credit_note_id, $new_office_id) {
    global $db;
    $req = $db->prepare(" UPDATE `credit_notes` SET `office_id` =:office_id WHERE `id`=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "office_id" => $new_office_id
            )
    );
}

function credit_notes_update_client_id($credit_note_id, $new_client_id) {
    global $db;
    $req = $db->prepare(" UPDATE `credit_notes` SET `client_id` =:client_id WHERE `id`=:id  ");
    $req->execute(array(
        "id" => $credit_note_id,
        "client_id" => $new_client_id
            )
    );
}

function credit_notes_next_number() {
    global $db;
    $req = $db->prepare("SELECT max(id) FROM credit_notes ORDER BY id DESC LIMIT 1 ");
    $req->execute(array());
    $data = $req->fetch();
    return $data[0] + 1;
}

function credit_notes_total_by_client($client_id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM credit_notes WHERE client_id= :client_id');
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function credit_notes_total_by_client_id_status($client_id, $status) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM credit_notes WHERE client_id= :client_id AND status = :status');
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status
    ));
    $data = $req->fetch();
    return $data[0];
}

function credit_notes_search_full_year($year, $txt, $office_id = null, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

    $multi_vat = (IS_MULTI_VAT) ? " AND `office_id` = :office_id " : '';

    $data = null;

    $req = $db->prepare(
            "
SELECT
*              
FROM credit_notes 
WHERE 
( 
id                    like :txt 
OR office_id          like :txt
OR office_id_counter_year_month             like :txt
OR office_id_counter_year_trimestre         like :txt
OR office_id_counter                        like :txt
OR client_id          like :txt
OR invoice_id         like :txt
OR addresses_billing  like :txt      
OR addresses_delivery like :txt       
OR date               like :txt  
OR date_registre      like :txt  
OR total              like :txt    
OR tax                like :txt
OR returned           like :txt
OR comments           like :txt   
OR code               like :txt
OR status             like :txt
) 
AND year=:year $multi_vat
ORDER BY $col_name $order_way
                       
");
    $req->execute(array(
        "year" => $year,
        "txt" => "%$txt%",
        "office_id" => $office_id,
    ));
    $data = $req->fetchall();

    return $data;
}

function credit_notes_list_update_counter($limit = 50, $start = 0) {
    global $db;
    $sql = "SELECT * FROM `credit_notes` ORDER BY id ASC   ";
    $query = $db->prepare($sql);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function credit_notes_total_by_multi_code_year($code_array, $year, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;
    $query = $db->prepare(
            "
            SELECT id, SUM(total) as total, SUM(tax) as tax    
            FROM credit_notes 
            WHERE status IN (" . implode(',', $code_array) . ") 
            AND
            (YEAR(date) =:year) 
            
            ORDER BY $col_name $order_way LIMIT :start, :limit ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
//    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
//    $query->bindValue(':day', (int) $day, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function credit_notes_get_year_1_credit_note() {
    return 2021;
}

function credit_notes_max_id() {
    global $db;
    $req = $db->prepare("SELECT max(id) FROM credit_notes ORDER BY id DESC LIMIT 1 ");
    $req->execute(array());
    $data = $req->fetch();
    return $data[0];
}

function credit_notes_search_full($txt, $office_id = null, $start = 0, $limit = 999999, $col_name = 'id', $order_way = 'DESC') {
    global $db;

    $data = null;
    $multi_vat = ' ';

// Construimos la cláusula condicional para IS_MULTI_VAT
    if (IS_MULTI_VAT) {
        if ($office_id && $office_id != 'all') {
            $multi_vat = " AND `cn`.office_id = :office_id ";
        }
    }

    $req = $db->prepare("SELECT 
        `cn`.`id`,  
        `cn`.office_id,          
        `cn`.office_id_counter_year_month,          
        `cn`.office_id_counter_year_trimestre,          
        `cn`.office_id_counter,          
        `cn`.client_id,          
        `cn`.invoice_id,  
        `cn`.addresses_billing,  
        `cn`.addresses_delivery,  
        `cn`.date,  
        `cn`.date_registre,  
        `cn`.total,  
        `cn`.tax,  
        `cn`.returned,  
        `cn`.comments,  
        `cn`.returned,  
        `cn`.code,  
        `cn`.status,  
        
        
`c`.`name`, `c`.`lastname`, `c`.`tva`
        
FROM `credit_notes` as cn

INNER JOIN `contacts` as c ON `cn`.client_id = c.id
    
WHERE (
   `c`.`id` = :txt
OR `c`.`name` like :txt 
OR `c`.`lastname` like :txt 
OR `c`.`tva` like :txt 


OR `cn`.id like :txt
OR `cn`.office_id like :txt
OR `cn`.office_id_counter_year_month like :txt
OR `cn`.office_id_counter_year_trimestre like :txt
OR `cn`.office_id_counter like :txt
OR `cn`.client_id like :txt
OR `cn`.invoice_id like :txt
OR `cn`.addresses_billing like :txt
OR `cn`.addresses_delivery like :txt
OR `cn`.date like :txt
OR `cn`.date_registre like :txt
OR `cn`.total like :txt
OR `cn`.tax like :txt
OR `cn`.returned like :txt
OR `cn`.comments like :txt
OR `cn`.code like :txt
OR `cn`.status like :txt )

$multi_vat


ORDER BY $col_name $order_way
    
LIMIT $start, $limit
    

");
    $req->execute(array(
        "txt" => "%$txt%",
        "office_id" => $office_id,
    ));
    $data = $req->fetchall();
    return $data;
}

//////////////////////////////////////////////////////////////////////////////////////////
/**
 * Construye una consulta SQL dinámica para seleccionar columnas específicas de una tabla.
 *
 * @param string $tableName El nombre de la tabla de la base de datos.
 * @param array $columns Array de nombres de columnas seleccionadas.
 * @return string La consulta SQL generada.
 */
function buildDynamicSelectQuery($tableName, $columns) {
// Verificar que los nombres de tabla y columnas sean seguros
    $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $tableName); // Sanitizar el nombre de la tabla
// Si no hay columnas seleccionadas, seleccionar todas (*)
    if (empty($columns)) {
        $columnList = '*';
    } else {
// Sanitizar cada columna para evitar inyecciones SQL
        $columns = array_map(function ($column) {
            return preg_replace('/[^a-zA-Z0-9_]/', '', $column);
        }, $columns);

        $columnList = implode(", ", $columns); // Convertir el array a una cadena separada por comas
    }

// Construir la consulta SQL dinámica
    $sql = "SELECT $columnList FROM $tableName";

    return $sql;
}

//// Ejemplo de uso
//$selectedColumns = ['id', 'nombre', 'email']; // Columnas seleccionadas por el usuario
//$tableName = 'usuarios'; // Nombre de la tabla
//
//$sql = buildDynamicSelectQuery($tableName, $selectedColumns);
//echo "Consulta SQL generada: " . htmlspecialchars($sql);

/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function credit_notes_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options('credit_notes_show_col_from_table');

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("credit_notes"); // Obtener columnas de la tabla de la base de datos
        //
        // Formatear columnas de la tabla como columnas predeterminadas
        foreach ($columns as $key => $col) {
            $user_cols_array[] = [
                'col_name' => $col['Field'],
                'label' => ucfirst($col['Field']),
                'show' => true,
                'position' => $key
            ];
        }
    }

    // Ordenar las columnas según la posición definida
    usort($user_cols_array, function ($a, $b) {
        return intval($a['position']) - intval($b['position']);
    });

    return $user_cols_array;
}
