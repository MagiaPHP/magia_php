<?php
/**
 * <form class="form-inline">

  <input type="hidden" name="c" value="projects">
  <input type="hidden" name="a" value="hours_worked">
  <input type="hidden" name="id" value="<?php echo $id; ?>">

  <div class="form-group">
  <label class="sr-only" for="week_of_year"></label>
  <select class="form-control" name="week_of_year">
  <?php
  for ($i = 1;
  $i <= 53;
  $i++) {
  $week_of_year_selected = ($i == date("W") ) ? " selected " : "";
  echo '<option value="' . $i . '" ' . $week_of_year_selected . '>' . _tr("Week of year") . ' ' . $i . '</option>';
  }
  ?>
  </select>
  </div>

  <button type="submit" class="btn btn-default">
  <?php echo icon("refresh"); ?>
  <?php _t("Change"); ?>
  </button>

  </form>

  <br>
 */
?>





<form class="form-inline">

    <input type="hidden" name="c" value="projects">
    <input type="hidden" name="a" value="hours_worked">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group">
        <label class="sr-only" for="date_start"></label>       
        <input type="date" class="form-control" name="date_start" value="">
    </div>

    <div class="form-group">
        <label class="sr-only" for="date_start"></label>       
        <input type="date" class="form-control" name="date_end" value="">
    </div>

    <?php
    /**
     * 
      <div class="form-group">
      <label class="sr-only" for="exampleInputEmail3"></label>
      <select class="form-control" name="month">
      <?php
      for ($m = 1; $m < 13; $m++) {
      $month_selected = ($m == $month) ? " selected " : "";
      echo '<option value="' . $m . '" ' . $month_selected . '>' . _tr(magia_dates_month($m)) . '</option>';
      }
      ?>
      </select>
      </div>

      <div class="form-group">
      <label class="sr-only" for="exampleInputEmail3">Email address</label>
      <select class="form-control" name="year">
      <?php
      for ($y = 2020; $y < date('Y') + 1; $y++) {
      $year_selected = ($y == $year) ? " selected " : "";
      echo '<option value="' . $y . '" ' . $year_selected . '>' . $y . '</option>';
      }
      ?>
      </select>
      </div>
     */
    ?>
    <button type="submit" class="btn btn-default">
        <?php echo icon("refresh"); ?> 
        <?php _t("Update"); ?>
    </button>

</form>

<br>
<form class="form-inline">

    <input type="hidden" name="c" value="projects">
    <input type="hidden" name="a" value="hours_worked">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="date_start" value="<?php echo date('Y-m-d'); ?>">
    <input type="hidden" name="date_end" value="<?php echo date('Y-m-d'); ?>">

    <button type="submit" class="btn btn-default">
        <?php echo icon("refresh"); ?> 
        <?php _t("Today"); ?>
    </button>

</form>


<br>

<p>
    <?php _t("List of employees who worked on this project"); ?>


    <?php
    if ($date_start == $date_end) {
        echo "<b>" . _tr('the') . "</b> : $date_start";
    } else {
        echo "<b>" . _tr("from") . "</b>: $date_start <b>" . _tr("to") . "</b>: $date_end";
    }
    ?>
</p>


<table class="table table-striped table-condensed table-bordered">

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
            <th><?php _t("Status"); ?></th>            
            <th><?php _t("Edit"); ?></th>            

        </tr>
    </thead>



    <tbody>     

        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>56</td>
            <td>567</td>
            <td>5678</td>
            <td>56789</td>
            <td>10</td>
        </tr>


        <?php
        $date_start = magia_dates_add_day($date_start, 0);
        $date_end = magia_dates_add_day($date_end, 0);

        for ($date_start; $date_start <= $date_end; $date_start = magia_dates_add_day($date_start, 1)) {

            $c_day = magia_dates_get_day_from_date($date_start);
            $c_month = magia_dates_get_month_from_date($date_start);
            $c_year = magia_dates_get_year_from_date($date_start);

            echo '<tr>';
            echo '<td>' . ($date_start) . '</td>';
            echo '<td>' . _tr(magia_dates_day($c_day)) . '</td>';
            echo '<td>' . ($c_day) . '</td>';
            echo '<td>' . magia_dates_month($c_month) . '</td>';
            echo '<td>' . $c_year . '</td>';
            echo '</tr>';
        }
        ?>



        <?php
