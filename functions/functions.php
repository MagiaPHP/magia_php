<?php

/**
 * Verifica si una cadena es un JSON válido.
 *
 * @param string $json La cadena a verificar.
 * @return bool Retorna true si es un JSON válido, false en caso contrario.
 */
function is_json($json) {
    if (!is_string($json)) {
        return false; // No es una cadena, por lo tanto, no puede ser JSON.
    }

    // Intenta decodificar la cadena JSON
    json_decode($json);

    // Verifica si ocurrió un error durante la decodificación
    return json_last_error() === JSON_ERROR_NONE;
}

/**
 * Decodifica una cadena JSON en un array o un objeto.
 *
 * Esta función toma una cadena JSON como entrada y verifica si es válida.
 * Si la cadena es un JSON válido, la decodifica a un array asociativo o a un objeto, 
 * dependiendo del valor del parámetro `$array`. Si el JSON no es válido, devuelve un array vacío.
 *
 * @param string $json  La cadena JSON que se va a decodificar.
 * @param bool $array  (Opcional) Determina si el JSON decodificado debe devolverse como un array 
 *                     asociativo. Si es `true`, el JSON se decodifica como un array asociativo.
 *                     Si es `false`, el JSON se decodifica como un objeto. El valor predeterminado es `true`.
 * 
 * @return mixed  Si el JSON es válido, devuelve el JSON decodificado como un array asociativo o un objeto.
 *                Si el JSON no es válido, devuelve un array vacío.
 */
function json_decode_to_array($json, $array = true) {
    if (is_json($json)) {
        // Decodifica el JSON y devuelve el resultado
        return json_decode($json, $array);
    } else {
        // Si no es un JSON válido, devuelve un array vacío
        return [];
    }
}

function log_execution_time($execution_time, $c, $a = 'index') {

    global $u_id;

// Define la ruta y el nombre del archivo de logs
    $log_file = 'page_execution.log';

// Obtiene la fecha y hora actual
    $date = date('Y-m-d H:i:s');

// Crea el mensaje de log
    $log_message = "[{$date}] {$u_id} {$execution_time} {$c} {$a} \n";

// Escribe el mensaje en el archivo de logs
    file_put_contents($log_file, $log_message, FILE_APPEND);
}

/**
 * Imprime un análisis detallado de una variable para fines de depuración.
 *
 * @param mixed $value La variable que se desea analizar.
 */

/**
 * Imprime un análisis detallado de una variable para fines de depuración.
 *
 * @param mixed $value La variable que se desea analizar.
 * @param bool $full_details Indica si se deben mostrar detalles completos de la variable.
 */

/**
 * Imprime un análisis detallado y visualmente atractivo de una variable para fines de depuración.
 *
 * @param mixed $value La variable que se desea analizar.
 * @param bool $full_details Indica si se deben mostrar detalles completos de la variable.
 */

/**
 * Imprime un análisis detallado y visualmente atractivo de una variable para fines de depuración.
 *
 * @param mixed $value La variable que se desea analizar.
 * @param bool $full_details Indica si se deben mostrar detalles completos de la variable.
 */

/**
 * Imprime un análisis detallado y visualmente atractivo de una variable en formato de tabla para fines de depuración.
 *
 * @param mixed $value La variable que se desea analizar.
 * @param bool $full_details Indica si se deben mostrar detalles completos de la variable.
 */
/**
 * Imprime un análisis detallado y visualmente atractivo de una variable en formato de tabla para fines de depuración.
 *
 * @param mixed $value La variable que se desea analizar.
 * @param bool $full_details Indica si se deben mostrar detalles completos de la variable.
 */
