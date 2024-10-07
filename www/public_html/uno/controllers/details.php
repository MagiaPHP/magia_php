<?php

$mc = new Company();
$mc->setCompany(1022);

$id = (isset($_GET["id"]) && $_GET["id"] != "") ? clean($_GET["id"]) : false;

$blog = new Blog();
$blog->setBlog($id);

include view("public_html", "details");
