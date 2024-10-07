<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Magia_PHP 0.0.1
 * Factuz.com
 * Robinson Coello 
 * www.coello.be
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// SEARCH
function panels_lines_list_by_panel_id($panel_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `panel_id`,  `icon`,  `label`,  `url`,  `badge`,  `controller`,  `action`,  `order_by`,  `status`    
        
    FROM `panels_lines` 
    
    WHERE `panel_id` = :panel_id 
    
    ORDER BY `order_by` DESC
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':panel_id', (int) $panel_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
