<?php

function projects_inout_search_by_invoice_id() {
    return 0;
}

function projects_list_by_contact_id() {
    return 0;
}

function projects_total_by_contact_id($contact_id) {

    global $db;
    $data = null;
    $sql = "SELECT COUNT(`id`) as total     
            FROM `projects` 
            WHERE `contact_id` =  :contact_id
            ";
    $query = $db->prepare($sql);
    $query->bindValue(':contact_id', (int) $contact_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

function projects_total_by_status($status) {

    global $db;
    $data = null;
    $sql = "SELECT COUNT(`id`) as total     
            FROM `projects` 
            WHERE `status` =  :status
            ";
    $query = $db->prepare($sql);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

// SEARCH
function projects_search_full($txt, $start = 0, $limit = 999) {
    global $db;
    
    $data = null;
    
    $sql = "SELECT *, c.id, c.name, c.lastname
            
            FROM `projects` as p
            
            INNER JOIN `contacts` as c ON p.contact_id = c.id
            
            WHERE 
            
               `c`.`id`             like :txt 
            OR `c`.`name`           like :txt
            OR `c`.`lastname`       like :txt

            OR `p`.`id`             like :txt
            OR `p`.`contact_id`     like :txt
            OR `p`.`name`           like :txt
            OR `p`.`description`    like :txt
            OR `p`.`address`        like :txt
            OR `p`.`date_start`     like :txt
            OR `p`.`date_end`       like :txt
            OR `p`.`order_by`       like :txt
            OR `p`.`status`         like :txt
 
    ORDER BY `p`.`order_by`, p.date_end 
    
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

function projects_create_from_budget($budget) {

    // si desea crear un proyecto, 
    $code_magia_inique = magia_uniqid();
    //
    $project['contact_id'] = $budget->getClient_id();
    $project['name'] = 'Project: ' . ($budget->getTitle()) ?? '';
    $project['description'] = '';
    $project['address'] = '';
    $project['date_start'] = date('Y-m-d');
    $project['date_end'] = null;
    $project['code'] = $code_magia_inique;
    $project['order_by'] = 1;
    $project['status'] = 1;
    //
    projects_add(
            $project['contact_id'],
            $project['name'],
            $project['description'],
            $project['address'],
            $project['date_start'],
            $project['date_end'],
            $project['code'],
            $project['order_by'],
            $project['status']
    );

    // obtengo el id del proyecto agregado 
    $project_id = projects_field_code('id', $code_magia_inique);

    // registro el budget a este proyecto con el 100% de su valor 

    $total_for_project = ( $budget->getTotal() + $budget->getTax() );

    // actualizo en la tabla in / out 
    projects_inout_add_budget($project_id, $budget->getId(), $total_for_project);
    //
    //
    //
}
