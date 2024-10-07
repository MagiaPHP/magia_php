<?php

function doc_models_lines_copy($id) {
    global $db;
    $req = $db->prepare(" INSERT INTO `doc_models_lines` (SELECT null, `modele`, `doc`, `section`, `element`, `name`, `params`, `order_by`, `status` FROM `doc_models_lines` WHERE `id` = :id    ) ");
    $req->execute(array(
        "id" => $id
            )
    );
    return $db->lastInsertId();
}

function doc_models_lines_default($id, $element) {
    global $db;

// UPDATE `doc_elements` SET `params` = '1020' WHERE `doc_elements`.`id` = 8; 



    $req = $db->prepare(" UPDATE `doc_elements` SET `params` = (SELECT `params` FROM `doc_models_lines` WHERE `id` = :id ) WHERE `doc_elements`.`element` = :element  ");
    $req->execute(array(
        "id" => $id,
        "element" => $element
            )
    );
    return $db->lastInsertId();
}

function doc_models_lines_val_max_from($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT MAX($col) FROM `doc_models_lines`");
    $req->execute(array(
//        "col"=>$col
    ));
    $data = $req->fetch();
    return $data[0];
}

// SEARCH
// SELECT id, modele, doc, section, element, name, params, order_by, status  FROM `doc_models_lines` WHERE `modele` LIKE 'a' AND `doc` LIKE 'invoices';

function doc_models_lines_search_modele_doc($modele, $doc) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT DISTINCT `doc_models_lines`.`section`, `doc_sections`.`section`, `doc_sections`.`order_by`
                
            FROM `doc_models_lines` 
            
            JOIN doc_sections ON `doc_models_lines`.`section`=`doc_sections`.`section`
            
            WHERE `modele` = :modele 
            
            AND doc = :doc  ORDER BY `doc_sections`.`order_by` "
    );
    $req->execute(array(
        "modele" => $modele,
        "doc" => $doc,
    ));
    $data = $req->fetchall();
    return $data;
}

// SEARCH
function doc_models_lines_search_modele_doc_section($modele, $doc, $section) {
    global $db;

    $sql = "SELECT `id`,  `modele`, `doc`, `section`,  `element`,  `name`,  `params`,  `order_by`,  `status`    FROM `doc_models_lines` 
    WHERE `modele` = :modele AND  
    `doc` = :doc AND
    `section` = :section 
    ORDER BY `order_by`, `id` ";

    $req = $db->prepare($sql);

    $req->execute(array(
        "modele" => $modele,
        "doc" => $doc,
        "section" => $section
    ));
    $data = $req->fetchall();
    return $data;
}

function doc_models_lines_copy_doc($modele, $doc, $new_doc) {
    global $db;
    $req = $db->prepare("

        INSERT INTO `doc_models_lines` 
        
 (SELECT null, `modele`, :new_doc, `section`, `element`, `name`, `params`, `order_by`, `status` FROM `doc_models_lines` WHERE `modele` = :modele AND `doc` = :doc ) ");

    $req->execute(array(
        "modele" => $modele,
        "doc" => $doc,
        "new_doc" => $new_doc
            )
    );
    return $db->lastInsertId();
}

function doc_models_lines_delete_by_modele_doc($modele, $doc) {
    global $db;
    $req = $db->prepare("DELETE FROM `doc_models_lines` WHERE `modele` =:modele AND `doc`=:doc ");
    $req->execute(array(
        "modele" => $modele,
        "doc" => $doc
    ));
}

function doc_models_lines_search_by_id_doc($id, $doc = null) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `modele`,  `section`,  `element`,  `name`,  `params`,  `order_by`,  `status`   
    FROM `doc_models_lines` 
    WHERE `id` = :id AND `doc` = :doc 
    ");
    $req->execute(array(
        "id" => $id,
        "doc" => $doc,
    ));
    $data = $req->fetch();
    return $data;
}

