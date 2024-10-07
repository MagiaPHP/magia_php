<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Category"); ?></th>
            <th><?php _t("Date of joining the company"); ?></th>
            <th><?php _t("Date of departure from the company"); ?></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($hr_employee_category as $hr_employee_category_item) {

            echo "<tr>";
            echo '<td>' . _tr(hr_categories_field_code('description', $hr_employee_category_item['category_code'])) . '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_category_item['date_start']) . '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_category_item['date_end']) . '</td>';
            echo '<td>';
            include "modal_hr_employee_category_edit.php";
            echo '</td>';
            echo '<td>';
            include "modal_hr_employee_category_delete.php";
            echo '</td>';
            echo '<td></td>';
            echo "</tr>";

//                foreach ($cols_to_show_keys as $key => $col) {
//
//                    switch ($col) {
//                        case 'id':
//                            echo '<td><a href="index.php?c=hr_employee_category&a=details&id=' . $hr_employee_category_item[$col] . '">' . $hr_employee_category_item[$col] . '</a></td>';
//                            break;
//                        case 'id':
//                            echo '<td>' . ($hr_employee_category_item[$col]) . '</td>';
//                            break;
//                        case 'employee_id':
//                            //    echo '<td><a href="index.php?c=contacts&a=hr_employee_category&id=' . $hr_employee_category_item[$col] . '">' . contacts_formated($hr_employee_category_item[$col]) . '</a></td>';
//                            break;
//                        case 'category_code':
//                            echo '<td>' . hr_categories_field_code('description', $hr_employee_category_item[$col]) . '</td>';
//                            break;
//                        case 'date_start':
//                            echo '<td>' . ($hr_employee_category_item[$col]) . '</td>';
//                            break;
//                        case 'date_end':
//                            echo '<td>' . ($hr_employee_category_item[$col]) . '</td>';
//                            break;
//                        case 'order_by':
//                            echo '<td>' . ($hr_employee_category_item[$col]) . '</td>';
//                            break;
//                        case 'status':
//                            echo '<td>' . ($hr_employee_category_item[$col]) . '</td>';
//                            break;
//                        case 'button_details':
//                            echo '<td>';
//                            //include "modal_hr_employee_category_edit.php";
////                            include "modal_hr_employee_category_delete.php";
//                            echo '</td>';
//
//                            //         echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_category&a=details&id=' . $hr_employee_category_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                            break;
//                        case 'button_edit':
////                            echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_category&a=details&id=' . $hr_employee_category_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                            break;
//
//                        case 'button_pay':
//                            //        echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_category&a=details_payement&id=' . $hr_employee_category_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                            break;
//
//                        case 'modal_edit':
//                            echo '<td>';
//                            include "modal_hr_employee_category_edit.php";
////                            include "modal_hr_employee_category_delete.php";
//                            echo '</td>';
//
//                            //         echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_category&a=details&id=' . $hr_employee_category_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                            break;
//
//                        case 'modal_delete':
//                            echo '<td>';
//                            include view('hr_employee_category', 'modal_delete');
//                            echo '</td>';
//                            break;
//
//                        case 'button_print':
//                            //        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_category&a=export_pdf&id=' . $hr_employee_category_item['id'] . '">' . icon("print") . '</a></td>';
//                            break;
//
//                        case 'button_save':
//                            //        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_category&a=export_pdf&way=pdf&&id=' . $hr_employee_category_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                            break;
//
//                        default:
//                            echo '<td>' . ($hr_employee_category[$col]) . '</td>';
//                            break;
//                    }
//                }
        }
        ?>	

    </tbody>

</table>
