<?php

if ($a == "edit") {



    include view('invoices', 'modal_update_details_delivery_address');
}


addresses_show_panel(invoices_field_id("addresses_delivery", $id));
?>