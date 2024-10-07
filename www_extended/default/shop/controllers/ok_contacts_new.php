<?php

if (!permissions_has_permission($u_rol, 'shop_contacts', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$title = (!empty($_POST['title']) && $_POST['title'] != '') ? clean($_POST['title']) : null;
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
$lastname = (!empty($_POST['lastname'])) ? clean($_POST['lastname']) : false;
$pat_ref = (!empty($_POST['pat_ref'])) ? clean($_POST['pat_ref']) : "";
$nationalNumber = (!empty($_POST['nationalNumber'])) ? clean($_POST['nationalNumber']) : null;
$dataName = (!empty($_POST['dataName'])) ? clean($_POST['dataName']) : null;
$data = (!empty($_POST['data'])) ? clean($_POST['data']) : null;

$year = (!empty($_POST['year']) && $_POST['year'] != "null") ? clean($_POST['year']) : 1900;
$month = (!empty($_POST['month']) && $_POST['month'] != "null") ? clean($_POST['month']) : 01;
$day = (!empty($_POST['day']) && $_POST['day'] != "null") ? clean($_POST['day']) : 01;
$birthdate = "$year-$month-$day";
## 
$type = 0;
$code = magia_uniqid();
$status = 1;
$order_by = 0;

$error = array();

#************************************************************************

if (!$u_owner_id) {
    array_push($error, "owner_id is mandatory");
}

if (!$name && !$lastname) {
    array_push($error, "Name ? lastname?");
}

#
#************************************************************************
// verifico si el id del paciente pertenece al usuario logueado 
// Verifico si el paciente existe ya en la base de datos 
// 
// 
#************************************************************************
################################################################################
# Verificaciones extras
# 1) verifico si el usuario esta presente el el sistema
################################################################################
if (shop_contacts_search_name_lastname_birthdate($u_owner_id, $name, $lastname, $birthdate)) {
    array_push($error, "Patient ya existe");
}


################################################################################
################################################################################
################################################################################
if (!$error) {

    shop_contacts_add(
            $u_owner_id, $type, $title, $name, $lastname, $birthdate, $code, $order_by, $status
    );

    $contactslastInsertId = contacts_field_code("id", $code);

    patients_add($u_owner_id, $pat_ref, $contactslastInsertId, null, 1, 1);

    if ($contactslastInsertId) {

        if ($nationalNumber != "") {
            directory_add($contactslastInsertId, null, "nationalNumber", $nationalNumber, $code, 1, 1);
        }

        if ($data != "") {
            directory_add($contactslastInsertId, null, $dataName, $data, magia_uniqid(), 1, 1);
        }

        ############################################################################
        $level = null;
        $date = null;
        //$u_id
        //$u_rol , 
        //$c , $a , 
        $w = null;
        $description = "Add contact: $name $lastname ($contactslastInsertId)   ";
        $doc_id = $contactslastInsertId;
        $crud = "create";
        $error = null;
        $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
        $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
        $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = "1.2.3";
        $ip6 = "ip6";
        $broswer = "navegador";

        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
        // agrego el contacto 
        // agrgo el cokie
        // redirecciono 
        //http://localhost/jiho_22/index.php?c=shop&a=ok_order_new_chosse_contact&contact_id=50463 


        $_SESSION['order']['patient_id'] = $contactslastInsertId;

        header("Location: index.php?c=shop&a=ok_order_new_chosse_contact&contact_id=$contactslastInsertId");
    } else {
        header("Location: index.php?c=shop&a=contacts");
    }
} else {


    include view("home", "pageError");
}
