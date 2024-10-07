<?php

function docs_exchange_search_by_reciver_tva($my_tva) {
    global $db;
    $req = $db->prepare("SELECT * FROM `docs_exchange` WHERE `reciver_tva` = ? ");
    $req->execute(array($my_tva));
    $data = $req->fetchall();
    return $data;
}

function docs_exchange_search_by_reciver_tva_doc_type_doc_id($sender_tva, $doc_type, $doc_id) {
    global $db;
    $req = $db->prepare(
            "
            SELECT * 
            FROM `docs_exchange` 
            WHERE `sender_tva` = :sender_tva AND `doc_type`=:doc_type AND `doc_id`=:doc_id 
        ");
    $req->execute(array(
        'sender_tva' => $sender_tva,
        'doc_type' => $doc_type,
        'doc_id' => $doc_id
    ));
    $data = $req->fetchall();
    return $data;
}
