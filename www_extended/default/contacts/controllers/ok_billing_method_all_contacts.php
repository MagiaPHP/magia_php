<?php

if (!permissions_has_permission($u_rol, "contacts", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$redi = (($_REQUEST['redi']) != "") ? clean($_REQUEST['redi']) : false;

$billing_method = 'M';

$error = array();

################################################################################
###############################################################################
## Condicionales
#################################################################################

if (!$error) {

// hago un bucle y a cada contacto actualizo 

    $contacts = contacts_list_with_monthly_invoices_and_billing_method_not_monthly();

    foreach ($contacts as $contact) {

        $contact_id = $contact['id'];

        contacts_push_billing_method($contact_id, $billing_method);

        ############################################################################
        ############################################################################
        ############################################################################
//        $data = json_encode(array(
//            $contact_id, $billing_method
//        ));
        //$error = json_encode($error);
        $error = null;
        $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
        $date = null;
        //$u_id
        //$u_rol , 
        //$c = "orders" ;
        //$a = "Change order tva" ;
        $w = null;
        // $txt
        $description = "Update billing_method for company $contact_id new [$billing_method] ";
        $doc_id = $contact_id;
        $crud = "update";
        //$error = null ;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
        $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
//        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
        $broswer = null;
        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################ 
        ############################################################################ 
        ############################################################################ 
    }




    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts");
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
} else {

    include view("home", "pageError");
}


