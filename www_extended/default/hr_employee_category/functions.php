<?php

//
//
//
function hr_employee_category_field_employee_id($field, $employee_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_category` WHERE `employee_id`= ?");
    $req->execute(array($employee_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}
