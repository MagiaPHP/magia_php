<table class="table table-striped">
    <thead>
        <tr>                             
            <th><?php _t("Work status"); ?></th>
            <th><?php _t("Date start"); ?></th>
            <th><?php _t("Date end"); ?></th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>       
        <?php
        foreach ($hr_employee_work_status as $hr_employee_work_status_item) {

            echo "<tr>";
            echo '<td>';
            echo hr_work_status_field_code('description', $hr_employee_work_status_item['work_status_code']);
            echo ' - ';
            echo (hr_work_status_field_code('available', $hr_employee_work_status_item['work_status_code']) == 0) ? _tr('Not available to work') : _tr('Available to work');
            echo '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_work_status_item['date_start']) . '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_work_status_item['date_end']) . '</td>';
            echo '<td>';
            include view('contacts', 'modal_hr_employee_work_status_edit');
            echo '</td>';
            echo '<td>';
            include view('hr_employee_work_status', 'modal_delete');
            echo '</td>';
            echo "</tr>";

//                foreach ($cols_to_show_keys as $key => $col) {
//
//                    switch ($col) {
//                        case 'id':
//                            echo '<td><a href="index.php?c=hr_employee_work_status&a=details&id=' . $hr_employee_work_status_item[$col] . '">' . $hr_employee_work_status_item[$col] . '</a></td>';
//                            break;
//                        case 'id':
//                            echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
//                            break;
//                        case 'employee_id':
//                            //        echo '<td>' . contacts_formated($hr_employee_work_status_item[$col]) . '</td>';
//                            break;
////                        case 'work_status_code':
////                            echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
////                            break;
//
//                        case 'work_status_code':
//                            echo '<td>';
//                            echo hr_work_status_field_code('description', $hr_employee_work_status_item[$col]);
//                            echo ' - ';
//                            echo (hr_work_status_field_code('available', $hr_employee_work_status_item[$col]) == 0) ? _tr('Not available to work') : _tr('Available to work');
//                            echo '</td>';
//                            break;
//
//                        case 'date_start':
//                            echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
//                            break;
//                        case 'date_end':
//                            echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
//                            break;
//                        case 'order_by':
//                            echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
//                            break;
//                        case 'status':
//                            echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
//                            break;
//                        case 'button_details':
//                            echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_work_status&a=details&id=' . $hr_employee_work_status_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                            break;
//
//                        case 'button_pay':
//                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_work_status&a=details_payement&id=' . $hr_employee_work_status_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                            break;
//
//                        case 'button_edit':
//                            echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_work_status&a=edit&id=' . $hr_employee_work_status_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                            break;
//
//                        case 'button_delete':
//                            echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_work_status&a=ok_delete&id=' . $hr_employee_work_status_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
//                            break;
//
//                        case 'button_print':
//                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_work_status&a=export_pdf&id=' . $hr_employee_work_status_item['id'] . '">' . icon("print") . '</a></td>';
//                            break;
//
//                        case 'button_save':
//                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_work_status&a=export_pdf&way=pdf&&id=' . $hr_employee_work_status_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                            break;
//
//                        case 'modal_edit':
//                            echo '<td>';
//                            include view('contacts', 'modal_hr_employee_work_status_edit');
//                            echo '</td>';
//                            break;
//
//                        case 'modal_delete':
//                            echo '<td>';
//                            include view('hr_employee_work_status', 'modal_delete');
//                            echo '</td>';
//
//                            break;
//
//                        default:
//                            echo '<td>' . ($hr_employee_work_status[$col]) . '</td>';
//                            break;
//                    }
//                }
        }
        ?>	

    </tbody>

</table>

