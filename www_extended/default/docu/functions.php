<?php

function docu_edit_html($id, $title, $post) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `title` =:title, `post` =:post  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "title" => $title,
        "post" => $post,
    ));
}

function docu_edit_code($id, $title, $post) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `title` =:title, `post` =:post  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "title" => $title,
        "post" => $post,
    ));
}

function docu_list_widthout_father($start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT *  
    FROM `docu` WHERE father_id IS NULL ORDER BY `order_by` DESC, `id` DESC  
    
    Limit  $limit OFFSET $start
    
";
    $query = $db->prepare($sql);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function docu_list_of_children($father_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT *  
    FROM `docu` WHERE father_id = :father_id  ORDER BY `order_by` DESC, `id` DESC  
    
    Limit  $limit OFFSET $start

";

    $query = $db->prepare($sql);
    $query->bindValue(':father_id', (int) $father_id, PDO::PARAM_INT);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function docu_search_h_c_d($h = 1, $c = null, $docu_id = null, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
            FROM `docu` 
            WHERE `h` = :h  AND `controllers` = :c AND docu_id = :docu_id
 
    ORDER BY `order_by` DESC, `id` DESC
    
        Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':h', (int) $h, PDO::PARAM_INT);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':docu_id', (int) $docu_id, PDO::PARAM_INT);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function docu_search_h($h = null, $c = null, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `docu_id`, `h`, `controllers`,  `title`,  `post`,  `order_by`,  `status`    
            FROM `docu` 
            WHERE `h` = :h  AND `controllers` = :c
 
    ORDER BY `order_by` DESC, `id` DESC
        Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':h', (int) $h, PDO::PARAM_STR);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function docu_search_h1($controller = null, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `father_id`,  `controllers`,  `title`,  `post`,  `order_by`,  `status`    
            FROM `docu` 
            WHERE `h` = 1  
 
    ORDER BY `order_by` DESC, `id` DESC
        Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function docu_search_childrens_of($id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *   
            FROM `docu` 
            WHERE `father_id` = :father_id
 
    ORDER BY `order_by` DESC, `id` DESC
    
        Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':father_id', (int) $father_id, PDO::PARAM_INT);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

/**
 * <?php
  if (modules_field_module('status', "docu")) {
  echo docu_modal($c, $a);
  }
  ?>
 * 
 */
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
function docu_modal($controller, $action = null, $bloc = null) {

    global $u_language;
    global $u_rol;
    $code = uniqid();

    // si hay bloc registra con el bloc 
    if ($bloc) {
        if (($controller && $action) && !docu_search_by_c_a_l_b($controller, $action, $u_language, $bloc)) {
            docu_add_bloc($controller, $action, $u_language, $bloc, null, "$action", "Bloc ($bloc) description here", null, 1, 1);
        }
    } else {

        if (($controller && $action) && !docu_search_by_c_a_l($controller, $action, $u_language)) {
            docu_add($controller, $action, $u_language, null, "$action", "", null, 1, 1);
        }
    }

    $html = '';
    // modal
    include view('docu', 'modal_tmp');

    return $html;
}

function docu_modal_bloc($controller, $action = 'index', $b = "index", $arg = array()) {

    global $u_language;
    global $u_rol;

    $code = uniqid();
    //
    // icon si se debe agregar
    $icon = icon('plus');
    //
    // Busca si hay un controlledor, action, lenguage 
    $docu_id = docu_search_by_c_a_l($controller, $action, $u_language)[0]['id'];
//    vardump($docu_id); 
    // 
    // busca el bloque segun el id 
    $dbsbdib = docu_blocs_search_by_docu_id_bloc($docu_id, $b);
//    vardump($dbsbdib); 
    //
    //
    if ($dbsbdib) {
        // creamos el objeto 
        $bloc = new Docu_blocs();
        $bloc->setDocu_blocs($dbsbdib['id']);
        // si hay objeto cambiamos el icon
        $icon = icon('question-sign');
    } else {
        //registramos en la DB el bloc de estes controlador 
        if ($docu_id) {
            docu_blocs_add($docu_id, $b, "$b title", "$b description", null, 1, 1);
        }
    }
    //
    // empezamos el html
    $html = "";
    // incluimos el modal
//    vardump($arg); 


    include view('docu_blocs', 'modal_tmp', $arg);

    return $html;
}

// SEARCH
function docu_search_by_c_a($c, $a, $start = 0, $limit = 999999) {
    global $db;
    $data = null;
    $sql = "SELECT *
            FROM `docu` 
            WHERE `controllers` = :c  AND action =:a 
 
    ORDER BY `order_by` DESC, `id` DESC
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':a', $a, PDO::PARAM_STR);
    //$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    //$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function docu_search_by_c_l($c, $l, $start = 0, $limit = 999999) {
    global $db;
    $data = null;
    $sql = "SELECT *
            FROM `docu` 
            WHERE `controllers` = :c  AND language =:l 
 
    ORDER BY `order_by` DESC, `id` DESC
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':l', $l, PDO::PARAM_STR);
    //$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    //$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function docu_search_by_c_a_l_b($c, $a, $l, $b, $start = 0, $limit = 999999) {
    global $db;
    $data = null;
    $sql = "SELECT *
            FROM `docu` 
            WHERE `controllers` = :c  
            AND action =:a 
            AND language =:l 
            AND bloc =:b
 
    ORDER BY `order_by` DESC, `id` DESC
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':a', $a, PDO::PARAM_STR);
    $query->bindValue(':l', $l, PDO::PARAM_STR);
    $query->bindValue(':b', $b, PDO::PARAM_STR);
    //$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    //$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function docu_search_by_c_a_l($c, $a, $l, $start = 0, $limit = 999999) {
    global $db;
    $data = null;
    $sql = "SELECT *
            FROM `docu` 
            WHERE `controllers` = :c  
            AND action =:a 
            AND language =:l 
 
    ORDER BY `order_by` DESC, `id` DESC
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':a', $a, PDO::PARAM_STR);
    $query->bindValue(':l', $l, PDO::PARAM_STR);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data ?? [];
}