function vardump($value, $full_details = false) {
    // Comienza el contenedor principal
    echo "<div style='font-family: Arial, sans-serif; background: #f4f4f4; border: 1px solid #ccc; padding: 20px; margin: 20px 0; border-radius: 5px;'>";

    // Añadir título
    echo "<h2 style='font-size: 1.4em; color: #333;'>Variable Dump</h2>";

    if ($full_details) {
        // Verificar el tipo de la variable
        $type = gettype($value);
        echo "<table style='width: 100%; border-collapse: collapse; margin-bottom: 20px;'>";
        echo "<tr><th style='text-align: left; padding: 10px; border-bottom: 2px solid #ddd;'>Detail</th><th style='padding: 10px; border-bottom: 2px solid #ddd;'>Value</th></tr>";
        echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Type</td><td style='padding: 10px; color: #007bff;'>$type</td></tr>";

        // Manejar los diferentes tipos de variables
        switch ($type) {
            case 'string':
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Length</td><td style='padding: 10px; color: #007bff;'>" . strlen($value) . " characters</td></tr>";
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Words</td><td style='padding: 10px; color: #007bff;'>" . str_word_count($value) . " words</td></tr>";
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Value</td><td style='padding: 10px; background: #fff; color: #000; border: 1px solid #ddd; border-radius: 4px;'>" . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . "</td></tr>";
                break;

            case 'array':
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Number of elements</td><td style='padding: 10px; color: #007bff;'>" . count($value) . "</td></tr>";
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Elements</td><td style='padding: 10px;'>";
                echo "<ul style='list-style-type: none; padding-left: 0; margin: 0;'>";
                foreach ($value as $key => $element) {
                    echo "<li style='padding: 5px; border-bottom: 1px solid #eee;'><strong style='color: #555;'>[$key]</strong> => ";
                    vardump($element, $full_details); // Recursivamente analizar cada elemento del array
                    echo "</li>";
                }
                echo "</ul></td></tr>";
                break;

            case 'object':
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Class</td><td style='padding: 10px; color: #007bff;'>" . get_class($value) . "</td></tr>";
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Properties</td><td style='padding: 10px;'>";
                echo "<ul style='list-style-type: none; padding-left: 0; margin: 0;'>";
                foreach (get_object_vars($value) as $property => $val) {
                    echo "<li style='padding: 5px; border-bottom: 1px solid #eee;'><strong style='color: #555;'>$property</strong> => ";
                    vardump($val, $full_details); // Recursivamente analizar cada propiedad del objeto
                    echo "</li>";
                }
                echo "</ul></td></tr>";
                break;

            case 'NULL':
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Value</td><td style='padding: 10px; color: #007bff;'>NULL</td></tr>";
                break;

            case 'boolean':
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Value</td><td style='padding: 10px; color: #007bff;'>" . ($value ? 'TRUE' : 'FALSE') . "</td></tr>";
                break;

            case 'integer':
            case 'double':
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Value</td><td style='padding: 10px; color: #007bff;'>$value</td></tr>";
                break;

            case 'resource':
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Resource</td><td style='padding: 10px; color: #007bff;'>" . get_resource_type($value) . "</td></tr>";
                break;

            default:
                echo "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'>Value</td><td style='padding: 10px; background: #fff; color: #000; border: 1px solid #ddd; border-radius: 4px;'>" . htmlspecialchars(print_r($value, true), ENT_QUOTES, 'UTF-8') . "</td></tr>";
                break;
        }
        echo "</table>";
    } else {
        // Imprimir el valor en formato básico
        echo "<pre style='font-family: monospace; background: #fff; color: #000; border: 1px solid #ddd; border-radius: 4px; padding: 10px;'>";
        var_dump($value);
        echo "</pre>";
    }

    // Cierre del contenedor principal
    echo "</div>";
}


/**
 * Genera un conjunto de caracteres validos para una clave
 * @return type
 */
function passwordRandom() {
// pongo en 4 partes 
//    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890&@#(!)*';
//    $pass = array(); //remember to declare $pass as an array
//    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
//    for ($i = 0; $i < 15; $i++) {
//        $n = rand(0, $alphaLength);
//        $pass[] = $alphabet[$n];
//    }
    $min = 'abcdefghijklmnopqrstuvwxyz';
    $may = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $num = '1234567890';
//    $esp = '*@#()!';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($min) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $n = rand(0, $alphaLength);
        array_push($pass, $min[$n]);
    }
    $alphaLength = strlen($may) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $n = rand(0, $alphaLength);
        array_push($pass, $may[$n]);
    }
    $alphaLength = strlen($num) - 1; //put the length -1 in cache
    for ($i = 0; $i < 3; $i++) {
        $n = rand(0, $alphaLength);
        array_push($pass, $num[$n]);
    }
