<?php

include "www_extended/default/budgets/models/Budget.php";

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!budgets_can_be_edit($id)) {
    $error = budgets_why_can_not_be_edit($id);
}
################################################################################
################################################################################
if (!$error) {

    $budgets = budgets_details($id);
    // para el include de mas abajo
    $client_id = budgets_field_id("client_id", $id);
    $owner_id = contacts_field_id("owner_id", $client_id);
    $addresses_billing = json_decode($budgets['addresses_billing'], true);
    $addresses_delivery = json_decode($budgets['addresses_delivery'], true);

    // lineas del budgets
    // $items = budget_lines_list_by_budget_id_without_transport($id);

    $budget = new Budget();
    $budget->setBudgets($id);
    $budget->setLines();

    // vardump($budget); 
//     vardump(cloud_company_details_by_tva(contacts_field_id('tva', $client_id)));
    ////////////////////////////////////////////////////////////////////////////
    // este include necesita del $client_id
    // si ya esta en cloud
    // ya no hace falta agregarla
//    if (!cloud_company_details_by_tva(contacts_field_id('tva', $client_id))) {
//        include controller('cloud', 'cloud_company_add_from_json');
//    }
////////////////////////////////////////////////////////////////////////////


    switch (_options_option('config_budgets_edit_tmp')) {
        case 'short':
            include view("budgets", "short_edit");
            break;

        case '2_cols':
            include view("budgets", "2_cols_edit");
            break;

        case 'default':
        default:
            include view("budgets", "edit");
            break;
    }




    ############################################################################
    ############################################################################
    ############################################################################
    // $id = $budget_id ;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Open budget to edit id: ($id)";
    $doc_id = $id;
    $crud = "edit";
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
    ############################################################################
    ############################################################################ 
} else {

    include view("home", "pageError");
}

