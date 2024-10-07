<?php

$error = array();

if (!modules_field_module('status', 'docu')) {
    array_push($error, "Module docu disabled");
}





if (! $error) {

    include view("home", "documentation");
    
} else {

    include view("home", "pageError");
}






