<?php

function doc_docs_list_full($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `doc`,  `order_by`,  `status`   
    FROM `doc_docs` 
    ORDER BY `order_by` , `doc`   Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
