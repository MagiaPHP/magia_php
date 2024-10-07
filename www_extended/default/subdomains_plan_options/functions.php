<?php

/**
 * Mustra todas las opciones
 * @global type $db
 * @return type
 */
function subdomains_plan_list_options() {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `plan`,  `features`,  `order_by`,  `status`   
    FROM `subdomains_plan` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function subdomains_plan_options_by_option_plan($option, $plan) {
    global $db;
    $data = null;
    $sql = "SELECT *   
    FROM `subdomains_plan_options` WHERE plan=:plan AND option=:option  ";
    $query = $db->prepare($sql);
    $query->bindValue(':plan', $plan, PDO::PARAM_STR);
    $query->bindValue(':option', $option, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data;
}
