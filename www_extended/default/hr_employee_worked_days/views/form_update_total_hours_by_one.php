
<form method="post" action="index.php">

    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="ok_update_total_hours">
    <input type="hidden" name="date" value="<?php echo $date; ?>">
    <input type="hidden" name="project_id" value="<?php echo $id; ?>">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="projects">
    <input type="hidden" name="redi[a]" value="hours_worked">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">

    <table class="table-condensed table-striped table">

        <thead>
            <tr>
                <th></th>
                <th><?php _t("Worked hours"); ?></th>
            </tr>
        </thead>

        <?php
        foreach (hr_employee_worked_days_search_by_date_project($date, $id) as $key => $project_line) {

            echo '<tr>               
                    <td>                        
                            ' . contacts_formated($project_line['employee_id']) . '                        
                    </td>                      
                    <td>';
            ?>

            <select 
                class="form-control" 
                name="ids[<?php echo $project_line['id']; ?>][total_hours]"  
                >
                <option value="null"><?php _t("Registre hours later"); ?></option>
                <?php
//                $config_hr_employee_worked_days = json_decode(_options_option('config_hr_employee_worked_days'), true);
//
//                for ($h = 0; $h <= 23; $h++) {
//                    for ($m = 0; $m <= 59; $m = $m + $config_hr_employee_worked_days['minute_ranges']) {
//
//                        $minute = str_pad($m, 2, '0', STR_PAD_LEFT);
//                        $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
//
//                        $selected_total_hours = ($h == substr($project_line['total_hours'], 0, 2) && $m == substr($project_line['total_hours'], 3, 2) ) ? " selected " : "";
//
//                        echo '<option value="' . $h . ':' . $m . ':00" ' . $selected_total_hours . '>' . $hour . ' : ' . $minute . '</option>';
//                    }
//                }
                ?>

                <?php
                echo magia_time_select_generator(
                        $config_hr_employee_worked_days['start_time_day'],
                        $config_hr_employee_worked_days['end_time_day'],
                        $config_hr_employee_worked_days['minute_ranges'],
                        '08:00:00'
                );
                ?>


            </select>

            <?php
            echo '</td>
                </tr>';

            $disabled = false;
        }
        ?>
    </table>

    <br>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Submit"); ?>
    </button>


</form>


