<?php

if (modules_field_module('status', 'audio')) {
    include view("home", "forgetPassword");
} else {
    include view("home", "factuxforgetPassword");
}

