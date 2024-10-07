<table class="table table-striped table-condensed table-bordered"  >
    <thead>
        <tr class="info">                        
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><?php _t("Employee"); ?></th>            
            <th><?php _t("Total"); ?></th>
            <th><?php _t("Project"); ?></th>
            <th><?php _t("Notes"); ?></th>            
            <th></th>            
        </tr>
    </thead>


    <tbody>       
        <?php
        $cal_days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for ($d = 1; $d <= $cal_days_in_month; $d++) {

            $date = date("Y-m-d", mktime(0, 0, 0, $month, $d, $year));
            $date_formated = date("d D M", mktime(0, 0, 0, $month, $d, $year));
            $date_formated_d = date("d", mktime(0, 0, 0, $month, $d, $year));
            $date_formated_day = date("D", mktime(0, 0, 0, $month, $d, $year));
            $date_formated_m = date("M", mktime(0, 0, 0, $month, $d, $year));
            $date_formated_y = date("Y", mktime(0, 0, 0, $month, $d, $year));

            $class_week_end = ($date_formated_day == "Sat" || $date_formated_day == 'Sun') ? ' class="success" ' : "";

//            vardump(magia_dates_last_day_from_date("2024-06-01")); 
            // Busca las lineas que corresponden
            //$lines = hr_employee_worked_days_search_by_project_from_to($id, $date_start, $date_end) ?? false;
            $lines = hr_employee_worked_days_search_by_date_project($date, $id) ?? false;
            //$lines = hr_employee_worked_days_search_by_project_from_to($id, "{$year}-{$month}-01", magia_dates_last_day_from_date("$year-$month")) ?? false;
//            vardump($date);
//            vardump($id);
//            vardump($lines);
            //$lines = hr_employee_worked_days_search_by_project_id_week_of_year($id, $week_of_year); 
            //vardump($lines); 

            echo '<tr>';
            echo "<td>";

            if ($lines) {
                include view('hr_employee_worked_days', 'modal_update_total_hours');
            }


            echo "</td>";

            echo "<td ' . $class_week_end . ' >" . ($date_formated_d) . "</td>";
            echo "<td ' . $class_week_end . ' >" . _tr($date_formated_day) . "</td>";
            echo "<td ' . $class_week_end . ' >" . _tr($date_formated_m) . "</td>";

            if (!$lines) {
                echo '<td></td>';
                echo '<td></td>';
                //echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
            }

            foreach ($lines as $key => $line) {

                $checkbox = '<div class="checkbox">
                                <label>
                                    <input type="checkbox" name="ids[]" value="' . $line['id'] . '"> 
                                </label>
                            </div>    ';

                $class_status = ($line['status']) ? ' bgcolor="' . hr_worked_days_status_field_code('color', $line['status']) . '" ' : '';

                //echo '<td>'.$checkbox.'</td>';


                echo '';

                echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $line['employee_id'] . '&month=' . $month . '&year=' . $year . '">' . contacts_formated($line['employee_id']) . '</a></td>';
//                echo '<td>' . hr_employee_worked_days_format_time($line['start_am']) . ' - ' . hr_employee_worked_days_format_time($line['end_am']) . ' </td>';
//                echo '<td>' . hr_employee_worked_days_format_time($line['lunch']) . '</td>';
//                echo '<td>' . hr_employee_worked_days_format_time($line['start_pm']) . ' - ' . hr_employee_worked_days_format_time($line['end_pm']) . ' </td>';
                //echo '<td>' . hr_employee_worked_days_format_time($line['total_worked']) . ' </td>';
                echo '<td>' . hr_employee_worked_days_format_time($line['total_hours']) . ' </td>';
                
                echo '<td>' . projects_field_id('name', $line['project_id']) . '</td>';
                
                echo '<td>' . $line['notes'] . '</td>';

                //echo '<td ' . $class_status . '>' . $checkbox . '  ' . hr_worked_days_status_field_code('status_name', $line['status']) . '</td>';
                //echo '<td>  ' . hr_worked_days_status_field_code('status_name', $line['status']) . '</td>';

                echo '<td>';
                include view('hr_employee_worked_days', 'modal_delete');
                //include "modal_hr_employee_worked_days_delete.php";
                //            include "modal_hr_employee_worked_days_edit.php";
                echo "</td>";

                echo "</tr><tr>";

                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
            }
            ///
            ///
            ///
            echo "</tr>";
        }
        ?>
    </tbody>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php _t('Total hours this month'); ?></td>
        <td class="text-center">
            <?php
//echo hr_employee_worked_days_format_time(hr_employee_worked_days_total_time_worked_by_month_employee($month, $id))            
//vardump(hr_employee_worked_days_total_worked_by_year_month_project_id($year, $month, $id));                       
//            echo hr_employee_worked_days_format_time(hr_employee_worked_days_total_worked_by_year_month_project_id($year, $month, $id)['hours']);
//            vardump($id); 
//            vardump($line['project_id']); 
            echo (hr_employee_worked_days_format_time(hr_employee_worked_days_total_worked_by_year_month_project_id($year, $month, $id)['hours']));
            ?>
        </td>
        <td></td>        
        <td></td>        
        <td></td>
    </tr>


    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>            

        <td><?php _t('Total days this month'); ?></td>
        <td class="text-center">
            <?php
            echo (hr_employee_worked_days_total_days_worked_by_year_month_project_id($year, $month, $id));
            ?>
        </td>
        <td></td>
        <td></td>
        <td></td>

    </tr>



</table>