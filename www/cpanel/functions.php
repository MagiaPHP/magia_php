<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:39 


// 
// 
function cpanel_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cpanel` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cpanel_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cpanel` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cpanel_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cpanel` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cpanel_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `domain`,  `subdomain`,  `db`,  `user_db`,  `user_db_pass`,  `email`,  `order_by`,  `status`   
    FROM `cpanel` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function cpanel_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `contact_id`,  `domain`,  `subdomain`,  `db`,  `user_db`,  `user_db_pass`,  `email`,  `order_by`,  `status`   
    FROM `cpanel` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function cpanel_edit($id ,  $contact_id ,  $domain ,  $subdomain ,  $db ,  $user_db ,  $user_db_pass ,  $email ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `contact_id` =:contact_id, `domain` =:domain, `subdomain` =:subdomain, `db` =:db, `user_db` =:user_db, `user_db_pass` =:user_db_pass, `email` =:email, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "contact_id" =>$contact_id ,  
 "domain" =>$domain ,  
 "subdomain" =>$subdomain ,  
 "db" =>$db ,  
 "user_db" =>$user_db ,  
 "user_db_pass" =>$user_db_pass ,  
 "email" =>$email ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function cpanel_add($contact_id ,  $domain ,  $subdomain ,  $db ,  $user_db ,  $user_db_pass ,  $email ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `cpanel` ( `id` ,   `contact_id` ,   `domain` ,   `subdomain` ,   `db` ,   `user_db` ,   `user_db_pass` ,   `email` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :domain ,  :subdomain ,  :db ,  :user_db ,  :user_db_pass ,  :email ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "domain" => $domain ,  
 "subdomain" => $subdomain ,  
 "db" => $db ,  
 "user_db" => $user_db ,  
 "user_db_pass" => $user_db_pass ,  
 "email" => $email ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function cpanel_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `domain`,  `subdomain`,  `db`,  `user_db`,  `user_db_pass`,  `email`,  `order_by`,  `status`    
            FROM `cpanel` 
            WHERE `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `domain` like :txt
OR `subdomain` like :txt
OR `db` like :txt
OR `user_db` like :txt
OR `user_db_pass` like :txt
OR `email` like :txt
OR `order_by` like :txt
OR `status` like :txt
 
    ORDER BY `order_by` , `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function cpanel_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (cpanel_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";        
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";        
        $val = ""; 
        foreach ($values_to_show as $val_to_show) {
            $val = $val . " " . $value[$val_to_show] ;  
        }              
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($val) . "</option>";
    }
    echo $c;     
}
function cpanel_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `cpanel` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function cpanel_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `domain`,  `subdomain`,  `db`,  `user_db`,  `user_db_pass`,  `email`,  `order_by`,  `status`    FROM `cpanel` 
    WHERE `$field` = '$txt' 
    ORDER BY `order_by` , `id` DESC
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function cpanel_db_show_col_from_table($c) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SHOW COLUMNS FROM `$c`
            ");
    $req->execute(array(
    ));
    $data = $req->fetchAll();
    return $data;
}
//
function cpanel_db_col_list_from_table($c){
    $list = array();
    foreach (cpanel_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function cpanel_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cpanel_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cpanel_update_domain($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `domain`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cpanel_update_subdomain($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `subdomain`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cpanel_update_db($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `db`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cpanel_update_user_db($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `user_db`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cpanel_update_user_db_pass($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `user_db_pass`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cpanel_update_email($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `email`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cpanel_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cpanel_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cpanel` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function cpanel_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            cpanel_update_id($id, $new_data);
            break;

        case "contact_id":
            cpanel_update_contact_id($id, $new_data);
            break;

        case "domain":
            cpanel_update_domain($id, $new_data);
            break;

        case "subdomain":
            cpanel_update_subdomain($id, $new_data);
            break;

        case "db":
            cpanel_update_db($id, $new_data);
            break;

        case "user_db":
            cpanel_update_user_db($id, $new_data);
            break;

        case "user_db_pass":
            cpanel_update_user_db_pass($id, $new_data);
            break;

        case "email":
            cpanel_update_email($id, $new_data);
            break;

        case "order_by":
            cpanel_update_order_by($id, $new_data);
            break;

        case "status":
            cpanel_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function cpanel_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `cpanel` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/cpanel/functions.php
