<?php

//
//        
################################################################################
################################################################################
################################################################################

/**
 * Use api_key to find the id
 * @global type $db
 * @param type $field
 * @param type $api_key
 * @return type
 */
function api_field_api_key($field, $api_key) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `api` WHERE `api_key`= ?");
    $req->execute(array($api_key));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function api_get_id_from_params($params) {

    $query_params = array();
    $query_str = parse_url("https://localhost/index.php?" . $params, PHP_URL_QUERY);
    parse_str($query_str, $query_params);
    $module = $query_params['module'];
    $function = $query_params['function'];
    $id = $query_params['id'];
    return (int) $id;
}

function view_api_invoices_details($id) {
    return "www_extended/default/api/views/invoices_details.php";
}

function api_details_by_contact_id($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `api` WHERE `contact_id`= :contact_id");
    $req->execute(array(
        "contact_id" => $contact_id
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function api_translations_search_by_content($content, $start = 0, $limit = 999) {
    global $db;

    $sql = "
            SELECT id, content, language, translation 
            FROM `_translations` 
            WHERE `content` = :content
            ORDER BY content, translation    Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':content', "$content", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
