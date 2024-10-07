<?php

if (modules_field_module('status', 'audio')) {
    include view("home", "new_account");
} else {

    include view("home", "factux_new_account");
}



