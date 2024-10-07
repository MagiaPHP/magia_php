<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-27 12:09:05 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-27 12:09:05 


// 

//function blog_comments_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function blog_comments_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("blog_comments_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("blog_comments"); // Obtener columnas de la tabla de la base de datos
        //
        // Formatear columnas de la tabla como columnas predeterminadas
        foreach ($columns as $key => $col) {
            $user_cols_array[] = [
                "col_name" => $col["Field"],
                "label" => ucfirst($col["Field"]),
                "show" => true,
                "position" => $key
            ];
        }
    }

    // Ordenar las columnas según la posición definida
    usort($user_cols_array, function ($a, $b) {
        return intval($a["position"]) - intval($b["position"]);
    });

    return $user_cols_array;
}





// 
function blog_comments_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `blog_comments` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function blog_comments_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `blog_comments` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function blog_comments_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `blog_comments` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function blog_comments_list($start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `blog_id`,  `title`,  `comment`,  `author_id`,  `date`,  `order_by`,  `status`   
    
    FROM `blog_comments` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function blog_comments_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `blog_id`,  `title`,  `comment`,  `author_id`,  `date`,  `order_by`,  `status`   
    FROM `blog_comments` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function blog_comments_edit($id ,  $blog_id ,  $title ,  $comment ,  $author_id ,  $date ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `blog_id` =:blog_id, `title` =:title, `comment` =:comment, `author_id` =:author_id, `date` =:date, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "blog_id" =>$blog_id ,  
 "title" =>$title ,  
 "comment" =>$comment ,  
 "author_id" =>$author_id ,  
 "date" =>$date ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function blog_comments_add($blog_id ,  $title ,  $comment ,  $author_id ,  $date ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `blog_comments` ( `id` ,   `blog_id` ,   `title` ,   `comment` ,   `author_id` ,   `date` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :blog_id ,  :title ,  :comment ,  :author_id ,  :date ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "blog_id" => $blog_id ,  
 "title" => $title ,  
 "comment" => $comment ,  
 "author_id" => $author_id ,  
 "date" => $date ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function blog_comments_search($txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `blog_id`,  `title`,  `comment`,  `author_id`,  `date`,  `order_by`,  `status`    
            FROM `blog_comments` 
            WHERE `id` = :txt OR `id` like :txt
OR `blog_id` like :txt
OR `title` like :txt
OR `comment` like :txt
OR `author_id` like :txt
OR `date` like :txt
OR `order_by` like :txt
OR `status` like :txt
 
        

    ORDER BY $order_col $order_way 
    
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

function blog_comments_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (blog_comments_list() as $key => $value) {
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
function blog_comments_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `blog_comments` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function blog_comments_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `blog_id`,  `title`,  `comment`,  `author_id`,  `date`,  `order_by`,  `status`    FROM `blog_comments` 

    WHERE `$field` = '$txt' 
    
    ORDER BY $order_col $order_way 
    
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

function blog_comments_db_show_col_from_table($c) {
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
function blog_comments_db_col_list_from_table($c){
    $list = array();
    foreach (blog_comments_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function blog_comments_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function blog_comments_update_blog_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `blog_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function blog_comments_update_title($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `title`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function blog_comments_update_comment($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `comment`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function blog_comments_update_author_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `author_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function blog_comments_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function blog_comments_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function blog_comments_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `blog_comments` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function blog_comments_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            blog_comments_update_id($id, $new_data);
            break;

        case "blog_id":
            blog_comments_update_blog_id($id, $new_data);
            break;

        case "title":
            blog_comments_update_title($id, $new_data);
            break;

        case "comment":
            blog_comments_update_comment($id, $new_data);
            break;

        case "author_id":
            blog_comments_update_author_id($id, $new_data);
            break;

        case "date":
            blog_comments_update_date($id, $new_data);
            break;

        case "order_by":
            blog_comments_update_order_by($id, $new_data);
            break;

        case "status":
            blog_comments_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function blog_comments_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `blog_comments` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/blog_comments/functions.php
// and comment here (this function)
function blog_comments_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "blog_id":
            //return blog_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "title":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "comment":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "author_id":
            //return users_field_id("contact_id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
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
function blog_comments_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `blog_comments` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function blog_comments_exists_blog_id($blog_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `blog_id` FROM `blog_comments` WHERE   `blog_id` = ?");
    $req->execute(array($blog_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function blog_comments_exists_title($title){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `title` FROM `blog_comments` WHERE   `title` = ?");
    $req->execute(array($title));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function blog_comments_exists_comment($comment){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `comment` FROM `blog_comments` WHERE   `comment` = ?");
    $req->execute(array($comment));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function blog_comments_exists_author_id($author_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `author_id` FROM `blog_comments` WHERE   `author_id` = ?");
    $req->execute(array($author_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function blog_comments_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `blog_comments` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function blog_comments_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `blog_comments` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function blog_comments_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `blog_comments` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function blog_comments_is_id($id){
     return (is_id($id) )? true : false ;
}

function blog_comments_is_blog_id($blog_id){
     return true;
}

function blog_comments_is_title($title){
     return true;
}

function blog_comments_is_comment($comment){
     return true;
}

function blog_comments_is_author_id($author_id){
     return true;
}

function blog_comments_is_date($date){
     return true;
}

function blog_comments_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function blog_comments_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function blog_comments_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, blog_comments_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function blog_comments_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (blog_comments_is_id($value)) ? true : false;
            break;
     case "blog_id":
            $is = (blog_comments_is_blog_id($value)) ? true : false;
            break;
     case "title":
            $is = (blog_comments_is_title($value)) ? true : false;
            break;
     case "comment":
            $is = (blog_comments_is_comment($value)) ? true : false;
            break;
     case "author_id":
            $is = (blog_comments_is_author_id($value)) ? true : false;
            break;
     case "date":
            $is = (blog_comments_is_date($value)) ? true : false;
            break;
     case "order_by":
            $is = (blog_comments_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (blog_comments_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function blog_comments_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=blog_comments&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'blog_id':
                echo '<th>' . _tr(ucfirst('blog_id')) . '</th>';
                break;
case 'title':
                echo '<th>' . _tr(ucfirst('title')) . '</th>';
                break;
case 'comment':
                echo '<th>' . _tr(ucfirst('comment')) . '</th>';
                break;
case 'author_id':
                echo '<th>' . _tr(ucfirst('author_id')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
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

function blog_comments_index_generate_column_body_td($blog_comments, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=blog_comments&a=details&id=' . $blog_comments[$col] . '">' . $blog_comments[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($blog_comments[$col]) . '</td>';
                break;
case 'blog_id':
                echo '<td>' . ($blog_comments[$col]) . '</td>';
                break;
case 'title':
                echo '<td>' . ($blog_comments[$col]) . '</td>';
                break;
case 'comment':
                echo '<td>' . ($blog_comments[$col]) . '</td>';
                break;
case 'author_id':
                echo '<td>' . ($blog_comments[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($blog_comments[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($blog_comments[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($blog_comments[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=blog_comments&a=details&id=' . $blog_comments['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=blog_comments&a=details_payement&id=' . $blog_comments['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=blog_comments&a=edit&id=' . $blog_comments['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=blog_comments&a=ok_delete&id=' . $blog_comments['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=blog_comments&a=export_pdf&id=' . $blog_comments['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=blog_comments&a=export_pdf&way=pdf&&id=' . $blog_comments['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($blog_comments[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
