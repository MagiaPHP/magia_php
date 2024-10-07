<?php

if ($_SESSION) {
    header("Location: index.php?c=home&a=wellcome");
}


include view("home", "new_account_sucursal_name");
