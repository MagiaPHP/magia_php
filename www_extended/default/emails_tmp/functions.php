<?php

//
function emails_tmp_delete_by_id_contact_id($id, $contact_id) {
    global $db;
    $req = $db->prepare("DELETE FROM `emails_tmp` WHERE `id` =:id AND contact_id = :contact_id ");
    $req->execute(array(
        "id" => $id,
        "contact_id" => $contact_id,
    ));
}

// SEARCH
function emails_tmp_search_by_order_by($field, $txt, $order_by, $start = 0, $limit = 999) {
    global $db;

    $ob = ($order_by) ? " $order_by " : " `order_by` DESC, `id` DESC ";

    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `controller`,  `tmp`,  `body`,  `order_by`,  `status`    FROM `emails_tmp` 
    WHERE `$field` = '$txt' 
    ORDER BY $ob
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
