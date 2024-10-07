<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// SEARCH
function forms_search_by_and_table_action($table, $action, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT *  FROM `forms` 
    WHERE `m_table` = '$table' 
        AND m_action = '$action'
    ORDER BY `order_by` 
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

function forms_countries_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (countries_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function forms_select_table_col($table, $col) {
    global $db;
    $data = null;
    $sql = "SELECT $col  FROM `$table` ";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function forms_select_cols_from_table($table) {
    global $db;
    $data = null;
    $sql = "SELECT *  FROM `$table`  ";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function forms_insert_in_page($form_id) {
    $forms2 = new Forms2();
    $forms2->setForms($form_id);
    $forms2->add_lines();

//    if ($line) {
//        $fl = new Forms_lines();
//        $fl->setForms_lines(forms_lines_search_by_form_line($forms->getId(), $line)['id']);
//    }

    include view('forms', 'insert_form');
}

function forms_create_field() {
    
}
