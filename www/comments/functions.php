<?php

// plugin = comments
// creation date : 
// 
// 
function comments_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_list($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT id, date, sender_id, doc, doc_id, comment, order_by, status FROM `comments` ORDER BY date DESC , id DESC   Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function comments_details($id) {
    global $db;
    $req = $db->prepare(
            "SELECT 
                c.id, c.date, c.sender_id, c.doc, c.doc_id, c.comment, c.order_by, c.status, 
                cr.order_id, cr.contact_id, cr.date_read 
            FROM comments as c 
            JOIN comments_read as cr  
            ON c.doc = 'orders' 
            WHERE c.id =  :id 
            
            ");
    $req->execute(array(
        'id' => $id
    ));
    $data = $req->fetch();
    return $data;
}

function comments_details_by_order($order_id) {
    global $db;
    $req = $db->prepare(
            "SELECT 
                c.id, c.date, c.sender_id, c.doc, c.doc_id, c.comment, c.order_by, c.status, 
                cr.order_id, cr.contact_id, cr.date_read 
            FROM comments as c 
            JOIN comments_read as cr  
            ON c.doc = 'orders'
            WHERE c.doc_id =  :order_id AND c.doc_id = : :order_id
            
            ");
    $req->execute(array(
        'order_id' => $order_id
    ));
    $data = $req->fetch();
    return $data;
}

function comments_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM comments WHERE id=? ");
    $req->execute(array($id));
}

function comments_edit($id, $date, $sender_id, $doc, $doc_id, $comment, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE comments SET "
            . "date=:date , "
            . "sender_id=:sender_id , "
            . "doc=:doc , "
            . "doc_id=:doc_id , "
            . "comment=:comment , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "date" => $date, "sender_id" => $sender_id, "doc" => $doc, "doc_id" => $doc_id, "comment" => $comment, "order_by" => $order_by, "status" => $status,
    ));
}

