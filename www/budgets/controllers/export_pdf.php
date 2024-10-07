<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// id del budget
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$cell_selected = (isset($_REQUEST["cell_selected"])) ? clean($_REQUEST["cell_selected"]) : false;

// Typo no se que es
$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;
$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : 'web';

//$headoffice_id = offices_headoffice_of_office(budgets_field_id("client_id", $id));

$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

switch ($way) {
    case 'pdf':
        break;

    case 'email':

        /**
          //
          // si no envio un destinatario, saco el Admin_HeadOffice de la empresa
          // si no envio un destinatario, saco el Admin_HeadOffice de la empresa
          $reciver_id = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : offices_list_user_by_rol($headoffice_id, "Admin_HeadOffice")['contact_id'];
          $message = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false;

          $email_cc = (isset($_REQUEST["cc"])) ? clean($_REQUEST["cc"]) : false;
          // caja check or not
          $cc2m = (isset($_REQUEST["cc2m"])) ? clean($_REQUEST["cc2m"]) : false;

          // Si selecciona enviarme una copia,
          // recojo el email del usuario conectado
          if ($cc2m) {
          $email_cc2m = directory_by_contact_name($u_id, 'Email');
          }

          $reciver_name = contacts_field_id("name", $reciver_id);
          $reciver_lastname = contacts_field_id("lastname", $reciver_id);
          $reciver_salutation = contacts_field_id("title", $reciver_id);
          $reciver_email = directory_by_contact_name($reciver_id, 'Email');

          $message = nl2br($message);

          if (!is_email($reciver_email)) {
          array_push($error, '$reciver_email : Email format is not correct');
          }
          if (!is_email($email_cc)) {
          array_push($error, '$email_cc : Email format is not correct');
          }
          //
          if (!is_email($email_cc2m)) {
          array_push($error, '$cc2m : Email format is not correct');
          }
         * 
         */
        break;

    default: // web
        break;
}


//$addresses_billing = addresses_billing_by_contact_id($headoffice_id);

$error = array();
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
if (!is_id($id)) {
    array_push($error, 'ID format error');
}
if (!budgets_field_id("id", $id)) {
    array_push($error, "Budget id not exist");
}
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################


if (!$error) {



    $budget = budgets_details($id);

    $addresses_billing = json_decode($budget['addresses_billing'], true);
    $addresses_delivery = json_decode($budget['addresses_delivery'], true);

    include view("budgets", "export_pdf");
} else {

    include view("home", "pageError");
}