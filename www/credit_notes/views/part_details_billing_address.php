<?php

if ($a == "edit") {

    include view('credit_notes', 'modal_update_details_billing_address');
}

//addresses_show_panel($credit_notes['addresses_billing']);



addresses_show_panel($cn->getAddresses_billing());
?>