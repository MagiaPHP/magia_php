<?php

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$product = new Products();
$product->setProducts($id);

include view('public_html', 'details');
