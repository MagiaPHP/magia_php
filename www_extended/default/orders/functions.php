<?php

//
define("DELIVERY_DAYS_NORMAL", 4);
define("DELIVERY_DAYS_EXPRESS", 1);

function orders_can_add_comment($order_id) {
    $can = true;

    if (!$order_id) {
        return false;
    }

    $status = orders_field_id('status', $order_id);

    switch ($status) {
        case 110: //
        case -10:
        case 0:
            $can = false;
            break;

        default:
            $can = true;
            break;
    }

    return $can;
}

function orders_can_be_edit($order_id) {
    $can = false;
    if (!$order_id) {
        return false;
    }
    $status = orders_field_id('status', $order_id);

    if (in_array($status, orders_status_can_be_edit())) {
        $can = true;
    } else {
        $can = false;
    }
    return $can;
}

// se puede editar un pedido si esta en uno de estos sttaus
function orders_status_can_be_edit() {
//    0 Draf
//    10 registred
//    20 ready to scan
    return array(0, 10, 20, 30, 40, 60, 70, 110);
}

// se puede editar las lineas de un pedido si esta en un statos de los siguientes
function orders_status_can_be_edit_items() {
//    0 Draf
//    10 registred
//    20 ready to scan
    return array(0, 10, 20);
}

function orders_can_be_edit_items($order_id) {
    $can = false;

    if (!$order_id) {
        return false;
    }

    $status = orders_field_id('status', $order_id);

    if (in_array($status, orders_status_can_be_edit_items())) {
        $can = true;
    } else {
        $can = false;
    }

    return $can;
}

function orders_field_code($field, $code) {
    global $db;

    if (!$code) {
        return false;
    }

    $data = null;
    $req = $db->prepare("SELECT $field FROM orders WHERE code= ?");
    $req->execute(array(
        $code
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//require "includes/phpqrcode/qrlib.php";

function orders_QRcode_show($id) {
    return '<img src="qr.php?id=' . $id . ' "/>';
}

function orders_QRcode_create($id) {

//        error_reporting(E_ALL);
//        ini_set("display_errors", 1);      
    require "includes/phpqrcode/qrlib.php";

//$id = $_GET['id'];
// how to save PNG codes to server

    $tempDir = "img/QR/";

//$codeContents = 'This Goes From File';
// we need to generate filename somehow, 
// with md5 or with database ID used to obtains $codeContents...
//$fileName = '005_file_' . md5($codeContents) . '.png';
//$fileName = '005_file_' . md5($codeContents) . '.png';
    $fileName = "$id.png";

    $pngAbsoluteFilePath = $tempDir . $fileName;

// generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($id, $pngAbsoluteFilePath, false, QR_ECLEVEL_H, 4);
        //  echo 'File generated!';
        // echo '<hr />';
    } else {
        // echo 'File already generated! We can use this cached file to speed up site on common codes!';
        // echo '<hr />';
    }

//echo 'Server PNG File: ' . $pngAbsoluteFilePath;
//echo '<hr />';
// displaying
//echo '<img src="' . $urlRelativeFilePath . '" />';     
}

function orders_change_status($id, $new_status) {

    if ($id && $new_status) {
        global $db;
        $req = $db->prepare('UPDATE orders SET status=:new_status WHERE id=:id');
        $req->execute(array(
            'new_status' => $new_status,
            'id' => $id));
    }
}

function orders_detail_achat($id) {
    global $db;
    $detail = null;

    $req = $db->prepare('SELECT *
                FROM orders_lines INNER JOIN orders ON orders.id=orders_lines.order_id 
                WHERE orders.id=? ');

    $req->execute(array($id));
    $data = $req->fetchall();

    return ($data) ? $data : null;
}

function orders_detail($id) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM orders WHERE id=:id');
    $req->execute(array(
        'id' => $id
    ));
    $data = $req->fetchall();
    return ($data[0]) ? $data[0] : null;
}

function orders_get_address_delivery_id_by_order_id($order_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT JSON_UNQUOTE(JSON_EXTRACT(address_delivery, '$.id')) as address_delivery_id FROM orders WHERE id=:id");
    $req->execute(array(
        'id' => $order_id
    ));
    $data = $req->fetch();
    return ($data[0]) ? $data[0] : null;
}

//function orders_field_id($field, $id) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT $field FROM orders WHERE id= ?");
//    $req->execute(array($id));
//    $data = $req->fetch();
//    return $data[0];
//}

function orders_lines_field_id_by_side($field, $order_id, $side) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM orders_lines WHERE order_id=:order_id AND side=:side ");
    $req->execute(array(
        'order_id' => $order_id,
        'side' => $side,
    ));
    $data = $req->fetch();
    return (isset($data[$field])) ? $data[$field] : false;
}

function orders_lines_by_order_code_side($order_id, $code, $side) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM orders_lines WHERE order_id=:order_id AND code like :code AND side=:side ");
    $req->execute(array(
        'order_id' => $order_id,
        'code' => "$code%",
        'side' => $side,
    ));
    $data = $req->fetch();
    return (isset($data)) ? $data : false;
}

