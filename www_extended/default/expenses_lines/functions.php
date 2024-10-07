<?php

//function expenses_lines_list_by_expense_id($id, $start = 0, $limit = 999999) {
//    global $db;
//    $data = null;
//    $sql = "
//            SELECT *   
//            FROM `expenses_lines` WHERE expense_id = :id 
//            ORDER BY `order_by` DESC, `id` DESC  
//            Limit  :limit OFFSET :start  ";
//
//    $query = $db->prepare($sql);
//
//    $query->bindValue(':id', (int) $id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
//
//    $query->execute();
//
//    $data = $query->fetchall();
//
//    return $data;
//}
//
function expenses_lines_next_order_by($expense_id) {
    global $db;
    $req = $db->prepare("SELECT max(order_by) FROM expenses_lines WHERE expense_id = :expense_id  LIMIT 1  ");
    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return $data[0] + 1;
}

function expenses_lines_list_by_expense_id($id) {
//    // hay un extended
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT id, expense_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
//            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,       ((quantity * price) - discounts) )) as subtotal, "
//            . " if( discounts_mode = '%' ,   ((quantity * price) * discounts )/100 ,       discounts ) as totaldiscounts, "
//            . " if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
//            . ""
//            . "FROM expenses_lines WHERE expense_id = :id ORDER BY order_by, id  ");
//
//    $req->execute(array(
//        "id" => $id
//    ));
//    $data = $req->fetchall();
//    return $data;
}

