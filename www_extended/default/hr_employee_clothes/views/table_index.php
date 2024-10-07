
<?php //Creation date:  2024-06-17 03:06:23        ?>


<?php
if (_options_option("config_hr_employee_clothes_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_hr_employee_clothes_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped" border>
    <thead>
        <tr>            
            <?php hr_employee_clothes_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tbody>

        <?php
//        if (!$hr_employee_clothes) {
//            message("info", "No items");
//        }

        foreach ($hr_employee_clothes as $hr_employee_clothes_item) {
            echo '<tr>';
            foreach ($cols_to_show_keys as $key => $col) {

                switch ($col) {
                    case 'id':
                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
                        break;
                    case 'employee_sizes_clothes_id':

                        echo '<td>' . hr_clothes_field_code('name', hr_employee_sizes_clothes_field_id('clothes_code', $hr_employee_clothes_item[$col])) . ' : ' . hr_employee_sizes_clothes_field_id('size', $hr_employee_clothes_item[$col]) . '</td>';

                        break;
                    case 'date_of_delivery':
                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
                        break;
                    case 'notes':
                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
                        break;
                    case 'order_by':
                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
                        break;
                    case 'status':
                        echo '<td>' . ($hr_employee_clothes_item[$col]) . '</td>';
                        break;
                    case 'button_details':
                        echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_clothes&a=details&id=' . $hr_employee_clothes_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case 'button_pay':
                        echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_clothes&a=details_payement&id=' . $hr_employee_clothes_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case 'button_edit':
                        echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_clothes&a=edit&id=' . $hr_employee_clothes_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case 'button_delete':
                        echo '<td>';
                        include view("hr_employee_clothes", "modal_delete");
                        echo '</td>';
                        break;

                    case 'button_print':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_clothes&a=export_pdf&id=' . $hr_employee_clothes_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case 'button_save':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_clothes&a=export_pdf&way=pdf&&id=' . $hr_employee_clothes_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    default:
                        echo '<td>' . ($hr_employee_clothes[$col]) . '</td>';
                        break;
                }
            }

            echo '</tr>';
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

