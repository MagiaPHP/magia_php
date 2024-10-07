<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr>    
            <th></th>
            <th></th>  
            <th></th>  

            <?php if (modules_field_module('status', 'projects')) { ?>
                <th><?php _t("Project"); ?></th>  
            <?php } ?>

            <?php if (_options_option('config_hr_employee_worked_days_add_by') == 'ampm') { ?>
                <th><?php _t("Start AM"); ?></th>   
                <th><?php _t("End AM"); ?></th>   

                <th><?php _t("Start PM"); ?></th>   
                <th><?php _t("End PM"); ?></th>   
            <?php } ?>

            <th  class="text-center"><?php _t("Total hours worked"); ?></th>
            <th><?php _t("Notes"); ?></th>                                             
            <th></th>


        </tr>
    </thead>

    <tbody>       
        <?php
        $actual_day = 0;
        $date_actual = null;

        $cal_days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for ($d = 1; $d <= $cal_days_in_month; $d++) {

            $date = date("Y-m-d", mktime(0, 0, 0, $month, $d, $year));

            $date_formated = date("d D M", mktime(0, 0, 0, $month, $d, $year));

            $date_formated_d = date("d", mktime(0, 0, 0, $month, $d, $year));

            $date_formated_day = date("D", mktime(0, 0, 0, $month, $d, $year));

            $date_formated_m = date("M", mktime(0, 0, 0, $month, $d, $year));

            $date_formated_y = date("Y", mktime(0, 0, 0, $month, $d, $year));

            $class_week_end = ($date_formated_day == "Sat" || $date_formated_day == 'Sun') ? ' class="success" ' : "";

            $bgcolor_holiday = holidays_categories_field_code('color', holidays_search_by_unique('category_code', 'date', $date));

            $class_holiday = (holidays_search_by_unique('category_code', 'date', $date)) ? ' bgcolor="' . $bgcolor_holiday . '" ' : "";
            //
            $lines = hr_employee_worked_days_search_by_date_employee($date, $id) ?? false;

            echo '<tr>';

            if ($lines) {

                // Si existe datos
                foreach ($lines as $key => $line) {

                    $class_status = ($line['status']) ? ' bgcolor="' . hr_worked_days_status_field_code('color', $line['status']) . '" ' : '';

                    if ($date_actual != $date_formated_day) {
                        // 01, 02, 03, ...
                        echo "<td $class_holiday >" . ($date_formated_d) . "</td>";
                        // Lun, Mar, Mie, ...
                        echo "<td  ' . $class_week_end . '>" . _tr($date_formated_day) . "</td>";
                        // Ene, Feb, Mar, ...
                        echo '<td>' . _tr($date_formated_m) . '</td>';
                        //
                        $date_actual = $date_formated_day;
                    } else {
                        //Si un dia trabaja varias veces // Dia 01, 02, 03, ...
                        echo '<td></td>';
                        //Si un dia trabaja varias veces // Dia Lun, Mar, Mie, ...
                        echo '<td></td>';
                        //Si un dia trabaja varias veces // Ene, Feb, Mar, ...
                        echo '<td></td>';
                    }

                    if (modules_field_module('status', 'projects')) {
                        // Project name
                        echo '<td> <a href="index.php?c=projects&a=hours_worked&id=' . $line['project_id'] . '">' . projects_field_id('name', $line['project_id']) . '</a></td>';
                    } else {
                        // Vacio si no hay proyecto name
                        //echo '<td></td>';
                    }

                    ############################################################
                    # Esto aparece cuando am/pm esta activado
                    if (_options_option('config_hr_employee_worked_days_add_by') == 'ampm') {
                        echo '<td class="text-center">' . hr_employee_worked_days_format_time($line['start_am']) . '</td>';
                        echo '<td class="text-center">' . hr_employee_worked_days_format_time($line['end_am']) . '</td>';
                        //echo '<td class="text-center">' . hr_employee_worked_days_format_time($line['lunch']) . '</td>';
                        echo '<td class="text-center">' . hr_employee_worked_days_format_time($line['start_pm']) . '</td>';
                        echo '<td class="text-center">' . hr_employee_worked_days_format_time($line['end_pm']) . '</td>';
                    }
                    ############################################################
                    # 
                    // Total de horas trabajadas ejemplo: 10:30
                    // siempre aparece
                    echo '<td class="text-center">' . hr_employee_worked_days_format_time($line['total_hours']) . ' </td>  ';
                    // Notas 
                    echo '<td>' . $line['notes'] . '</td>';
                    //echo '<td></td>';
                    # Botones de editar y borrar
                    echo '<td>';
                    # editar
                    include "modal_hr_employee_worked_days_edit.php";
                    # borrar
                    include "modal_hr_employee_worked_days_delete.php";
                    echo '</td>';

                    echo '</tr><tr>';
                }
                // sino existe datos, se muestra esto 
            } else {
                # 01, 02, 03, ...
                echo "<td $class_holiday >" . ($date_formated_d) . "</td>";
                # Lun, Mar, Mie, ...
                echo "<td  ' . $class_week_end . '>" . _tr($date_formated_day) . "</td>";
                # Ene, Feb, Mar, ...
                echo '<td>' . _tr($date_formated_m) . '</td>';
                # Nombre del proyecto 
                if (modules_field_module('status', 'projects')) {
                    // Project name
                    echo '<td>';
                    //include "modal_hr_employee_worked_days_add_to_project.php";
                    echo '</td>';
                } else {
                    // Vacio si no hay proyecto name
//                    echo '<td></td>';
                }

                ############################################################
                if (_options_option('config_hr_employee_worked_days_add_by') == 'ampm') {
                    // Lineas sin datos / Inicio AM
                    echo '<td></td>';
                    // Lineas sin datos / Fin AM
                    echo '<td></td>';
                    // Lineas sin datos / Lunch
                    //echo '<td></td>'; 
                    // Lineas sin datos / Inicio PM
                    echo '<td></td>';
                    // Lineas sin datos / Fin AM
                    echo '<td></td>';
                }
                ############################################################                
                // Lineas sin datos / Total horas trabajadas
                echo '<td></td>';
                // Lineas sin datos / Notas
                echo '<td></td>';
                // Lineas sin datos / Botones
                echo '<td></td>';
            }
            echo '</tr>';
        }
        ?>
    </tbody>
    
    
    <tr>
        <td></td>
        <td></td>
        <td></td>

        <?php if (modules_field_module('status', 'projects')) { ?>
            <td></td>  
        <?php } ?>

        <?php if (_options_option('config_hr_employee_worked_days_add_by') == 'ampm') { ?>
            <td></td>
            <td></td>
            <td></td>           
            <td></td>           
        <?php } ?>

        <td><?php _t('Total hours this month'); ?></td>
        <td class="text-center">
            <?php
//            echo hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $id);
//            echo vardump(hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $id)['hours']);
//            vardump(hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $id)); 
//            echo hr_employee_worked_days_format_time(hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $id));
//            echo hr_employee_worked_days_format_time(hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $id));
            $total_h = hr_employee_worked_days_total_worked_by_year_month_employee_id($year, $month, $id);
            echo hr_employee_worked_days_format_time($total_h['hours']);
            ?>
        </td>
        <td></td>
    </tr>
    
    <tr>
        <td></td>
        <td></td>
        <td></td>

        <?php if (modules_field_module('status', 'projects')) { ?>
            <td></td>  
        <?php } ?>

        <?php if (_options_option('config_hr_employee_worked_days_add_by') == 'ampm') { ?>
            <td></td>
            <td></td>
            <td></td>         
            <td></td>         
        <?php } ?>

        <td><?php _t('Total days this month'); ?></td>
        <td class="text-center">
            <?php
            echo (hr_employee_worked_days_total_days_worked_by_year_month_employee($year, $month, $id));
            ?>
        </td>
        <td></td>
    </tr>

</table>


