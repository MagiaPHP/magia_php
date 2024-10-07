<?php

################################################################################
################################################################################
################################################################################
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
    _options_push("config_banks_lines_order_col", $data, "banks_lines");
}

$order = array("col" => 'id', "way" => 'desc');

$config_banks_lines_order_col_json = _options_option('config_banks_lines_order_col');

$order_array = (is_json($config_banks_lines_order_col_json)) ? json_decode($config_banks_lines_order_col_json, true) : [];

// si no es una columna de la tabla, pasara a id por defecto 
if (!magia_db_is_col_from_table($order_array['order_col'], $c)) {
    $order['col'] = 'id';
} else {
    $order['col'] = $order_array['order_col'];
}

switch ($order_array['order_way']) {
    case 'desc':
        $order['way'] = 'desc';
        break;

    case 'asc':
        $order['way'] = 'asc';
        break;

    default:
        $order['way'] = 'desc';
        break;
}
################################################################################
// Para hacer compatible con table_index.php
$order_way = $order['way'];
$order_col = $order['col'];
################################################################################
################################################################################
