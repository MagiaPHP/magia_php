<?php

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

include view('public_html', 'search');
