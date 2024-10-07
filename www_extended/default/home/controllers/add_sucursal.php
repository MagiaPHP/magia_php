<?php

if ($_SESSION) {
    header("Location: index.php?c=home&a=wellcome");
}


include view("home", "add_sucursal");
