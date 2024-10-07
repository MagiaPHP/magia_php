<?php

function budget_lines_list_by_budget_id_extended($id) {
    global $db;
    $data = null;

    //             (SELECT `category` FROM `budgets_categories` WHERE code = `category_code` ) as `category`
    // ALTER TABLE `budget_lines` ADD `category_code` INT(11) NULL DEFAULT NULL AFTER `order_id`; 

    $req = $db->prepare("
            SELECT id, budget_id, order_id, code, quantity, 
            description, price
            ,            
            (quantity * price ) as `subtotal`
            ,
            discounts, discounts_mode, tax             
            , 
            (SELECT `category` FROM `budgets_categories` WHERE code = `category_code` ) as `category`            

            ,             
            CASE 
                WHEN `discounts_mode` = '%'    THEN ( ( `quantity` * `price` ) * ( `discounts` / 100 ) )
                WHEN `discounts_mode` = 'EUR'  THEN `discounts`
                WHEN `discounts_mode` = 'UNIT' THEN ( `quantity` * `discounts`  )
            END as `total_discounts`                                       
            ,                                    
            CASE
                WHEN `discounts_mode` = '%'    THEN (((`quantity` * `price`) - (((`quantity` * `price`) * (`discounts` / 100))) ) * tax ) / 100
                WHEN `discounts_mode` = 'EUR'  THEN (((`quantity` * `price`)  - (`discounts`)) * tax ) / 100
                WHEN `discounts_mode` = 'UNIT' THEN ((`quantity` * (`price` - `discounts`)) * tax ) / 100
            END as ttva
            ,
            `order_by`
            , 
            status
            FROM `budget_lines` 
            WHERE `budget_id` = :id 
            ORDER BY `order_by` , `id`            
            ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

// cantidad por precio
function budgets_lines_sum_subtotal($budget_id) {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT SUM(quantity * price) as total  FROM budget_lines WHERE budget_id= ?');
    $query->execute(array($budget_id));
    $data = $query->fetch();
    return $data[0];
}

// Suma de las colunas descuento 
function budgets_lines_sum_discounts($budget_id) {
    global $db;
    $data = 0;
    $query = $db->prepare(
            "
    SELECT 

    SUM(
    CASE
    WHEN `discounts_mode` = '%' THEN (((`quantity` * `price`) * (`discounts` / 100)))
            WHEN `discounts_mode` = 'EUR' THEN (`discounts`)
            WHEN `discounts_mode` = 'UNIT' THEN ((`quantity` * `discounts`))
    END
    ) as `total_discounts`
    
FROM `budget_lines`
    
WHERE budget_id =?
            
            
            
");
    $query->execute(array($budget_id));
    $data = $query->fetch();
    return $data['total_discounts'];
}

function budgets_lines_sum_htva($budget_id) {
    $res = budgets_lines_sum_subtotal($budget_id) - budgets_lines_sum_discounts($budget_id);
    return $res;
}

function budgets_lines_sum_tax($budget_id) {
    global $db;
    $data = 0;

    $query = $db->prepare(
            "
    SELECT 

    SUM(
    CASE
    WHEN `discounts_mode` = '%'    THEN (((`quantity` * `price`) - (((`quantity` * `price`) * (`discounts` / 100))) ) * tax ) / 100
    WHEN `discounts_mode` = 'EUR'  THEN (((`quantity` * `price`)  - (`discounts`)) * tax ) / 100
    WHEN `discounts_mode` = 'UNIT' THEN ((`quantity` * (`price` - `discounts`)) * tax ) / 100
    END
    ) as `sum_tax`
    
FROM `budget_lines`
    
WHERE budget_id =?
            
    ");

    $query->execute(array($budget_id));
    $data = $query->fetch();
    return $data[0];
}

function budgets_lines_sum_tvac($budget_id) {
    $res = budgets_lines_sum_htva($budget_id) + budgets_lines_sum_tax($budget_id);
    return $res;
}

function budget_lines_list_code_by_budget_id($id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT code FROM budget_lines WHERE budget_id = :id ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall(PDO::FETCH_COLUMN, 0);
    return $data;
}

function budget_lines_list_by_budget_id_without_transport($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, budget_id, code, quantity, description, price, discounts, discounts_mode, tax, order_by,   ( "
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "
            . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            . ""
            . "FROM budget_lines WHERE budget_id = :id AND ( code is NULL OR code NOT IN (SELECT code FROM `transport` ) ) ORDER BY order_by, id   ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_list_transport_by_budget_id($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, budget_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "
            . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            . ""
            . "FROM budget_lines WHERE budget_id = :id AND code IN (SELECT code FROM `transport` ) ORDER BY order_by DESC, id   ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_next_order_by($budget_id) {
    global $db;
    $req = $db->prepare("SELECT max(order_by) FROM budget_lines WHERE budget_id = :budget_id  LIMIT 1  ");
    $req->execute(array(
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return $data[0] + 1;
}

function budget_lines_list_tax_budget_id($id) {
    global $db;

    $data = null;

    $req = $db->prepare(
            "
            SELECT DISTINCT tax
            FROM budget_lines 
            WHERE budget_id = :id
            
            ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// plugin = budget_lines
// creation date : 
// 
// 
// https://businessdatabase.indicator.be/tva/une_remise__pour_la_tva_aussi__/WAACIMAR_EU121904/1/related
function budget_lines_list_by_budget_id($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, budget_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "
            . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            . ""
            . "FROM budget_lines WHERE budget_id = :id  ORDER BY order_by, id   ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_list_by_order_id($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, budget_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "
            . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            . ""
            . "FROM budget_lines WHERE order_id = :id ORDER BY order_by DESC, id   ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_list_by_order_id_without_transport($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, budget_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "
            . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            . ""
            . "FROM budget_lines WHERE order_id = :id AND ( code is NULL OR code NOT IN (SELECT code FROM `transport` ) ) ORDER BY order_by DESC, id   ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_list_orders_by_budget_id($id) {
    global $db;

    $data = null;

    $req = $db->prepare(
            "
            SELECT DISTINCT order_id
            FROM budget_lines 
            WHERE budget_id = :id
            
            ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_list_description_lines_by_budget_id($id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT description, price FROM budget_lines WHERE budget_id = :id ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_subtotal_by_budget($budget_id) {
    global $db;

    $data = 0;

    $req = $db->prepare('SELECT * FROM budget_lines WHERE id= ?');
    $req->execute(array($budget_id));

    $data = $req->fetch();

    return $data[0];
}

function budget_lines_total_by_order_id($order_id) {
    global $db;
    $limit = 999;

    $data = null;

    //$req = $db->prepare("SELECT SUM(((quantity * price)-discounts) * (tax/100))  as total  FROM budget_lines WHERE budget_id=:budget_id ");
    // $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,( (quantity * price) - ( (quantity * price) * discounts) / 100), ((quantity * price) - discounts) )) as total  FROM budget_lines WHERE budget_id=:budget_id ");
    $req = $db->prepare(
            "SELECT SUM(if( discounts_mode = '%' ,
            (( (quantity * price) - ( (quantity * price) * discounts) / 100)) * (1+(tax/100)), 
            ( ((quantity * price) - discounts)) * (1+(tax/100)) )) 
            as total  FROM budget_lines WHERE order_id=:order_id ");

    $req->execute(array(
        "order_id" => $order_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_total_by_order_id_without_transport($order_id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare(
            "SELECT SUM(if( discounts_mode = '%' ,
            (( (quantity * price) - ( (quantity * price) * discounts) / 100)) * (1+(tax/100)), 
            ( ((quantity * price) - discounts)) * (1+(tax/100)) )) 
            as total  FROM budget_lines WHERE order_id=:order_id AND ( code is NULL OR code NOT IN (SELECT code FROM `transport` ) ) ");
    $req->execute(array(
        "order_id" => $order_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_total_sin_tax_by_order_id_without_transport($order_id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare(
            "SELECT SUM(if( discounts_mode = '%' ,
            (( (quantity * price) - ( (quantity * price) * discounts) / 100)) , 
            ( ((quantity * price) - discounts))  )) 
            as total  FROM budget_lines WHERE order_id=:order_id AND ( code is NULL OR code NOT IN (SELECT code FROM `transport` ) ) ");
    $req->execute(array(
        "order_id" => $order_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_sum_lines_by_tax($budget_id, $tax) {
    global $db;
    $limit = 999;

    $data = null;

    //$req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) )  )  as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");
    $req = $db->prepare("SELECT SUM( quantity * price ) as total  FROM budget_lines WHERE budget_id=:budget_id AND tax=:tax");

    $req->execute(array(
        "tax" => $tax,
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return $data[0];
}

/**
 * 
 * @global type $db
 * @param type $budget_id
 * @return type
 */
function budget_lines_total_discount($budget_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT SUM(discounts)  as total  FROM budget_lines WHERE budget_id=:budget_id ");

    $req->execute(array(
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_average_tax($budget_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT AVG(tax)  FROM budget_lines WHERE budget_id=:budget_id ");

    $req->execute(array(
        "budget_id" => $budget_id,
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_add_with_order_id(
        $budget_id, $order_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
) {
    global $db;

    $req = $db->prepare(" INSERT INTO `budget_lines` ( `id` ,   `budget_id` , `order_id`,  `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :budget_id , :order_id,  :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "budget_id" => $budget_id,
        "order_id" => $order_id,
        "code" => $code,
        "quantity" => $quantity,
        "description" => $description,
        "price" => $price,
        "discounts" => $discounts,
        "discounts_mode" => $discounts_mode,
        "tax" => $tax,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function budget_lines_remove_lines_by_order_id($order_id, $budget_id) {
    global $db;

    $req = $db->prepare(
            "DELETE FROM `budget_lines` WHERE `budget_lines`.`order_id` = :order_id  AND budget_id = :budget_id"
    );
    $req->execute(array(
        "order_id" => $order_id,
        "budget_id" => $budget_id
    ));
    return $db->lastInsertId();
}

function budget_lines_description_update($id, $description) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `description`=:description WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "description" => $description,
    ));
}

function budget_lines_total_by_tax($budget_id, $tax = null) {
    // Conexión a la base de datos
    global $db;

    // Construir la consulta SQL, incluyendo el presupuesto ($budget_id) y opcionalmente el impuesto ($tax)
    $sql = "
        SELECT 
            tax, 
            SUM(quantity * price * (1 - (discounts / 100))) AS total 
        FROM 
            budget_lines 
        WHERE 
            budget_id = ?"; // Filtro obligatorio por budget_id
    // Si el parámetro tax no es nulo, agregamos un filtro adicional
    if ($tax !== null) {
        $sql .= " AND tax = ?";
    }

    // Agrupamos por el valor de tax
    $sql .= " GROUP BY tax";

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $db->prepare($sql);

    // Vincular parámetros (budget_id y, si aplica, tax)
    if ($tax !== null) {
        $stmt->bind_param("ii", $budget_id, $tax); // 2 parámetros: budget_id y tax
    } else {
        $stmt->bind_param("i", $budget_id); // Solo budget_id
    }

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        $totals_by_tax = array();

        // Iterar sobre los resultados y guardarlos en un array asociativo
        while ($row = $result->fetch_assoc()) {
            $totals_by_tax[$row['tax']] = $row['total'];
        }

        // Cerrar la conexión y la declaración preparada
        $stmt->close();

        // Devolver los totales por impuesto
        return $totals_by_tax;
    } else {
        // Si no hay resultados, devolver un array vacío
        $stmt->close();
        return array();
    }
}
