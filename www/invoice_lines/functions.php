<?php

// plugin = invoice_lines
// creation date : 
// 
// 
function invoice_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM invoice_lines WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoice_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM invoice_lines WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoice_lines_list() {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT * FROM invoice_lines ORDER BY id DESC ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function invoice_lines_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM invoice_lines WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function invoice_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM invoice_lines WHERE id=? ");
    $req->execute(array($id));
}

function invoice_lines_edit($id, $invoice_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax) {

    global $db;
    $req = $db->prepare(" UPDATE invoice_lines SET "
            . "invoice_id=:invoice_id , "
            . "code=:code , "
            . "quantity=:quantity , "
            . "description=:description , "
            . "price=:price , "
            . "discounts=:discounts , "
            . "discounts_mode=:discounts_mode , "
            . "tax=:tax "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "invoice_id" => $invoice_id,
        "code" => $code, "quantity" => $quantity,
        "description" => $description, "price" => $price,
        "discounts" => $discounts, "discounts_mode" => $discounts_mode,
        "tax" => $tax
    ));
}

function invoice_lines_add(
        $invoice_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
) {
    global $db;
    $req = $db->prepare(" INSERT INTO `invoice_lines` ( `id` ,   `invoice_id` ,   `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :invoice_id ,  :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "invoice_id" => $invoice_id,
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

function invoice_lines_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM invoice_lines 
    
            WHERE id like :txt OR id like :txt
OR invoice_id like :txt
OR code like :txt
OR quantity like :txt
OR description like :txt
OR price like :txt
OR discounts like :txt
OR discounts_mode like :txt
OR tax like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function invoice_lines_search_by_description($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM invoice_lines WHERE description like :txt ");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function invoice_lines_search_by_description_distinct() {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT *, AVG(price) as price FROM invoice_lines GROUP BY description  ORDER BY description");
    $req->execute();
    $data = $req->fetchall();
    return $data;
}

function invoice_lines_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (invoice_lines_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function invoice_lines_is_id($id) {
    return true;
}

function invoice_lines_is_invoice_id($invoice_id) {
    return true;
}

function invoice_lines_is_code($code) {
    return true;
}

function invoice_lines_is_quantity($quantity) {
    return true;
}

function invoice_lines_is_description($description) {
    return true;
}

function invoice_lines_is_price($price) {
    return true;
}

function invoice_lines_is_discounts($discounts) {
    return true;
}

function invoice_lines_is_discounts_mode($discounts_mode) {
    return true;
}

function invoice_lines_is_tax($tax) {
    return true;
}

function invoice_lines_is_order_by($order_by) {
    return true;
}

function invoice_lines_is_status($status) {
    return true;
}

// https://businessdatabase.indicator.be/tva/une_remise__pour_la_tva_aussi__/WAACIMAR_EU121904/1/related

function invoice_lines_list_by_invoice_id($id) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT id, invoice_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,       ((quantity * price) - discounts) )) as subtotal, "
            . " if( discounts_mode = '%' ,   ((quantity * price) * discounts )/100 ,       discounts ) as totaldiscounts, "
            . " if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            . ""
            . "FROM invoice_lines WHERE invoice_id = :id ORDER BY order_by, id  ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function invoice_lines_list_transport_by_invoice_id($id) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT id, invoice_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "
            . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            . ""
            . "FROM invoice_lines WHERE invoice_id = :id AND (code IN (SELECT code FROM `transport` )) ORDER BY order_by DESC, id  ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function invoice_lines_list_without_transport_by_invoice_id($id) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT id, invoice_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "
            . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            . ""
            . "FROM invoice_lines WHERE invoice_id = :id AND (code is NULL OR code NOT IN (SELECT code FROM `transport` )) ORDER BY order_by, id  ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function invoice_lines_subtotal_by_invoice($invoice_id) {
    global $db;

    $data = 0;

    $req = $db->prepare('SELECT * FROM invoice_lines WHERE id= ?');
    $req->execute(array($invoice_id));

    $data = $req->fetch();

    return $data[0];
}

