<?php

// Archivos necesarion 
// controller/ok_row_position.php
// views/js/row_position.js
// 
// En la tabla table_index.php 
// el <tbody> debe estar asi: <tbody class="row_position">
// 
// Y cada <tr> debe estar tener su propio id  <tr style="cursor: all-scroll" id="xxxxxx"> 
// Esto es en el xtendido 
//include '../../../../admin/conect_db.php';
//
//global $db;
//tres niveles para el www y 4 para el extendido 
//
include '../../../admin/conect_db.php';
//
global $db;

// Verificar si se han enviado los datos
if (isset($_POST['position']) && is_array($_POST['position']) && isset($_POST['invoice_id'])) {
    $position = $_POST['position'];
    $invoice_id = $_POST['invoice_id'];

    try {

        invoices_row_position($position, $invoice_id);

        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        // Manejo de errores
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // No se enviaron datos o los datos no son válidos
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}

/**
 * 
 * @global type $db
 * @param type $position
 */
function invoices_row_position($position, $invoice_id) {
    global $db;

    $i = 1;
    foreach ($position as $v) {
        // Usa consultas preparadas para evitar inyección SQL
        $sql = "UPDATE `invoice_lines` SET order_by = :order_by WHERE id = :id AND `invoice_id` = :invoice_id ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':invoice_id', (int) $invoice_id, PDO::PARAM_INT);
        $stmt->bindValue(':order_by', (int) $i, PDO::PARAM_INT);
        $stmt->bindValue(':id', (int) $v, PDO::PARAM_INT);
        $stmt->execute();
        $i++;
    }
}
?>




