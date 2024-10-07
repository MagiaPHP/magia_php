<?php

/**
 * Regresa en un array los codigos
 * @global type $db
 * @return type
 */
function invoice_status_code_list() {
    global $db;
    $req = $db->prepare("SELECT code FROM invoice_status");
    $req->execute(array());
    $data = $req->fetchall(PDO::FETCH_COLUMN);
    return $data;
}
