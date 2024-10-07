<?php

function expenses_categories_edit_shot($id, $category, $description) {

    global $db;
    $req = $db->prepare("
            UPDATE `expenses_categories` 
            SET             
            `category` =:category, 
            `description` =:description
            
            WHERE `id`=:id
        
        ");
    $req->execute(array(
        "id" => $id,
//        "code" => $code,
//        "father_code" => $father_code,
        "category" => $category,
        "description" => $description,
//        "order_by" => $order_by,
//        "status" => $status,
    ));
}
