<?php

function banks_lines_search_ready_to_reconciliation_for($pos_neg, $start = 0, $limit = 999) {
    global $db;

    if ($pos_neg == '-') {
        $sql = "SELECT * FROM `banks_lines` WHERE `status` <> '100' AND `total` < 0 ORDER BY `total`, `operation` DESC  Limit  :limit OFFSET :start";
    }

    if ($pos_neg == '+') {
        $sql = "SELECT * FROM `banks_lines` WHERE `status` <> '100' AND `total` > 0 OR `total` = 0  ORDER BY `total` DESC, `operation` DESC  Limit  :limit OFFSET :start";
    }




    $query = $db->prepare($sql);
//    $query->bindValue(':pos_neg', $pos_neg, PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_search_inout($inout, $order, $start = 0, $limit = 999999) {
    global $db;

    $order_by = $order['col'];
    $way = $order['way'];

    $data = null;
    if (isset($inout) && $inout == 'in') {
        // valores positivos
        $sql = "SELECT * FROM `banks_lines` WHERE `total` > 0 ORDER BY $order_by $way Limit  :limit OFFSET :start";
    } else {
        // Valors negativos
        $sql = "SELECT * FROM `banks_lines` WHERE `total` < 0 ORDER BY $order_by $way Limit  :limit OFFSET :start";
    }

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// cuenta los sitems segun status
function banks_lines_total_by_status($status, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT count(id) FROM `banks_lines` 
    
    WHERE `status` = :status
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':status', $status, PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

// SEARCH
function banks_lines_search_by_type($t, $order, $start = 0, $limit = 999) {
    global $db;

    $order_by = $order['col'];
    $way = $order['way'];

    if ($t == 'in') {
        $type = '+';
    }
    if ($t == 'out') {
        $type = '-';
    }

    $data = null;
    $sql = "SELECT *   FROM `banks_lines` 
    WHERE `type` = :type 
    
    ORDER BY $order_by $way
    
    Limit  :limit OFFSET :start

";
    $query = $db->prepare($sql);

    $query->bindValue(':type', $type, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_import_check($field, $data, $my_account = null) {

    global $c;

    $bank_id = banks_field_account_number('id', $my_account);
    $bank = new Banks();
    $bank->setBanks($bank_id);
    $date_format = $bank->getDate_format();

// si estoy en banks_lines_check
// si estoy en banks_lines_check
// si estoy en banks_lines_check
    if ($c == 'banks_lines_check') { // estoy en check, el foramto de la fecha es
        $date_format = 'Y-m-d';
    }

    //$db_date_format = banks_lines_validate_and_convert_date($data, $format_date_check);

    $res = array();

    switch ($field) {

        case "my_account":
            $res = banks_lines_import_check_my_account($data, $my_account);
            break;

        case "operation":
            $res = banks_lines_import_check_operation($my_account, $data);

            break;

        case "date_operation":
        case "date_value":
        case "date":
            $res = banks_lines_import_check_date_operation($data, $date_format);
            break;

        case "description":
            $res = banks_lines_import_check_description($data);
            break;

        case "type":
            $res = banks_lines_import_check_type($data);
            break;

        case "total":
        case "debit":
        case "credit":
            $res = banks_lines_import_check_total($field, $data, $my_account);
            break;

        case "currency":
            $res = banks_lines_import_check_currency($data);
            break;

//        case "date_value":
//            $res = banks_lines_import_check_date_value($data, $date_format);
//            break;

        case "account_sender":
            $res = banks_lines_import_check_account_sender($data);
            break;

        case "sender":
            $res = banks_lines_import_check_sender($data);
            break;

        case "comunication":
            $res = banks_lines_import_check_comunication($data);
            break;

        case "ce":
            $res = banks_lines_import_check_ce($data);
            break;

        case "ref":
        case "ref2":
        case "ref3":
        case "ref4":
        case "ref5":
        case "ref6":
        case "ref7":
        case "ref8":
        case "ref9":
        case "ref10":
            $res = banks_lines_import_check_ref($data);
            break;

// esto lo pone el sistema
//        case "date_registre":
//            $res = banks_lines_import_check_date_registre($data, $date_format);
//            break;
//
//        case "order_by":
//            $res = banks_lines_import_check_order_by($data);
//            break;
//
//        case "status":
//            $res = banks_lines_import_check_status($data);
//            break;

        default:
            break;
    }

    return $res;
}

function banks_lines_import_check_id($id) {
    return (is_id($id) ) ? true : false;
}

/**
 * Verifica si el numero de cuenta existe en la DB y si es mio 
 * @param type $my_account
 * @return bool
 */
function banks_lines_import_check_my_account($data, $my_account) {
    global $u_owner_id;

    // debe existir en la DB
    // debe ser propiedad del $u_owner_id

    $res = array();

    if (!banks_field_account_number('id', $data)) {
        array_push($res, "The <b>my_account $data </b> number does not exist in the database");
    }

    if (banks_field_account_number('contact_id', $data) !== $u_owner_id) {
        array_push($res, "The <b>my account $data </b> number does not belong to you");
    }
    if ($data !== $my_account) {
        array_push($res, "This account is not the same as the account you selected");
    }

    return $res;
}

function banks_lines_import_check_operation($my_account, $operation) {

    // debe ser int positivo
    // operation-account_number debe ser unique

    $res = array();

    if (banks_lines_search_by_account_number_and_operation($my_account, $operation)) {
        array_push($res, 'The <b>operation</b> number (' . $operation . ') in (' . $my_account . ') already exists in the given bank account');
    }
    return $res;
}

function banks_lines_import_check_date_operation($date_operation, $date_format) {
    // debe coincidir con el formato configurado para esta cuenta
    $res = array();

    if (!banks_lines_validate_date($date_operation, $date_format)) {
        array_push($res, "The format of the <b>date_operation</b> must match the format you configured for your account");
    }

    return $res;
}

function banks_lines_import_check_description($description) {
    // debe ser un string max 250 caractres

    $res = array();

    if (!is_string($description)) {
        array_push($res, 'The <b>description</b> must be string or null');
    }

    return $res;
}

function banks_lines_import_check_type($type) {
    // debe ser '-' OR  '+'

    $res = array();
    if ($type !== '-' && $type !== '+') {
        array_push($res, 'The <b>type</b> must be the character <b>+</b> or <b>-</b>');
    }
    return $res;
}

function banks_lines_import_check_total($field, $total, $my_account) {
    $res = array();
    if (!is_float((float) $total)) {
        array_push($res, 'The <b>' . $field . ' column </b> must be a float number, empty or null');
    }
    return $res;
}

//
//
//
//
function banks_lines_import_check_currency($currency) {
    // debe ser EUR o USD o NULL
    $res = array();
    if ($currency !== 'EUR' && $currency !== 'USD') {
        array_push($res, 'The <b>currency</b> must be the words <b>EUR</b> or <b>USD</b> exclusively');
    }
    return $res;
}

function banks_lines_import_check_date_value($date_value, $date_format) {
    // fecha
    $res = array();

    if (!banks_lines_validate_date($date_value, $date_format)) {
        array_push($res, "The format of the <b>date_value</b> must match the format you configured for your account");
    }

    return $res;
}

/**
 * Este es la cuenta del banco del que envia el dinero 
 * @param type $account
 * @return array
 */
function banks_lines_import_check_account_sender($account_sender) {
// string or null 

    $res = array();
    if (!is_string($account_sender) || is_null($account_sender)) {
        array_push($res, 'The <b>account_sender</b> must be a string or null');
    }
    return $res;
}

/**
 * Nombre del serder
 * @param type $sender
 * @return bool
 */
function banks_lines_import_check_sender($sender) {
    // string or NULL
    $res = array();
    if (!is_string($sender) || is_null($sender)) {
        array_push($res, 'The <b>sender</b> must be a string or null');
    }
    return $res;
}

function banks_lines_import_check_comunication($comunication) {
    // string or null

    $res = array();
    if (isset($comunication) && (!is_string($comunication) || is_null($comunication))) {
        array_push($res, 'The <b>comunication</b> must be a string or null');
    }
    return $res;
}

function banks_lines_import_check_ce($ce) {
    // string or null
    $res = array();

    if (isset($ce) && !ce_is_valid($ce)) {
        array_push($res, 'The structured communication must be valid or the field must be null');
    }

    return $res;
}

function banks_lines_import_check_ref($ref) {
    // string or null
    $res = array();
    if (!is_string($ref) && is_null($ref) && $ref != '') {
        array_push($res, 'The <b>ref</b> must be a string, null or empty');
    }
    return $res;
}

function banks_lines_import_check_ref2($ref2) {
    // string or null
    $res = array();
    if (!is_string($ref2) || is_null($ref2)) {
        array_push($res, 'The <b>ref2</b> must be a string or null');
    }
    return $res;
}

function banks_lines_import_check_ref3($ref3) {
    // string or null
    $res = array();
    if (!is_string($ref3) || is_null($ref3)) {
        array_push($res, 'The <b>ref3</b> must be a string, string or null');
    }
    return $res;
}

function banks_lines_import_check_date_registre($date_registre, $date_format) {
    // date, null
    $res = array();

    if (!banks_lines_validate_date($date_registre, $date_format)) {
        array_push($res, "The format of the <b>date_registre</b> must match the format you configured for your account");
    }
    return $res;
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

/**
 * Search operation in a account number
 * @global type $db
 * @param type $my_account
 * @param type $operation
 * @param type $start
 * @param type $limit
 * @return type
 */
function banks_lines_search_by_account_number_and_operation($my_account, $operation, $start = 0, $limit = 999) {
    global $db;

    $data = null;

    $sql = "SELECT *     FROM `banks_lines` 
    WHERE `my_account` = :my_account AND  operation = :operation
    
    ORDER BY `my_account`, `operation` DESC
    
    Limit  :limit OFFSET :start

";
    $query = $db->prepare($sql);

    $query->bindValue(':my_account', $my_account, PDO::PARAM_STR);
    $query->bindValue(':operation', $operation, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_search_by_my_account_and_status($my_account, $status_code, $order, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $order_by = $order['col'];
    $way = $order['way'];

    if ($status_code == strtolower('all')) {
        $status = '  ';
    } else {
        $status = " AND  status = $status_code ";
    }
    $sql = "SELECT *     FROM `banks_lines`    
    WHERE `my_account` = :my_account $status    
    ORDER BY $order_by $way    
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':my_account', $my_account, PDO::PARAM_STR);
//    $query->bindValue(':status', $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_search_by_my_account_and_inout($my_account, $inout, $order, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $order_by = $order['col'];
    $way = $order['way'];

    if ($inout == strtolower('all')) {
        $status_inout = '  ';
    }

    if ($inout == 'in') {
        $status_inout = " AND  total > 0";
    }
    if ($inout == 'out') {
        $status_inout = " AND  total < 0  ";
    }

    $sql = "SELECT *     FROM `banks_lines` 
        
    WHERE `my_account` = :my_account $status_inout    
    
    ORDER BY $order_by $way    
    
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':my_account', $my_account, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_add_short($my_account, $date_registre, $code) {
    global $db;
    $req = $db->prepare(" INSERT INTO `banks_lines` (`id`, `my_account`, `date_registre`,   `code`  )
                                            VALUES  (:id ,  :my_account ,  :date_registre ,  :code,   ) ");

    $req->execute(array(
        "id" => null,
        "my_account" => $my_account,
        "date_registre" => $date_registre,
        "code" => $code
            )
    );

    return $db->lastInsertId();
}

function banks_lines_detect_type($data) {
    if (banks_lines_is_ce($data)) {
        return 'ce';
    }

    if (banks_lines_is_type($data)) {
        return 'type';
    }

    if (banks_lines_is_my_account($data)) {
        return 'my_account';
    }

    if (banks_lines_is_currency($data)) {
        return 'currency';
    }

    if (banks_lines_is_total($data)) {
        return 'total';
    }
    if (banks_lines_is_date($data)) {
        return 'date';
    }

    if (banks_lines_is_ref($data)) {
        return 'ref';
    }

    return false;
}

//function banks_lines_detect_type($data) {
//    $type_checks = [
//        'ce' => 'banks_lines_is_ce',
//        'type' => 'banks_lines_is_type',
//        'my_account' => 'banks_lines_is_my_account',
//    ];
//
//    foreach ($type_checks as $type => $check_function) {
//        if (call_user_func($check_function, $data)) {
//            return $type;
//        }
//    }
//
//    return false;
//}
//function banks_lines_update_status_code($id, $new_data) {
//
//    global $db;
//    $req = $db->prepare(" UPDATE `banks_lines` SET `status`=:new_data WHERE id=:id ");
//    $req->execute(array(
//        "id" => $id,
//        "new_data" => $new_data,
//    ));
//}
// SEARCH
function banks_lines_search_by_field($field, $txt, $order, $start = 0, $limit = 999) {
    global $db;

    $order_by = $order['col'];
    $way = $order['way'];

    $data = null;
    $sql = "SELECT `id`,  `my_account`,  `operation`,  `date_operation`,  `description`,  `type`,  `total`,  `currency`,  `date_value`,  `account_sender`,  `sender`,  `comunication`,  `ce`,  `details`,  `message`,  `ref`,  `ref2`,  `ref3`,  `ref4`,  `ref5`,  `ref6`,  `ref7`,  `ref8`,  `ref9`,  `ref10`,  `date_registre`,  `code`,  `order_by`,  `status`    FROM `banks_lines` 
    WHERE `$field` = '$txt' 
    ORDER BY $order_by $way , `id` DESC
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_full($order, $start = 0, $limit = 999) {
    global $db;

    $order_by = $order['col'];
    $way = $order['way'];

    $data = null;
    $sql = "SELECT `id`,  `my_account`,  `operation`,  `date_operation`,  `description`,  `type`,  `total`,  `currency`,  `date_value`,  `account_sender`,  `sender`,  `comunication`,  `ce`,  `details`,  `message`,  `ref`,  `ref2`,  `ref3`,  `ref4`,  `ref5`,  `ref6`,  `ref7`,  `ref8`,  `ref9`,  `ref10`,  `date_registre`,  `code`,  `order_by`,  `status`   

    FROM `banks_lines` 
    
    ORDER BY $order_by $way , `id` DESC
    
    Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_update_status_by_my_account_operation($my_account, $operation, $new_status) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `status`=:new_status WHERE my_account=:my_account AND operation = :operation  ");
    $req->execute(array(
        "my_account" => $my_account,
        "operation" => $operation,
        "new_status" => $new_status,
    ));
}

function banks_lines_validate_total($number, $thousandSeparator = 'comma', $decimalSeparator = 'dot') {
    // Definir los caracteres de separación de miles y decimales
    $thousandSeparators = [
        'nospace' => '',
        'space' => ' ',
        'comma' => ',',
        'dot' => '.'
    ];

    $decimalSeparators = [
        'comma' => ',',
        'dot' => '.'
    ];

    // Validar si los separadores proporcionados son correctos
    if (!array_key_exists($thousandSeparator, $thousandSeparators) || !array_key_exists($decimalSeparator, $decimalSeparators)) {
        return false;
    }

    $ts = preg_quote($thousandSeparators[$thousandSeparator]);
    $ds = preg_quote($decimalSeparators[$decimalSeparator]);

    // Crear la expresión regular para validar la cantidad monetaria
    $regex = '/^-?\d{1,3}(?:' . $ts . '\d{3})*(?:' . $ds . '\d+)?$/';

    // Remover cualquier espacio innecesario antes de validar
    $number = trim($number);

    // Validar el número con la expresión regular
    return preg_match($regex, $number);
}

// Valida si una fecha esta en el formato dado
function banks_lines_validate_date($date, $format) {
    $dateTime = DateTime::createFromFormat($format, $date);
    if ($dateTime && $dateTime->format($format) === $date) {
        //return $dateTime->format('Y-m-d');
        return true;
    }
    return false;
}

function banks_lines_validate_and_convert_date($date, $format) {
    $dateTime = DateTime::createFromFormat($format, $date);
    if ($dateTime && $dateTime->format($format) === $date) {
        return $dateTime->format('Y-m-d');
    }
    return false;
}

function banks_lines_convert_number($num) {
    // https://www.rjcardenas.com/guias-practicas/validar-entradas-numericas-en-php/
    // 
    $num = trim($num); // quito espacios antes y despues 
    if ($num === '') { // si es vacio regreso 0, o false
        return 0;
    } else {

        do {
            $signo = $num[0];
            $num = substr($num, 1);
            $Ok = strpos("-+.0123456789", $signo);
        } while ($num !== '' && $Ok === false);

        if ($signo === '-' || $signo === '+') {
            $resulta = $num;
        } else if ($signo === '.') {
            $resulta = '0.' . $num;
            $signo = '';
        } else {
            $resulta = $signo . $num;
            $signo = '';
        }
        if ($resulta === '') {
            return 0;
        }
        $num = $resulta;
        $dotPos = strrpos($num, '.');
        $commaPos = strrpos($num, ',');
        $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
                ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);
        if (!$sep) {
            return floatval($signo . preg_replace("/[^0-9]/", "", $num));
        }
        return floatval($signo .
                preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
                preg_replace("/[^0-9]/", "", substr($num, $sep + 1, strlen($num)))
        );
    }
}

// SEARCH
function banks_lines_search_full($txt, $order, $start = 0, $limit = 999) {
    global $db;

    $order_by = $order['col'];
    $way = $order['way'];

    $data = null;
    $sql = "SELECT *
            FROM `banks_lines` 
            WHERE 
`id` = :txt 
OR `id` like :txt
OR `my_account` like :txt
OR `operation` like :txt
OR `date_operation` like :txt
OR `description` like :txt
OR `type` like :txt
OR `total` like :txt
OR `currency` like :txt
OR `date_value` like :txt
OR `account_sender` like :txt
OR `sender` like :txt
OR `comunication` like :txt
OR `ce` like :txt
OR `details` like :txt
OR `message` like :txt
OR `id_office` like :txt
OR `office_name` like :txt
OR `value_bankCheck_transaction` like :txt
OR `countable_balance` like :txt
OR `suffix_account` like :txt
OR `sequential` like :txt
OR `available_balance` like :txt
OR `debit` like :txt
OR `credit` like :txt
OR `ref` like :txt
OR `ref2` like :txt
OR `ref3` like :txt
OR `ref4` like :txt
OR `ref5` like :txt
OR `ref6` like :txt
OR `ref7` like :txt
OR `ref8` like :txt
OR `ref9` like :txt
OR `ref10` like :txt
OR `date_registre` like :txt
OR `code` like :txt
OR `order_by` like :txt
OR `status` like :txt
 
    ORDER BY $order_by $way
    
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_max_value_from_col($col) {
    global $db;

    // Asegúrate de escapar el nombre de la columna correctamente
    $sql = "SELECT MAX(CAST(`$col` AS UNSIGNED)) AS max FROM `banks_lines`";

    $query = $db->prepare($sql);

    // Ejecutar la consulta
    $query->execute();

    // Obtener el resultado
    $data = $query->fetch(PDO::FETCH_ASSOC);

    // Manejar el caso en que no hay resultados
    if ($data === false || $data['max'] === null) {
        return null; // o 0, dependiendo de lo que prefieras
    }

    return $data['max'];
}

// SEARCH
function banks_lines_search_by_status_total($status, $total, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT *

    FROM `banks_lines` 
    
    WHERE `status` = $status AND `total` = $total
    
    ORDER BY `total` 
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':status', $status, PDO::PARAM_STR);
//    $query->bindValue(':total', $total, PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function banks_lines_search_by_status($status, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `my_account`,  
                `operation`,  `date_operation`,  
                `description`,  `type`,  
                ROUND(`total`, 2) as total ,  
                `currency`,  `date_value`,  `account_sender`,  
                `sender`,  `comunication`,  `ce`,  `details`,  
                `message`,  `id_office`,  `office_name`,  
                `value_bankCheck_transaction`,  `countable_balance`,  
                `suffix_account`,  `sequential`,  `available_balance`,  
                `debit`,  `credit`,  
                `ref`,  `ref2`,  `ref3`,  `ref4`,  `ref5`,  `ref6`,  `ref7`,  
                `ref8`,  `ref9`,  `ref10`,  `date_registre`,  `code`,  `order_by`,  `status`    
                FROM `banks_lines` 
    WHERE `status` = '$status' 
    ORDER BY `total` 
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