//    $alphaLength = strlen($esp) - 1; //put the length -1 in cache
//    for ($i = 0; $i < 3; $i++) {
//        $n = rand(0, $alphaLength);
//        array_push($pass, $esp[$n]);
//    }

    return (implode($pass)); //turn the array into a string
}

function passwordIsGood($password) {

    $error = array();
    if (strlen($password) <= '8') {
        array_push($error, 'The password must have more than 8 characters');
    }

    if (!preg_match("#[0-9]+#", $password)) {
        array_push($error, "The key must have a number");
    }

    if (!preg_match("#[A-Z]+#", $password)) {
        array_push($error, "The password must have a capital letter");
    }

    if (!preg_match("#[a-z]+#", $password)) {
        array_push($error, "The password must have a lowercase letter");
    }

    return $error;
}

/**
 * Calcula la edad pasandole una fecha
 * @param type $fechanacimiento Fecha en formato (aaaa-mm-dd) 
 * @return type 42
 */
function calculaedad($fechanacimiento) {
    if (!$fechanacimiento) {
        return false;
    }

    list($ano, $mes, $dia) = explode("-", $fechanacimiento);
    $ano_diferencia = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
        $ano_diferencia--;
    return $ano_diferencia;
}

/**
 * Mustra el logo
 * @global type $config_company_logo
 */
function logo($w = null, $h = null, $class = null) {
    global $config_company_logo;

//    if (isset($config_company_logo) && file_exists(PATH_GALLERY . "$config_company_logo")) {
//        if ($w) {
//            echo '<img src="' . PATH_GALLERY . $config_company_logo . '" alt="" width="' . $w . '" class="' . $class . '"/>';
//        } else {
//            echo '<img src="' . PATH_GALLERY . $config_company_logo . '" alt="" class="' . $class . '"/>';
//        }
//    } else {
//        echo '<img src="www/gallery/img/logos/factux.jpg" alt="" width=150/>';
//    }

    if (file_exists(logo_img())) {
        if ($w) {
            echo '<img src="' . logo_img() . '" alt="" width="' . $w . '" class="' . $class . '" >';
        } else {
            echo '<img src="' . logo_img() . '" alt="" width="" class="' . $class . '" >';
        }
    } else {
        echo '<img src="www/gallery/img/logos/factux.jpg" alt="" width=150/>';
    }
}

function logo_img() {
// Factux logo por defecto 
    $logo_factux = "www/gallery/img/logos/factux.jpg";

// mi logo 
    $my_logo = PATH_GALLERY_IMG_SUBDOMAIN . _options_option('config_company_logo');

// verificacion 
    if (file_exists($my_logo)) {
        $logo = $my_logo;
    } else {
        $logo = $logo_factux;
    }

//    $logo = PATH_GALLERY . "$config_company_logo";
//
//    if (file_exists($logo) == 2) {
//        return $logo;
//    } else {
//        return $logo_factux;
//    }
    return $logo;
}

/**
 * Verifica si la valor de $u_id es diferente de null, 
 * en ese caso esta logueado
 * @global type $u_id
 * @return type
 */
function is_logued() {
    global $u_id;
    return ($u_id) ? true : false;
}

function logout() {
    session_destroy();
}

/**
 * Verifica si un rol tiene acceso 
 * @param type $u_rol
 * @return type
 */
function has_access($u_rol = false) {
    return ($u_rol == "admin") ? true : false;
}

/**
 * Verifica si es Admin
 * @param type $u_rol
 * @return type
 */
function is_admin($u_rol = false) {
    return ($u_rol == "admin") ? true : false;
}

function day_add($d = false) {
    for ($i = 1; $i < 32; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }
}

function month_add($m = false) {
    for ($i = 1; $i < 13; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }
}

function year_add($y = false) {
    for ($i = 1900; $i < 2019; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }
}

function is_only_letters($value) {
    $res = true;
//compruebo que los caracteres sean los permitidos
    $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for ($i = 0; $i < strlen($value); $i++) {
        if (strpos($allowed, substr($value, $i, 1)) === false) {
            return false;
        }
    }
    return $res;
}

/**
 * Verifica si una cadena contiene solo letras, números y espacios.
 * 
 * Esta función utiliza una expresión regular para validar que todos los caracteres en
 * la cadena de entrada son letras (mayúsculas o minúsculas), números o espacios.
 *
 * @param string $value La cadena a verificar.
 * @return bool Devuelve `true` si la cadena contiene solo letras, números y espacios, `false` en caso contrario.
 */
