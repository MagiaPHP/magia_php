<?php

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$product = products_details($id);

include view('public_html', 'details');