function comments_add($date, $sender_id, $doc, $doc_id, $comment, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `comments` ( `id` ,   `date` ,   `sender_id` ,   `doc` ,   `doc_id` ,   `comment` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :date ,  :sender_id ,  :doc ,  :doc_id ,  :comment ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "date" => $date,
        "sender_id" => $sender_id,
        "doc" => $doc,
        "doc_id" => $doc_id,
        "comment" => $comment,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function comments_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM comments 
    
            WHERE id like :txt OR id like :txt
OR date like :txt
OR sender_id like :txt
OR doc like :txt
OR doc_id like :txt
OR comment like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (comments_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function comments_is_id($id) {
    return true;
}

function comments_is_date($date) {
    return true;
}

function comments_is_sender_id($sender_id) {
    return true;
}

function comments_is_doc($doc) {
    return true;
}

function comments_is_doc_id($doc_id) {
    return true;
}

function comments_is_comment($comment) {
    return true;
}

function comments_is_order_by($order_by) {
    return true;
}

function comments_is_status($status) {
    return true;
}

function comments_search_by_controller_doc_id($doc, $doc_id) {
    global $db;
    $data = null;
//    $req = $db->prepare("SELECT * FROM comments WHERE  doc =:doc AND doc_id = :doc_id AND status = 1");
    $req = $db->prepare(
            "SELECT *  
            FROM `comments` 
            
            WHERE
            (
            doc = :doc AND 
            doc_id = :doc_id 
            ) AND status = 1
            
");
    $req->execute(array(
        "doc" => $doc,
        "doc_id" => $doc_id
    ));
    $data = $req->fetchall();

    return $data;
}

function comments_search_by_sender_id($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM comments WHERE  sender_id =:sender_id AND status = 1 ORDER BY id desc LIMIT 100 ");
    $req->execute(array(
        "sender_id" => $contact_id
    ));
    $data = $req->fetchall();

    return $data;
}

function comments_change_status($id, $new_status) {

    if ($id) {
        global $db;
        $req = $db->prepare('UPDATE comments SET status=:new_status WHERE id=:id');
        $req->execute(array(
            'new_status' => $new_status,
            'id' => $id));
    }
}

function comments_total_by_order($order_id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM comments WHERE `doc` = "orders" AND `doc_id` = ? AND `status` = 1 ');
    $req->execute(array($order_id));
    $data = $req->fetchall();
    return $data[0][0];
    //return $order_id ;
}

function comments_total_by_order_status($order_id, $status) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM comments WHERE `doc` = "orders" AND `doc_id` = :order_id AND `status` = :status ');
    $req->execute(array(
        "order_id" => $order_id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data[0][0];
    //return $order_id ;
}

function comments_search_by_doc($doc) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM comments WHERE  doc = :doc ORDER BY id desc ");
    $req->execute(array(
        "doc" => $doc
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_search_by_doc_doc_id($doc, $doc_id) {
    global $db;
    $data = null;

    $req = $db->prepare(
            " SELECT 
               c.id, c.date, c.sender_id, c.doc, c.doc_id, c.comment, c.order_by, c.status, 
               cr.order_id, cr.contact_id, cr.date_read
               
            FROM comments as c
            JOIN comments_read as cr ON c.doc_id = cr.order_id


            WHERE c.doc = :doc AND c.doc_id = :doc_id
        
        ORDER BY c.id desc ");

    $req->execute(array(
        "doc" => $doc,
        "doc_id" => $doc_id
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_search_by_order_id($order_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM comments WHERE  doc = :doc AND doc_id =:order_id  ORDER BY id desc ");
    $req->execute(array(
        "doc" => 'orders',
        "order_id" => $order_id
    ));
    $data = $req->fetchall();

    return $data;
}

function comments_by_contact($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT c.id, c.date, c.sender_id, c.doc, c.doc_id, c.comment, c.order_by, c.status, 
            cr.order_id, cr.contact_id, cr.date_read 
            FROM `comments` as c 
            JOIN comments_read as cr 
            ON c.doc_id = cr.order_id 
            WHERE
            (
            c.doc = :doc AND 
            cr.contact_id = :contact_id 
            ) AND 
            
            c.status = 1
            AND 
            c.date > NOW()
");
    $req->execute(array(
        "doc" => 'orders',
        "contact_id" => $contact_id
    ));
    $data = $req->fetchall();

    return $data;
}

/**
 * any_value Error en local 
 * any_value ok en server
 * 
 * @global type $db
 * @return type
 */
function comments_list_orders() {
    global $db;
    $data = null;
// Me da error por eso remplaso * por doc_id  
    //https://dev.mysql.com/doc/refman/5.7/en/group-by-handling.html
    //
    // si pongo ANY_VALUE vale en el servidor pero no en local 
    // ANY_VALUE
    // 
    // Hay tres lugares cambiar en shop tambien 
    // shop_comments_list_orders_by_company
    // 
    // shop_comments_list_orders_by_office
    // 
    //
    //
    //
    // https://stackoverflow.com/questions/41887460/select-list-is-not-in-group-by-clause-and-contains-nonaggregated-column-inc
    $req = $db->prepare(
            "
            SELECT `doc_id`, ANY_VALUE(`date`), `doc` 
            FROM `comments` 
            WHERE  `doc` = :doc AND doc_id IN (SELECT id FROM `orders` WHERE status >=10 AND status <=100 )
            GROUP BY (`doc_id`) 
            ORDER BY MAX(`date`) desc  ");
//            
//    $req = $db->prepare("SELECT * FROM comments WHERE doc_id IN () ORDER BY date DESC LIMIT 1");
//    $req = $db->prepare("SELECT doc_id FROM comments WHERE  doc = :doc GROUP BY doc_id");
    $req->execute(array(
        "doc" => 'orders'
    ));
    $data = $req->fetchall();
    return $data;
}

/*
  SELECT c.id, MAX(TO_SECONDS(c.date)) as sec, c.sender_id, c.doc, c.doc_id, c.comment, c.order_by, c.status, cr.contact_id, cr.date_read, TO_SECONDS(cr.date_read) as sec_date_read FROM `comments` as c JOIN comments_read as cr ON c.doc_id = cr.order_id WHERE ( c.doc = 'orders' AND c.sender_id <> 2475 AND c.status = 1 ) ORDER BY `cr`.`date_read` DESC */

function comments_unread_by_contact($contact_id) {
    global $db;
    $data = null;
//    $req = $db->prepare(
//            "                
//            SELECT c.id, c.date, c.sender_id, c.doc, c.doc_id, c.comment, c.order_by, c.status, 
//            cr.contact_id, cr.date_read             
//            FROM `comments` as c 
//            LEFT JOIN comments_read as cr             
//            ON c.doc_id = cr.order_id             
//            GROUP BY c.doc_id 
//            ORDER BY c.doc_id DESC          
//            "
//    );
    $req = $db->prepare(
            "
            SELECT c.id, c.date, c.sender_id, c.doc, c.doc_id, c.comment, c.order_by, c.status, 
            cr.contact_id, cr.date_read   
            FROM `comments` as c 
            LEFT JOIN comments_read as cr  
            ON c.doc_id = cr.order_id   
            WHERE (c.doc = :doc AND c.sender_id <> :contact_id)                     
            "
    );
    $req->execute(array(
        "doc" => 'orders',
        "contact_id" => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

/**
 * Tiene comentarios no leidos este contacto 
 * @param type $contact_id
 * @return type
 */
function comments_has_unread_by_contact($contact_id) {

    foreach (comments_list_orders() as $comments_doc_line) {
        $last_read = comments_read_date_read_by_contact_order($contact_id, $comments_doc_line['doc_id']);
        $last_date_from_comments = comments_date_last_comment_by_order('orders', $comments_doc_line['doc_id']);

        if ($last_read < $last_date_from_comments) {
            return TRUE;
        }
    }

    return false;
}

function comments_total_unread_by_contact($contact_id) {
    return count(comments_unread_by_contact($contact_id));
}

function comments_unread_by_contact_from_order($contact_id, $order_id) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "                
            SELECT c.id, c.date, c.sender_id, c.doc, c.doc_id, c.comment, c.order_by, c.status, 
            cr.contact_id, cr.date_read             
            FROM `comments` as c 
            JOIN comments_read as cr 
            ON c.doc_id = cr.order_id             
            WHERE 
                c.doc        = :doc 
            AND c.doc_id     = :order_id 
            AND c.sender_id <> :contact_id 
            AND c.date       > cr.date_read 
            AND c.status     = 1             
            ORDER BY `c`.`date` ASC             
            "
    );
    $req->execute(array(
        "doc" => 'orders',
        "contact_id" => $contact_id,
        "order_id" => $order_id,
    ));
    $data = $req->fetchall();

    return $data;
}

/**
 * Me entrega la ultima fecha de lectura de un comentario 
 * @global type $db
 * @param type $contact_id
 * @param type $order_id
 * @return type
 */
function comments_read_date_read_by_contact_order($contact_id, $order_id) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "                
                SELECT date_read 
                FROM comments_read 
                WHERE order_id = :order_id AND contact_id = :contact_id
            "
    );
    $req->execute(array(
        "contact_id" => $contact_id,
        "order_id" => $order_id
    ));
    $data = $req->fetch();
    return $data[0] ?? false;
}

// fecha mas reciente de un pedido

function comments_date_last_comment_by_order($doc, $order_id) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "                
                SELECT `date` 
                FROM `comments` 
                WHERE (doc = :doc AND  doc_id = :doc_id)
                ORDER BY `date` DESC
            
            "
    );
    $req->execute(array(
        "doc" => $doc,
        "doc_id" => $order_id,
    ));
    $data = $req->fetch();

    return $data[0];
}

function comments_read_my_last_visit($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "                
                SELECT MAX(date_read) 
                FROM comments_read 
                WHERE  contact_id = :contact_id
            "
    );
    $req->execute(array(
        "contact_id" => $contact_id
    ));
    $data = $req->fetch();
    return $data[0] ?? false;
}

function comments_date_last_comment($doc) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "                
                SELECT MAX(date) 
                FROM `comments` 
                WHERE (doc = :doc)
                ORDER BY `date` DESC
            
            "
    );
    $req->execute(array(
        "doc" => $doc
    ));
    $data = $req->fetch();

    return $data[0];
}
