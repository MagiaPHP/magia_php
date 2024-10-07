<?php

if ($a == "edit") {

    include view('budgets', 'modal_update_details_billing_address');
}


addresses_show_panel($budgets['addresses_billing']);
?>