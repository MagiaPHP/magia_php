<?php

function tax_list_by_status($status) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM tax WHERE status =:status ORDER BY order_by DESC  ");

    $req->execute(array(
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function country_tax_list_by_country($country) {
    global $db;
    $limit = 999;

    $data = array();

    $req = $db->prepare("SELECT tax FROM country_tax WHERE country =:country ORDER BY order_by DESC  ");

    $req->execute(array(
        "country" => $country
    ));
    $data = $req->fetchall();
    return ($data) ? $data : null;
}

function country_tax_search_by_country_tax($country, $tax) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT tax FROM country_tax WHERE country =:country AND tax=:tax ");

    $req->execute(array(
        "country" => $country,
        "tax" => $tax
    ));
    $data = $req->fetch();
    return ($data) ? $data[0] : 0; // regreso la tva si existe sino cero 
}
