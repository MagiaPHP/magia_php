<?php

$id = (isset($_GET["id"]) && $_GET["id"] != "" ) ? clean($_GET["id"]) : false;

//$agenda = agenda_details($id);

$agenda = agenda_details_full($id);

include view('public_html', 'details');
