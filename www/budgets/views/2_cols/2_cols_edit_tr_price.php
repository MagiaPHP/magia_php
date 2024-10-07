

<?php

switch ($line_type) {
    case 'normal':
        include "2_cols_edit_tr_price_line_normal.php";
        break;

    case 'separator':
        include "2_cols_edit_tr_price_line_separator.php";
        break;

    case 'note':
        include "2_cols_edit_tr_price_line_note.php";
        break;

    case 'category':
        include "2_cols_edit_tr_price_line_category.php";
        break;

    default:
        include "2_cols_edit_tr_price_line_normal.php";
        break;
}
?> 

