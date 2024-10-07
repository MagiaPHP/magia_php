<?php

die();

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = 0;
//
$res["c"] = "export";
$res["a"] = "contacts_json";
$res["errors"] = null;
$res["warning"] = null;
$res["help"] = null;
$res["status"] = null;
$res["result"] = array();

foreach (contacts_list_by_type(1) as $key => $con) {
    $contact = new Contacts();
    $contact->setContact($con['id']);
    $contact->setEmployees();

    array_push($res["result"], $contact);
}

if (!$res["result"]) {
    $res["errors"] = null;
    $res["warning"] = 'No items find';
    $res["help"] = 'https://factux.be';
    $res["status"] = 1;
    $json_data = json_encode($res, JSON_PRETTY_PRINT);
} else {
    $res["status"] = 0;
    array_push($res["result"], $contacts);
    $json_data = json_encode($res, JSON_PRETTY_PRINT);
}


include view('export', 'contacts_json');
