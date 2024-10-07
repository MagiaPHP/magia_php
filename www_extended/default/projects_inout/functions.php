<?php

function projects_inout_by_field($field) {

    if ($field) {
        return false;
    }

    switch ($field) {
        case 'project_id' :
            return projects_inout_by_project_id($field);
            break;

        case 'budget_id' :
            return projects_inout_by_budget_id($field);
            break;

        case 'invoice_id' :
            return projects_inout_by_invoice_id($field);
            break;

        case 'expense_id' :
            return projects_inout_by_expense_id($field);
            break;

        default:
            return false;
            break;
    }
}

function projects_inout_by_project_id($id) {
    return projects_inout_search_by('project_id', $id);
}

function projects_inout_by_budget_id($id) {
    return 0;
}

function projects_inout_by_invoice_id($id) {
    return 0;
}

function projects_inout_by_expense_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `projects_inout` WHERE `expense_id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function projects_inout_total_in($project_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT SUM(`value`) as total FROM `projects_inout` WHERE `project_id` =:project_id  AND  `invoice_id` IS NOT NULL ");
    $req->execute(array(
        'project_id' => $project_id
    ));
    $data = $req->fetch();
    return $data['total'];
}

function projects_inout_total_out($project_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT SUM(`value`) as total FROM `projects_inout` WHERE `project_id` =:project_id  AND  `expense_id` IS NOT NULL ");
    $req->execute(array(
        'project_id' => $project_id
    ));
    $data = $req->fetch();
    return $data['total'];
}

function projects_inout_total_by_expense_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT SUM(`value`) as total FROM `projects_inout` WHERE `expense_id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data['total'];
}

function projects_inout_total_by_invoice_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT SUM(`value`) as total FROM `projects_inout` WHERE `invoice_id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data['total'];
}

function projects_inout_add_expense($project_id, $expense_id, $value) {
    global $db;
    $req = $db->prepare("INSERT INTO `projects_inout` (`id`, `project_id`, `expense_id`, `value`  ) value (:id, :project_id,  :expense_id, :value)  ");
    $req->execute(array(
        'id' => null,
        'project_id' => $project_id,
        'expense_id' => $expense_id,
        'value' => $value,
    ));
}

function projects_inout_add_budget($project_id, $budget_id, $value) {
    global $db;
    $req = $db->prepare("INSERT INTO `projects_inout` (`id`, `project_id`, `budget_id`, `value`  ) value (:id, :project_id,  :budget_id, :value)  ");
    $req->execute(array(
        'id' => null,
        'project_id' => $project_id,
        'budget_id' => $budget_id,
        'value' => $value,
    ));
}

//
function projects_inout_add_invoice($project_id, $invoice_id, $value) {
    global $db;
    $req = $db->prepare("INSERT INTO `projects_inout` (`id`, `project_id`, `invoice_id`, `value`  ) value (:id, :project_id,  :invoice_id, :value)  ");
    $req->execute(array(
        'id' => null,
        'project_id' => $project_id,
        'invoice_id' => $invoice_id,
        'value' => $value,
    ));
}

//INSERT INTO `projects_inout` (`id`, `project_id`, `budget_id`, `invoice_id`, `expense_id`, `value`, `order_by`, `status`) VALUES (NULL, '43', NULL, NULL, '275', NULL, '1', '1'); 



function projects_inout_remove_expense($project_id, $expense_id) {
    global $db;
    $req = $db->prepare("DELETE FROM `projects_inout` WHERE `project_id` = :project_id AND expense_id = :expense_id  ");
    $req->execute(array(
        'project_id' => $project_id,
        'expense_id' => $expense_id
    ));
}

function projects_inout_remove_invoice($project_id, $invoice_id) {
    global $db;
    $req = $db->prepare("DELETE FROM `projects_inout` WHERE `project_id` = :project_id AND invoice_id = :invoice_id  ");
    $req->execute(array(
        'project_id' => $project_id,
        'invoice_id' => $invoice_id
    ));
}

function projects_inout_list_without_expense_id($expense_id, $start = 0, $limit = 999999) {
    global $db;
    $data = null;
    $sql = "SELECT *       
    FROM `projects`     
    WHERE `id` NOT IN (SELECT `project_id` FROM `projects_inout` WHERE `expense_id` = :expense_id )    
    ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':expense_id', (int) $expense_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function projects_inout_list_without_invoice_id($invoice_id, $start = 0, $limit = 999999) {
    global $db;
    $data = null;
    $sql = "SELECT *       
    FROM `projects`     
    WHERE `id` NOT IN (SELECT `project_id` FROM `projects_inout` WHERE `invoice_id` = :invoice_id )    
    ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':invoice_id', (int) $invoice_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function projects_inout_list_by_expense_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `projects_inout` WHERE `expense_id`= ?");
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data;
}
