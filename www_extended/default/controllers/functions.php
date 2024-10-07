<?php

function controller_api($module = 'api', $function = null, $params = null) {

    switch ($module) {
        case 'api':
            return controller_api_api($function, $params);
            break;

        case 'invoices':
            return controller_api_invoices($function, $params);
            break;

        case 'contacts':
            return controller_api_contacts($function, $params);
            break;

        default:
            return 0;
            break;
    }
}

//
function controller_api_api($function = null, $params = null) {

    switch ($function) {
        case 'help':
            echo "api help";
            break;

        default:
            echo "api help";
            break;
    }
}

function controller_api_invoices($function = 'help', $params = null) {

    switch ($function) {
        case 'help':
            return controller_api_invoices_help();
            break;

        case 'details':
            return controller_api_invoices_details(api_get_id_from_params($params));
            break;

        default:
            return "Module invoices, sin function ni parametros ";
            break;
    }
}

function controller_api_invoices_details($id) {
    return "www_extended/default/api/controllers/invoices_details.php";
}

function controller_api_contacts($function = null, $params = null) {

    switch ($function) {
        case 'details':
            echo "invoices details";
            break;

        default:
            break;
    }
}
