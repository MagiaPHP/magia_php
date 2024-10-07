<?php

function hr_employee_nationality_search_principal_by_employee_id($employee_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `nationality` FROM `hr_employee_nationality` WHERE   `principal` = 1 AND employee_id = ?");
    $req->execute(array($employee_id));
    $data = $req->fetch();
    return (isset($data['nationality'])) ? $data['nationality'] : false;
}

function hr_employee_nationality_search_by_employee_id($employee_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `nationality` FROM `hr_employee_nationality` WHERE  employee_id = ?");
    $req->execute(array($employee_id));
    $data = $req->fetchall();
    return $data;
}

function hr_employee_nationality_list_by_employee_id($employee_id) {

    $res = array();
    foreach (hr_employee_nationality_search_by_employee_id($employee_id) as $key => $value) {
        array_push($res, $value['nationality']);
    }

    return $res;
}
