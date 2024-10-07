<?php

function doc_translations_search_by_doc_id($doc_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM doc_translations WHERE doc_id = :doc_id ");
    $req->execute(array(
        "doc_id" => $doc_id,
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function doc_translations_search_by_doc_id_language($doc_id, $language) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM doc_translations WHERE doc_id = :doc_id AND language = :language ");
    $req->execute(array(
        "doc_id" => $doc_id,
        "language" => $language
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function doc_translations_edit_title_body($id, $title, $body) {

    global $db;
    $req = $db->prepare(" UPDATE doc_translations SET 
            title =:title,  
            body =:body 
            WHERE id =:id ");
    $req->execute(array(
        "id" => $id, "title" => $title, "body" => $body
    ));
}
