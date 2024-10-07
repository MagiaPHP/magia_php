<?php

// limite de items
$items_limit = _options_option('config_budgets_pagination_items_limit');

// si hay limite de items lo usamos, sino usamos el limite por defecto en todo el sistema 
$itemsByPage = ( $items_limit ) ? $items_limit : _options_option("system_items_limit");

$limit = $itemsByPage;

switch ($page) {
    case 0:
        $start = 0;
        break;
    default:
        $start = ( $page - 1 ) * $itemsByPage;
        break;
}