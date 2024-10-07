<?php

if ($a == "edit") {


    include view('credit_notes', 'modal_update_details_delivery_address');
}


addresses_show_panel($cn->getAddresses_delivery());
?>