function is_only_letters_numbers($value) {
    // Asegúrate de que el valor sea una cadena
    if (!is_string($value)) {
        return false;
    }

    // Expresión regular para letras, números y espacios
    return preg_match('/^[a-zA-Z0-9 ]*$/', $value) === 1;
}

function is_good_tva($tva) {
    $res = true;
//compruebo que los caracteres sean los permitidos
    $allowed = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    for ($i = 0; $i < strlen($tva); $i++) {
        if (strpos($allowed, substr($tva, $i, 1)) === false) {
            return false;
        }
    }
    return $res;
}

/**
 * Regresa el numero de tva de letras y numeros en mayuscula
 * 
 * @param type $tva
 * @return type
 */
function tva_formated($tva) {
    if ($tva === null) {
        return false;
    } else {
// lo paso a mayuscula
        $tva = strtoupper($tva);
        $new_tva = "";
        $allowed = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $j = 0;
        $i = 0;
// solo copio letras y numeros 
// el resto de caracteres no copio
        while ($i < strlen($tva)) {
            if (in_array($tva[$i], $allowed)) {
                $new_tva[$j] = $tva[$i];
                $j++;
            }
            $i++;
        }
        return ($new_tva);
    }
}

/**
 * Limpia y sanitiza un valor de entrada.
 * 
 * Esta función elimina las etiquetas HTML, convierte caracteres especiales en 
 * entidades HTML, y elimina espacios en blanco al principio y al final del valor.
 *
 * @param mixed $value El valor a limpiar. Puede ser null, un array, una cadena vacía, o una cadena con datos.
 * @return mixed El valor limpiado. Devuelve el mismo tipo de valor que se recibió, excepto que las cadenas se han limpiado.
 */
function clean($value) {

    if (is_array($value)) {

        return array_map('clean', $value); // Limpia cada elemento del array
    } elseif (is_null($value) || $value === '' || $value === "null") {

        return $value;
    } else {
        // Eliminar espacios al inicio y al final
        $value = trim($value);

        // Eliminar etiquetas HTML y PHP
        $value = strip_tags($value);

        // Convertir caracteres especiales en entidades HTML
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

        return $value;
    }
}

function is_name($name) {
    $name = clean($name);
    return (is_only_letters($name) && strlen($name) > 3) ? TRUE : FALSE;
}

function is_lastname($lastname) {
    $lastname = clean($lastname);
    return (is_only_letters($lastname) && strlen($lastname) > 3) ? TRUE : FALSE;
}

function is_address($address) {
    $address = clean($address);
    return (is_only_letters_numbers($address) && strlen($address) > 3) ? TRUE : FALSE;
}

function is_postalcode($postcode) {
    $postcode = clean($postcode);
    return (is_only_letters_numbers($postcode) ) ? TRUE : FALSE;
}

/**
 * Verifica si una cadena es una dirección de correo electrónico válida.
 *
 * Esta función utiliza la función `filter_var` con el filtro `FILTER_VALIDATE_EMAIL`
 * para determinar si la cadena proporcionada es una dirección de correo electrónico válida.
 *
 * @param string $email La cadena a verificar.
 * @return bool Devuelve `true` si la cadena es una dirección de correo electrónico válida, `false` en caso contrario.
 */
function is_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function is_login($login) {


    if ($login == '' || $login == null || $login == ' ') {
        return false;
    }


    $login = clean($login);

// largo x carateres
// letras, numeros, '-', '_'
    $res = true;

//compruebo que los caracteres sean los permitidos
    $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_@.";
    for ($i = 0; $i <= strlen($login) - 1; $i++) {
        if (!empty($login)) {
            if (strpos($allowed, substr($login, $i, 1)) === false) {
//echo $login . " no es válido<br>";
                return false;
            }
        }
    }

    $res = (strlen($login) > 3) ? true : false;

    return $res;
}

/**
 * 
 * @param type $password
 * @return boolean
 */
function is_password($password) {

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        return false;
    }

    return true;
}

function is_good_password($password) {
    return 0;
}

