<?php

$products = products_list();
$contacts = contacts_list_by_type(1);
$next_events = agenda_list();

include view('public_html', 'index');
