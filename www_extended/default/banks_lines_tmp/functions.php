<?php

// SEARCH
function banks_lines_tmp_search_by_account_number($account_number, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `account_number`,  `template`,  `order_by`,  `status`    FROM `banks_lines_tmp` 
    WHERE `account_number` = '$account_number' AND status = 1
    ORDER BY `order_by`  
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

// SEARCH
function banks_lines_tmp_search_by_account_number_template($account_number, $template, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   FROM `banks_lines_tmp` 
    WHERE `account_number` = :account_number AND `template` = :template AND  status = 1
    ORDER BY `order_by`  
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':account_number', $account_number, PDO::PARAM_STR);
    $query->bindValue(':template', $template, PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_tmp_search_template_in_array($template, $array) {
    $currencyKey = array_search($template, array_column($array, 'template'));
    if ($currencyKey !== false) {
        return $array[$currencyKey];
    }
    return false;
}

function banks_lines_tmp_next_order_by($account_number) {
    global $db;
    $data = null;
    $sql = "SELECT MAX(`order_by`)   FROM `banks_lines_tmp` WHERE `account_number` = :account_number 
    
";
    $query = $db->prepare($sql);
    $query->bindValue(':account_number', $account_number, PDO::PARAM_STR);
//    $query->bindValue(':template', $template, PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return ($data[0] + 1) ?? 1;
}