function expenses_lines_list_by_expense_id_extended($id) {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT id, expense_id, budget_id, category_code,  code, quantity, 
            description, price
            ,            
            (quantity * price ) as `subtotal`
            ,
            discounts, discounts_mode, tax             
            ,            
            (SELECT `category` FROM `expenses_categories` WHERE code = `category_code` ) as `category`
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
            FROM `expenses_lines` 
            WHERE `expense_id` = :id 
            ORDER BY `order_by` , `id`            
            ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

//function expenses_lines_totalHTVA($expense_id) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100), ((quantity * price) - discounts) )) as total  FROM expenses_lines WHERE expense_id=:expense_id ");
//    $req->execute(array(
//        "expense_id" => $expense_id
//    ));
//    $data = $req->fetch();
//    return (float) $data[0];
//}
//function expenses_lines_totalTVA($expense_id) {
//    global $db;
//
//    $data = null;
//
//    $req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) ) ) as total  FROM expenses_lines WHERE expense_id=:expense_id ");
//
//    $req->execute(array(
//        "expense_id" => $expense_id
//    ));
//    $data = $req->fetch();
//    return (float) $data[0];
//}


function expenses_lines_total_by_tax($expense_id, $tax) {
    global $db;

    $data = null;

    $req = $db->prepare(
            "
    SELECT 

    SUM(
        CASE
            WHEN `discounts_mode` = '%'    THEN (((`quantity` * `price`) - (((`quantity` * `price`) * (`discounts` / 100))) ) * tax ) / 100
            WHEN `discounts_mode` = 'EUR'  THEN (((`quantity` * `price`)  - (`discounts`)) * tax ) / 100
            WHEN `discounts_mode` = 'UNIT' THEN ((`quantity` * (`price` - `discounts`)) * tax ) / 100
        END
    ) as `sum_tax`
    
FROM `expenses_lines`
    
WHERE expense_id = :expense_id AND tax = :tax 
            
            
            
"
    );

    $req->execute(array(
        "tax" => $tax,
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function expenses_lines_update(
        $id, $expense_id, $category_code, $code,
        $quantity, $description, $price, $discounts, $discounts_mode,
        $tax) {

    global $db;
    $req = $db->prepare("
        UPDATE `expenses_lines`
        SET
        `expense_id` = :expense_id,
         `category_code` = :category_code,
         `code` = :code,
         `quantity` = :quantity,
         `description` = :description,
         `price` = :price,
         `discounts` = :discounts,
         `discounts_mode` = :discounts_mode,
         `tax` = :tax         
        WHERE `id` = :id

");
    $req->execute(array(
        "id" => $id,
        "expense_id" => $expense_id,
        "category_code" => $category_code,
        "code" => $code,
        "quantity" => $quantity,
        "description" => $description,
        "price" => $price,
        "discounts" => $discounts,
        "discounts_mode" => $discounts_mode,
        "tax" => $tax,
//        "order_by" => $order_by,
//        "status" => $status,
    ));
}

// cantidad por precio
function expenses_lines_sum_subtotal($expense_id) {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT SUM(quantity * price) as total  FROM expenses_lines WHERE expense_id= ?');
    $query->execute(array($expense_id));
    $data = $query->fetch();
    return $data[0];
}

// Suma de las colunas descuento 
function expenses_lines_sum_discounts($expense_id) {
    global $db;
    $data = 0;
    $query = $db->prepare(
            "
    SELECT 
        SUM(
            CASE
                WHEN `discounts_mode` = '%' THEN 
                    CASE
                        WHEN `discounts` > 0 THEN 
                            ((`quantity` * `price`) * (`discounts` / 100))
                        ELSE 
                            0
                    END
                WHEN `discounts_mode` = 'EUR' THEN 
                    (`discounts`)
                WHEN `discounts_mode` = 'UNIT' THEN 
                    ((`quantity` * `discounts`))
            END
        ) as `total_discounts`

FROM `expenses_lines`    
WHERE expense_id =?                                    
");
    $query->execute(array($expense_id));
    $data = $query->fetch();
    return $data['total_discounts'];
}

function expenses_lines_sum_htva($expense_id) {
    $res = expenses_lines_sum_subtotal($expense_id) - expenses_lines_sum_discounts($expense_id);
    return $res;
}

function expenses_lines_sum_tax($expense_id) {
    global $db;
    $data = 0;

    $query = $db->prepare(
            "
    SELECT 

   SUM(
    CASE
        WHEN `discounts_mode` = '%' THEN 
            CASE 
                WHEN `discounts` > 0 THEN 
                    ((`quantity` * `price`) - (((`quantity` * `price`)* `discounts` )/100 )) * (`tax` / 100)
                WHEN `discounts` = 0 OR `discounts` IS NULL THEN 
                    ((`quantity` * `price`) ) * (`tax` / 100)
            END
        WHEN `discounts_mode` = 'EUR' THEN 
            (((`quantity` * `price`)  - (`discounts`)) * `tax` ) / 100
        WHEN `discounts_mode` = 'UNIT' THEN 
            ((`quantity` * (`price` - `discounts`)) * `tax` ) / 100
    END
) as `sum_tax`

    
FROM `expenses_lines`
    
WHERE expense_id = ?
            
    ");

    $query->execute(array($expense_id));
    $data = $query->fetch();
    return $data[0];
}

function expenses_lines_totalHTVA($expense_id) {
    global $db;

    $data = null;

    $req = $db->prepare(
            "
            SELECT 

                SUM(
                    CASE
                        WHEN `discounts_mode` = '%' THEN 
                            CASE
                                WHEN `discounts` > 0 THEN (price * quantity) - (((price * quantity) * discounts) / 100 )
                                WHEN `discounts` = 0 OR `discounts` IS NULL THEN price * quantity
                            END
                        WHEN `discounts_mode` = 'EUR' THEN quantity * price - discounts
                        WHEN `discounts_mode` = 'UNIT' THEN quantity * (price - discounts)
                    END
                ) AS total

            

FROM `expenses_lines` WHERE `expense_id` = :expense_id ");

    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function expenses_lines_totalTVA($expense_id) {
    global $db;

    $data = null;

    $req = $db->prepare(
            "
   SELECT 
        SUM(
            CASE
                WHEN `discounts_mode` = '%' THEN
                    CASE
                        WHEN `discounts` > 0 THEN (((`quantity` * `price`) - (((`quantity` * `price`) * (`discounts` / 100)))) * `tax` ) / 100
                        WHEN `discounts` = 0 THEN (((`quantity` * `price`) * `tax` ) / 100)
                        WHEN `discounts` IS NULL THEN (((`quantity` * `price`) * `tax` ) / 100)
                    END
                WHEN `discounts_mode` = 'EUR' THEN ((((`quantity` * `price`) - (`discounts`)) * `tax` ) / 100 )
                WHEN `discounts_mode` = 'UNIT' THEN (((`quantity` * (`price` - `discounts`)) * `tax` ) / 100 )
            END
        ) as total 
        
    FROM 
        expenses_lines 
    WHERE 
        expense_id=:expense_id
    "
    );

    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function expenses_lines_sum_tvac($expense_id) {
    $res = expenses_lines_sum_htva($expense_id) + expenses_lines_sum_tax($expense_id);
    return $res;
}
