<?php

function banks_lines_check_index_generate_column_body_td($banks_lines_check, $colsToShow) {

    global $u_owner_id;

    $icon = icon('remove');

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=banks_lines_check&a=details&id=' . $banks_lines_check[$col] . '">' . $banks_lines_check[$col] . '</a></td>';
                break;

            case 'id':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;

            case 'my_account':
                if (banks_search_by_account_contact($banks_lines_check[$col], $u_owner_id)) {
                    $my_account_html = $banks_lines_check[$col];
                    $my_account_class = ' success ';
                    $my_account_sms = '';
                } else {
                    $my_account_html = $icon . " <b>" . $banks_lines_check[$col] . "</b>";
                    $my_account_class = $class = 'danger';
                    $my_account_sms = _tr("This account number does not exist in the system");
                }


                echo '<td class="' . $my_account_class . '">' . $my_account_html . '<br>' . $my_account_sms . '</td>';
                break;

            case 'operation':


                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'date_operation':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'description':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'type':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'total':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'currency':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'date_value':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'account_sender':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'sender':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'comunication':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ce':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'details':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'message':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'id_office':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'office_name':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'value_bankCheck_transaction':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'countable_balance':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'suffix_account':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'sequential':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'available_balance':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'debit':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'credit':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref2':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref3':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref4':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref5':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref6':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref7':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref8':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref9':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'ref10':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'date_registre':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'code':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'order_by':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'status':
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=banks_lines_check&a=details&id=' . $banks_lines_check['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=banks_lines_check&a=details_payement&id=' . $banks_lines_check['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;

            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks_lines_check&a=edit&id=' . $banks_lines_check['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_lines_check&a=export_pdf&id=' . $banks_lines_check['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_lines_check&a=export_pdf&way=pdf&&id=' . $banks_lines_check['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

            default:
                echo '<td>' . ($banks_lines_check[$col]) . '</td>';
                break;
        }
    }
}

function banks_lines_check_copy($ids_array) {
    global $db;

    $ids_array_to_copy = implode(',', $ids_array);

    $req = $db->prepare(
            "INSERT INTO `banks_lines` 
            
 SELECT 
             *
            
            FROM `banks_lines_check`  WHERE `banks_lines_check`.`id` IN ($ids_array_to_copy) ");

    $req->execute(array(
//        "ids_array" => implode(',', $ids_array)
    ));
}

function banks_lines_check_list_to_check($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `my_account`,  `operation`,  `date_operation`,  `description`,  `type`,  `total`,  `currency`,  `date_value`,  `account_sender`,  `sender`,  `comunication`,  `ce`,  `details`,  `message`,  `id_office`,  `office_name`,  `value_bankCheck_transaction`,  `countable_balance`,  `suffix_account`,  `sequential`,  `available_balance`,  `debit`,  `credit`,  `ref`,  `ref2`,  `ref3`,  `ref4`,  `ref5`,  `ref6`,  `ref7`,  `ref8`,  `ref9`,  `ref10`,  `date_registre`,  `code`,  `order_by`,  `status`   
    FROM `banks_lines_check` ORDER BY `order_by` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_check_delete_all_lines() {
    global $db;
    $req = $db->prepare("DELETE FROM `banks_lines_check` ");
    $req->execute(array());
}
