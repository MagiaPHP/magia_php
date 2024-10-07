<?php

function country_provinces_list_by_country($country, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `country`,  `code`,  `province`,  `order_by`,  `status`   
    
    FROM `country_provinces` 
    WHERE country = :country
    ORDER BY `province`, `id` DESC  Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':country', $country, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