function is_id($id) {
    return ( is_numeric($id) && $id > 0 ) ? true : false;
}

function is_date($date) {

    if ($date == '' || $date == false || $date == null) {
        return false;
    }

    $tempDate = explode('-', $date);
// mm dd yy 
    return checkdate((int) $tempDate[1], (int) $tempDate[2], (int) $tempDate[0]);
}

function is_price($price) {
    return ( is_numeric($price) && $price >= 0 ) ? true : false;
}

function is_quantity($quantity) {
    return ( is_numeric($quantity) && $quantity >= 0 ) ? true : false;
}

function is_description($description) {
    return 1;
}

function is_code($code) {
    return 1;
}

//
function is_order_by($order_by) {
    return ( is_numeric($order_by) && $order_by > 0 ) ? true : false;
}

//
function is_status($status) {
//    return ( is_numeric($status) && ($status == 0 || $status == 1) ) ? true : false;
    return ( is_numeric($status) ) ? true : false;
}

////////////////////////////////////////////////////////////////////////////////
function format_id($id) {
    if (!$id) {
        return false;
    }

    $id = intval($id);
    return $id;
}

function after($x, $inthat) {
    if (!is_bool(strpos($inthat, $x)))
        return substr($inthat, strpos($inthat, $x) + strlen($x));
}

;

function after_last($x, $inthat) {
    if (!is_bool(strrevpos($inthat, $x)))
        return substr($inthat, strrevpos($inthat, $x) + strlen($x));
}

;

function before($x, $inthat) {
    return substr($inthat, 0, strpos($inthat, $x));
}

;

function before_last($x, $inthat) {
    return substr($inthat, 0, strrevpos($inthat, $x));
}

;

function between($x, $that, $inthat) {
    return before($that, after($x, $inthat));
}

;

function between_last($x, $that, $inthat) {
    return after_last($x, before_last($that, $inthat));
}

;

// use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle) {
    $rev_pos = strpos(strrev($instr), strrev($needle));
    if ($rev_pos === false)
        return false;
    else
        return strlen($instr) - $rev_pos - strlen($needle);
}

function moneda_value($val = 0.00): float {
    $val = (float) $val;

    if ($val == null || $val == '') {
        $val = (float) 0;
    }

    return round($val, 2);
}

/**
 * Solo se usa para mostrar no para hacer calculos 
 * 
 * @global type $config_empresa_moneda_simbolo
 * @param type $cantidad
 * @return type
 */
function moneda($cantidad = "0.00") {
    global $config_empresa_moneda_simbolo;

    $cantidad = (float) $cantidad;

    if ($cantidad == null || $cantidad == '') {
        $cantidad = (float) 0;
    }

    $c = round($cantidad, 2); // echo round(1.95583, 2);  // 1.96

    return number_format($c, 2, ".", " ");
}

function monedaf($cantidad) {
    global $config_empresa_moneda_simbolo;

    $cantidad = (float) $cantidad;

    if ($cantidad == null || $cantidad == '') {
        $cantidad = 0;
    }

    if ($cantidad < 0) {
//  return "<span style=\"color:red;\">" . moneda($cantidad) . " EUR</span>" ;
        return moneda($cantidad) . " $config_empresa_moneda_simbolo";
    } else {
        return moneda($cantidad) . " $config_empresa_moneda_simbolo";
    }
}

function pagination($url, $totalItems, $itemsByPage, $page = null, $view = 'pagination') {

    if ($itemsByPage == 0) {
        $itemsByPage = 50;
    }

    $totalPages = ceil($totalItems / $itemsByPage);
    $lastPage = $totalPages;
    $actualPage = (isset($page)) ? $page : 1;
    include view("home", $view);
}

function reglaDeTres($x, $y) {
// x    = 100%
// y    = ?

    return ($x * 100) / $y;
}

/**
 * Obtiene la dirección IP del usuario.
 *
 * La función revisa varias variables del servidor para determinar la IP del usuario,
 * considerando posibles encabezados de proxy como HTTP_CLIENT_IP y HTTP_X_FORWARDED_FOR.
 * 
 * @return string La dirección IP del usuario.
 */
