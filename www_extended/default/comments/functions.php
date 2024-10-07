<?php

function comments_total_by_controller_id($c, $id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM comments WHERE `doc` = :c AND `doc_id` = :id AND `status` = 1 ');
    $req->execute(array(
        "c" => $c,
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data[0][0];
    //return $order_id ;
}
