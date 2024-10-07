<?php

function blog_add_short($title, $description) {
    global $db;
    global $u_id;

    $req = $db->prepare(" INSERT INTO `blog` ( `id` ,   `title` ,   `description` ,   `author_id` ,   `date` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :title ,  :description ,  :author_id ,  :date ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "title" => $title,
        "description" => $description,
        "author_id" => $u_id,
        "date" => date("Y-m-d h:m:s"),
        "order_by" => 1,
        "status" => 1
            )
    );
}
