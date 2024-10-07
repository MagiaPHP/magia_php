<?php

function _content_search_by_frase_contexto($frase, $contexto = null, $start = 0, $limit = 999) {
    global $db;

    if ($contexto) {
        $sql = "SELECT * FROM _content WHERE frase like :frase AND contexto like :contexto Limit :limit OFFSET :start   ";
        $query = $db->prepare($sql);
        $query->bindValue(':frase', "%$frase%", PDO::PARAM_STR);
        $query->bindValue(':contexto', "$contexto", PDO::PARAM_STR);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    } else {
        $sql = "SELECT * FROM _content WHERE frase like :frase Limit :limit OFFSET :start    ";
        $query = $db->prepare($sql);
        $query->bindValue(':frase', "%$frase%", PDO::PARAM_STR);
//        $query->bindValue(':contexto', "$contexto", PDO::PARAM_STR);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    }
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _content_search_full($txt, $lang, $start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT c.id, c.frase, c.contexto, t.content, t.language, t.translation 
        FROM `_content` as c 
        JOIN `_translations` as t ON `c`.`frase` = `t`.`content` 
        
        WHERE (
        `c`.`id` like :txt OR 
        `c`.`frase` LIKE :txt OR         
        `c`.`contexto` like :txt  OR 
        `t`.`translation` like :txt  
        
        ) AND `t`.`language` = :lang
        
        ORDER BY `c`.`frase`        
        Limit :limit OFFSET :start          
";

    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':lang', $lang, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _content_list_full($start = 0, $limit = 99999, $order_by = 'id') {
    global $db;

    $sql = "SELECT * FROM `_content` ORDER BY id DESC   Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();

    return $data;
}

function _content_contexto_list($start = 0, $limit = 99999) {
    global $db;

    $sql = "SELECT distint(contexto) FROM `_content` ORDER BY id DESC   Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();

    return $data;
}

function _content_delete_by_frase($frase) {
    global $db;

    $sql = "DELETE FROM `_content` WHERE frase= :frase";

    $query = $db->prepare($sql);
    $query->bindValue(':frase', $frase, PDO::PARAM_STR);
    $query->execute();
}

function _content_list_context() {
    global $db;

    $sql = "
        
    SELECT * FROM _content 

";

    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