//            
//            $cal_days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
//
//            for ($d = 1; $d <= $cal_days_in_month; $d++) {
//
//                $date = date("Y-m-d", mktime(0, 0, 0, $month, $d, $year));
//                $date_formated = date("d D M", mktime(0, 0, 0, $month, $d, $year));
//                $date_formated_d = date("d", mktime(0, 0, 0, $month, $d, $year));
//                $date_formated_day = date("D", mktime(0, 0, 0, $month, $d, $year));
//                $date_formated_m = date("M", mktime(0, 0, 0, $month, $d, $year));
//                $date_formated_y = date("Y", mktime(0, 0, 0, $month, $d, $year));
//
//                $class_week_end = ($date_formated_day == "Sat" || $date_formated_day == 'Sun') ? ' class="success" ' : "";
//
//                // Busca las lineas que corresponden
//
//                $lines = hr_employee_worked_days_search_by_date_project($date, $id) ?? false;
//                //$lines = hr_employee_worked_days_search_by_project_id_week_of_year($id, $week_of_year); 
//                
//
//                echo '<tr ' . $class_week_end . ' >';
//                echo "<td></td>";
//                echo "<td>$date_formated_d</td>";
//                echo "<td>$date_formated_day</td>";
//                echo "<td>$date_formated_m</td>";
//                if (!$lines) {
//                    echo '<td></td>';
//                    echo '<td></td>';
//                    echo '<td></td>';
//                    echo '<td></td>';
//                    echo '<td></td>';
//                    echo '<td></td>';
//                }
//
//                ///
//                ///                        
//                foreach ($lines as $key => $line) {
//
//                    $checkbox = '<div class="checkbox">
//                                <label>
//                                    <input type="checkbox" name="ids[]" value="' . $line['id'] . '"> 
//                                </label>
//                            </div>    ';
//
//                    $class_status = ($line['status']) ? ' bgcolor="' . hr_worked_days_status_field_code('color', $line['status']) . '" ' : '';
//
//                    //echo '<td>'.$checkbox.'</td>';
//
//                    echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $line['employee_id'] . '&month=' . $month . '&year=' . $year . '">' . contacts_formated($line['employee_id']) . '</a></td>';
////                echo '<td>' . hr_employee_worked_days_format_time($line['start_am']) . ' - ' . hr_employee_worked_days_format_time($line['end_am']) . ' </td>';
////                echo '<td>' . hr_employee_worked_days_format_time($line['lunch']) . '</td>';
////                echo '<td>' . hr_employee_worked_days_format_time($line['start_pm']) . ' - ' . hr_employee_worked_days_format_time($line['end_pm']) . ' </td>';
//                    echo '<td>' . hr_employee_worked_days_format_time($line['total_worked']) . ' </td>';
//                    echo '<td>' . projects_field_id('name', $line['project_id']) . '</td>';
//                    echo '<td>' . $line['notes'] . '</td>';
//                    echo '<td ' . $class_status . '>' . $checkbox . '  ' . hr_worked_days_status_field_code('status_name', $line['status']) . '</td>';
//                    echo '<td>';
//                    //            include "modal_hr_employee_worked_days_delete.php";
//                    //            include "modal_hr_employee_worked_days_edit.php";
//                    echo "</td>";
//                    echo "</tr></tr>";
//                    echo "<td></td>";
//                    echo "<td></td>";
//                    echo "<td></td>";
//                    echo "<td></td>";
//                }
//                ///
//                ///
//                ///
//                echo "</tr>";
//            }
        ?>
    </tbody>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php _t('Total hours this month'); ?></td>
        <td  class="text-right">
            <?php
//    echo hr_employee_worked_days_format_time(hr_employee_worked_days_total_time_worked_by_month_employee($month, $id))
            ?>
        </td>
        <td></td>        
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
        <td class="text-right">
            <?php
//    echo (hr_employee_worked_days_total_days_worked_by_month_employee($month, $id))
            ?>
        </td>
        <td></td>        
        <td></td>        
        <td></td>
        <td></td>
    </tr>
</table>

