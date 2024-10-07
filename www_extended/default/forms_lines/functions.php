<?php

function forms_lines_search_by_form_id($id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `forms_lines` 
    WHERE `form_id` = '$id' 
    ORDER BY `order_by` 
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);

    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function forms_lines_search_by_form_line($form_id, $line_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `forms_lines` 
    WHERE `form_id` = '$form_id' AND id = $line_id
    ORDER BY `order_by` 
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function forms_lines_add_short(
        $form_id,
        $m_label = null,
        $m_type = null,
        $m_name = null,
        $order_by = 1
) {
    global $db;
    $req = $db->prepare(" INSERT INTO `forms_lines` ( `id`,  `form_id`,  `m_label`,  `m_type`, `m_name`,   `order_by`   )
                                             VALUES  (:id ,  :form_id ,  :m_label ,  :m_type,  :m_name ,   :order_by    ) ");

    $req->execute(array(
        "id" => null,
        "form_id" => $form_id,
        "m_label" => $m_label,
        "m_type" => $m_type,
        "m_name" => $m_name,
        "order_by" => $order_by
            )
    );

    return $db->lastInsertId();
}

function forms_lines_next_order_by($form_id) {
    global $db;
    $sql = "SELECT max(order_by) FROM `forms_lines` WHERE form_id = $form_id ";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}
