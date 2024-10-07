<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function _options_edit_option($id, $description, $data, $group, $controller, $order_by, $status) {

    global $db;
    $req = $db->prepare("
        UPDATE `_options` 
        SET 
            `description` =:description, 
            `data` =:data, 
            `group` =:group, 
            `controller` =:controller, 
            `order_by` =:order_by, 
            `status` =:status  
        WHERE `id`=:id "
    );
    $req->execute(array(
        "id" => $id,
        "description" => $description,
        "data" => $data,
        "group" => $group,
        "controller" => $controller,
        "order_by" => $order_by,
        "status" => $status,
    ));
}
