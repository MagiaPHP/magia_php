<?php

switch ($line_type) {
    case 'normal':
        include "details_tr_price_line_normal.php";
        break;

    case 'separator':
        include "details_tr_price_line_separator.php";
        break;

    case 'note':
        include "details_tr_price_line_note.php";
        break;

    case 'category':
        include "details_tr_price_line_category.php";
        break;

    default:
        break;
}