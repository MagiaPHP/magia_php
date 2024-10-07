<?php

$l = (isset($_GET["l"]) && $_GET["l"] != "") ? clean($_GET["l"]) : 'en_GB';

include view('public_html', 'index');
