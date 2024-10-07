<?php

/**
 * Obtengo la formula 
 * @global type $db
 * @param type $code
 * @return type
 */
function hr_payroll_items_get_formula_by_code($code) {
    global $db;
    $data = null;
    $sql = "SELECT `formula`

    FROM `hr_payroll_items` 

    WHERE `code` = :code
    
    ";

    $query = $db->prepare($sql);
    $query->bindValue(':code', (int) $code, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

function hr_payroll_items_update($id, $in_out, $description, $formula, $order_by, $status) {

    global $db;
    $req = $db->prepare("
            UPDATE `hr_payroll_items` 
            SET 
            `in_out` =:in_out, 
            `description` =:description, 
            `formula` =:formula, 
            `order_by` =:order_by, 
            `status` =:status  
        WHERE `id`=:id 
        ");
    $req->execute(array(
        "id" => $id,
        "in_out" => $in_out,
        "description" => $description,
        "formula" => $formula,
        "order_by" => $order_by,
        "status" => $status,
    ));
}
