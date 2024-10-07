<?php

/**
 * Busca si un usuario ya tiene un folder con este nombre
 */
function emails_folders_search_by_contact_id_folder_name($contact_id, $folder) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT id FROM `emails_folders` WHERE contact_id = :contact_id AND folder = :folder ");
    $req->execute(array(
        "contact_id" => $contact_id,
        "folder" => $folder,
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

//
function emails_folders_delete_by_id_contact_id($id, $contact_id) {
    global $db;
    $req = $db->prepare("DELETE FROM `emails_folders` WHERE `id` =:id AND contact_id = :contact_id ");
    $req->execute(array(
        "id" => $id,
        "contact_id" => $contact_id,
    ));
}
