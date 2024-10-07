<?php



die(); 



if (!permissions_has_permission($u_rol, "patients", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




$type = 0;
//$type = (isset($_POST['type'])) ? clean($_POST['type']) : false;
$owner_id = (isset($_POST['owner_id'])) ? clean($_POST['owner_id']) : _options_option("default_id_company");
$title = (isset($_POST['title'])) ? clean($_POST['title']) : false;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false;
$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : false;
$year = (isset($_POST['year'])) ? clean($_POST['year']) : false;
$month = (isset($_POST['month'])) ? clean($_POST['month']) : false;
$day = (isset($_POST['day'])) ? clean($_POST['day']) : false;
$birthday = "$year-$month-$day";
//$status = (isset($_POST['status'])) ? clean($_POST['status']) : false;
$status = 1;
$order_by = 0;

$error = array();

################################################################################

if (!$name) {
    array_push($error, "Name is mandatory");
}

if (!$owner_id) {
    array_push($error, "owner_id ($owner_id) is mandatory");
}
if (contacts_search_name_lastname_birthdate($owner_id, $name, $lastname, $birthday)) {
    array_push($error, "This contact already exists");
}





################################################################################
/*
  if (!is_price($price)) {
  array_push($error, "Error in price");
  }
  if (!is_quantity($quantity)) {
  array_push($error, "Error in Quantity");
  }
 */
################################################################################



if (!$error) {

    $lastInsertId = contacts_add(
            $owner_id, $type, $title, $name, $lastname, $birthday, $order_by, $status
    );

    // actualizo el idioma con el idioma por defecto del sistema
    contacts_update_language($lastInsertId, config_system_lang_default());

    patients_add($owner_id, "Reference", $lastInsertId, date('Y-m-d'), 10, 1);

    ############################################################################
    $data = json_encode(array(
        $owner_id, $type, $title, $name, $lastname, $birthday, $order_by, $status
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    // $c = "contacts" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Fix lastInsertId " . __FILE__;
    $doc_id = $owner_id;
    $crud = "create";
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


    header("Location: index.php?c=contacts&a=search&txt=$name");
} else {

    array_push($error, "Check your form");
}

include view("contacts", "add");
