<?php

if ($a == "edit") {
    include view('invoices', "modal_update_details_billing_address");
}

addresses_show_panel(invoices_field_id("addresses_billing", $id));
?>

