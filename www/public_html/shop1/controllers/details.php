<?php

$my_company = new Company();
$my_company->setCompany(1022);

$id = (isset($_GET["id"]) && $_GET["id"] != "") ? clean($_GET["id"]) : false;

$products_details = products_details($id);
$product = new Products();
$product->setProducts($products_details['id']);

//vardump($product);

include view('public_html', 'details');
