<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}
/**
 * Esto crea un budget a nombre de la empresa 
 */
$company = new Company();
$company->setCompany($u_owner_id);
$company->setSubdomain();

$membership_price = subdomains_plan_search_by_unique('price', 'plan', subdomains_search_by_unique('plan', 'subdomain', $company->getSubdomain_Data('subdomain'))) ?? null;

$error = array();

################################################################################
# Verificacion de varialbes obligatorias
################################################################################
################################################################################
# Formato de variables // las formateo 
################################################################################
# Condcional
# La empresa tiene todo lo que hace falta para su registro? 
# La empresa esta en estado 0?
# Tiene ya el presupuesto de inicio ?
################################################################################
//vardump($company->getAddresses('Billing'));
//$baa = (array)  $company->getAddresses('Billing');
//vardump($baa);
//
//vardump(json_encode($baa));
//vardump($ba = addresses_billing_by_contact_id($u_owner_id));
//vardump($membership_price);
//vardump((int) $membership_price);
//vardump($membership_price);
//
//if ($membership_price) {
//    echo "si";
//} else {
//    echo "no";
//}
//
//die();

if (!$error) {


    // si no pongo int 
    // si mando un precio 0.00 por jejemplo, 
    // me da como verdadero 
    if ((int) $membership_price) {
        // codigo inicial
        $code = 'start' . magia_uniqid();
        // creo el presupuesto 
        budgets_add_by_client_id($u_owner_id, $code, 20);
        // obtengo el id del budget creado
        $budget_id = budgets_field_code('id', $code);
        budgets_update_billing_address($budget_id, json_encode(addresses_billing_by_contact_id($u_owner_id)));
        //
        // agrego una linea con el precio de la membresia 
        //  budget_lines_add($budget_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status)
//        $price = subdomains_plan_search_by_unique('price', 'plan', subdomains_search_by_unique('plan', 'subdomain', $company->getSubdomain_Data('subdomain')));
        //
        budget_lines_add($budget_id, null, 12, 'Membership', $membership_price, 0, '%', 21, 1, 1);
        // agrego otra linea 
        // actualizo los totales del presupuesto 
        budgets_update_total_tax($budget_id, budget_lines_totalHTVA($budget_id), budget_lines_totalTVA($budget_id));
        //Actualizo la comunicacion
        if ($budget_id) {
            budgets_update_ce($budget_id, generate_structured_communication($budget_id));
        }
    }
    header("Location: index.php?c=shop&a=8&sms=update");
} else {

    include view("shop", "1");
}