function invoice_lines_totalHTVA($invoice_id) {
    global $db;

    $data = null;

    //$req = $db->prepare("SELECT SUM(((quantity * price)-discounts) * (tax/100))  as total  FROM invoice_lines WHERE invoice_id=:invoice_id ");
    // $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,( (quantity * price) - ( (quantity * price) * discounts) / 100), ((quantity * price) - discounts) )) as total  FROM invoice_lines WHERE invoice_id=:invoice_id ");
    $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100), ((quantity * price) - discounts) )) as total  FROM invoice_lines WHERE invoice_id=:invoice_id ");

    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function invoice_lines_totalTVA($invoice_id) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) ) ) as total  FROM invoice_lines WHERE invoice_id=:invoice_id ");

    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

/**
 * 
 * @global type $db
 * @param type $invoice_id
 * @param type $tax
 * @return type
 */
function invoice_lines_total_by_tax($invoice_id, $tax) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) )  )  as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");

    $req->execute(array(
        "tax" => $tax,
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

/**
 * 
 * @global type $db
 * @param type $invoice_id
 * @param type $tax
 * @return type
 */
function invoice_lines_sum_lines_by_tax($invoice_id, $tax) {
    global $db;

    $data = null;

    //$req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) )  )  as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");
    $req = $db->prepare("SELECT SUM( quantity * price ) as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");

    $req->execute(array(
        "tax" => $tax,
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

/**
 * 
 * @global type $db
 * @param type $invoice_id
 * @param type $tax
 * @return type
 */
function invoice_lines_sum_lines_discounts_by_tax($invoice_id, $tax) {
    global $db;
    $data = null;
    //$req = $db->prepare("SELECT SUM( quantity * price ) as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");
    //$req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) )  )  as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");
    $req = $db->prepare("
            
            SELECT SUM( 
                    if
                (discounts_mode = '%', 
                    ((quantity*price)-((quantity*price)*discounts)/100) , 
                    
                    discounts
                            
                            )     
                    )  as total
                    
                            FROM invoice_lines 
                            WHERE invoice_id=:invoice_id AND tax=:tax");

    $req->execute(array(
        "tax" => $tax,
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

/**
 * Cuantos items (cantidad) segun la tax
 * @global type $db
 * @param type $invoice_id
 * @param type $tax
 * @return type
 */
function invoice_lines_total_items_by_tax($invoice_id, $tax) {
    global $db;

    $data = null;
    //$req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) )  )  as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");
    $req = $db->prepare("SELECT SUM( quantity ) as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");
    $req->execute(array(
        "tax" => $tax,
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (int) $data[0];
}

function invoice_lines_list_code_by_invvoice_id($id) {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT code FROM invoice_lines WHERE invoice_id = :id ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall(PDO::FETCH_COLUMN, 0);
    return $data;
}

/**
 * Deberia aceptar float    
 * @global type $db
 * @param type $invoice_id
 * @return type
 */
function invoice_lines_total_discount($invoice_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT SUM(discounts)  as total  FROM invoice_lines WHERE invoice_id=:invoice_id ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (int) $data[0];
}

function invoice_lines_average_tax($invoice_id) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT AVG(tax)  FROM invoice_lines WHERE invoice_id=:invoice_id ");

    $req->execute(array(
        "invoice_id" => $invoice_id,
    ));
    $data = $req->fetch();
    return $data[0];
}

////////////////////////////////////////////////////////////////////////////////
function invoice_lines_search_by_client_id($client_id) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM invoice_lines 
            WHERE invoice_id IN (SELECT id FROM invoices WHERE client_id =:client_id )            
            ORDER BY invoice_id DESC
        ");
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

function invoice_lines_search_by_year_month($year, $month) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM invoice_lines 
            WHERE invoice_id = :invoice_id
            ORDER BY invoice_id DESC
        ");
    $req->execute(array(
        "invoice_id" => 344
    ));
    $data = $req->fetchall();
    return $data;
}

//
function invoice_lines_next_order_by($invoice_id) {
    global $db;
    $req = $db->prepare("SELECT max(order_by) FROM invoice_lines WHERE invoice_id = :invoice_id  LIMIT 1  ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return $data[0] + 1;
}
