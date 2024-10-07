


<table class="table table-striped" border>
    <thead>
        <tr>                         
            <th></th>
            <th></th>            
            <th><?php _t("Project"); ?></th>            
            <th  class="text-center"><?php _t("Total hours worked in"); ?></th>
            <th><?php _t("Notes"); ?></th>            
            <th><?php _t("Status"); ?></th>                        
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
            //
            $class_week_end = ($date_formated_day == "Sat" || $date_formated_day == 'Sun') ? ' class="success" ' : "";

            $bgcolor_holiday = holidays_categories_field_code('color', holidays_search_by_unique('category_code', 'date', $date));

            $class_holiday = (holidays_search_by_unique('category_code', 'date', $date)) ? ' bgcolor="' . $bgcolor_holiday . '" ' : "";
            //
            $lines = hr_employee_worked_days_search_by_date_employee($date, $id) ?? false;

            echo '<tr >';
            echo "<td $class_holiday >" . ($date_formated_d) . "</td>";
            echo "<td  ' . $class_week_end . '>" . _tr($date_formated_day) . "</td>";
            //echo "<td>" . _tr($date_formated_m) . "</td>";
            //echo "<td>  " . contacts_formated($id) . "</td>";
            if (!$lines) {
                echo '<td></td>';
                echo '<td></td>';
                //echo '<td></td>';
                //echo '<td></td>';
                //echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
            }

            ///
            ///                        
            foreach ($lines as $key => $line) {


                $checkbox = '<div class="checkbox">
                                <label>
                                    <input type="checkbox" name="ids[]" value="' . $line['id'] . '"> 
                                </label>
                            </div>    ';

                $class_status = ($line['status']) ? ' bgcolor="' . hr_worked_days_status_field_code('color', $line['status']) . '" ' : '';

                /**
                  echo '
                  <td>' . hr_employee_worked_days_format_time($line['start_am']) . ' - ' . hr_employee_worked_days_format_time($line['end_am']) . ' </td>
                  <td>' . hr_employee_worked_days_format_time($line['lunch']) . '</td>
                  <td>' . hr_employee_worked_days_format_time($line['start_pm']) . ' - ' . hr_employee_worked_days_format_time($line['end_pm']) . ' </td>';
                 * 
                 */
                echo '<td><a href="index.php?c=projects&a=hours_worked&id=' . $line['project_id'] . '">' . projects_field_id('name', $line['project_id']) . '</a></td>';
                echo '<td class="text-center">' . hr_employee_worked_days_format_time($line['total_hours']) . ' </td>  ';
                echo '<td>' . $line['notes'] . '</td>';
                echo '<td ' . $class_status . ' >' . hr_worked_days_status_field_code('status_name', $line['status']) . '</td>';
                echo '<td>';
                include "modal_hr_employee_worked_days_edit.php";
                include "modal_hr_employee_worked_days_delete.php";

                echo "</tr></tr>";
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
        <td  class="text-right">
            <?php
            //echo hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $id);

            echo hr_employee_worked_days_format_time(hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $id)['time']);
            ?>
        </td>
        <td><?php _t('Total hours this month'); ?></td>

        <td></td>        
        <td></td>                
        <td></td>
    </tr>


    <tr>                                        
        <td></td>
        <td></td>
        <td class="text-right">
            <?php
            echo (hr_employee_worked_days_total_days_worked_by_year_month_employee($year, $month, $id));
            ?>
        </td>
        <td><?php _t('Total days this month'); ?></td>           
        <td></td>        
        <td></td>
        <td></td>
    </tr>
</table>