function orders_lines_order_id_side($order_id, $side) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM orders_lines WHERE order_id=:order_id AND side=:side ");
    $req->execute(array(
        'order_id' => $order_id,
        'side' => $side,
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function orders_lines_order_id($order_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM orders_lines WHERE order_id=:order_id  ORDER BY side, id");
    $req->execute(array(
        'order_id' => $order_id
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

//function orders_listxxxxx() {
//    global $db;
//    $limit = 10;
//
//    $data = null;
//
//    $req = $db->prepare("SELECT * FROM orders  ");
//
//    $req->execute(array(
//        'limit' => "$limit"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//function orders_search($txt) {
//    global $db;
//    $data = null;
//    $req = $db->prepare('SELECT * FROM orders WHERE name like :txt OR description like :txt ORDER BY name DESC');
//    $req->execute(array(
//        'txt' => "%$txt%"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//function orders_details($id) {
//    global $db;
//    $req = $db->prepare('SELECT * FROM orders WHERE id= ?');
//    $req->execute(array($id));
//    $data = $req->fetch();
//    return $data;
//}

function orders_del($id) {
    global $db;
    $req = $db->prepare('DELETE FROM orders WHERE id=?');
    $req->execute(array($id));
}

function orders_update_date_delivery($order_id, $date_delivery) {
    global $db;
    $req = $db->prepare(
            'UPDATE orders 
             SET    date_delivery = :date_delivery  
             WHERE id=:order_id  ');

    $req->execute(array(
        'order_id' => $order_id,
        'date_delivery' => $date_delivery,
            )
    );
}

function orders_update_create_by($order_id, $new_create_by_id) {
    global $db;
    $req = $db->prepare(
            'UPDATE orders 
             SET    create_by = :create_by  
             WHERE id=:order_id  ');

    $req->execute(array(
        'order_id' => $order_id,
        'create_by' => $new_create_by_id,
            )
    );
}

function orders_update_behalf_of($order_id, $new_contact_id) {
    global $db;
    $req = $db->prepare(
            'UPDATE orders 
             SET    behalf_of = :behalf_of  
             WHERE id=:order_id  ');

    $req->execute(array(
        'order_id' => $order_id,
        'behalf_of' => $new_contact_id,
            )
    );
}

function order_edit($id, $name, $quantity, $price, $description) {

    global $db;
    $req = $db->prepare('UPDATE orders SET name=:name, quantity=:quantity, price=:price, description=:description WHERE id=:id');
    $req->execute(array(
        'name' => $name,
        'quantity' => $quantity,
        'price' => $price,
        'description' => $description,
        'id' => $id));
}

function orders_addxxxxx($name, $quantity, $price, $description) {
    global $db;
    $req = $db->prepare('INSERT INTO orders (id,   name,  quantity,  price,  description, status)
                                       VALUES (:id, :name, :quantity, :price, :description, :status)');

    $req->execute(array(
        'id' => null,
        'name' => $name,
        'quantity' => $quantity,
        'price' => $price,
        'description' => $description,
        'status' => 0
            )
    );
}

function orders_cat_add($order_id, $category_id) {
    global $db;
    $req = $db->prepare('INSERT INTO orders_categories (id, order_id, category_id)
                                                      VALUES (:id, :order_id, :category_id)');
    $req->execute(array(
        'id' => null,
        'order_id' => $order_id,
        'category_id' => $category_id
            )
    );
}

function orders_cat_del($order_id, $category_id) {
    global $db;
    $req = $db->prepare('DELETE FROM orders_categories WHERE (category_id = :category_id AND order_id = :order_id)');
    $req->execute(array(
        'order_id' => $order_id,
        'category_id' => $category_id
            )
    );
}

function orders_by_category($id_category) {
    global $db;

    $data = null;

    //$req = $db->prepare('SELECT * FROM orders WHERE type_id= ?');
    $req = $db->prepare('SELECT * FROM `orders_categories` JOIN orders WHERE orders.id = orders_categories.order_id AND category_id = ?');
    $req->execute(array($id_category));
    $data = $req->fetchall();

    return ($data) ? $data : null;
}

function orders_total_by_category($id_category = false) {
    global $db;

    $data = 0;

    if ($id_category) {
        $req = $db->prepare('SELECT COUNT(*) FROM orders_categories WHERE category_id= ?');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM orders');
    }

    $req->execute(array($id_category));
    $data = $req->fetchall();

    return ($data[0][0]) ? $data[0][0] : null;
}

/**
 * 
 * @global type $db
 * @param type $status
 * @return type
 */
function orders_total_by_status($status = false) {
    global $db;

    $data = 0;

    if (isset($status)) {
        $req = $db->prepare('SELECT COUNT(*) FROM orders WHERE status= ?');
        $req->execute(array($status));
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM orders');
        $req->execute();
    }

    $data = $req->fetchall();

    return ($data[0][0]) ? $data[0][0] : null;
}

function orders_photos_update($id, $photo) {
    global $db;
    $req = $db->prepare('UPDATE orders_photos SET photo=:photo WHERE id=:id');
    $req->execute(array(
        'photo' => $photo,
        'id' => $id));
}

function orders_photos_add($order_id, $photo) {
    global $db;

    $p = (orders_photos($order_id)) ? "0" : "1";

    $req = $db->prepare('INSERT INTO orders_photos (id, order_id, photo, principal) VALUES (:id,:order_id,:photo,:principal)');
    $req->execute(array(
        'id' => null,
        'order_id' => $order_id,
        'photo' => $photo,
        'principal' => $p,
    ));
}

function orders_photos_principal($order_id, $w = 80, $h = 80) {
    global $db;
// si la foto existe, mostramos sino la por defecto 
    $data = false;
    $req = $db->prepare("SELECT photo FROM orders_photos WHERE order_id = :order_id AND principal = 1");
    $req->execute(array(
        'order_id' => $order_id));

    $data = $req->fetchall();

    $r = "<img class=\"img-responsive\" src=\"www/gallery/img/orders/art.png\" width=\"$w\" height=\"$h\" >";

    foreach ($data as $p) {
        if ($p[0] != "" && file_exists("www/gallery/img/orders/$p[0]")) {
            $r = "<img class=\"img-responsive\" src=\"www/gallery/img/orders/$p[0]\" width=\"$w\" height=\"$h\" >";
        }
    }



    return $r;
}

function orders_photos($order_id) {
    global $db;
    $data = false;
    $req = $db->prepare("SELECT * FROM orders_photos WHERE order_id = :order_id ORDER BY principal DESC");
    $req->execute(array(
        'order_id' => $order_id));

    $data = $req->fetchall();

    return ($data) ? $data : null;
}

function orders_photo_r($id, $w = false, $l = false) {
    // si la foto existe, mostramos sino la por defecto 
    $photo = orders_field_id("photo", $id);

    if (file_exists("www/gallery/img/orders/$photo")) {
        return "<img src=\"www/gallery/img/orders/$photo\" width=\"$w\">";
    } else {
        return "<img src=\"www/gallery/img/orders/art.png\" width=\"$w\">";
    }
}

/**
  function type_order_array() {
  global $db;
  $data = null;
  $req = $db->prepare('SELECT * FROM categories ORDER BY category');
  $req->execute();
  $data = $req->fetchall();
  return $data;
  }
 *//*
  function type_order($id) {
  global $db;
  $data = false;
  $req = $db->prepare("SELECT category FROM categories WHERE id = ? ");
  $req->execute();
  $data = $req->fetchall();
  return $data;
  }
 */

/**
 * 
 * @global type $db
 * @param type $order_id
 * @return type
 */
function orders_categories($order_id) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT category_id FROM orders_categories WHERE order_id = :order_id ");

    $req->execute(array(
        'order_id' => $order_id));

    $data = $req->fetchall();

    return ($data) ? $data : null;
}

function orders_categories_exists($order_id, $category_id) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT category_id FROM orders_categories WHERE order_id = :order_id AND category_id = :category_id ");

    $req->execute(array(
        'order_id' => $order_id,
        'category_id' => $category_id,
    ));

    $data = $req->fetchall();

    return ($data) ? $data : null;
}

/**
 * 
 * @global type $db
 * @param type $id
 * @return type
 */
function orders_photos_total($id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM orders_photos WHERE order_id= ?');
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data[0][0];
}

function orders_categories_delete_all($order_id) {
    global $db;

    $data = false;

    $req = $db->prepare("DELETE  FROM orders_categories WHERE order_id = :order_id ");

    $req->execute(array(
        'order_id' => $order_id));

    $data = $req->fetchall();

    return ($data) ? $data : null;
}

function order_bac_add($id, $bac) {

    global $db;
    $req = $db->prepare('UPDATE orders SET bac=:bac WHERE id=:id');
    $req->execute(array(
        'bac' => $bac,
        'id' => $id));
}

function order_bac_update($id, $bac) {

    global $db;
    $req = $db->prepare('UPDATE orders SET bac=:bac WHERE id=:id');
    $req->execute(array(
        'bac' => $bac,
        'id' => $id));
}

function order_bac_delete($id) {

    global $db;
    $req = $db->prepare('UPDATE orders SET bac=:bac WHERE id=:id');
    $req->execute(array(
        'bac' => null,
        'id' => $id));
}

function order_ref_add($id, $client_ref) {

    global $db;
    $req = $db->prepare('UPDATE orders SET client_ref=:client_ref WHERE id=:id');
    $req->execute(array(
        'client_ref' => $client_ref,
        'id' => $id));
}

function order_description($order_id, $side) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT description FROM orders_lines WHERE order_id=:order_id AND side=:side");
    $req->execute(array(
        'order_id' => $order_id,
        'side' => $side,
    ));
    $data = $req->fetchall();

    return $data;
}

function orders_bac_is_free($bac) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT id FROM orders WHERE bac=:bac      ");

    $req->execute(array(
        'bac' => $bac,
    ));

    $data = $req->fetchall();

    return ($data) ? $data : null;
}

function orders_client_ref_exist($company_id, $client_ref) {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT * FROM orders WHERE client_ref=:client_ref AND company_id=:company_id ");
    $req->execute(array(
        'client_ref' => "$client_ref",
        'company_id' => "$company_id",
    ));
    $data = $req->fetchall();
    return ($data) ? $data : null;
}

//function orders_is_via($via) {
//    return TRUE;
//}
//function orders_is_id($id) {
//    return TRUE;
//}
//function orders_is_comments($comments) {
//    return TRUE;
//}
//function orders_is_client_ref($client_ref) {
//    return TRUE;
//}
//function orders_is_express($express) {
//    return TRUE;
//}
//function orders_is_date_delivery($date) {
//    return TRUE;
//}

function orders_stats_total_by_status() {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT COUNT(*) as total, STATUS FROM `orders` GROUP BY status ");
    $req->execute(array(
    ));
    $data = $req->fetchall();
    return ($data) ? $data : null;
}

function orders_stats_total_by_statusss() {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT COUNT(*) as total, STATUS FROM `orders` GROUP BY status ");
    $req->execute(array(
    ));
    $data = $req->fetchall();
    return ($data) ? $data : null;
}

function orders_total_create_by($id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM orders WHERE create_by= ?');
    $req->execute(array($id));
    $data = $req->fetch();
    return ($data[0]) ? $data[0] : null;
}

function orders_total_create_by_status($id, $status) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM orders WHERE create_by= :create_by AND status = :status');
    $req->execute(array(
        "create_by" => $id,
        "status" => $status
    ));
    $data = $req->fetch();
    return ($data[0]) ? $data[0] : null;
}

function orders_total_by_patient_id($patient_id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM orders WHERE patient_id= ?');
    $req->execute(array($patient_id));
    $data = $req->fetch();
    return ($data[0]) ? $data[0] : null;
}

function orders_total_by_company_id($company_id) {

    $total = count(orders_list_by_company_id($company_id));

    return $total;
}

function orders_total_by_company_id_status($company_id, $status) {

    $total = count(orders_list_by_company_id_status($company_id, $status));
    return $total;
}

function orders_total_by_office_id($office_id) {

    $total = count(orders_list_by_office_id($office_id));
    return $total;
}

function orders_total_by_office_id_status($company_id, $status) {

    $total = count(orders_list_by_office_id_status($company_id, $status));
    return $total;
}

function orders_total_by_patient_id_status($patient_id, $status) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM orders WHERE patient_id= :patient_id AND status = :status');
    $req->execute(array(
        "patient_id" => $patient_id,
        "status" => $status
    ));
    $data = $req->fetch();
    return ($data[0]) ? $data[0] : null;
}

function orders_total_by_company_year_month($company_id, $year, $month) {
    global $db;
    $data = 0;

    $req = $db->prepare(
            "
            SELECT  company_id, date, COUNT(id) as total   
            
            FROM orders 
            
            WHERE company_id=:company_id AND EXTRACT(MONTH FROM date )=:month AND  EXTRACT(YEAR FROM date )=:year
            
          
            ");

    $req->execute(array(
        "company_id" => $company_id,
        "year" => $year,
        "month" => $month
    ));
    $data = $req->fetch();

    return ($data['total']) ? $data['total'] : null;
}

function orders_total_remakes_by_company_id($company_id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(remake) FROM orders WHERE company_id= ?');
    $req->execute(array($company_id));
    $data = $req->fetch();
    return $data[0];
}

function orders_total_remakes_by_company_year_month($company_id, $year, $month) {
    global $db;
    $data = 0;
    $req = $db->prepare(
            "
            SELECT  company_id, date, COUNT(remake) as total               
            FROM orders             
            WHERE company_id=:company_id AND EXTRACT(MONTH FROM date )=:month AND  EXTRACT(YEAR FROM date )=:year                      
            ");
    $req->execute(array(
        "company_id" => $company_id,
        "year" => $year,
        "month" => $month
    ));
    $data = $req->fetch();
    return $data['total'];
}

function orders_list_by_company_id($company_id) {
    global $db;
    $req = $db->prepare(
            'SELECT * 
            FROM orders WHERE company_id IN (SELECT id FROM contacts WHERE owner_id = :company_id ) 
            ORDER BY id DESC');
    $req->execute(array(
        "company_id" => $company_id
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_list_by_company_id_status_address_delivery_id($company_id, $status, $address_delivery_id) {
    global $db;
    $req = $db->prepare(
            "SELECT 
            id, 
            address_delivery, date, status,
                
            JSON_UNQUOTE(JSON_EXTRACT(address_delivery, '$.id')) as ad_id 
            
            FROM orders 

            WHERE status = :status AND
            
            JSON_UNQUOTE(JSON_EXTRACT(address_delivery, '$.id')) = :address_delivery_id

            ORDER BY id DESC ");

    $req->execute(array(
        "status" => $status,
        "address_delivery_id" => $address_delivery_id
    ));

    $data = $req->fetchall();
    return $data;
}

function orders_list_by_company($name) {
    global $db;
    $req = $db->prepare(
            'SELECT * 
            FROM orders WHERE company_id IN (SELECT id FROM contacts WHERE name  like :name ) 
            ORDER BY id DESC');
    $req->execute(array(
        "name" => "%$name%"
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_list_by_company_status($name, $status) {
    global $db;
    $req = $db->prepare(
            ' SELECT * 
            FROM orders WHERE company_id IN (SELECT id FROM contacts WHERE name  like :name )  AND status = :status 
        
        ORDER BY id DESC');
    $req->execute(array(
        "name" => "%$name%",
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_list_by_company_id_status($company_id, $status) {
    global $db;
    $req = $db->prepare(
            ' SELECT * 
            FROM orders 
            WHERE company_id IN (SELECT id FROM contacts WHERE owner_id = :company_id ) AND status = :status 
        
        ORDER BY id DESC');
    $req->execute(array(
        "company_id" => $company_id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_list_by_office_id($office_id) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE company_id = :company_id ORDER BY id DESC');
    $req->execute(array(
        "company_id" => $office_id
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_list_by_office_id_status($company_id, $status) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE company_id = :company_id AND status = :status ORDER BY id DESC');
    $req->execute(array(
        "company_id" => $company_id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_list_by_office_id_status_delivery_addresses($company_id, $status, $address_delivery_id) {
    global $db;
    $req = $db->prepare('
            SELECT * 
            FROM orders 
            WHERE company_id = :company_id AND 
            status = :status AND 
            delivery_addresses = :delivery_addresses
        ORDER BY id DESC');
    $req->execute(array(
        "company_id" => $company_id,
        "status" => $status,
        "address_delivery_id" => $address_delivery_id
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_list_by_patient_id_status($patient_id, $status) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE patient_id = :patient_id AND status = :status ORDER BY id DESC');
    $req->execute(array(
        "patient_id" => $patient_id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_list_create_by_status($id, $status) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE `create_by` = :create_by AND `status` = :status ORDER BY id DESC');
    $req->execute(array(
        "create_by" => $id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_list_by_patient_id($patient_id) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE patient_id = ? ORDER BY id DESC');
    $req->execute(array($patient_id));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_list_create_by($id) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE create_by = ? ORDER BY id DESC');
    $req->execute(array($id));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_list_behalf_of($contact_id) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE behalf_of = ? ORDER BY id DESC');
    $req->execute(array($contact_id));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_list_by_status($code, $start = 0, $limit = 999) {
    global $db;

    $sql = "
            SELECT  
            id, bac, patient_id, address_billing, address_delivery, side, date_delivery, 
            status, date, remake, delivery_days, client_ref, company_id, discount
            
            FROM orders WHERE status = :code ORDER BY id DESC  Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':code', (int) $code, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();

    return $data;
}

function orders_list_by_delivery($d, $start = 0, $limit = 999) {
    global $db;
    if ($d == 'n') {
        $delivery_days = 4;
    }
    if ($d == 'e') {
        $delivery_days = 1;
    }
    if ($d == 'c') {
        $delivery_days = 0;
    }
//    $req = $db->prepare('SELECT * FROM orders WHERE delivery_days = ? ORDER BY id DESC Limit 150');
//    $req->execute(array($delivery_days));
    $sql = "SELECT * FROM orders WHERE delivery_days = :d ORDER BY id DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':d', (int) $delivery_days, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function orders_list_by_delivery_day($date, $start = 0, $limit = 999) {
    global $db;

    if ($date == null) {
        $sql = ('SELECT * FROM orders WHERE date_delivery IS NULL AND (status IN (10,20,30,40,60,70) ) ORDER BY id DESC Limit  :limit OFFSET :start');
    } else {
        $sql = ('SELECT * FROM orders WHERE date_delivery = :date AND (status IN (10,20,30,40,60,70) ) ORDER BY id DESC Limit  :limit OFFSET :start');
    }

    $query = $db->prepare($sql);
    $query->bindValue(':date', $date, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function orders_list_by_remake($order_id) {
    global $db;
    $req = $db->prepare('SELECT * FROM `orders` WHERE `remake` = :order_id  ORDER BY id DESC');
    $req->execute(array(
        "order_id" => $order_id
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_list_by_all_remake($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM `orders` WHERE `remake` > 0  ORDER BY id DESC   Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function orders_list_by_all($search, $start = 0, $limit = 999) {
    global $db;

    $query = $db->prepare("
     SELECT 
     o.id, 
     side,
     express, 
     date, 
     delivery_days, 
     date_delivery, 
     company_id, 
     c.owner_id, 
     client_ref, 
     address_billing, 
     address_delivery, 
     patient_id, 
     bac, 
     discount, 
     remake, 
     comments, 
     o.status, 
     c.name, 
     c.lastname ,
     office.lastname,
     office.name
     


     FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id  
     
INNER JOIN `contacts` as office ON o.company_id = office.id 
     
WHERE 

    o.id like :search OR 
    bac  like :search OR 
    o.client_ref like :search OR 
    o.date like :search OR 
    c.name like :search OR 
    c.lastname like :search OR    
    office.lastname like :search OR      
    office.name like :search      
 
     ORDER BY id DESC Limit :start , :limit
     
    ");

    $query->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();

    return $data;
}

//function orders_list() {
//    global $db;
//    $req = $db->prepare('SELECT * FROM orders  ORDER BY id DESC');
//    $req->execute();
//    $liste_info = $req->fetchall();
//    return $liste_info;
//}
function orders_list_by_id($txt) {

    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE id=:id ORDER BY id DESC');
    $req->execute(array(
        'id' => $txt
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_list_by_ref($txt) {

    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE client_ref = :client_ref ORDER BY id DESC');
    $req->execute(array(
        'client_ref' => "$txt"
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_list_by_bac($txt) {

    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE `bac`=:bac ORDER BY id DESC');
    $req->execute(array(
        'bac' => $txt
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_list_by_date($date, $client_id, $status, $comments) {



    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE '
            . 'client_id=:client_id AND '
            . 'status=:status AND '
            . 'comments =:comments) '
            . 'ORDER BY id DESC');
    $req->execute(array(
        //'date'=>$date,
        'client_id' => $client_id,
        'status' => $status,
        'comments' => $comments
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_total_by_user_id($client_id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM orders WHERE client_id= ?');
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data[0][0];
}

function orders_description($key, $id) {

    switch ($key) {
        case "constitution":
            $r = constitution_field_id("constitution", $id);
            break;

        case "couleurs":
            $r = couleurs_field_id("colour", $id);
            break;

        case "diametre":
            $r = diametre_field_id("diametre", $id);
            break;

        case "ecouteurs":
            $r = ecouteurs_field_id("ecouteur", $id);
            break;

        case "event":
            $r = events_field_id("event", $id);
            break;

        case "formes":
            $r = formes_field_id("forme", $id);
            break;

        case "longueurs":
            $r = longueurs_field_id("longueur", $id);
            break;

        case "marques":
            $r = marques_field_id("marques", $id);
            break;

        case "materials":
            $r = materials_field_id("material", $id);
            break;

        case "mesure_snr":
            $r = mesure_snr_field_id("mesure", $id);
            break;

        case "modele":
            $r = modeles_field_id("modele", $id);
            break;

        case "options":
            $r = options_field_id("option", $id);
            break;

        case "perte_auditive":
            $r = perte_auditive_field_id("perte", $id);
            break;

        case "types":
            $r = types_field_id("type", $id);
            break;

        default:
            break;
    }
    return $r;
}

/**
 * 
 * @global type $db
 * @param type $order_id
 * @param type $budget_id
 * @return type
 */
function orders_copy_items_to_budget_items($order_id, $budget_id) {
    global $db;

    /**
     * para cojer el porcentaje de descuento desde el pedido y no de la empresa se cambia 
     * 1) 
     *  :budget_id,  :order_id,  `code`, `quantity`, `description`, `price`, :discounts,  :discounts_mode,  `tva`, 1, 1 
     * remplazar por 
     *  :budget_id,  :order_id,  `code`, `quantity`, `description`, `price`, `discounts`,  `discounts_mode`,  `tva`, 1,  1
     * 2) comentar las lineas 
     *  // 1035 "discounts" => $discounts , // valor del descuento
      // 1036 "discounts_mode" => $discounts_mode , // el modo del descuento, depende del cliente
     */
    // get company_id from order
    $company_id = orders_field_id('company_id', $order_id);

    // consigo la sede d esta emrpesa 
    $headOffice_id = offices_headoffice_of_office($company_id);

    // saco el desccuento que esta empresa tiene 
    $discounts = (contacts_field_id("discounts", $headOffice_id)) ? contacts_field_id("discounts", $headOffice_id) : 0;

    $discounts_mode = "%"; // siempre en porcentaje 

    $req = $db->prepare(
            "INSERT INTO `budget_lines` 
            (`budget_id`, `order_id`, `code`, `quantity`, `description`, `price`, `discounts`, `discounts_mode`, `tax`, `order_by`, `status`)  SELECT 
             :budget_id,  :order_id,  `code`, `quantity`, `description`, `price`, `discounts`, `discounts_mode`, `tva`, 1, 1 
            FROM orders_lines WHERE order_id = :order_id            
            ");

    $req->execute(array(
        "order_id" => $order_id,
        "budget_id" => $budget_id,
            //"code" => "001-002-003" ,
            //"quantity" => 1 ,
            //"price" => 100 ,
            //"tva" => 21 ,
            // "discounts" => $discounts , // valor del descuento
            // "discounts_mode" => $discounts_mode , // el modo del descuento, depende del cliente
    ));
    return $db->lastInsertId();
}

function orders_copy_items_to_budget_items_valued($order_id, $budget_id) {
    global $db;

    // ponemos la primera linea del presupuesto 
    // budget_lines_add_with_order_id($budget_id , $order_id , 'ORDER' , 1 , "ORDER $order_id" , 0 , 0 , '%' , 0 , 1 , 1) ;

    orders_copy_lines_to_budget($items_l, $budget_id, $order_id);

    return $db->lastInsertId();
}

/**
 * Copia las lineas del order al presupuesto 
 * @global type $db
 * @param type $line_json
 * @param type $budget_id
 * @param type $order_id
 */
function orders_copy_lines_to_budget($line_json, $budget_id, $order_id) {
    global $db;
    // get company_id from order
    $company_id = orders_field_id('company_id', $order_id);
    // consigo la sede d esta emrpesa 
    $headOffice_id = offices_headoffice_of_office($company_id);
    // saco el desccuento que esta empresa tiene 
    $discounts = (contacts_field_id("discounts", $headOffice_id)) ? contacts_field_id("discounts", $headOffice_id) : 0;

    $discounts_mode = "%"; // siempre en porcentaje 

    foreach ($line_json as $key => $value) {
        // $key es la descipcion
        // $value el valor
        $req = $db->prepare("INSERT INTO `budget_lines` (`id`, `budget_id`, `order_id`, `code`, `quantity`, `description`, `price`, `discounts`, `discounts_mode`, `tax`, `order_by`, `status`)  VALUES (:id, :budget_id, :order_id, :code, :quantity, :description, :price, :discounts, :discounts_mode, :tax, :order_by, :status)");

        if ($key == 'options') {
            foreach ($value as $option_id) {
                $description = ucfirst("Options") . ": " . options_field_id("option", $option_id);

                $req->execute(array(
                    "id" => null,
                    "budget_id" => $budget_id,
                    "order_id" => $order_id,
                    "code" => "op-$option_id",
                    "quantity" => 1,
                    "description" => $description,
                    "price" => 100,
                    "discounts" => $discounts, // valor del descuento
                    "discounts_mode" => $discounts_mode, // el modo del descuento, depende del cliente
                    "tax" => 21,
                    "order_by" => 1,
                    "status" => 1
                ));
            }
        } else {
            $description = ucfirst($key) . ": " . orders_description($key, $value);

            if ($value != 0) {
                $req->execute(array(
                    "id" => null,
                    "budget_id" => $budget_id,
                    "order_id" => $order_id,
                    "code" => "001-002-003",
                    "quantity" => 1,
                    "description" => $description,
                    "price" => 100,
                    "discounts" => $discounts, // valor del descuento
                    "discounts_mode" => $discounts_mode, // el modo del descuento, depende del cliente
                    "tax" => 21,
                    "order_by" => 1,
                    "status" => 1
                ));
            }
        }
    }
}

function orders_list_remake_by_order_id($order_id) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM `orders` WHERE `remake`  = :order_id ');
    $req->execute(array(
        "order_id" => $order_id
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_total_remake_by_order($order_id) {

    global $db;

    $data = 0;

    $req = $db->prepare('SELECT COUNT(*) as total FROM `orders` WHERE `remake` = :order_id ');

    $req->execute(array(
        "order_id" => $order_id
    ));
    $data = $req->fetch();

    return intval($data[0]);
}

/**
 * Envia un id del la orden original, si no no envia nada es una original
 * 
 * @global type $db
 * @param type $order_id
 * @return type
 */
function orders_is_remake($order_id) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT `remake` FROM `orders` WHERE `id` =:order_id ');
    $req->execute(array(
        "order_id" => $order_id
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_lines_exists_type_by_side($order_id, $side) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "
            SELECT count(*) as total
            FROM orders_lines 
            WHERE code like :code AND (order_id = :order_id)
        
        ");
    $req->execute(array(
        'order_id' => $order_id,
        'code' => "SIDE%"
    ));
    $data = $req->fetchall();
    return (isset($data[0])) ? $data[0] : false;
}

function orders_lines_exists_type_by_code($order_id, $code) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "
            SELECT code as total
            FROM orders_lines 
            WHERE code like :code AND (order_id = :order_id)
        
        ");
    $req->execute(array(
        'order_id' => $order_id,
        'code' => "$code%"
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function orders_lines_exists_type_by_code_side($order_id, $code, $s) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "
            SELECT code 
            
            FROM orders_lines 
            
            WHERE code like :code AND (order_id = :order_id) AND (side=:side) 
        
        ");
    $req->execute(array(
        'order_id' => $order_id,
        'code' => "$code%",
        'side' => $s
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function orders_add_remake(
        $side,
        $delivery_days,
        $date_delivery,
        $company_id,
        $create_by,
        $behalf_of,
        $address_billing,
        $address_delivery,
        $patient_id,
        $bac_free,
        $remake,
        $discount,
        $comments,
        $code,
        $status
) {
    global $db;

    $req = $db->prepare(
            "
            INSERT INTO `orders` 
            
            (`id`, `side`, `via`, `express`, `date`, `delivery_days`, `date_delivery`, `company_id`, 
            `create_by`, `behalf_of`, `client_ref`, 
            `address_billing`, `address_delivery`, `patient_id`, `description`, `bac`, 
            `price`, `discount`, `ce`, `remake`, `hearing_loss`, `ear`, `comments`, `code`, `status`) 
            
            VALUES 
            
            (:id, :side, :via, :express,     :date, :delivery_days, :date_delivery, :company_id, 
            :create_by, :behalf_of, :client_ref, 
            :address_billing, :address_delivery, :patient_id, :description, :bac, 
            :price, :discount, :ce, :remake, :hearing_loss, :ear, :comments, :code, :status) "
    );

    $req->execute(array(
        'id' => null,
        'side' => $side,
        'via' => 'Poste',
        'express' => null,
        'date' => null,
        'delivery_days' => $delivery_days,
        'date_delivery' => $date_delivery,
        'company_id' => $company_id,
        'create_by' => $create_by,
        'create_by' => $create_by,
        'behalf_of' => $behalf_of,
        'client_ref' => '',
        'address_billing' => $address_billing,
        'address_delivery' => $address_delivery,
        'patient_id' => $patient_id,
        'description' => null,
        'bac' => $bac_free,
        'price' => 0,
        'discount' => $discount,
        'ce' => null,
        'remake' => $remake,
        'hearing_loss' => null,
        'ear' => null,
        'comments' => $comments,
        'code' => $code,
        'status' => $status,
            )
    );
}

function orders_add_copy(
        $side,
        $delivery_days,
        $date_delivery,
        $company_id,
        $create_by,
        $behalf_of,
        $address_billing,
        $address_delivery,
        $patient_id,
        $bac_free,
        $remake,
        $discount,
        $comments,
        $code,
        $status
) {
    global $db;

    $req = $db->prepare(
            "
            INSERT INTO `orders` 
            
            (`id`, `side`, `via`, `express`, `date`, `delivery_days`, `date_delivery`, `company_id`, 
            `create_by`, `behalf_of`, `client_ref`, 
            `address_billing`, `address_delivery`, `patient_id`, `description`, `bac`, 
            `price`, `discount`, `ce`, `remake`, `hearing_loss`, `ear`, `comments`, `code`, `status`) 
            
            VALUES 
            
            (:id, :side, :via, :express,     :date, :delivery_days, :date_delivery, :company_id, 
            :create_by, :behalf_of, :client_ref, 
            :address_billing, :address_delivery, :patient_id, :description, :bac, 
            :price, :discount, :ce, :remake, :hearing_loss, :ear, :comments, :code, :status) "
    );

    $req->execute(array(
        'id' => null,
        'side' => $side,
        'via' => 'Poste',
        'express' => null,
        'date' => null,
        'delivery_days' => $delivery_days,
        'date_delivery' => $date_delivery,
        'company_id' => $company_id,
        'create_by' => $create_by,
        'create_by' => $create_by,
        'behalf_of' => $behalf_of,
        'client_ref' => '',
        'address_billing' => $address_billing,
        'address_delivery' => $address_delivery,
        'patient_id' => $patient_id,
        'description' => null,
        'bac' => $bac_free,
        'price' => 0,
        'discount' => $discount,
        'ce' => null,
        'remake' => $remake,
        'hearing_loss' => null,
        'ear' => null,
        'comments' => $comments,
        'code' => $code,
        'status' => $status,
            )
    );
}

function orders_why_cannot_make_remake_from_order($id) {

    global $u_rol;

    $error = array();

    if (orders_total_remake_by_order($id) >= 3) {
        array_push($error, "You have only 3 remake max.");
    }

    if (orders_field_id("remake", $id)) {
        array_push($error, "You can only remake an order that is not already a remake");
    }

    if (!permissions_has_permission($u_rol, 'orders_remake', "create")) {
        array_push($error, "You do not have permission to remake");
    }

    return $error;
}

function orders_update_side($order_id, $side) {
    global $db;

    // regresa falso si no se manda el order_id
    if (!$order_id || $side) {
        return false;
    }

    $req = $db->prepare(
            'UPDATE orders 
             SET    side = :side  
             WHERE id=:order_id  ');

    $req->execute(array(
        'order_id' => $order_id,
        'side' => $side,
            )
    );
}

function orders_order_copy_lines_for_copy($order_id, $remake_id, $side, $quantity) {
    global $db;

    // el descuento es el descuento actual de la empresa, no el que viene del pedido original

    $headoffice_id = offices_headoffice_of_office(orders_field_id('company_id', $order_id));

    $discounts_office = contacts_field_id('discounts', $headoffice_id);

    $discounts = ($discounts_office) ? $discounts_office : 0;

    $req = $db->prepare(
            "INSERT INTO `orders_lines` 
            (`order_id`, `code`, `quantity`, `description`, `price`, `tva`, `discounts`, `discounts_mode`, `side`) SELECT 
            :remake_id,  `code`, :quantity,  `description`, `price`, `tva`, :discounts, `discounts_mode`,  :side  
            FROM orders_lines  WHERE order_id=:order_id  AND side = :side ");

    $req->execute(array(
        "order_id" => $order_id,
        "remake_id" => $remake_id,
        "side" => $side,
        "quantity" => $quantity,
        "discounts" => $discounts,
    ));
    return $db->lastInsertId();
}

function orders_total_by_year_month($y, $m, $remake = false) {

    // remake, incluyes los remakes?


    global $db;

    $data = array();

    if (($remake)) {
        // incluimos remakes
        $req = $db->prepare("SELECT COUNT(*) FROM orders WHERE remake IS NOT NULL AND date BETWEEN :start AND :end ");
        $req->execute(array(
            "start" => "$y-$m-01",
            "end" => "$y-$m-31"
        ));
    } else {
        // sin remakes
        $req = $db->prepare("SELECT COUNT(*) FROM orders WHERE remake IS NULL AND date BETWEEN :start AND :end  ");
        $req->execute(array(
            "start" => "$y-$m-01",
            "end" => "$y-$m-31"
        ));
    }

    $data = $req->fetch();

    return $data[0];
}

function orders_lines_material_from_order($order_id) {
    global $db;

    if (!$order_id || !is_id($order_id)) {
        return false;
    }

    $data = array();
    $req = $db->prepare("SELECT code FROM orders_lines WHERE order_id=:order_id AND code like :code ");
    $req->execute(array(
        'order_id' => $order_id,
        'code' => "MAT%"
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function orders_lines_type_from_order($order_id) {
    global $db;
    // regresa falso si no se manda el order_id
    if (!$order_id) {
        return false;
    }
    $data = null;
    $req = $db->prepare("SELECT code FROM orders_lines WHERE order_id=:order_id AND code like :code ");
    $req->execute(array(
        'order_id' => $order_id,
        'code' => "TYP%",
    ));
    $data = $req->fetch();
    return (isset($data)) ? $data[0] : false;
}

/**
 * Cambia status de un pedido usando el codigo QR
 * @param type $order_id
 * @param type $new_status
 */
function orders_change_status_via_qr_code($qr_code, $order_id) {

    $old_status = orders_field_id('status', $order_id);

    // Estos son los codigos QR que se recibe desde al formulario
    $qr_codes_array = array(
        'change_status_to_ready_to_scan',
        'change_status_to_ready_to_modeling',
        'change_status_to_ready_to_print',
        'change_status_to_ready_for_finition',
        'change_status_to_ready_to_send',
    );

    if (!in_array($qr_code, $qr_codes_array)) {
        return "Code QR error ";
    }

    if (!orders_is_id($order_id)) {
        return "Order id error ";
    }




    // pasa a ready to scan 
    if ($qr_code == 'change_status_to_ready_to_scan' && $old_status == 10) {
        orders_change_status($order_id, 20); //
    }

    // pasa a change_status_to_ready_to_modeling 
    //-----------------------------------------------
    if ($qr_code == 'change_status_to_ready_to_modeling' && $old_status == 20) {
        orders_change_status($order_id, 30); // 
    }

    // pasa a change_status_to_ready_to_print 
    //-----------------------------------------------
    if ($qr_code == 'change_status_to_ready_to_print' && $old_status == 30) {
        orders_change_status($order_id, 40); // 
    }

    // pasa a change_status_to_ready_for_finition 
    //-----------------------------------------------
    if ($qr_code == 'change_status_to_ready_for_finition' && $old_status == 40) {
        orders_change_status($order_id, 60); // 
    }

    // pasa a change_status_to_ready_to_send 
    //-----------------------------------------------
    if ($qr_code == 'change_status_to_ready_to_send' && $old_status == 60) {
        orders_change_status($order_id, 70);
        bacs_make_free($order_id);
    }
//
//    // pasa a change_status_to_send_to_client 
//    //-----------------------------------------------
//    if ($qr_code == 'change_status_to_send_to_client' && $old_status == 70) { 
//        orders_change_status($order_id, 100); // 
//    }
//
//    // pasa a change_status_to_completed 
//    //-----------------------------------------------
//    if ($qr_code == 'change_status_to_completed' && $old_status == 100) { 
//        orders_change_status($order_id, 110); // 
//    }
    // si el estatus actual es igual que el viejo
    // el sistema no ha cambiado de estatus al pedido

    if (orders_field_id('status', $order_id) == $old_status) {
        return true;
    } else {
        return false;
    }

    //----------------------------------------------- 
}

function orders_unprocessed($days, $status = 10) {
    // $days 
    // a la fecha actual se le suma $days
    // se busca pedidos que tengan la fecha de entrega 
    // null o superior a x days
    // date_delivery

    $d = (intval($days) ) ? $days : 0;

    $date = magia_dates_remove_day(date('Y-m-d'), $d);

    global $db;
    $data = null;
    $req = $db->prepare("SELECT count(*) FROM orders WHERE date < :date AND status = :status");
    $req->execute(array(
        'date' => $date,
        'status' => $status,
    ));
    $data = $req->fetch();
    return (isset($data)) ? $data[0] : false;
}

function orders_total_pieces_by_side($order_id, $side) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "
            SELECT quantity as total
            FROM orders_lines 
            WHERE code like :code AND (order_id = :order_id)
        
        ");
    $req->execute(array(
        'order_id' => $order_id,
        'code' => "SIDE" . $side
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function orders_is_thermotec($order_id) {
    if ((materials_field_by_code('resin_id', orders_lines_material_from_order($order_id))) == 3) {
        return 1;
    } else {
        return 0;
    }
}

function orders_get_resin_id_by_order_id($order_id) {

    $mat = "X";
    // si existe el numero de pedido 
    // regreso el materia MAT50
    $mat_code = orders_lines_material_from_order($order_id);

    // cojo solo el id
    //$m = substr($mat_code, 3, 3);
    //    50
    // busco el id de la resine

    $resin_id = materials_field_by_code('resin_id', $mat_code);
    // ahora veo que resina es
    // $mat = resins_field_id('name', $resin_id);
    return ($resin_id) ? $resin_id : 'X';
}

function orders_table_index($orders) {
    include view('orders', 'table_index');
}

function orders_get_destination_by_order_id($order_id) {

    $type = orders_lines_type_from_order($order_id);
    // Tengo TYP20
    // cojo todo despues de TYP
    $t = substr($type, 3, 3);
    // Tengo el 80
    // ahora que modeler tiene 
    $modeler = types_field_id('modeler', $t);

    $d = ($modeler) ? $modeler : 'X';

    return $d;
}

/**
 * SELECT JSON_UNQUOTE(JSON_EXTRACT(`address_delivery`, '$.id')) as id 
 */
function orders_list_by_address_id($address_id) {
    global $db;
    $req = $db->prepare(
            "SELECT 
            id, 
            address_delivery, date, status,
                
            JSON_UNQUOTE(JSON_EXTRACT(address_delivery, '$.id')) as ad_id 
            
            FROM orders 

            WHERE 
            
            JSON_UNQUOTE(JSON_EXTRACT(address_delivery, '$.id')) = :address_delivery_id

            ORDER BY id DESC ");

    $req->execute(array(
        // "status" => $status,
        "address_delivery_id" => $address_id
    ));

    $data = $req->fetchall();
    return $data;
}

function orders_list_by_address_id_status($address_id, $status) {
    global $db;
    $req = $db->prepare(
            "
            SELECT id,   JSON_UNQUOTE(JSON_EXTRACT(`address_delivery`, '$.id')) as address_id 
            FROM orders 
            WHERE status = :status
            ");

    $req->execute(array(
        //  "address_id" => $address_id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_by_address_id_status($address_id, $status) {
    global $db;
    $req = $db->prepare(
            ' SELECT * 
            FROM orders WHERE company_id IN (SELECT id FROM contacts WHERE name  like :name )  AND status = :status 
        
        ORDER BY id DESC');
    $req->execute(array(
        "name" => "%$name%",
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_stl_file_name($order_id) {

    //$order_id = "";

    $bac = orders_field_id('bac', $order_id);
    // L, R, S
    $side = orders_field_id('side', $order_id);

    // 1 a 10, un maximo de 10 piezas
    $pieces = orders_total_pieces_by_side($order_id, 'L') + orders_total_pieces_by_side($order_id, 'R');

    // Inicial de la letra 
    $material = resins_field_id('name', orders_get_resin_id_by_order_id($order_id))[0];

    // 
    $destino = orders_get_destination_by_order_id($order_id);

    $patient_id = orders_field_id('patient_id', $order_id);

    $patient_lastname = contacts_formated_lastname(contacts_field_id('lastname', $patient_id)); //"COELLO_SANCHEZ";

    $patient_name = contacts_formated_name(contacts_field_id('name', $patient_id)); //"robinson_enrique";
//    $stl_name = "302010-205-RM-50215-COELLO-robinson"; 
    $stl_name = "$order_id-$bac-$side" . "$pieces-$material" . "$destino-$patient_id-$patient_lastname-$patient_name";

    return $stl_name;
}

function orders_update_delivery_address($order_id, $new_address_json) {

    global $db;
    $req = $db->prepare(" UPDATE orders SET address_delivery =:address_delivery WHERE id=:id  ");
    $req->execute(array(
        "id" => $order_id,
        "address_delivery" => $new_address_json
            )
    );
}

function orders_new_reset($from) {
    switch ($from) {
        case 'type':
            $_SESSION['order']['type_id']['L'] = null;
            $_SESSION['order']['type_id']['R'] = null;
            $_SESSION['order']['modele_id']['L'] = null;
            $_SESSION['order']['modele_id']['R'] = null;
            $_SESSION['order']['mesure_id']['L'] = null;
            $_SESSION['order']['mesure_id']['R'] = null;
            $_SESSION['order']['forme_id']['L'] = null;
            $_SESSION['order']['forme_id']['R'] = null;
            $_SESSION['order']['material_id']['L'] = null;
            $_SESSION['order']['material_id']['R'] = null;
            $_SESSION['order']['colour_id']['L'] = null;
            $_SESSION['order']['colour_id']['R'] = null;
            $_SESSION['order']['perte_id']['L'] = null;
            $_SESSION['order']['perte_id']['R'] = null;
            $_SESSION['order']['marque_id']['L'] = null;
            $_SESSION['order']['marque_id']['R'] = null;
            $_SESSION['order']['ecouteur_id']['L'] = null;
            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'modele':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
            $_SESSION['order']['modele_id']['L'] = null;
            $_SESSION['order']['modele_id']['R'] = null;
            $_SESSION['order']['mesure_id']['L'] = null;
            $_SESSION['order']['mesure_id']['R'] = null;
            $_SESSION['order']['forme_id']['L'] = null;
            $_SESSION['order']['forme_id']['R'] = null;
            $_SESSION['order']['material_id']['L'] = null;
            $_SESSION['order']['material_id']['R'] = null;
            $_SESSION['order']['colour_id']['L'] = null;
            $_SESSION['order']['colour_id']['R'] = null;
            $_SESSION['order']['perte_id']['L'] = null;
            $_SESSION['order']['perte_id']['R'] = null;
            $_SESSION['order']['marque_id']['L'] = null;
            $_SESSION['order']['marque_id']['R'] = null;
            $_SESSION['order']['ecouteur_id']['L'] = null;
            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'mesure':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
            $_SESSION['order']['mesure_id']['L'] = null;
            $_SESSION['order']['mesure_id']['R'] = null;
            $_SESSION['order']['forme_id']['L'] = null;
            $_SESSION['order']['forme_id']['R'] = null;
            $_SESSION['order']['material_id']['L'] = null;
            $_SESSION['order']['material_id']['R'] = null;
            $_SESSION['order']['colour_id']['L'] = null;
            $_SESSION['order']['colour_id']['R'] = null;
            $_SESSION['order']['perte_id']['L'] = null;
            $_SESSION['order']['perte_id']['R'] = null;
            $_SESSION['order']['marque_id']['L'] = null;
            $_SESSION['order']['marque_id']['R'] = null;
            $_SESSION['order']['ecouteur_id']['L'] = null;
            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'forme':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
            $_SESSION['order']['forme_id']['L'] = null;
            $_SESSION['order']['forme_id']['R'] = null;
            $_SESSION['order']['material_id']['L'] = null;
            $_SESSION['order']['material_id']['R'] = null;
            $_SESSION['order']['colour_id']['L'] = null;
            $_SESSION['order']['colour_id']['R'] = null;
            $_SESSION['order']['perte_id']['L'] = null;
            $_SESSION['order']['perte_id']['R'] = null;
            $_SESSION['order']['marque_id']['L'] = null;
            $_SESSION['order']['marque_id']['R'] = null;
            $_SESSION['order']['ecouteur_id']['L'] = null;
            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'material':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
            $_SESSION['order']['material_id']['L'] = null;
            $_SESSION['order']['material_id']['R'] = null;
            $_SESSION['order']['colour_id']['L'] = null;
            $_SESSION['order']['colour_id']['R'] = null;
            $_SESSION['order']['perte_id']['L'] = null;
            $_SESSION['order']['perte_id']['R'] = null;
            $_SESSION['order']['marque_id']['L'] = null;
            $_SESSION['order']['marque_id']['R'] = null;
            $_SESSION['order']['ecouteur_id']['L'] = null;
            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'colour':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
//            $_SESSION['order']['material_id']['L'] = null;
//            $_SESSION['order']['material_id']['R'] = null;
            $_SESSION['order']['colour_id']['L'] = null;
            $_SESSION['order']['colour_id']['R'] = null;
            $_SESSION['order']['perte_id']['L'] = null;
            $_SESSION['order']['perte_id']['R'] = null;
            $_SESSION['order']['marque_id']['L'] = null;
            $_SESSION['order']['marque_id']['R'] = null;
            $_SESSION['order']['ecouteur_id']['L'] = null;
            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'perte':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
//            $_SESSION['order']['material_id']['L'] = null;
//            $_SESSION['order']['material_id']['R'] = null;
//            $_SESSION['order']['colour_id']['L'] = null;
//            $_SESSION['order']['colour_id']['R'] = null;
            $_SESSION['order']['perte_id']['L'] = null;
            $_SESSION['order']['perte_id']['R'] = null;
            $_SESSION['order']['marque_id']['L'] = null;
            $_SESSION['order']['marque_id']['R'] = null;
            $_SESSION['order']['ecouteur_id']['L'] = null;
            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'marque':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
//            $_SESSION['order']['material_id']['L'] = null;
//            $_SESSION['order']['material_id']['R'] = null;
//            $_SESSION['order']['colour_id']['L'] = null;
//            $_SESSION['order']['colour_id']['R'] = null;
//            $_SESSION['order']['perte_id']['L'] = null;
//            $_SESSION['order']['perte_id']['R'] = null;
            $_SESSION['order']['marque_id']['L'] = null;
            $_SESSION['order']['marque_id']['R'] = null;
            $_SESSION['order']['ecouteur_id']['L'] = null;
            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'ecouteur':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
//            $_SESSION['order']['material_id']['L'] = null;
//            $_SESSION['order']['material_id']['R'] = null;
//            $_SESSION['order']['colour_id']['L'] = null;
//            $_SESSION['order']['colour_id']['R'] = null;
//            $_SESSION['order']['perte_id']['L'] = null;
//            $_SESSION['order']['perte_id']['R'] = null;
//            $_SESSION['order']['marque_id']['L'] = null;
//            $_SESSION['order']['marque_id']['R'] = null;
            $_SESSION['order']['ecouteur_id']['L'] = null;
            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'event':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
//            $_SESSION['order']['material_id']['L'] = null;
//            $_SESSION['order']['material_id']['R'] = null;
//            $_SESSION['order']['colour_id']['L'] = null;
//            $_SESSION['order']['colour_id']['R'] = null;
//            $_SESSION['order']['perte_id']['L'] = null;
//            $_SESSION['order']['perte_id']['R'] = null;
//            $_SESSION['order']['marque_id']['L'] = null;
//            $_SESSION['order']['marque_id']['R'] = null;
//            $_SESSION['order']['ecouteur_id']['L'] = null;
//            $_SESSION['order']['ecouteur_id']['R'] = null;
            $_SESSION['order']['event_id']['L'] = null;
            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'diametre':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
//            $_SESSION['order']['material_id']['L'] = null;
//            $_SESSION['order']['material_id']['R'] = null;
//            $_SESSION['order']['colour_id']['L'] = null;
//            $_SESSION['order']['colour_id']['R'] = null;
//            $_SESSION['order']['perte_id']['L'] = null;
//            $_SESSION['order']['perte_id']['R'] = null;
//            $_SESSION['order']['marque_id']['L'] = null;
//            $_SESSION['order']['marque_id']['R'] = null;
//            $_SESSION['order']['ecouteur_id']['L'] = null;
//            $_SESSION['order']['ecouteur_id']['R'] = null;
//            $_SESSION['order']['event_id']['L'] = null;
//            $_SESSION['order']['event_id']['R'] = null;
            $_SESSION['order']['diametre_id']['L'] = null;
            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'longuer':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
//            $_SESSION['order']['material_id']['L'] = null;
//            $_SESSION['order']['material_id']['R'] = null;
//            $_SESSION['order']['colour_id']['L'] = null;
//            $_SESSION['order']['colour_id']['R'] = null;
//            $_SESSION['order']['perte_id']['L'] = null;
//            $_SESSION['order']['perte_id']['R'] = null;
//            $_SESSION['order']['marque_id']['L'] = null;
//            $_SESSION['order']['marque_id']['R'] = null;
//            $_SESSION['order']['ecouteur_id']['L'] = null;
//            $_SESSION['order']['ecouteur_id']['R'] = null;
//            $_SESSION['order']['event_id']['L'] = null;
//            $_SESSION['order']['event_id']['R'] = null;
//            $_SESSION['order']['diametre_id']['L'] = null;
//            $_SESSION['order']['diametre_id']['R'] = null;
            $_SESSION['order']['longuer_id']['L'] = null;
            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'constitution':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
//            $_SESSION['order']['material_id']['L'] = null;
//            $_SESSION['order']['material_id']['R'] = null;
//            $_SESSION['order']['colour_id']['L'] = null;
//            $_SESSION['order']['colour_id']['R'] = null;
//            $_SESSION['order']['perte_id']['L'] = null;
//            $_SESSION['order']['perte_id']['R'] = null;
//            $_SESSION['order']['marque_id']['L'] = null;
//            $_SESSION['order']['marque_id']['R'] = null;
//            $_SESSION['order']['ecouteur_id']['L'] = null;
//            $_SESSION['order']['ecouteur_id']['R'] = null;
//            $_SESSION['order']['event_id']['L'] = null;
//            $_SESSION['order']['event_id']['R'] = null;
//            $_SESSION['order']['diametre_id']['L'] = null;
//            $_SESSION['order']['diametre_id']['R'] = null;
//            $_SESSION['order']['longuer_id']['L'] = null;
//            $_SESSION['order']['longuer_id']['R'] = null;
            $_SESSION['order']['constitution_id']['L'] = null;
            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;
        case 'option':
//        $_SESSION['order']['type_id']['L'] = null;
//        $_SESSION['order']['type_id']['R'] = null;
//            $_SESSION['order']['modele_id']['L'] = null;
//            $_SESSION['order']['modele_id']['R'] = null;
//            $_SESSION['order']['mesure_id']['L'] = null;
//            $_SESSION['order']['mesure_id']['R'] = null;
//            $_SESSION['order']['forme_id']['L'] = null;
//            $_SESSION['order']['forme_id']['R'] = null;
//            $_SESSION['order']['material_id']['L'] = null;
//            $_SESSION['order']['material_id']['R'] = null;
//            $_SESSION['order']['colour_id']['L'] = null;
//            $_SESSION['order']['colour_id']['R'] = null;
//            $_SESSION['order']['perte_id']['L'] = null;
//            $_SESSION['order']['perte_id']['R'] = null;
//            $_SESSION['order']['marque_id']['L'] = null;
//            $_SESSION['order']['marque_id']['R'] = null;
//            $_SESSION['order']['ecouteur_id']['L'] = null;
//            $_SESSION['order']['ecouteur_id']['R'] = null;
//            $_SESSION['order']['event_id']['L'] = null;
//            $_SESSION['order']['event_id']['R'] = null;
//            $_SESSION['order']['diametre_id']['L'] = null;
//            $_SESSION['order']['diametre_id']['R'] = null;
//            $_SESSION['order']['longuer_id']['L'] = null;
//            $_SESSION['order']['longuer_id']['R'] = null;
//            $_SESSION['order']['constitution_id']['L'] = null;
//            $_SESSION['order']['constitution_id']['R'] = null;
            $_SESSION['order']['option_id']['L'] = array();
            $_SESSION['order']['option_id']['R'] = array();
            break;

        default:
            break;
    }
}

function orders_new_cancel_button() {

    echo '

<hr>


<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#orders_new_cancel_button">
<span class="glyphicon glyphicon-trash"></span>
' . _tr("Cancel") . '
</button>

<!-- Modal -->
<div class="modal fade" id="orders_new_cancel_button" tabindex="-1" role="dialog" aria-labelledby="orders_new_cancel_buttonLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="orders_new_cancel_buttonLabel">' . _tr('Cancel order') . '</h4>
      </div>
      <div class="modal-body">
        
<p>' . _tr("Do you want to cancel this order?") . '</p>
        <form class="form-horizontal" method="post" action="index.php">
            <button type="submit" class="btn btn-danger">' . _tr("Cancel") . '</button>
        </form>
        
      </div>

    </div>
  </div>
</div>

';
}

//Lista de pedidos que son mas viejos que x days
function orders_olders_than_x_days($days, $status = array()) {

    // lista de pedidos que la fecha sean iguales o superior a xxx
    // y que tengan los tatus siguientes 
//    // 
//
//    global $db;
//    $req = $db->prepare(
//            ' SELECT * 
//            FROM orders WHERE company_id IN (SELECT id FROM contacts WHERE name  like :name )  AND status = :status 
//        
//        ORDER BY id DESC');
//    $req->execute(array(
//        "name" => "%$name%",
//        "status" => $status
//    ));
//    $data = $req->fetchall();
//    return $data;
}
