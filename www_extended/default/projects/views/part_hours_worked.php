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
  for ($i = 1; $i <= 53; $i++) {
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
        <label class="sr-only" for="month"></label>
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
        <label class="sr-only" for="year"></label>
        <select class="form-control" name="year">
            <?php
            for ($y = 2020; $y < date('Y') + 1; $y++) {
                $year_selected = ($y == $year) ? " selected " : "";
                echo '<option value="' . $y . '" ' . $year_selected . '>' . $y . '</option>';
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon("refresh"); ?> 
        <?php _t("Update"); ?>
    </button>

</form>

<br>

<p>
    <?php _t("List of employees who worked on this project"); ?>
</p>



<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>




<?php include "table_hours_worked.php"; ?>


<?php
/**
  <form method="post" action="index.php" class="form-inline">

  <input type="hidden" name="c" value="hr_employee_worked_days">
  <input type="hidden" name="a" value="ok_update_status">

  <input type="hidden" name="redi[redi]" value="5">
  <input type="hidden" name="redi[c]" value="projects">
  <input type="hidden" name="redi[a]" value="hours_worked">
  <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">

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
  <tfoot>
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

  // Busca las lineas que corresponden
  //$lines = hr_employee_worked_days_search_by_project_from_to($id, $date_start, $date_end) ?? false;
  $lines = hr_employee_worked_days_search_by_date_project($date, $id) ?? false;
  //$lines = hr_employee_worked_days_search_by_project_id_week_of_year($id, $week_of_year);


  echo '<tr>';
  echo "<td>";

  if ($lines) {
  include view('hr_employee_worked_days', 'modal_update_total_hours');
  }


  echo "</td>";
  echo "<td ' . $class_week_end . ' >$date_formated_d</td>";
  echo "<td ' . $class_week_end . ' >$date_formated_day</td>";
  echo "<td ' . $class_week_end . ' >$date_formated_m</td>";

  if (!$lines) {
  echo '<td></td>';
  echo '<td></td>';
  echo '<td></td>';
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
  echo '<td ' . $class_status . '>' . $checkbox . '  ' . hr_worked_days_status_field_code('status_name', $line['status']) . '</td>';
  echo '<td>';

  include view('hr_employee_worked_days', 'modal_delete');

  //include "modal_hr_employee_worked_days_delete.php";
  //            include "modal_hr_employee_worked_days_edit.php";
  echo "</td>";
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
  <td></td>
  <td></td>
  <td><?php _t('Total hours this month'); ?></td>
  <td  class="text-right">
  <?php
  vardump($id);
  vardump($date);

  //echo hr_employee_worked_days_format_time(hr_employee_worked_days_total_time_worked_by_month_employee($month, $id))
  echo (hr_employee_worked_days_total_hours_worked_by_project_period($id, $date, $date))
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




  <div class="form-group">
  <label for="ids"></label>
  <div class="checkbox">
  <label>
  <input type="checkbox" onclick="sellectAll(this);" /> <?php _t("Select all"); ?>
  </label>
  </div>
  </div>
  <div class="form-group">
  <label for="ids"></label>
  <select class="form-control" name="status" id="status">
  <option value="null"><?php _t("Select one"); ?></option>
  <?php
  foreach (hr_worked_days_status_list() as $key => $hrwsl) {
  echo '<option value="' . $hrwsl['code'] . '">' . $hrwsl['status_name'] . '</option>';
  }
  ?>
  </select>
  </div>
  <button type="submit" class="btn btn-default">
  <?php echo icon("ok"); ?>
  <?php _t("Submit"); ?>
  </button>
  </form>
 */
?>