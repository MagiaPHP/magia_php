<?php

function blog_comments_edit_short($id, $title, $comment) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `title` =:title, `comment` =:comment  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "title" => $title,
        "comment" => $comment
    ));
}
