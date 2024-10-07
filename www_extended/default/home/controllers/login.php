<?php

if (!$_SESSION) {
    header("Location: index.php?c=home&a=login");
}

echo "login.php";

//include view("home", "index");