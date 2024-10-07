<?php

function doc_tags_search_by_controller_tag($c, $t) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `doc_tags` WHERE   `controller` = :c AND `tag`=:t ");
    $req->execute(array(
        "c" => $c,
        "t" => $t,
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data)) ? $data : false;
}
