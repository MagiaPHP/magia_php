<?php

function magia_make_link($url, $label, $check_permission = array(), $target = false, $class = false, $id = false) {

    /// si debo chequear permisos 
    // y tiene permisos
    if ($check_permission && permissions_has_permission($check_permission['rol'], $check_permission['c'], $check_permission['a'])) {
        if ($target) {
            $l = '<a href="' . $url . '" ' . $class . ' id="' . $id . '" target="' . $target . '" >' . $label . '</a>';
        } else {
            $l = '<a href="' . $url . '" ' . $class . ' id="' . $id . '">' . $label . '</a>';
        }
    } else { // sino solo muestro el label
        $l = $label;
    }

    return $l;
}

function magia_uniqid() {
    return date('Ymdhis') . uniqid() . random_int(100, 9999);
}

function magia_is_float($f) {
    return ( (float) $f);
}

function magia_strtoupper($val) {
    if ($val === null) {
        return $val;
    } else {
        return strtoupper($val);
    }
}

function magia_strlen() {
    
}

function magia_convert_to_snake_case($input) {
    // Convertir a minúsculas
    $input = strtolower($input);

    // Reemplazar espacios por guiones bajos
    $input = str_replace(' ', '_', $input);

    // Eliminar todo lo que no sea letra o guión bajo
    $input = preg_replace('/[^a-z0-9_]/', '', $input);

    return $input;
}

function magia_get_only_letters($data) {
    // Si la variable $data no contiene valor, retornarla como está
    if (!$data) {
        return $data;
    }

    // 1. Convertir el texto a minúsculas
    $data = strtolower($data);

    // 2. Reemplazar los espacios por guiones bajos (_)
    $data = str_replace(' ', '_', $data);

    // 3. Eliminar todos los caracteres especiales y números, dejando solo letras y guiones bajos
    $strin_only_lettres = preg_replace('/[^a-z_]/', '', $data);

    // 4. Retornar el texto resultante
    return $strin_only_lettres;
}


function magia_get_only_numbers($data) {
    // Si la variable $data no contiene valor, retornarla como está
    if (!$data) {
        return $data;
    }

    // 1. Convertir el texto a minúsculas (no es necesario si solo permitimos números, pero lo dejo por coherencia)
    $data = strtolower($data);

    // 2. Reemplazar los espacios por guiones bajos (_) (este paso puede eliminarse si solo se aceptan números, pero lo mantendremos)
    $data = str_replace(' ', '_', $data);

    // 3. Eliminar todos los caracteres que no sean números, dejando solo dígitos
    $string_only_numbers = preg_replace('/[^0-9]/', '', $data);

    // 4. Retornar el texto resultante (en este caso solo contendrá números)
    return $string_only_numbers;
}





function magia_get_letters_and_numbers($data) {

    if (!$data || $data == null) {
        return $data;
    }

    // 1. Convertir el texto a minúsculas
    $data = strtolower($data);

    // 2. Reemplazar los espacios por guiones bajos (_)
    $data = str_replace(' ', '_', $data);

    // 3. Eliminar caracteres especiales, dejando solo letras, números y guiones bajos
    $string_only_letters_and_numbers = preg_replace('/[^a-z0-9_]/', '', $data);

    // 4. Retornar el texto resultante
    return $string_only_letters_and_numbers;
}

function magia_greet_based_on_time() {
    // Get the current hour
    $current_hour = date('H'); // 24-hour format (00-23)
    // Variable to store the greeting
    $greeting = '';

    // Determine the greeting based on the time
    if ($current_hour >= 6 && $current_hour < 12) {
        $greeting = "Good morning";
    } elseif ($current_hour >= 12 && $current_hour < 18) {
        $greeting = "Good afternoon";
    } elseif ($current_hour >= 18 && $current_hour < 24) {
        $greeting = "Good evening";
    } else {
        $greeting = "It's late, but hello!";
    }

    // Return the greeting
    return $greeting;
}
