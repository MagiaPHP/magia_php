<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("shop", "address_check");

$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;
$show_office = (isset($_GET['show_office'])) ? clean($_GET['show_office']) : false;
$error = array();

################################################################################
#################################################################################
#################################################################################
if (!$error) {

//    if (users_can_see_others_offices($u_id)) {
//        // todas las oficinas
//        $contacts = shop_contacts_search_by_company($txt);
//    } else {
//        // solo la que estoy conectado    
//        $contacts = shop_contacts_search_by_office($txt);
//    }

    if (users_can_see_others_offices($u_id)) {

        ################################################################################
        $pagination = new Pagination($page, shop_contacts_search_by_company($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=shop&a=contacts_search&formId=nav&txt=" . $txt);
        $contacts = shop_contacts_search_by_company($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        // todas las oficinas
//        $contacts = shop_contacts_search_by_company($txt);
    } else {
        ################################################################################
        $pagination = new Pagination($page, shop_contacts_search_by_office($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=shop&a=contacts_search&formId=nav&txt=" . $txt);
        $contacts = shop_contacts_search_by_office($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        // solo la que estoy conectado    
//        $contacts = shop_contacts_search_by_office($txt);
    }



    include view("shop", "contacts");

    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Search contacts: $txt";
    $doc_id = null;
    $crud = "read";
    $error = null;
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
} else {

    include view("home", "pageError");
}


    