<?php

if (!permissions_has_permission($u_rol, "employees", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$company_id = (isset($_POST['company_id'])) ? clean($_POST['company_id']) : false;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$owner_ref = (isset($_POST['owner_ref'])) ? clean($_POST['owner_ref']) : _options_option("default_id_company");
$cargo = (isset($_POST['cargo'])) ? clean($_POST['cargo']) : _options_option("cargo_by_default");
$status = 1;
$error = array();

################################################################################

if (!$company_id) {
    array_push($error, '$company_id dont send');
}

if (!$contact_id) {
    array_push($error, '$contact_id dont send');
}

################################################################################

if (!is_id($company_id)) {
    array_push($error, 'company_id format error');
}

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format error');
}


/*
  if (!is_price($price)) {
  array_push($error, "Error in price");
  }
  if (!is_quantity($quantity)) {
  array_push($error, "Error in Quantity");
  }
 */
################################################################################
if ($id == 1022) {
    array_push($error, "Company edit disabled");
}


if (!$error) {

    //  $last_insert = contacts_add(
    //$owner_id, $type, $title, $name, $lastname, $birthdate, $order_by, $status
    //        $owner_id, 0, $title, $name, $lastname, $birthdate, 1, $status
    // );
    /*
      contacts_add_employee(
      $company_id, $contact_id, $owner_ref, $cargo
      );
     */
    // $company_id, $contact_id, $owner_ref, $date, $cargo, $order_by, $status
    $lastInsertId = employees_add(
            $company_id, $contact_id, $owner_ref, null, $cargo, null, null
    );

    ############################################################################
    $data = json_encode(array(
        $contact_id
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Add contact $contact_id like eployee to company $company_id";
    $doc_id = $company_id;
    $crud = "update";
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################ 





    header("Location: index.php?c=contacts&a=details&id=$company_id");
} else {

    include view("home", "pageError");
}





