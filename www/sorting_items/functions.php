<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-30 13:08:28 


// 
// 
function sorting_items_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `sorting_items` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function sorting_items_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `sorting_items` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function sorting_items_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `sorting_items` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function sorting_items_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `title`,  `description`,  `position_order`   
    FROM `sorting_items` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function sorting_items_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `title`,  `description`,  `position_order`   
    FROM `sorting_items` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function sorting_items_edit($id ,  $title ,  $description ,  $position_order   ) {

    global $db;
    $req = $db->prepare(" UPDATE `sorting_items` SET `title` =:title, `description` =:description, `position_order` =:position_order  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "title" =>$title ,  
 "description" =>$description ,  
 "position_order" =>$position_order ,  

));
}

function sorting_items_add($title ,  $description ,  $position_order   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `sorting_items` ( `id` ,   `title` ,   `description` ,   `position_order`   )
                                       VALUES  (:id ,  :title ,  :description ,  :position_order   ) ");

    $req->execute(array(

 "id" => null ,  
 "title" => $title ,  
 "description" => $description ,  
 "position_order" => $position_order   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function sorting_items_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `title`,  `description`,  `position_order`    
            FROM `sorting_items` 
            WHERE `id` = :txt OR `id` like :txt
OR `title` like :txt
OR `description` like :txt
OR `position_order` like :txt
 
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

function sorting_items_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (sorting_items_list() as $key => $value) {
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
function sorting_items_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `sorting_items` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function sorting_items_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `title`,  `description`,  `position_order`    FROM `sorting_items` 
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

function sorting_items_db_show_col_from_table($c) {
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
function sorting_items_db_col_list_from_table($c){
    $list = array();
    foreach (sorting_items_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function sorting_items_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `sorting_items` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function sorting_items_update_title($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `sorting_items` SET `title`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function sorting_items_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `sorting_items` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function sorting_items_update_position_order($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `sorting_items` SET `position_order`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function sorting_items_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            sorting_items_update_id($id, $new_data);
            break;

        case "title":
            sorting_items_update_title($id, $new_data);
            break;

        case "description":
            sorting_items_update_description($id, $new_data);
            break;

        case "position_order":
            sorting_items_update_position_order($id, $new_data);
            break;


        default:
            break;
    }
}
//
function sorting_items_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `sorting_items` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/sorting_items/functions.php
// and comment here (this function)
function sorting_items_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "title":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "position_order":
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
function sorting_items_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `sorting_items` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function sorting_items_exists_title($title){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `title` FROM `sorting_items` WHERE   `title` = ?");
    $req->execute(array($title));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function sorting_items_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `sorting_items` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function sorting_items_exists_position_order($position_order){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `position_order` FROM `sorting_items` WHERE   `position_order` = ?");
    $req->execute(array($position_order));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function sorting_items_is_id($id){
     return (is_id($id) )? true : false ;
}

function sorting_items_is_title($title){
     return true;
}

function sorting_items_is_description($description){
     return true;
}

function sorting_items_is_position_order($position_order){
     return true;
}


//
//
function sorting_items_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, sorting_items_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function sorting_items_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (sorting_items_is_id($value)) ? true : false;
            break;
     case "title":
            $is = (sorting_items_is_title($value)) ? true : false;
            break;
     case "description":
            $is = (sorting_items_is_description($value)) ? true : false;
            break;
     case "position_order":
            $is = (sorting_items_is_position_order($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function sorting_items_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=sorting_items&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'title':
                echo '<th>' . _tr(ucfirst('title')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'position_order':
                echo '<th>' . _tr(ucfirst('position_order')) . '</th>';
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

function sorting_items_index_generate_column_body_td($sorting_items, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=sorting_items&a=details&id=' . $sorting_items[$col] . '">' . $sorting_items[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($sorting_items[$col]) . '</td>';
                break;
case 'title':
                echo '<td>' . ($sorting_items[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($sorting_items[$col]) . '</td>';
                break;
case 'position_order':
                echo '<td>' . ($sorting_items[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=sorting_items&a=details&id=' . $sorting_items['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=sorting_items&a=details_payement&id=' . $sorting_items['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=sorting_items&a=edit&id=' . $sorting_items['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=sorting_items&a=ok_delete&id=' . $sorting_items['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=sorting_items&a=export_pdf&id=' . $sorting_items['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=sorting_items&a=export_pdf&way=pdf&&id=' . $sorting_items['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($sorting_items[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