function doc_models_lines_search_by_modele_doc_section($modele, $doc, $section) {
    global $db;

    $req = $db->prepare("
            SELECT * FROM `doc_models_lines` 
            WHERE `modele` = :modele AND `doc`= :doc AND `section`= :section 
            ORDER BY order_by");
    $req->execute(array(
        "modele" => $modele,
        "doc" => $doc,
        "section" => $section
    ));
    $data = $req->fetchall();

    return (isset($data)) ? $data : false;
}

/**
 * Sin header ni footer
 * @global type $db
 * @param type $modele
 * @param type $doc
 * @return type
 */
function doc_models_lines_search_by_modele_doc($modele, $doc) {
    global $db;

    $req = $db->prepare("
            SELECT *
            FROM `doc_models_lines` 
            WHERE (`section` <> 'header' AND `section` <> 'footer'  ) 
            AND `doc`= :doc AND `modele`= :modele 
            ORDER BY  order_by
            ");
    $req->execute(array(
        "modele" => $modele,
        "doc" => $doc,
//        "section" => $section
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function doc_models_lines_search_by_modele_doc_header($modele, $doc) {
    global $db;

    $req = $db->prepare("
            SELECT *
            FROM `doc_models_lines` 
            WHERE (`section` = 'header'  ) 
            AND `doc`= :doc AND `modele`= :modele 
            ORDER BY section,  order_by
            ");
    $req->execute(array(
        "modele" => $modele,
        "doc" => $doc,
//        "section" => $section
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function doc_models_lines_search_by_modele_doc_footer($modele, $doc) {
    global $db;

    $req = $db->prepare("
            SELECT *
            FROM `doc_models_lines` 
            WHERE (`section` = 'footer'  ) 
            AND `doc`= :doc AND `modele`= :modele 
            ORDER BY section,  order_by
            ");
    $req->execute(array(
        "modele" => $modele,
        "doc" => $doc,
//        "section" => $section
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

//function doc_sections_list_by_modele($start = 0, $limit = 999) {
function doc_models_lines_list_distinct_doc_by_modele($modele, $start = 0, $limit = 999) {
    global $db;
//    $data = null;
    $sql = "SELECT DISTINCT`doc`
    FROM `doc_models_lines` 
    WHERE `modele` = :modele 
    ORDER BY `doc`   Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);

    $query->bindValue(':modele', $modele, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//function doc_sections_list_by_modele($start = 0, $limit = 999) {
function doc_models_lines_list_doc_by_modele($modele, $start = 0, $limit = 999) {
    global $db;
//    $data = null;
    $sql = "SELECT DISTINCT`section` , modele, id  
    FROM `doc_models_lines` WHERE `modele` = :modele ORDER BY `section` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);

    $query->bindValue(':modele', $modele, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function doc_models_lines_list_section_by_modele_doc($modele, $doc, $start = 0, $limit = 999) {
    global $db;
//    $data = null;
    $sql = "SELECT *
    FROM `doc_models_lines` 
    WHERE (`modele` = :modele AND `doc` =:doc ) 
    GROUP BY `section`
    
    ORDER BY `order_by`  
    Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);

    $query->bindValue(':modele', $modele, PDO::PARAM_STR);
    $query->bindValue(':doc', $doc, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function doc_models_lines_by_modele($modele, $start = 0, $limit = 999) {
    global $db;
//    $data = null;
    $sql = "SELECT *
    FROM `doc_models_lines` 
    WHERE (`modele` = :modele ) 
    
    ORDER BY `order_by`  
    
    Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);

    $query->bindValue(':modele', $modele, PDO::PARAM_STR);
//    $query->bindValue(':doc', $doc, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function doc_models_lines_by_modele_doc($modele, $doc, $start = 0, $limit = 999) {
    global $db;
//    $data = null;
    $sql = "SELECT *
    FROM `doc_models_lines` 
    WHERE (`modele` = :modele AND `doc` =:doc ) 
    
    ORDER BY `order_by`  
    
    Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);

    $query->bindValue(':modele', $modele, PDO::PARAM_STR);
    $query->bindValue(':doc', $doc, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function doc_models_lines_get_value_by_key($element, $key) {
    $res = array();

    switch ($element['element']) {

        case 'Cell':
            $cell_hidden = json_decode($element['params'], true)['Cell']['hidden'] ?? false;
            $cell_fill = json_decode($element['params'], true)['Cell']['fill'] ?? false;

            $icon_hidden = ( isset($cell_hidden) && $cell_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($cell_fill) && $cell_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;
            break;

        case 'MultiCell':
            $MultiCell_hidden = json_decode($element['params'], true)['MultiCell']['hidden'] ?? false;
            $MultiCell_fill = json_decode($element['params'], true)['MultiCell']['fill'] ?? false;

            $icon_hidden = ( isset($MultiCell_hidden) && $MultiCell_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($MultiCell_fill) && $MultiCell_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;
            break;

        case 'Image':
            $Image_hidden = json_decode($element['params'], true)['Image']['hidden'] ?? false;
            $Image_fill = json_decode($element['params'], true)['Image']['fill'] ?? false;

            $icon_hidden = ( isset($Image_hidden) && $Image_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($Image_fill) && $Image_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;

            break;

        case 'QR':
            $QR_hidden = json_decode($element['params'], true)['QR']['hidden'] ?? false;
            $QR_fill = json_decode($element['params'], true)['QR']['fill'] ?? false;

            $icon_hidden = ( isset($QR_hidden) && $QR_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($QR_fill) && $QR_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;

            break;

        case 'Line':
            $Line_hidden = json_decode($element['params'], true)['Line']['hidden'] ?? false;
            $Line_fill = json_decode($element['params'], true)['Line']['fill'] ?? false;

            $icon_hidden = ( isset($Line_hidden) && $Line_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($Line_fill) && $Line_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;

            break;

        case 'Link':
            $Link_hidden = json_decode($element['params'], true)['Link']['hidden'] ?? false;
            $Link_fill = json_decode($element['params'], true)['Link']['fill'] ?? false;

            $icon_hidden = ( isset($Link_hidden) && $Link_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($Link_fill) && $Link_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;

            break;

        case 'Ln':
            $Ln_hidden = json_decode($element['params'], true)['Ln']['hidden'] ?? false;
            $Ln_fill = json_decode($element['params'], true)['Ln']['fill'] ?? false;

            $icon_hidden = ( isset($Ln_hidden) && $Ln_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($Ln_fill) && $Ln_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;

            break;

        case 'Rect':

            $Rect_hidden = json_decode($element['params'], true)['Rect']['hidden'] ?? false;
            $Rect_fill = json_decode($element['params'], true)['Rect']['fill'] ?? false;

            $icon_hidden = ( isset($Rect_hidden) && $Rect_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($Rect_fill) && $Rect_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;

            break;

        case 'Line':

            $Line_hidden = json_decode($element['params'], true)['Line']['hidden'] ?? false;
            $Line_fill = json_decode($element['params'], true)['Line']['fill'] ?? false;

            $icon_hidden = ( isset($Line_hidden) && $Line_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($Line_fill) && $Line_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;

            break;

        case 'Text':
            $Text_hidden = json_decode($element['params'], true)['Text']['hidden'] ?? false;
            $Text_fill = json_decode($element['params'], true)['Text']['fill'] ?? false;

            $icon_hidden = ( isset($Text_hidden) && $Text_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($Text_fill) && $Text_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;

            break;

        case 'Write':

            $Write_hidden = json_decode($element['params'], true)['Write']['hidden'] ?? false;
            $Write_fill = json_decode($element['params'], true)['Write']['fill'] ?? false;

            $icon_hidden = ( isset($Write_hidden) && $Write_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($Write_fill) && $Write_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;
            break;

        case 'AddPage':

            $AddPage_hidden = json_decode($element['params'], true)['AddPage']['hidden'] ?? false;
            $AddPage_fill = json_decode($element['params'], true)['AddPage']['fill'] ?? false;

            $icon_hidden = ( isset($AddPage_hidden) && $AddPage_hidden ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : false;
            $icon_fill = (isset($AddPage_fill) && $AddPage_fill ) ? '<spam class="glyphicon glyphicon-tint"></spam>' : false;

            break;

        default:

            break;
    }


    $res['hidden'] = $icon_hidden;
    $res['fill'] = $icon_fill;

    return $res[$key];
}
