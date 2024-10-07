<?php

/**
 * Edita todo exepto el code
 * @global type $db
 * @param type $id
 * @param type $code
 * @param type $name
 * @param type $description
 * @param type $icon
 * @param type $color
 * @param type $order_by
 * @param type $status
 */
function banks_lines_status_edit_no_code($id, $name, $description, $icon, $color, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines_status` SET `name` =:name, `description` =:description, `icon` =:icon, `color` =:color, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "name" => $name,
        "description" => $description,
        "icon" => $icon,
        "color" => $color,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function xxxxxbanks_lines_status_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=banks_lines_status&a=details&id=' . $col_to_show . '">' . $col_to_show . '</a></th>';
                break;

            case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
            case 'name':
                echo '<th>' . _tr(ucfirst('Status')) . '</th>';
                break;
            case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
            case 'icon':
                echo '<th>' . _tr(ucfirst('icon')) . '</th>';
                break;
            case 'color':
                echo '<th>' . _tr(ucfirst('color')) . '</th>';
                break;
            case 'order_by':
                echo '<th>' . _tr(ucfirst('order_by')) . '</th>';
                break;
            case 'status':
                echo '<th>' . _tr(ucfirst('status')) . '</th>';
                break;

            case 'button_details':
            case 'button_pay':
            case 'button_edit':
            case 'button_print':
            case 'button_save':
                echo '<th></th>';
                break;

            default:
                echo '<th>' . _tr(ucfirst($col_to_show)) . '</th>';
                break;
        }
    }
}

function xxxxxbanks_lines_status_index_generate_column_body_td($banks_lines_status, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=banks_lines_status&a=details&id=' . $banks_lines_status[$col] . '">' . $banks_lines_status[$col] . '</a></td>';
                break;

            case 'id':
                echo '<td>' . ($banks_lines_status[$col]) . '</td>';
                break;
            case 'code':
                echo '<td>' . ($banks_lines_status[$col]) . '</td>';
                break;
            case 'name':
                echo '<td>' . _tr($banks_lines_status[$col]) . '</td>';
                break;
            case 'description':
                echo '<td>' . _tr($banks_lines_status[$col]) . '</td>';
                break;
            case 'icon':
                echo '<td><span class="' . ($banks_lines_status[$col]) . '"></span></td>';
                break;
            case 'color':
                echo '<td bgcolor= "' . $banks_lines_status[$col] . '" >' . ($banks_lines_status[$col]) . '</td>';
                break;
            case 'order_by':
                echo '<td>' . ($banks_lines_status[$col]) . '</td>';
                break;
            case 'status':
                echo '<td>' . ($banks_lines_status[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=banks_lines_status&a=details&id=' . $banks_lines_status['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=banks_lines_status&a=details_payement&id=' . $banks_lines_status['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;

            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks_lines_status&a=edit&id=' . $banks_lines_status['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_lines_status&a=export_pdf&id=' . $banks_lines_status['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_lines_status&a=export_pdf&way=pdf&&id=' . $banks_lines_status['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

            default:
                echo '<td>' . ($banks_lines_status[$col]) . '</td>';
                break;
        }
    }
}
