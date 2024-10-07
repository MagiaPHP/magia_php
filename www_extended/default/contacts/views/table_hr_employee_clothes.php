<table class="table table-striped">
    <thead>
        <tr>            
            <th><?php _t("Clothes"); ?></th>
            <th><?php _t("Delivery date"); ?></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($hr_employee_clothes as $hr_employee_clothes_item) {
            echo '<tr>';
            echo '<td>' . hr_clothes_field_code('name', hr_employee_sizes_clothes_field_id('clothes_code', $hr_employee_clothes_item['employee_sizes_clothes_id'])) . ' : ' . hr_employee_sizes_clothes_field_id('size', $hr_employee_clothes_item['employee_sizes_clothes_id']) . '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_clothes_item['date_of_delivery']) . '</td>';
            echo '<td>' . ($hr_employee_clothes_item['notes']) . '</td>';
            echo '<td>';
            //include 'modal_hr_employee_clothes_edit.php';
            include 'modal_hr_employee_clothes_delete.php';
            echo '</td>';
            echo '</tr>';

//            foreach ($cols_to_show_keys as $key => $col) {
//
//                switch ($col) {
//                    case 'id':
//                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
//                        break;
//                    case 'employee_sizes_clothes_id':
//                        echo '<td>' . hr_clothes_field_code('name', hr_employee_sizes_clothes_field_id('clothes_code', $hr_employee_clothes_item[$col])) . ' : ' . hr_employee_sizes_clothes_field_id('size', $hr_employee_clothes_item[$col]) . '</td>';
//                        break;
//                    case 'date_of_delivery':
//                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
//                        break;
//                    case 'notes':
//                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
//                        break;
//                    case 'order_by':
//                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
//                        break;
//                    case 'status':
//                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
//                        break;
//                        
//                    case 'button_details':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_clothes&a=details&id=' . $hr_employee_clothes_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                        break;
//
//                    case 'button_pay':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_clothes&a=details_payement&id=' . $hr_employee_clothes_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                        break;
//
//                    case 'button_edit':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_clothes&a=edit&id=' . $hr_employee_clothes_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                        break;
//
//                    case 'button_delete':
//                        echo '<td>';
//                        include view("hr_employee_clothes", "modal_delete");
//                        echo '</td>';
//                        break;
//
//                    case 'button_print':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_clothes&a=export_pdf&id=' . $hr_employee_clothes_item['id'] . '">' . icon("print") . '</a></td>';
//                        break;
//
//                    case 'button_save':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_clothes&a=export_pdf&way=pdf&&id=' . $hr_employee_clothes_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                        break;
//
//                    default:
//                        echo '<td>' . ($hr_employee_clothes[$col]) . '</td>';
//                        break;
//                }
//            }
        }
        ?>	
        </tr>
    </tbody>

    <?php
    if ($c == 'contacts') {
        include view("hr_employee_clothes", "table_index_form_add");
    }
    ?>

</table>

