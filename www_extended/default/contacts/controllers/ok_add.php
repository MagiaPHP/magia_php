<?php

if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Es para agregar todo tipo de contacto 
 * oficina 
 * contacto 
 * provehedor 
 * empleado 
 * etc 
 * 
 */
$is_headoffice = (!empty($_POST['is_headoffice'])) ? clean($_POST['is_headoffice']) : false;
$owner_id = (!empty($_POST['owner_id'])) ? clean($_POST['owner_id']) : null;
$office_id = (!empty($_POST['office_id'])) ? clean($_POST['office_id']) : null;
//$office_id = null;
$type = (!empty($_POST['type'])) ? clean($_POST['type']) : null;
$title = (!empty($_POST['title'])) ? clean($_POST['title']) : null;
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : null;
$lastname = (!empty($_POST['lastname'])) ? clean($_POST['lastname']) : null;
$description = (!empty($_POST['description'])) ? clean($_POST['description']) : null;
//
$year = (!empty($_POST['year'])) ? clean($_POST['year']) : 1900;
$month = (!empty($_POST['month'])) ? clean($_POST['month']) : 01;
$day = (!empty($_POST['day'])) ? clean($_POST['day']) : 01;
$birthdate = "$year-$month-$day";
//
$prefix_vat = (!empty($_POST['prefix_vat'])) ? clean($_POST['prefix_vat']) : null;
$tva = (!empty($_POST['tva'])) ? clean($_POST['tva']) : null;

$billing_method = (!empty($_POST['billing_method'])) ? clean($_POST['billing_method']) : null;
$discounts = (!empty($_POST['discounts'])) ? clean($_POST['discounts']) : null;
//
$language = (!empty($_POST['language'])) ? clean($_POST['language']) : null;
//
$registre_date = (!empty($_POST['registre_date'])) ? clean($_POST['registre_date']) : date("Y-m-d h:m:s");
//
//
// Direcciones
$addressName = "Billing";
$address = (isset($_POST['address']) && $_POST['address'] != '' ) ? clean($_POST['address']) : '';
$number = (isset($_POST['number']) && $_POST['number'] != '' ) ? clean($_POST['number']) : '';
$postcode = (isset($_POST['postcode']) && $_POST['postcode'] != '' ) ? clean($_POST['postcode']) : '';
$barrio = (isset($_POST['barrio']) && $_POST['barrio'] != '' ) ? clean($_POST['barrio']) : '';
$sector = (isset($_POST['sector']) && $_POST['sector'] != '' ) ? clean($_POST['sector']) : '';
$ref = (isset($_POST['ref']) && $_POST['ref'] != '' ) ? clean($_POST['ref']) : '';
$city = (isset($_POST['city']) && $_POST['city'] != '' ) ? clean($_POST['city']) : '-';
$province = (isset($_POST['province']) && $_POST['province'] != '' ) ? clean($_POST['province']) : '';
$region = (isset($_POST['region']) && $_POST['region'] != '' ) ? clean($_POST['region']) : '-';
$country = (isset($_POST['country']) && $_POST['country'] != '' ) ? clean($_POST['country']) : false;
//
$directory = (!empty($_POST['directory'])) ? clean($_POST['directory']) : false;
// redireccion
$redi = isset($_POST['redi']) && ($_POST['redi'] != '') ? (clean($_POST['redi'])) : 1;

//
$status = 1;
$order_by = 1;

$code = magia_uniqid();
$code1 = magia_uniqid();
$code2 = magia_uniqid();
$code3 = magia_uniqid();
$code4 = magia_uniqid();
$code5 = magia_uniqid();
$code6 = magia_uniqid();

// Verifico los datos obligatorios 
################################################################################
if (!$name) {
    array_push($error, 'Name is mandatory');
}
################################################################################
# FORMAT
if ($tva && $prefix_vat) {
    $tva = $prefix_vat . $tva;
}
################################################################################
// si el tva existe, error
if (contacts_search_tva($tva)) {
    array_push($error, "TVA already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    contacts_add(
            $owner_id, $office_id, $type, $title, $name,
            $lastname, $description, $birthdate, $tva, $billing_method,
            $discounts, $code, $language, $registre_date, $order_by, $status
    );

    $last_add_id = contacts_field_code("id", $code);

    if ($is_headoffice) {
        contacts_update_owner_id($last_add_id, $last_add_id);
    }

    if ($last_add_id) {

        contacts_update_language($last_add_id, config_system_lang_default());

        // Directory
        $validDirectoryNames = array_column(directory_names_list(), 'name');
        foreach ($directory as $key => $value) {
            if (in_array($value['name'], $validDirectoryNames)) {
                directory_add($last_add_id, null, $value['name'], $value['data'], magia_uniqid(), 1, 1);
            }
        }

        // Agrego la direccion de facturacin        
        if ($last_add_id) {
            addresses_add($last_add_id, 'Billing', $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country, $code, $status);
        }



        ############################################################################


        switch ($redi['redi']) {

            case 1:
                header("Location: index.php?c=contacts#1");
                break;
            case 2:
                header("Location: index.php?c=expenses&a=add_10_inv#2");
                break;
            case 3:
                header("Location: index.php?c=expenses&a=add#3");
                break;
            // index.php?c=expenses&a=add
            // se agrega desde expenses 
            // Para nuevo provehedor
            // sin email 
            case 4:
                header("Location: index.php?c=expenses&a=ok_add&provider_id=$last_add_id&#4");
                break;

            case 5:
                // Crea una factura con el id del cliente 
                header("Location: index.php?c=invoices&a=ok_add&client_id=$last_add_id#5");
                //header("Location: index.php?c=invoices&a=edit&id=$last_invoices_id&#5");
                break;

            case 6:
                // Crea una expense con el id del cliente 
                header("Location: index.php?c=invoices&a=ok_add&client_id=$last_add_id#6");
                //header("Location: index.php?c=invoices&a=edit&id=$last_invoices_id&#5");
                break;

            case 7:
                // Crea contacto y lo agrega com provehedor
                header("Location: index.php?c=providers&a=ok_add_short&company_id=$last_add_id&redi[redi]=7#7");
                //header("Location: index.php?c=invoices&a=edit&id=$last_invoices_id&#5");
                break;

            case 8:
                header("Location: index.php?c=contacts&a=details&id=$last_add_id&8");
                break;

            case 9:
                header("Location: index.php?c=contacts&a=contacts&id=$last_add_id&9");
                break;

            case 10:
                header("Location: index.php?c=$redi[c]&a=$redi[a]&$redi[params]&10");
                break;

            default:
                header("Location: index.php?c=contacts");

                break;
        }
    } else {

        include view("home", "pageError");
    }
} else {

    include view("home", "pageError");
}
