<?php

# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-24 09:08:44 
# Aca puedes agregar tus funciones  

function magia_forms_lines_list_by_form_id($mg_form_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `mg_form_id`,  `mg_type`,  `mg_external_table`,  `mg_external_col`,  `mg_label`,  `mg_help_text`,  `mg_name`,  `mg_id`,  `mg_placeholder`,  `mg_value`,  `mg_class`,  `mg_required`,  `mg_disabled`,  `order_by`,  `status`   
    
    FROM `magia_forms_lines`  
    
    WHERE `mg_form_id` =:mg_form_id
    
    ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':mg_form_id', (int) $mg_form_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
