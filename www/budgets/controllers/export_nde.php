<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$budget_id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$cell_selected = (isset($_REQUEST["cell_selected"])) ? clean($_REQUEST["cell_selected"]) : false;

$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;

$headoffice_id = offices_headoffice_of_office(budgets_field_id("client_id", $budget_id));

// si no envio un destinatario, saco el Admin_HeadOffice de la empresa
//$reciver_id = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : offices_list_user_by_rol($headoffice_id, "Admin_HeadOffice")['contact_id'];
//$message = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false;
$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;
$addresses_billing = addresses_billing_by_contact_id($headoffice_id);
//$reciver_name = contacts_field_id("name", $reciver_id);
//$reciver_lastname = contacts_field_id("lastname", $reciver_id);
//$reciver_salutation = contacts_field_id("title", $reciver_id);
//$reciver_email = directory_search_data_by_contact_id("Email", $reciver_id)[0];
/// nota de envio con precio o sin precio 
$valued = (isset($_REQUEST["valued"])) ? clean($_REQUEST["valued"]) : false;

$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

//$message = nl2br($message);

$error = array();

################################################################################

if (!$budget_id) {
    array_push($error, "ID Don't send");
}

################################################################################

if (!is_id($budget_id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!budgets_field_id("id", $budget_id)) {
    array_push($error, "Budget id not exist");
}

//$LettreDate = _tr("Brussels", $lang) . ", " . date("d") . " " . _tr(date("F"), $lang) . " " . date("Y");
//$LettreBody = "Purpose: Budget presentation";
//$LettreSignature = "";
//$LettreSignature = _tr("Sales team");
//$LettreSignature .= "
//$config_company_name
//Tel: $config_company_tel
//email: $config_company_email";
################################################################################
################################################################################
if (!$error) {

    $budget = budgets_details($budget_id);
    $addresses_billing = json_decode($budget['addresses_billing'], true);
    $addresses_delivery = json_decode($budget['addresses_delivery'], true);

    // sacar la lista de ordes de un presupuesto, 
    // sacar las lineas de una orden 
    // [order | descripcion ]
    // Lista de lineas de un devis
    budget_lines_list_by_budget_id($budget_id);

    // lista de orders by budget         
    $val = budget_lines_list_orders_by_budget_id($budget_id);

    $orders = budget_lines_list_orders_by_budget_id($budget_id);
// lista de ordenes de un presupuesto en un array
    $orders_array = array();

    foreach ($orders as $key => $value) {
        array_push($orders_array, $value['order_id']);
    }

    $lignes_transport = budget_lines_list_transport_by_budget_id($budget_id);

    $lignes = array();
    $ligne = "";

    foreach ($orders_array as $order_id) {

        foreach (budget_lines_list_by_order_id_without_transport($order_id) as $key => $value) {

            switch ($value['code']) {
                case "ORDER":
                    break;
                case "PAT":
                    $lignes[$order_id]['patient'] = utf8_decode($value['description']);
                    break;
                default:
                    // Si la linea tiene precio, agrego
                    // o si es EVENT
                    // o si es SIDE
                    if (
                            ( $value['price'] > 0 ) || strstr($value['code'], "SID") || strstr($value['code'], "EVE")
                    ) {
                        $ligne .= $value['code'] . ": " . _trc($value['description'], $lang) . ",  ";
                    }
                    break;
            }
        }


        $total = budget_lines_total_by_order_id_without_transport($order_id);
        $total_htva = budget_lines_total_sin_tax_by_order_id_without_transport($order_id);

        $lignes[$order_id]['id'] = $order_id;
        $lignes[$order_id]['total'] = $total_htva;

        //$ligne .= monedaf($total) ;  
        //array_push($lignes, $ligne); 
        $lignes[$order_id]['description'] = $ligne;
        $ligne = "";
    }



    include view("budgets", "export_nde");
} else {

    include view("home", "pageError");
}
