<?php

// SEARCH
function docu_blocs_search_by_docu_id($docu_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *
            FROM `docu_blocs` 
            WHERE `docu_id` = :docu_id 
            ORDER BY `order_by` DESC, `bloc`    
            Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':docu_id', (int) $docu_id, PDO::PARAM_INT);
//    $query->bindValue(':a', $a, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function docu_blocs_search_by_docu_id_bloc($docu_id, $bloc, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *
            FROM `docu_blocs` 
            WHERE `docu_id` = :docu_id 
            AND `bloc` = :bloc 
            ORDER BY `order_by` DESC, `id` DESC   
            Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':docu_id', (int) $docu_id, PDO::PARAM_INT);
    $query->bindValue(':bloc', $bloc, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function docu_blocs_update($id, $title, $post) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `title` =:title, `post` =:post  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "title" => $title,
        "post" => $post
    ));
}

/**
 * 
<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'page_details_copy');
}
?>
 * 
 */