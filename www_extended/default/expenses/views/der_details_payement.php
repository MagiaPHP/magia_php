<?php

if (_options_option('config_banks_registre')) {
    include "der_details_payement_bank_lines.php";
} else {
    include "der_details_payement_manual.php";
}
?>



