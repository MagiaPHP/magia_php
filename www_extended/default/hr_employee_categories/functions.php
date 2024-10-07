<?php

function hr_employee_category_list_codes_by_employee_id($employee_id) {
    $res = array();

    foreach (hr_employee_category_search_by("employee_id", $employee_id) as $key => $item) {
        array_push($res, $item['category_code']);
    }

    return $res;
}