// and comment here (this function)
function cpanel_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "domain":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "subdomain":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "db":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "user_db":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "user_db_pass":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "email":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "order_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "status":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
       

        default:
            return $value;
            break;
    }
}
//
//
//
function cpanel_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `cpanel` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cpanel_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `cpanel` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cpanel_exists_domain($domain){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `domain` FROM `cpanel` WHERE   `domain` = ?");
    $req->execute(array($domain));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cpanel_exists_subdomain($subdomain){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `subdomain` FROM `cpanel` WHERE   `subdomain` = ?");
    $req->execute(array($subdomain));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cpanel_exists_db($db){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `db` FROM `cpanel` WHERE   `db` = ?");
    $req->execute(array($db));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cpanel_exists_user_db($user_db){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `user_db` FROM `cpanel` WHERE   `user_db` = ?");
    $req->execute(array($user_db));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cpanel_exists_user_db_pass($user_db_pass){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `user_db_pass` FROM `cpanel` WHERE   `user_db_pass` = ?");
    $req->execute(array($user_db_pass));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cpanel_exists_email($email){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `email` FROM `cpanel` WHERE   `email` = ?");
    $req->execute(array($email));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cpanel_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `cpanel` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cpanel_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `cpanel` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function cpanel_is_id($id){
     return (is_id($id) )? true : false ;
}

function cpanel_is_contact_id($contact_id){
     return true;
}

function cpanel_is_domain($domain){
     return true;
}

function cpanel_is_subdomain($subdomain){
     return true;
}

function cpanel_is_db($db){
     return true;
}

function cpanel_is_user_db($user_db){
     return true;
}

function cpanel_is_user_db_pass($user_db_pass){
     return true;
}

function cpanel_is_email($email){
     return true;
}

function cpanel_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function cpanel_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function cpanel_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, cpanel_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function cpanel_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (cpanel_is_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (cpanel_is_contact_id($value)) ? true : false;
            break;
     case "domain":
            $is = (cpanel_is_domain($value)) ? true : false;
            break;
     case "subdomain":
            $is = (cpanel_is_subdomain($value)) ? true : false;
            break;
     case "db":
            $is = (cpanel_is_db($value)) ? true : false;
            break;
     case "user_db":
            $is = (cpanel_is_user_db($value)) ? true : false;
            break;
     case "user_db_pass":
            $is = (cpanel_is_user_db_pass($value)) ? true : false;
            break;
     case "email":
            $is = (cpanel_is_email($value)) ? true : false;
            break;
     case "order_by":
            $is = (cpanel_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (cpanel_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function cpanel_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=cpanel&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'domain':
                echo '<th>' . _tr(ucfirst('domain')) . '</th>';
                break;
case 'subdomain':
                echo '<th>' . _tr(ucfirst('subdomain')) . '</th>';
                break;
case 'db':
                echo '<th>' . _tr(ucfirst('db')) . '</th>';
                break;
case 'user_db':
                echo '<th>' . _tr(ucfirst('user_db')) . '</th>';
                break;
case 'user_db_pass':
                echo '<th>' . _tr(ucfirst('user_db_pass')) . '</th>';
                break;
case 'email':
                echo '<th>' . _tr(ucfirst('email')) . '</th>';
                break;
case 'order_by':
                echo '<th>' . _tr(ucfirst('order_by')) . '</th>';
                break;
case 'status':
                echo '<th>' . _tr(ucfirst('status')) . '</th>';
                break;

            case 'button_details':
            case 'button_pay':
            case 'button_edit':
            case 'modal_edit':
            case 'button_delete':
            case 'modal_delete':
            case 'button_print':
            case 'button_save':
                echo '<th></th>';
                break;

            default:
                echo '<th>' . _tr(ucfirst($col_to_show)) . '</th>';
                break;
        }
    }
}

function cpanel_index_generate_column_body_td($cpanel, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=cpanel&a=details&id=' . $cpanel[$col] . '">' . $cpanel[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
case 'domain':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
case 'subdomain':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
case 'db':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
case 'user_db':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
case 'user_db_pass':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
case 'email':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=cpanel&a=details&id=' . $cpanel['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=cpanel&a=details_payement&id=' . $cpanel['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cpanel&a=edit&id=' . $cpanel['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cpanel&a=ok_delete&id=' . $cpanel['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cpanel&a=export_pdf&id=' . $cpanel['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cpanel&a=export_pdf&way=pdf&&id=' . $cpanel['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($cpanel[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
