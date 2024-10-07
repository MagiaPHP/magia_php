<?php

$txt = (isset($_REQUEST["txt"]) && $_REQUEST["txt"] != "" ) ? clean($_REQUEST["txt"]) : false;
$w = (isset($_REQUEST["w"]) && $_REQUEST["w"] != "" ) ? clean($_REQUEST["w"]) : false;

switch ($w) {
    case 'all':
        $contacts = contacts_search($txt);
        break;

    default:
        $contacts = contacts_list_by_type(1);
        break;
}


include view('public_html', 'index');
