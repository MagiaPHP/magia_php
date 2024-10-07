<?php

function hr_employee_worked_days_edit_small($id, $total_hours, $project_id, $notes = null) {

    global $db;

    $req = $db->prepare("
    
    UPDATE `hr_employee_worked_days`
    
    SET  
    
    `start_am` = :start_am,
    `end_am` = :end_am,
    `lunch` = :lunch,
    `start_pm` = :start_pm,
    `end_pm` = :end_pm,
    
    `total_hours` = :total_hours , 
    `project_id` = :project_id , 
    `notes` = :notes           
    
    WHERE `id` = :id ");

    $req->execute(array(
        "id" => $id,
        "start_am" => null,
        "end_am" => null,
        "lunch" => null,
        "start_pm" => null,
        "end_pm" => null,
        "total_hours" => $total_hours,
        "project_id" => $project_id,
        "notes" => $notes,
    ));
}

function hr_employee_worked_days_add_small($employee_id, $date, $total_hours, $project_id, $notes, $order_by, $status) {
    global $db;
    $req = $db->prepare(
            " INSERT INTO `hr_employee_worked_days` ( `id`, `employee_id`, `date`, `start_am`, `end_am`, `lunch`, `start_pm`, `end_pm`, `total_hours`, `project_id`, `notes`, `order_by`, `status` )
                                               VALUES (:id, :employee_id,   :date,  :start_am, :end_am,   :lunch, :start_pm,   :end_pm,  :total_hours, :project_id, :notes, :order_by, :status ) ");

    $req->execute(array(
        "id" => null,
        "employee_id" => $employee_id,
        "date" => $date,
        "start_am" => null,
        "end_am" => null,
        "lunch" => null,
        "start_pm" => null,
        "end_pm" => null,
        "total_hours" => $total_hours,
        "project_id" => $project_id,
        "notes" => $notes,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function hr_employee_worked_days_update_by_ampm($id, $start_am, $end_am, $lunch, $start_pm, $end_pm, $total_hours, $project_id, $notes = null, $order_by = 1, $status = 1) {

    global $db;

    $req = $db->prepare("
    
    UPDATE `hr_employee_worked_days`
    
    SET    
    
    `start_am` = :start_am , 
    `end_am` = :end_am , 
    `lunch` = :lunch , 
    `start_pm` = :start_pm , 
    `end_pm` = :end_pm , 
    `total_hours` = :total_hours , 
    
    `project_id` = :project_id , 
    `notes` = :notes           
    
    WHERE `id` = :id ");

    $req->execute(array(
        "id" => $id,
        "start_am" => $start_am,
        "end_am" => $end_am,
        "lunch" => $lunch,
        "start_pm" => $start_pm,
        "end_pm" => $end_pm,
        "total_hours" => $total_hours,
        //
        "project_id" => $project_id,
        "notes" => $notes,
//        "order_by" => $order_by,
//        "status" => $status
            )
    );
}

// Worked days by date employee
function hr_employee_worked_days_search_by_date_employee($date, $employee_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    // SEC_TO_TIME(( (  TIME_TO_SEC(`end_am`) - TIME_TO_SEC(`start_am`) ) + (TIME_TO_SEC(`end_pm`) - TIME_TO_SEC(`start_pm`) ) - TIME_TO_SEC(`lunch`) )) as total_worked, 

    $sql = "SELECT `id`, `employee_id`, `date`, `start_am`, `end_am`, `lunch`, `start_pm`, `end_pm`, `total_hours`,
 `project_id`, `notes`, `order_by`, `status` FROM `hr_employee_worked_days`

WHERE `date` = :date AND `employee_id` = :employee_id

ORDER BY `date`

Limit $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':date', $date, PDO::PARAM_STR);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// Worked days by date employee
function hr_employee_worked_days_search_by_date_project($date, $project_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT `id`, `employee_id`, `date`, `start_am`, `end_am`, `lunch`, `start_pm`, `end_pm`, `total_hours`,
    
    SEC_TO_TIME(( ( TIME_TO_SEC(`end_am`) - TIME_TO_SEC(`start_am`) ) + (TIME_TO_SEC(`end_pm`) - TIME_TO_SEC(`start_pm`) ) - TIME_TO_SEC(`lunch`) )) as total_worked,
    
    `project_id`, `notes`, `order_by`, `status` FROM `hr_employee_worked_days`

    WHERE `date` = :date AND `project_id` = :project_id

    ORDER BY `date`

Limit $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':date', $date, PDO::PARAM_STR);
    $query->bindValue(':project_id', $project_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// Worked days by date employee
function hr_employee_worked_days_search_by_project_from_to($project_id, $from, $to, $start = 0, $limit = 999) {
    global $db;

    $data = null;

    //     SEC_TO_TIME(( (  TIME_TO_SEC(`end_am`) - TIME_TO_SEC(`start_am`) ) + (TIME_TO_SEC(`end_pm`) - TIME_TO_SEC(`start_pm`) ) - TIME_TO_SEC(`lunch`) )) as total_worked, 

    $sql = "SELECT `id`, `employee_id`, `date`, `start_am`, `end_am`, `lunch`, `start_pm`, `end_pm`, `total_hours`,
        
    `total_hours` as total_worked,
 
    `project_id`, `notes`, `order_by`, `status`

    FROM `hr_employee_worked_days`

    WHERE `project_id` = :project_id AND ( `date` >= :from AND `date` <= :to )

ORDER BY `date`

Limit :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':from', "$from", PDO::PARAM_STR);
    $query->bindValue(':to', "$to", PDO::PARAM_STR);
    $query->bindValue(':project_id', $project_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// Worked days by date employee
function hr_employee_worked_days_search_by_from_to($from, $to, $start = 0, $limit = 999) {
    global $db;

    $data = null;

 // Definimos la consulta SQL
    $sql = "SELECT `id`, `employee_id`, `date`, `start_am`, `end_am`, `lunch`, `start_pm`, `end_pm`, `total_hours`,
                   `total_hours` as total_worked,
                   `project_id`, `notes`, `order_by`, `status`
            FROM `hr_employee_worked_days`
            WHERE `date` >= :from AND `date` <= :to
            ORDER BY `date`
            LIMIT :limit OFFSET :start";

    $query = $db->prepare($sql);
    $query->bindValue(':from', "$from", PDO::PARAM_STR);
    $query->bindValue(':to', "$to", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// Worked days by date employee
function hr_employee_worked_days_search_by_month_year($month, $year, $start = 0, $limit = 999) {
    global $db;

    $data = null;

    $sql = "SELECT *

        FROM `hr_employee_worked_days`

        WHERE  `month` = :month AND `year` = :year 

        GROUP BY `employee_id`

        ORDER BY `date`

        Limit :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':year', $to, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// Worked days by date employee
function hr_employee_worked_days_search_by_year_month($year, $month, $start = 0, $limit = 99999, $order_by = null) {
    global $db;

    $order_by_col = $order_by['col'] ?? 'id';
    $order_by_way = $order_by['way'] ?? 'desc';

    $data = null;

    $sql = "
SELECT
 
hewd.`id`,
 hewd.`employee_id`,
 hewd.`date`,
 hewd.`start_am`,
 hewd.`end_am`,
 hewd.`lunch`,
 hewd.`start_pm`,
 hewd.`end_pm`,
 hewd.`total_hours`,
 hewd.`total_hours` AS total_worked,
 hewd.`project_id`,
 hewd.`notes`,
 hewd.`order_by`,
 hewd.`status`,
 hewd.`year`,
 hewd.`month`
 
FROM

`hr_employee_worked_days` hewd

INNER JOIN (

    SELECT
    `employee_id`,
     MIN(`date`) AS min_date

    FROM
    `hr_employee_worked_days`

    WHERE

    YEAR(`date`) = :year AND MONTH(`date`) = :month

    GROUP BY

    `employee_id`

) AS first_dates

ON hewd.`employee_id` = first_dates.`employee_id`

AND hewd.`date` = first_dates.`min_date`
    
ORDER BY $order_by_col $order_by_way

LIMIT

:limit OFFSET :start;

";
    $query = $db->prepare($sql);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH by date and employee
function hr_employee_worked_days_total_sec_worked_by_month_employee($month, $employee_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    //    SEC_TO_TIME(SUM(( (  TIME_TO_SEC(`end_am`) - TIME_TO_SEC(`start_am`) ) + (TIME_TO_SEC(`end_pm`) - TIME_TO_SEC(`start_pm`) ) - TIME_TO_SEC(`lunch`) ))) as total, 


    $sql = "SELECT

SUM(`total_hours`) as total

FROM `hr_employee_worked_days`

WHERE MONTH(`date`) = :month AND `employee_id` = :employee_id


";
    $query = $db->prepare($sql);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data['total'] ?? 0;
}

// todos los meses de junio poco imporrta el ano
function hr_employee_worked_days_total_days_worked_by_month_employee_xxxxxxxxxxxxx($month, $employee_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT

COUNT(DISTINCT(`date`)) as total

FROM `hr_employee_worked_days`

WHERE MONTH(`date`) = :month AND `employee_id` = :employee_id

";
    $query = $db->prepare($sql);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data['total'] ?? 0;
}

//
function hr_employee_worked_days_total_days_worked_by_year_month_employee($year, $month, $employee_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT

    COUNT(DISTINCT(`date`)) as total

    FROM `hr_employee_worked_days`

    WHERE ( YEAR(`date`) = :year AND MONTH(`date`) = :month ) AND `employee_id` = :employee_id 
    
    AND `total_hours` IS NOT NULL
    

";
    $query = $db->prepare($sql);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data['total'] ?? 0;
}

//
function hr_employee_worked_days_total_days_worked_by_year_month_project_id($year, $month, $project_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT

    COUNT(DISTINCT(`date`)) as total

    FROM `hr_employee_worked_days`

    WHERE ( YEAR(`date`) = :year AND MONTH(`date`) = :month ) AND `project_id` = :project_id
    
    AND `total_hours` IS NOT NULL

";
    $query = $db->prepare($sql);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':project_id', $project_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data['total'] ?? 0;
}

// ok
function hr_employee_worked_days_total_worked_by_year_month_project_id($year, $month, $project_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT

    SEC_TO_TIME( SUM( TIME_TO_SEC( `total_hours` ) ) ) AS hours,   
    
    ( SUM( TIME_TO_SEC( `total_hours` ) ) )/3600 AS hours_100,      
    
    SUM(TIME_TO_SEC(`total_hours`)) as sec

    FROM `hr_employee_worked_days`

    WHERE ( YEAR(`date`) = :year AND MONTH(`date`) = :month )AND `project_id` = :project_id

";
    $query = $db->prepare($sql);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':project_id', $project_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data ?? 0;
}

// ok
function hr_employee_worked_days_total_worked_by_year_month_employee_id($year, $month, $employee_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT

    SEC_TO_TIME( SUM( TIME_TO_SEC( `total_hours` ) ) ) AS hours,        
     
    ( SUM( TIME_TO_SEC( `total_hours` ) ) )/3600 AS hours_100,            
    
    SUM(TIME_TO_SEC(`total_hours`)) as sec

    FROM `hr_employee_worked_days`

    WHERE ( YEAR(`date`) = :year AND MONTH(`date`) = :month )AND `employee_id` = :employee_id

";
    $query = $db->prepare($sql);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data ?? 0;
}

function hr_employee_worked_days_total_sec_worked_by_year_month_employee($year, $month, $employee_id) {
    global $db;
    $data = null;
    $sql = "SELECT

    SEC_TO_TIME( SUM( TIME_TO_SEC( `total_hours` ) ) ) AS hours,   
    
    ( SUM( TIME_TO_SEC( `total_hours` ) ) )/3600 AS hours_100,      
    
    SUM(TIME_TO_SEC(`total_hours`)) as sec

    FROM `hr_employee_worked_days`

    WHERE ( YEAR(`date`) = :year AND MONTH(`date`) = :month )AND `employee_id` = :employee_id


";
    $query = $db->prepare($sql);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data['sec'] ?? 0;
}

/**
 * Calculates the total hours worked by an employee for a given year and month.
 *
 * @param int $year The year for which to calculate the hours.
 * @param int $month The month for which to calculate the hours.
 * @param int $employee_id The ID of the employee.
 * @return array|null An associative array with total hours in different formats or null if no data is found.
 */
function hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $employee_id) {
    global $db;
    $data = null;
    $sql = "SELECT

    SEC_TO_TIME( SUM( TIME_TO_SEC( `total_hours` ) ) ) AS hours, 
    
    ( SUM( TIME_TO_SEC( `total_hours` ) ) )/3600 AS hours_100,        
    
    SUM(TIME_TO_SEC(`total_hours`)) as sec

    FROM `hr_employee_worked_days`

    WHERE ( YEAR(`date`) = :year AND MONTH(`date`) = :month )AND `employee_id` = :employee_id

";
    $query = $db->prepare($sql);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':month', $month, PDO::PARAM_INT);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data ?? null;
}

function hr_employee_worked_days_total_hours_date_project_employee($date, $project_id, $employee_id) {
    global $db;
    $data = null;
    $sql = "SELECT


(SUM(TIME_TO_SEC(`total_hours`))/3600)/24 as days,
 (SUM(TIME_TO_SEC(`total_hours`))/3600) as hours,
 (SUM(TIME_TO_SEC(`total_hours`))) as sec

FROM `hr_employee_worked_days`

WHERE `date` = :date AND project_id = :project_id AND `employee_id` = :employee_id
";
    $query = $db->prepare($sql);
    $query->bindValue(':date', $date, PDO::PARAM_STR);
    $query->bindValue(':project_id', $project_id, PDO::PARAM_INT);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

// SEARCH by dae and employee
function hr_employee_worked_days_total_days_worked_by_employee_period($employee_id, $date_start, $date_end, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT

COUNT(DISTINCT(`date`)) as total

FROM `hr_employee_worked_days`

WHERE ( `date` >= :date_start AND `date` <= :date_end ) AND `employee_id` = :employee_id

";
    $query = $db->prepare($sql);
    $query->bindValue(':date_start', $date_start, PDO::PARAM_STR);
    $query->bindValue(':date_end', $date_end, PDO::PARAM_STR);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data['total'] ?? 0;
}

// SEARCH by dae and employee
function hr_employee_worked_days_total_hours_worked_by_employee_period($employee_id, $date_start, $date_end) {
    global $db;
    $data = null;
    $sql = "SELECT

(SUM(TIME_TO_SEC(`total_hours`))/3600) as total

FROM `hr_employee_worked_days`

WHERE ( `date` >= :date_start AND `date` <= :date_end ) AND `employee_id` = :employee_id

";
    $query = $db->prepare($sql);
    $query->bindValue(':date_start', $date_start, PDO::PARAM_STR);
    $query->bindValue(':date_end', $date_end, PDO::PARAM_STR);
    $query->bindValue(':employee_id', $employee_id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data['total'] ?? 0;
}

// SEARCH by dae and employee
function hr_employee_worked_days_total_hours_worked_by_project_period($project_id, $date_start, $date_end, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT

SUM((`total_hours`)) as total_hours

FROM `hr_employee_worked_days`

WHERE ( `date` >= :date_start AND `date` <= :date_end ) AND `project_id` = :project_id

";
    $query = $db->prepare($sql);
    $query->bindValue(':date_start', $date_start . '00:00:00', PDO::PARAM_STR);
    $query->bindValue(':date_end', $date_end . '23:59:59', PDO::PARAM_STR);
    $query->bindValue(':project_id', $project_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data['total_hours'] ?? 0;
}

function hr_employee_worked_days_format_time($time) {
    if ($time) {
        return magia_dates_time_format($time);
    } else {
        return false;
    }

//    if (!$time) {
//        return false;
//    }
//    return substr($time, 0, 5);
//    
}

function hr_employee_worked_days_search_by_project_id_date($project_id, $month, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`, `employee_id`, `date`, `start_am`, `end_am`, `lunch`, `start_pm`, `end_pm`,
 CONVERT(( (`end_am` - `start_am` ) + (`end_pm` - `start_pm` ) - `lunch` ), time) as total_worked,
 `project_id`, `notes`, `order_by`, `status` FROM `hr_employee_worked_days`

WHERE `project_id` = :project_id AND MONTH(`date`) = :month

ORDER BY `date`

Limit $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':month', $month, PDO::PARAM_STR);
    $query->bindValue(':project_id', $project_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// Todos los trabajadores de un proyecto 
function hr_employee_worked_days_list_project_workers($project_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT DISTINCT(`employee_id`) FROM `hr_employee_worked_days`

WHERE `project_id` = :project_id

ORDER BY `date`

Limit $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':month', $month, PDO::PARAM_STR);
    $query->bindValue(':project_id', $project_id, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

/**
 * 
 * @global type $db
 * @param type $year
 * @param type $month
 * @return type
 */
function hr_employee_worked_days_list_employees_by_year_month($year, $month, $start = 0, $limit = 999) {

    global $db;

    $data = null;

    $sql = "
        SELECT 
            `hewd`.`employee_id`, 
            `c`.`name`, 
            `c`.`lastname`
        FROM 
            `hr_employee_worked_days` AS `hewd`
        JOIN 
            `contacts` AS `c` 
        ON 
            `hewd`.`employee_id` = `c`.`id`
        WHERE 
            YEAR(`hewd`.`date`) = :year 
            AND MONTH(`hewd`.`date`) = :month
        GROUP BY 
            `hewd`.`employee_id`
    
        ORDER BY
            `c`.`lastname` ASC, `c`.`name` ASC
        LIMIT 
            :limit OFFSET :start
    ";
    
    
    $query = $db->prepare($sql);

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);

    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

    $query->execute();

    $data = $query->fetchall();

    return $data;
}

// SEARCH
function hr_employee_worked_days_search_by_period($date_start, $date_end, $start = 0, $limit = 99999) {
    global $db;
    $data = null;

    // CONVERT(( (`end_am` - `start_am` ) + (`end_pm` - `start_pm` ) - `lunch` ), time) as total_worked, 

    $sql = "SELECT `id`, `employee_id`, `date`,
 `start_am`, `end_am`, `lunch`, `start_pm`, `end_pm`,
 `total_hours`,
 `project_id`, `notes`, `order_by`, `status`, `year`, `month`

FROM `hr_employee_worked_days`

WHERE `date` >= :date_start AND `date` <= :date_end

ORDER BY `date`, `start_am`, `start_pm`

Limit $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':date_start', $date_start, PDO::PARAM_STR);
    $query->bindValue(':date_end', $date_end, PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function hr_employee_worked_days_search_by_project_id_week_of_year($project_id, $week_of_year, $start = 0, $limit = 999) {
    global $db;

    $data = null;

    $sql = "SELECT
`id`,
 `employee_id`,
 `date`,
 `start_am`,
 `end_am`,
 `lunch`,
 `start_pm`,
 `end_pm`,
 SEC_TO_TIME(( ( TIME_TO_SEC(`end_am`) - TIME_TO_SEC(`start_am`) ) + (TIME_TO_SEC(`end_pm`) - TIME_TO_SEC(`start_pm`) ) - TIME_TO_SEC(`lunch`) )) as total_worked,
 `project_id`,
 `notes`,
 `order_by`,
 `status`

FROM `hr_employee_worked_days`

WHERE WEEKOFYEAR(`date`) = :week_of_year AND project_id = :project_id

ORDER BY `date`, `id` DESC

Limit :limit OFFSET :start

";
    $query = $db->prepare($sql);
    $query->bindValue(':week_of_year', $week_of_year, PDO::PARAM_INT);
    $query->bindValue(':project_id', $project_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function hr_employee_worked_days_add_by_project_id($employee_id, $date, $start_am, $end_am, $lunch, $start_pm, $end_pm, $total_hours, $project_id, $notes, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_employee_worked_days` ( `id`, `employee_id`, `date`, `start_am`, `end_am`, `lunch`, `start_pm`, `end_pm`, `total_hours`, `project_id`, `notes`, `order_by`, `status` )
VALUES (:id, :employee_id, :date, :start_am, :end_am, :lunch, :start_pm, :end_pm, :total_hours, :project_id, :notes, :order_by, :status ) ");

    $req->execute(array(
        "id" => null,
        "employee_id" => $employee_id,
        "date" => $date,
        "start_am" => $start_am,
        "end_am" => $end_am,
        "lunch" => $lunch,
        "start_pm" => $start_pm,
        "end_pm" => $end_pm,
        "total_hours" => $total_hours,
        "project_id" => $project_id,
        "notes" => $notes,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function hr_employee_worked_days_update_total_hour_by_project_date_total_hours($employee_id, $date, $total_hours, $project_id) {

    global $db;

    $req = $db->prepare("
UPDATE `hr_employee_worked_days`
SET `total_hours` = :total_hours
WHERE employee_id = :employee_id AND date = :date AND project_id = :project_id

");

    $req->execute(array(
        "employee_id" => $employee_id,
        "date" => $date,
        "total_hours" => $total_hours,
        "project_id" => $project_id
    ));
}

function hr_employee_worked_days_update_total_hour_by_id($id, $total_hours) {

    global $db;

    $req = $db->prepare("
    
    UPDATE `hr_employee_worked_days`
    
    SET `total_hours` = :total_hours
    
    WHERE id = :id 

");

    $req->execute(array(
        "id" => $id,
        "total_hours" => $total_hours
    ));
}

function hr_employee_worked_days_max_year() {
    global $db;
    $data = null;
    $sql = "SELECT MAX(`year`) as max FROM `hr_employee_worked_days` ";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data[0]['max'] ?? null;
}

function hr_employee_worked_days_min_year() {
    global $db;
    $data = null;
    $sql = "SELECT MIN(`year`) as min FROM `hr_employee_worked_days` ";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data[0]['min'] ?? null;
}
