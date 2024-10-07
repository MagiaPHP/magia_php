<?php

/*

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (isset($_POST['id'])) ? clean($_POST['id']) : false;
$owner_id = (isset($_POST['owner_id'])) ? clean($_POST['owner_id']) : false;
$title = (isset($_POST['title'])) ? clean($_POST['title']) : false;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false;
$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : false;
$year = (isset($_POST['year'])) ? clean($_POST['year']) : false;
$month = (isset($_POST['month'])) ? clean($_POST['month']) : false;
$day = (isset($_POST['day'])) ? clean($_POST['day']) : false;
//$birthday = "$year-$month-$day"; 
$birthday = (isset($_POST['birthday'])) ? clean($_POST['birthday']) : false;
$status = (isset($_POST['status'])) ? clean($_POST['status']) : false;


$error = array();

################################################################################
if (!$c) {
    array_push($error, "Controller don't is mandatory");
}
if (!$a) {
    array_push($error, "Action don't send");
}
################################################################################


if (!$id) {
    array_push($error, "id is mandatory");
}

if (!$title) {
    array_push($error, "Title is mandatory");
}

if (!$name) {
    array_push($error, "Name is mandatory");
}

if (!$lastname) {
    array_push($error, "Lastname is mandatory");
}

if (!$birthday) {
    array_push($error, "Birthday is mandatory");
}




################################################################################



if (!is_id($id)) {
    array_push($error, "ID ($id) format error");
}



################################################################################





if (!$error) {



    contacts_edit(
            $id, intval($owner_id), 1, $title, $name, $lastname, $birthday, intval($status)
    );

   // header("Location: index.php?c=contacts&a=edit&id=$id");
} else {

    foreach ($error as $key => $value) {
        echo "<p>$key - $value</p>";
    }
}




/*
$contact = contacts_details($id);

include "www/contacts/views/edit.php";

*/