<?php

function tasks_contacts_total_by_status_contact($status, $contact_id) {
    global $db;
    $sql = "SELECT COUNT(`id`) FROM `tasks_contacts` WHERE status = :status AND contact_id = :contact_id ";
    $query = $db->prepare($sql);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':contact_id', (int) $contact_id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

function tasks_contacts_search_by_contact($contact_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `tasks_contacts` WHERE `contact_id` = :contact_id  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
//    $query->bindValue(':contact_id', (int) $contact_id,  PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function tasks_contacts_search_by_status($status, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `tasks_contacts` WHERE status = :status Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function tasks_contacts_search_by_status_contact($status, $contact_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `tasks_contacts` WHERE status = :status AND  `contact_id` = :contact_id  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':contact_id', (int) $contact_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
