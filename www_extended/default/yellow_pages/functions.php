<?php

//yellow_pages_db_col_list_from_table($c);

function yellow_pages_table_add_col($c, $cols_name_to_add) {

    $cols = yellow_pages_db_col_list_from_table($c);

    if (!$cols_name_to_add) {
        return $cols;
    }

    foreach ($cols_name_to_add as $key => $col_to_add) {
        array_push($cols, $col_to_add);
    }

    return $cols;
}

