<?php

//function directory_list_by_contact_id($contact_id) {
//    global $db;
//    $req = $db->prepare('SELECT `id`, `contact_id`, `name`, `data` FROM `directory` WHERE `contact_id` = ? ORDER BY `name` ');
//    $req->execute(array($contact_id));
//    $data = $req->fetchall();
//    return $data;
//}

function directory_is_email($email) {
    // verifico si es un email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function directory_is_web($url) {

    if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
        return true;
    } else {
        return false;
    }
}

function directory_is_gsm($gsm_number) {
    return true;
}

function directory_is_tel($tel) {
    return 1;
}

function directory_is_facebook($url) {
    return 1;
}

function directory_is_nationalnumber($nn) {
    return 1;
}

function directory_is_format_ok($data, $val) {

    $res = false;

    switch (strtolower($data)) {
        case 'email':
        case 'email-secure':
            $res = directory_is_email($val);
            break;

        case 'web':
            $res = directory_is_web($val);
            break;

        case 'gsm':
            $res = directory_is_gsm($val);
            break;

        case 'tel':
        case 'tel2':
        case 'tel3':
        case 'fax':
            $res = directory_is_tel($val);
            break;

        case 'facebook':
            $res = directory_is_web($val);
            break;

        case 'nationalnumber':
            $res = directory_is_nationalnumber($val);
            break;

        default:
            break;
    }

    return $res;
}

function directory_push($contact_id, $name, $data) {

//    $dir = directory_search_data_by_contact_id($name, $contact_id);
    $dir = directory_id_by_contact_name($contact_id, $name);

    if ($dir) {
        // actualizo
        directory_edit($dir, $contact_id, null, $name, $data, 1, 1);
    } else {
        // creo
        directory_add($contact_id, null, $name, $data, magia_uniqid(), 1, 1);
    }
}
