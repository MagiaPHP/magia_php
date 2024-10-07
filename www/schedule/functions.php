<?php
// plugin = schedule
// creation date : 2024-07-31
// 
// 
function schedule_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `schedule` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function schedule_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `schedule` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function schedule_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `schedule` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function schedule_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `day`,  `am_start`,  `am_end`,  `pm_start`,  `pm_end`,  `order_by`,  `status`   
    FROM `schedule` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function schedule_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `contact_id`,  `day`,  `am_start`,  `am_end`,  `pm_start`,  `pm_end`,  `order_by`,  `status`   
    FROM `schedule` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function schedule_edit($id ,  $contact_id ,  $day ,  $am_start ,  $am_end ,  $pm_start ,  $pm_end ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `contact_id` =:contact_id, `day` =:day, `am_start` =:am_start, `am_end` =:am_end, `pm_start` =:pm_start, `pm_end` =:pm_end, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "contact_id" =>$contact_id ,  
 "day" =>$day ,  
 "am_start" =>$am_start ,  
 "am_end" =>$am_end ,  
 "pm_start" =>$pm_start ,  
 "pm_end" =>$pm_end ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function schedule_add($contact_id ,  $day ,  $am_start ,  $am_end ,  $pm_start ,  $pm_end ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `schedule` ( `id` ,   `contact_id` ,   `day` ,   `am_start` ,   `am_end` ,   `pm_start` ,   `pm_end` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :day ,  :am_start ,  :am_end ,  :pm_start ,  :pm_end ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "day" => $day ,  
 "am_start" => $am_start ,  
 "am_end" => $am_end ,  
 "pm_start" => $pm_start ,  
 "pm_end" => $pm_end ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function schedule_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `day`,  `am_start`,  `am_end`,  `pm_start`,  `pm_end`,  `order_by`,  `status`    
            FROM `schedule` 
            WHERE `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `day` like :txt
OR `am_start` like :txt
OR `am_end` like :txt
OR `pm_start` like :txt
OR `pm_end` like :txt
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

function schedule_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (schedule_list() as $key => $value) {
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
function schedule_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `schedule` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function schedule_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `day`,  `am_start`,  `am_end`,  `pm_start`,  `pm_end`,  `order_by`,  `status`    FROM `schedule` 
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

function schedule_db_show_col_from_table($c) {
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
function schedule_db_col_list_from_table($c){
    $list = array();
    foreach (schedule_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function schedule_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function schedule_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function schedule_update_day($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `day`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function schedule_update_am_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `am_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function schedule_update_am_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `am_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function schedule_update_pm_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `pm_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function schedule_update_pm_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `pm_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function schedule_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function schedule_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `schedule` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function schedule_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            schedule_update_id($id, $new_data);
            break;

        case "contact_id":
            schedule_update_contact_id($id, $new_data);
            break;

        case "day":
            schedule_update_day($id, $new_data);
            break;

        case "am_start":
            schedule_update_am_start($id, $new_data);
            break;

        case "am_end":
            schedule_update_am_end($id, $new_data);
            break;

        case "pm_start":
            schedule_update_pm_start($id, $new_data);
            break;

        case "pm_end":
            schedule_update_pm_end($id, $new_data);
            break;

        case "order_by":
            schedule_update_order_by($id, $new_data);
            break;

        case "status":
            schedule_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function schedule_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `schedule` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/schedule/functions.php
// and comment here (this function)
function schedule_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "day":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "am_start":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "am_end":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "pm_start":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "pm_end":
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
function schedule_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `schedule` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function schedule_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `schedule` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function schedule_exists_day($day){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `day` FROM `schedule` WHERE   `day` = ?");
    $req->execute(array($day));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function schedule_exists_am_start($am_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `am_start` FROM `schedule` WHERE   `am_start` = ?");
    $req->execute(array($am_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function schedule_exists_am_end($am_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `am_end` FROM `schedule` WHERE   `am_end` = ?");
    $req->execute(array($am_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function schedule_exists_pm_start($pm_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `pm_start` FROM `schedule` WHERE   `pm_start` = ?");
    $req->execute(array($pm_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function schedule_exists_pm_end($pm_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `pm_end` FROM `schedule` WHERE   `pm_end` = ?");
    $req->execute(array($pm_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function schedule_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `schedule` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function schedule_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `schedule` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function schedule_is_id($id){
     return (is_id($id) )? true : false ;
}

function schedule_is_contact_id($contact_id){
     return true;
}

function schedule_is_day($day){
     return true;
}

function schedule_is_am_start($am_start){
     return true;
}

function schedule_is_am_end($am_end){
     return true;
}

function schedule_is_pm_start($pm_start){
     return true;
}

function schedule_is_pm_end($pm_end){
     return true;
}

function schedule_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function schedule_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function schedule_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, schedule_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function schedule_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (schedule_is_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (schedule_is_contact_id($value)) ? true : false;
            break;
     case "day":
            $is = (schedule_is_day($value)) ? true : false;
            break;
     case "am_start":
            $is = (schedule_is_am_start($value)) ? true : false;
            break;
     case "am_end":
            $is = (schedule_is_am_end($value)) ? true : false;
            break;
     case "pm_start":
            $is = (schedule_is_pm_start($value)) ? true : false;
            break;
     case "pm_end":
            $is = (schedule_is_pm_end($value)) ? true : false;
            break;
     case "order_by":
            $is = (schedule_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (schedule_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function schedule_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=schedule&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'day':
                echo '<th>' . _tr(ucfirst('day')) . '</th>';
                break;
case 'am_start':
                echo '<th>' . _tr(ucfirst('am_start')) . '</th>';
                break;
case 'am_end':
                echo '<th>' . _tr(ucfirst('am_end')) . '</th>';
                break;
case 'pm_start':
                echo '<th>' . _tr(ucfirst('pm_start')) . '</th>';
                break;
case 'pm_end':
                echo '<th>' . _tr(ucfirst('pm_end')) . '</th>';
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

function schedule_index_generate_column_body_td($schedule, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=schedule&a=details&id=' . $schedule[$col] . '">' . $schedule[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($schedule[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($schedule[$col]) . '</td>';
                break;
case 'day':
                echo '<td>' . ($schedule[$col]) . '</td>';
                break;
case 'am_start':
                echo '<td>' . ($schedule[$col]) . '</td>';
                break;
case 'am_end':
                echo '<td>' . ($schedule[$col]) . '</td>';
                break;
case 'pm_start':
                echo '<td>' . ($schedule[$col]) . '</td>';
                break;
case 'pm_end':
                echo '<td>' . ($schedule[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($schedule[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($schedule[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=schedule&a=details&id=' . $schedule['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=schedule&a=details_payement&id=' . $schedule['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=schedule&a=edit&id=' . $schedule['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=schedule&a=ok_delete&id=' . $schedule['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=schedule&a=export_pdf&id=' . $schedule['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=schedule&a=export_pdf&way=pdf&&id=' . $schedule['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($schedule[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
