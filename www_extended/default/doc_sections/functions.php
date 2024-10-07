<?php

function doc_sections_list_full($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `section`,  `open`,  `items`,  `order_by`,  `status`   
    FROM `doc_sections` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
