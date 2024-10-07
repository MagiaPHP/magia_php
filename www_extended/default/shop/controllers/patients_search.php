<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;

$error = array();
################################################################################
/*
  if (!$w) {
  array_push($error, '$w Don\'t send');
  }
  if (!$txt) {
  array_push($error, '$txt Don\'t send');
  }

 * 

  if( permissions_has_permission($u_rol, "shop_offices" , "create")){
  // pacientes de mi empresa
  //$contact = shop_contacts_details($id);
  $patients = patients_list_according_company(contacts_work_for($u_id));

  }else{
  // pacientes de mi oficina
  $patients = patients_list_according_office(contacts_work_at($u_id));
  }
 * 
 *  */
################################################################################
################################################################################

if (!$error) {

    $patients = shop_labo_patients_search($txt);

    include view("shop", "patients");
} else {

    include view("home", "pageError");
}



