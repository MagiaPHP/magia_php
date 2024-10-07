<?php
if (_options_option("config_hr_employee_worked_days_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_hr_employee_worked_days_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>

<table class="table table-striped">
    <thead>
        <tr>                            
            <?php
            // me ayuda al colspan de la tabla abajo
            //vardump($cols_to_show_keys);

            hr_employee_worked_days_index_generate_column_headers($cols_to_show_keys);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr>                            
            <?php
            // me ayuda al colspan de la tabla abajo
            //vardump($cols_to_show_keys);

            hr_employee_worked_days_index_generate_column_headers($cols_to_show_keys);
            ?>
        </tr>
    </tfoot>

    <tbody>

        <?php
        $actual_date = null;
        $total_hours_worked = null;

        $i = 1;

        foreach ($hr_employee_worked_days as $hr_employee_worked_days_item) {

//            vardump($hr_employee_worked_days_item);                       
            //$total_hours_worked = $total_hours_worked + $hr_employee_worked_days_item['total_hours'];

            $next_date = $hr_employee_worked_days_item['date'];

            echo '<tr>';
            if ($actual_date != $next_date) {
                $actual_date = $next_date;
                echo '<td colspan=' . count($cols_to_show_keys) . '><b>' . magia_dates_formated($actual_date) . '</b></td>';
            }
            echo '</tr>';

            
            
            
            echo "<tr>";
            echo '<td>' . $i++ . '</td>';

            foreach ($cols_to_show_keys as $key => $col) {
                switch ($col) {

                    case 'id':
                        echo '<td>' . ($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    case 'employee_id':
                        echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $hr_employee_worked_days_item[$col] . '">' . contacts_formated($hr_employee_worked_days_item[$col]) . '</a></td>';
                        break;

                    case 'date':
                        echo '<td>' . magia_dates_formated($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    case 'start_am':
                        echo '<td>' . hr_employee_worked_days_format_time($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    case 'end_am':
                        echo '<td>' . hr_employee_worked_days_format_time($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    case 'lunch':
                        echo '<td>' . hr_employee_worked_days_format_time($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    case 'start_pm':
                        echo '<td>' . hr_employee_worked_days_format_time($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    case 'end_pm':
                        echo '<td>' . hr_employee_worked_days_format_time($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    case 'total_hours':

                        echo '<td>' . hr_employee_worked_days_format_time($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    case 'project_id':
                        echo '<td><a href="index.php?c=projects&a=hours_worked&id=' . $hr_employee_worked_days_item[$col] . '">' . projects_field_id("name", $hr_employee_worked_days_item[$col]) . '</a></td>';
                        break;

                    //
                    case 'notes':
                        echo '<td>' . ($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    //
                    case 'order_by':
                        echo '<td>' . ($hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    //
                    case 'status':

                        $class_status = ($hr_employee_worked_days_item[$col]) ? ' bgcolor="' . hr_worked_days_status_field_code('color', $hr_employee_worked_days_item[$col]) . '" ' : '';

                        echo '<td ' . $class_status . '>' . hr_worked_days_status_field_code('status_name', $hr_employee_worked_days_item[$col]) . '</td>';
                        break;

                    case 'button_details':
                        echo '<td></td>';
                        //  echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_worked_days&a=details&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case 'button_pay':
                        echo '<td></td>';
                        //echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_worked_days&a=details_payement&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case 'button_edit':
                        echo '<td></td>';
//                            echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_worked_days&a=edit&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case 'button_print':
                        echo '<td></td>';
//                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=export_pdf&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case 'button_save':
                        echo '<td></td>';
//                            echo '<td><a class d a= "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=export_pdf&way=pdf&&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    default:
                        echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                        break;
                }
            }

            echo '</tr>';
        }
        ?>	



    </tbody>
</table>
