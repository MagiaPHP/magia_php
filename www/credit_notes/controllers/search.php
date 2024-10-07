<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$credit_notes = null;

$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;

$error = array();

$order_data = order_by_get_order_data($u_id, 'credit_notes');

################################################################################
################################################################################
switch ($w) {
    case "id":
        $id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, credit_notes_search_by_id($id));
        // puede hacer falta
        $pagination->setUrl("index.php?c=credit_notes&a=search&w=id&id=$id");
        $credit_notes = credit_notes_search_by_id($id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $credit_notes = credit_notes_search_by_id($id);
        break;

    case "by_office_id":  // Caso para la búsqueda de notas de crédito por "office_id"
        // Obtener el valor de 'office_id' desde los parámetros de la URL (GET). Si no está presente, asignar 'false'.
        $office_id = (isset($_GET["office_id"])) ? clean($_GET["office_id"]) : false;

        // Crear una instancia de la clase de paginación utilizando el número de página actual ($page)
        // y el total de resultados de la función 'credit_notes_search_by_office_id'.
        // Se asume que esta función toma 'office_id' como parámetro y devuelve el número total de resultados.
        ################################################################################
        $pagination = new Pagination($page, credit_notes_search_by_office_id($office_id, 0, 999, $order_data['col_name'], $order_data['order_way']));

        // Configurar la URL base para los enlaces de paginación. Esta URL incluye el controlador y la acción,
        // así como el 'office_id' actual. Se utiliza para construir enlaces de paginación con los parámetros correctos.
        $pagination->setUrl("index.php?c=credit_notes&a=search&w=by_office_id&office_id=$office_id");

        // Obtener las notas de crédito para la página actual utilizando los métodos de paginación 'getStart' y 'getLimit'.
        // Estos métodos devuelven el índice de inicio y el número de resultados por página, respectivamente.
        // Llama a la función 'credit_notes_search_by_office_id' con 'office_id', 'start' y 'limit' para obtener los datos paginados.
        $credit_notes = credit_notes_search_by_office_id($office_id, $pagination->getStart(), $pagination->getLimit(), $order_data['col_name'], $order_data['order_way']);
        ################################################################################
        break;

    case "by_from_to_office_id":

        $from = (isset($_GET["from"])) ? clean($_GET["from"]) : false;
        $to = (isset($_GET["to"])) ? clean($_GET["to"]) : false;
        $office_id = (isset($_GET["office_id"])) ? clean($_GET["office_id"]) : false;

        
        
        ################################################################################
        $pagination = new Pagination($page, credit_notes_search_by_from_to_office_id($from, $to, $office_id, 0, 999, $order_data['col_name'], $order_data['order_way']));
        $pagination->setUrl("index.php?c=credit_notes&a=search&w=by_from_to_office_id$from=$from&to=$to&office_id=$office_id");
        $credit_notes = credit_notes_search_by_from_to_office_id($from, $to, $office_id, $pagination->getStart(), $pagination->getLimit(), $order_data['col_name'], $order_data['order_way']);
        ################################################################################
        break;

    case "byStatus":
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, credit_notes_search_by_status($status));
        // puede hacer falta
        $pagination->setUrl("index.php?c=credit_notes&a=search&w=byStatus&status=$status");
        $credit_notes = credit_notes_search_by_status($status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $credit_notes = credit_notes_search_by_status($status);
        break;

    case "byClient":
        $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false;
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all";
        $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y");
        $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : date("n");
        // No facturadas
        $unbilled = (isset($_GET["unbilled"]) && $_GET["unbilled"] == "on") ? true : false;

        ################################################################################
        $pagination = new Pagination($page, credit_notes_search_advanced($client_id, $status, $year, $month, $unbilled));
        // puede hacer falta
        $pagination->setUrl("index.php?c=credit_notes&a=search&w=byClient&client_id=$client_id&status=$status&year=$year&month=$month&unbilled=$unbilled");
        $credit_notes = credit_notes_search_advanced($client_id, $status, $year, $month, $unbilled, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $credit_notes = credit_notes_search_advanced($client_id, $status, $year, $month, $unbilled);
        break;

    default:

        $year = (isset($_GET["year"])) ? clean($_GET["year"]) : false;
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $office_id = (isset($_GET["office_id"])) ? clean($_GET["office_id"]) : false;

        if ($year) {

            $pagination = new Pagination($page, credit_notes_search_full_year($year, $txt, $order_data['col_name'], $order_data['order_way']));
            // puede hacer falta
            $pagination->setUrl("index.php?c=credit_notes&a=search&year=$year&txt=$txt&office_id=$office_id");
            $credit_notes = credit_notes_search_full_year($year, $txt, $pagination->getStart(), $pagination->getLimit(), $order_data['col_name'], $order_data['order_way']);
        } else {

            $pagination = new Pagination($page, credit_notes_search_full($txt, $office_id, 0, 9999, $order_data['col_name'], $order_data['order_way']));
            // puede hacer falta
            $pagination->setUrl("index.php?c=credit_notes&a=search&txt=$txt&office_id=$office_id");
            $credit_notes = credit_notes_search_full($txt, $office_id, $pagination->getStart(), $pagination->getLimit(), $order_data['col_name'], $order_data['order_way']);
        }

        break;
}



################################################################################
if (!$error) {

    include view("credit_notes", "index");
} else {
    include view("home", "pageError");
}

