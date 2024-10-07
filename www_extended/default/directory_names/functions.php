<?php

function directory_names_list_names() {
    global $db;
    $req = $db->prepare("SELECT name FROM directory_names");
    $req->execute(array());
    $data = $req->fetchall(PDO::FETCH_COLUMN);
    return $data;
}
