<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoices = null;

$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$year = (isset($_GET["year"]) && isset($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y");
$txt = (isset($_GET["txt"]) && isset($_GET["txt"]) != "") ? clean($_GET["txt"]) : '';
// Para la pagination
$page = (isset($_GET["page"]) && $_GET["page"] != "") ? clean($_GET["page"]) : 1;

$error = array();

################################################################################
################################################################################
################################################################################

if (!$error) {

    switch ($w) {
        case "id":
            $id = (($_GET["id"]) != "") ? clean($_GET["id"]) : false;
            $invoices = invoices_search_by_id($id);
            break;

        case "by_office_id":
            $office_id = (($_GET["office_id"]) != "") ? clean($_GET["office_id"]) : false;
            $pagination = new Pagination($page, invoices_search_by('office_id', $office_id));
            $pagination->setUrl('index.php?c=invoices&a=search&w=by_office_id&office_id=' . $office_id);
            $invoices = invoices_search_by('office_id', $office_id, $pagination->getStart(), $pagination->getLimit());
            break;

        case "byCode":
            $code = (($_GET["code"]) != "") ? clean($_GET["code"]) : false;
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            $pagination = new Pagination($page, invoices_search_by_code($code));
            $pagination->setUrl('index.php?c=invoices&a=search&w=byCode&code=' . $code);
            $invoices = invoices_search_by_code($code, $pagination->getStart(), $pagination->getLimit());
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            //$invoices = invoices_search_by_code($code);
            break;

        case "by_seller_id":
            $seller_id = (($_GET["seller_id"]) != "") ? clean($_GET["seller_id"]) : false;
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            $pagination = new Pagination($page, invoices_search_by('seller_id', $seller_id));
            $pagination->setUrl('index.php?c=invoices&a=search&w=by_seller_id&seller_id=' . $seller_id);
            $invoices = invoices_search_by('seller_id', $seller_id, $pagination->getStart(), $pagination->getLimit());
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            //$invoices = invoices_search_by_code($code);
            break;

        case "byMultiStatus":
            $codes = (isset($_GET['codes']) && ($_GET["codes"]) != "") ?
                    clean($_GET["codes"]) :
                    array(10, 20);
            $codes_array = explode(',', $codes);

            foreach ($codes_array as $key => $code) {
                if (!is_numeric($code)) {
                    array_push($error, "Code format error");
                }
            }
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            $pagination = new Pagination($page, invoices_search_by_multi_code($codes_array));
            $pagination->setUrl('index.php?c=invoices&a=search&w=byMultiStatus&codes=' . $_GET["codes"]);
            $invoices = invoices_search_by_multi_code($codes_array, $pagination->getStart(), $pagination->getLimit());
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
//            $invoices = invoices_search_by_multi_code($codes_array);
            break;

        case "byClient":
            $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false;
            $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all";
            $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y");
            $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : date("n");
            // No facturadas
            $monthly = (isset($_GET["monthly"]) && $_GET["monthly"] == "on") ? true : false;

            ////////////////////////////////////////////////////////////////////
            // si todas las empresas
            if (strtolower($client_id) == "all") {
                ////////////////////////////////////////////////////////////////////
                $pagination = new Pagination($page, invoices_search_advanced_status($status, $year, $month));
                $url = "index.php?c=invoices&a=search&w=byClient&client_id=$client_id&status=$status&year=$year&month=$month";
                $pagination->setUrl($url);
                $invoices = invoices_search_advanced_status($status, $year, $month, $pagination->getStart(), $pagination->getLimit());
                ////////////////////////////////////////////////////////////////////
                // sino 
            } else {
                ////////////////////////////////////////////////////////////////////
                $pagination = new Pagination($page, invoices_search_advanced_by_client($client_id, $status, $year, $month));
                $url = "index.php?c=invoices&a=search&w=byClient&client_id=$client_id&status=$status&year=$year&month=$month";
                $pagination->setUrl($url);
                $invoices = invoices_search_advanced_by_client($client_id, $status, $year, $month, $pagination->getStart(), $pagination->getLimit());
                ////////////////////////////////////////////////////////////////////
            }
            ////////////////////////////////////////////////////////////////////
//            $invoices = invoices_search_advanced($client_id, $status, $year, $month, $monthly);
            break;

        //
        case "byCounter":
            $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : false;
            $counter = (($_GET["txt"]) != "") ? clean($_GET["txt"]) : false;
            $invoices = invoices_search_by_year_counter($year, $counter);
            break;

        //
        case "full":
            $year = (isset($_GET["year"])) ? clean($_GET["year"]) : false;
            $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
            $invoices = invoices_search_full_year($year, $txt);
            break;

//        ---------------------------------------------------------------------- By Default / Todos los campos
        default:
            // por defeecto 
            $year = (isset($_GET["year"])) ? clean($_GET["year"]) : false;
            $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;

            if ($year) {
                ////////////////////////////////////////////////////////////////////

                $pagination = new Pagination($page, invoices_search_full_year($year, $txt));
                $url = "index.php?c=invoices&a=search&year=$year&txt=$txt";
                $pagination->setUrl($url);
                $invoices = invoices_search_full_year($year, $txt, $pagination->getStart(), $pagination->getLimit());
                ////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////
//                $invoices = invoices_search_full_year($year, $txt);
            } else {
                #################################################################
                $pagination = new Pagination($page, invoices_search($txt));
                $url = "index.php?c=invoices&a=search&txt=$txt";
                $pagination->setUrl($url);
                $invoices = invoices_search($txt, $pagination->getStart(), $pagination->getLimit());
                #################################################################
//                $invoices = invoices_search($txt);
            }

            break;
    }


    ############################################################################
    ############################################################################
    ############################################################################
    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Search invoice: w:[$w], year:[$year], txt:[$txt]";
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

    logs_add($level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer);

    ############################################################################
    ############################################################################
    ############################################################################
//    vardump($invoices);


    include view("invoices", "index");
} else {
    include view("home", "pageError");
}