function get_user_ip() {
    // Comprueba si la IP está en los encabezados HTTP_X_FORWARDED_FOR o HTTP_CLIENT_IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // HTTP_X_FORWARDED_FOR puede contener una lista de IPs; la primera IP es la del cliente original
        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ips[0]);
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            // Si la IP de la lista es inválida, usar la IP del cliente
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : 'unknown';
}

/**
 * Obtiene la dirección IPv6 del usuario, si está disponible.
 *
 * La función revisa varias variables del servidor para determinar la IP del usuario,
 * considerando posibles encabezados de proxy como HTTP_CLIENT_IP y HTTP_X_FORWARDED_FOR.
 * 
 * @return string La dirección IPv6 del usuario o 'unknown' si no se puede determinar.
 */
function get_user_ip6() {
    $ip = 'unknown';

    // Comprueba si la IP está en los encabezados HTTP_X_FORWARDED_FOR o HTTP_CLIENT_IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // HTTP_X_FORWARDED_FOR puede contener una lista de IPs; la primera IP es la del cliente original
        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ips[0]);
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            // Si la IP de la lista no es IPv6, usar la IP del cliente
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    // Validar que la IP es IPv6
    return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) ? $ip : 'unknown';
}

/**
 * Obtiene información del navegador del usuario a partir del User-Agent.
 *
 * @return array Un array con la información del navegador, la versión, la plataforma y el User-Agent.
 */
function get_user_browser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = '';

    // Detectar el sistema operativo
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'Linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'Mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'Windows';
    }

    // Detectar el navegador
    if (preg_match('/MSIE|Trident/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub = 'MSIE';
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub = 'Firefox';
    } elseif (preg_match('/Chrome/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub = 'Chrome';
    } elseif (preg_match('/Safari/i', $u_agent) && !preg_match('/Chrome/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub = 'Safari';
    } elseif (preg_match('/Opera|OPR/i', $u_agent)) {
        $bname = 'Opera';
        $ub = 'Opera';
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub = 'Netscape';
    } elseif (preg_match('/Edge/i', $u_agent)) {
        $bname = 'Microsoft Edge';
        $ub = 'Edge';
    }

    // Extraer la versión del navegador
    $known = [$ub, 'Version', 'other'];
    $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (preg_match_all($pattern, $u_agent, $matches)) {
        $i = count($matches['browser']);
        if ($i > 1) {
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = $matches['version'][1];
            }
        } else {
            $version = $matches['version'][0];
        }
    }

    // Asegurarse de que la versión no sea vacía
    if (empty($version)) {
        $version = '?';
    }

    return [
        'userAgent' => $u_agent,
        'name' => $bname,
        'version' => $version,
        'platform' => $platform
    ];
}

function farra_progreso($actual, $total_pasos) {
    echo '<div class="progress">
            <div class="progress-bar"
                 role="progressbar" aria-valuenow="33"
                 aria-valuemin="0"
                 aria-valuemax="100"
                 style="width: ' . (100 / $total_pasos) * $actual . '%;">
                <span class="sr-only">2</span>
            </div>
        </div>';
}

/**
 * 
 * @param type $que
 * @param type $donde
 * @return boolean
 */
function write_in_file($que, $donde) {

    if (!$donde) {
        return false;
    }

    $myfile = fopen($donde, 'a') or die("Unable to open file! $donde");
    $txt = "$que";
    fwrite($myfile, $txt . PHP_EOL);

    //$txt = "Jane Doe\n";    
    //fwrite($myfile, $txt);

    fclose($myfile);
}

//function icon($icon) {
//
//    switch ($icon) {
//        case 'new-window':
//            $i = 'glyphicon glyphicon-new-window';
//            break;
//
//        default:
//            break;
//    }
//
//    echo '<span class="' . $i . '"></span>';
//}

/**
 * Obtiene la fecha y hora actual en el formato 'Y-m-d H:i:s'.
 *
 * La función utiliza la zona horaria predeterminada configurada en la configuración de PHP.
 * Puedes ajustar la zona horaria utilizando `date_default_timezone_set()` si es necesario.
 *
 * @return string La fecha y hora actual en el formato 'Y-m-d H:i:s'.
 */
function current_timestamp() {
    // Configurar la zona horaria predeterminada si es necesario
    // date_default_timezone_set('America/New_York'); // Ejemplo de zona horaria

    return date('Y-m-d H:i:s');
}
