<?php

// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "id" => $id,
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => $id,
            "redi" => array(
                "redi" => "40",
                "c" => $c,
                "id" => $id
            )
        ),
    );

    tasks_create_html('tmp_der_details', $args);
}
?>