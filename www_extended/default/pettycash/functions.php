<?php

function pettycash_by_date($date = null) {
    global $db;

    if (!$date) {
        $date = date("Y-m-d");
    }

    $req = $db->prepare(
            "
    SELECT *     
    FROM `pettycash` 
    WHERE `date` = ? ORDER BY `id` DESC 
    ");
    $req->execute(array(
        $date
    ));
    $data = $req->fetchall();
    return $data;
}

function pettycash_sum_total_by_date($date) {
    global $db;
    $req = $db->prepare(
            "
    SELECT SUM(`total`) as total    
    FROM `pettycash` 
    WHERE `date` = ? 
    ");
    $req->execute(array(
        $date
    ));
    $data = $req->fetch();
    return $data[0];
}

function pettycash_list_full($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date`,  `description`,  `total`,  `date_registre`,  `order_by`,  `status`   
    FROM `pettycash` ORDER BY `id`    Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function pettycash_edit_short($id, $date, $description, $total) {

    global $db;
    $req = $db->prepare(
            " UPDATE `pettycash` SET `date` =:date, `description` =:description, `total` =:total WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "date" => $date,
        "description" => $description,
        "total" => $total
    ));
}
