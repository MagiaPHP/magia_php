<?php

function countries_list_languages() {
    global $db;
    $req = $db->prepare("SELECT countryCode FROM countries");
    $req->execute(array());
    $data = $req->fetchall(PDO::FETCH_COLUMN);
    return $data;
}

function countries_field_country_code($field, $countryCode) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM countries WHERE countryCode = ?");
    $req->execute(array($countryCode));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function countries_is_countryCode($countryCode) {
    return countries_field_country_code('id', $countryCode) ? true : false;
}