function docu_list_controllers($start = 0, $limit = 999999) {
    global $db;
    $data = null;

    $sql = "SELECT DISTINCT controllers 
        
    FROM `docu` 
    
    ORDER BY `order_by` DESC, `controllers`  
    
    Limit  $limit OFFSET $start
    
";
    $query = $db->prepare($sql);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data ?? [];
}

function docu_list_controllers_by_lang($language, $start = 0, $limit = 999999) {
    global $db;
    $data = null;

    $sql = "
        SELECT DISTINCT `controllers`, language
        
        FROM `docu` 
        
        WHERE  `language` = :language  
        
        ORDER BY `controllers`
        
                     
        Limit  $limit OFFSET $start
        
";

    $query = $db->prepare($sql);

    $query->bindValue(':language', $language, PDO::PARAM_STR);

    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data ?? [];
}

function docu_list_actions_by_controllers($c, $start = 0, $limit = 999999) {
    global $db;
    $data = null;

    $sql = "SELECT *  
    FROM `docu` 
    WHERE controllers = :c 
    
    ORDER BY `order_by` DESC, `controllers`, action  
    
    Limit  $limit OFFSET $start
    
";

    $query = $db->prepare($sql);
    $query->bindValue(':c', $c, PDO::PARAM_STR);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data ?? [];
}

function docu_list_actions_by_controllers_and_lang($c, $l, $start = 0, $limit = 999999) {
    global $db;
    $data = null;

    $sql = "SELECT *  

    FROM `docu` 
    
    WHERE controllers = :c AND language = :l
    
    ORDER BY `order_by` DESC, `controllers` , action  
    
    Limit  $limit OFFSET $start  ";

    $query = $db->prepare($sql);

    $query->bindValue(':c', $c, PDO::PARAM_STR);
    $query->bindValue(':l', $l, PDO::PARAM_STR);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function docu_add_bloc($controllers, $action, $language, $bloc, $father_id, $title, $post, $h, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `docu` ( `id` ,  `controllers`,  `action`,  `language`, `bloc`,  `father_id` ,   `title` ,   `post` ,   `h` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :controllers ,  :action ,  :language , :bloc,  :father_id ,  :title ,  :post ,  :h ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "controllers" => $controllers,
        "action" => $action,
        "language" => $language,
        "bloc" => $bloc,
        "father_id" => $father_id,
        "title" => $title,
        "post" => $post,
        "h" => $h,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function docu_images_list_group_by($field, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `docu_id`,  `bloc_id`,  `image`,  `order_by`,  `status`   
    FROM `docu_images` GROUP BY docu_id  
    
Limit  $limit OFFSET $start  ";

    $query = $db->prepare($sql);
//    $query->bindValue(':field', $field, PDO::PARAM_STR);
    ////$query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    ////$query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
