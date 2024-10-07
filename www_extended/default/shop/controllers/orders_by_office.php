<?php

/**
 * Orders by office
 * no se puede ya que los pedidos estan registrados por empresa
 * 
 */
die("Orders is registred by company");
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!permissions_has_permission($u_rol, "shop_orders", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

# Recolection de variables desde el formulario
// id de la oficina
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();

# Verificacion de varialbes obligatorias

if (!$id) {
    array_push($error, "id is mandatory");
}

# Verification de formato de variables 
// Verifica que sea un id valido
if (!is_id($id)) {
    array_push($error, "Error in price");
}

// si puedes ver otras oficinas, puedes ver todas, sino solo la que trabajas
if (users_can_see_others_offices($u_id)) {

    // verifico que la empresa sea la empresa del usuario 
    if (offices_headoffice_of_office($id) != contacts_headoffice_of_contact_id($u_id)) {
        array_push($error, 'This office does not belong to your company');
    } else {
        echo __LINE__;
//        $orders = shop_orders_list_by_company();
        $orders = shop_orders_list_by_office($id);
    }
} else {
    // orders de donde trabajo
    if ($id != contacts_work_at($u_id)) {
        array_push($error, 'You dont work in this office');
    } else {
//        echo __LINE__;
        // lista de pedidos segun oficna
        $orders = shop_orders_list_by_office($id);
    }
}
# proceso
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    include view("shop", "orders_by_office");
} else {

    include view("home", "pageError");
}