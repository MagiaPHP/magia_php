<?php

function banks_templates_field_template($field, $template) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_templates` WHERE `template` = ?");
    $req->execute(array($template));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}
