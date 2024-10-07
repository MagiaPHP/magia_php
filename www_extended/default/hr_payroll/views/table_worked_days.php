
<form method="post" action="index">

    <input type="hidden" name="c" value="projects">
    <input type="hidden" name="a" value="ok_add_short">
    <input type="hidden" name="redi[redi]" value="1">





    <table class="table table-striped">
        <thead>
            <tr>            
                <th>#</th>                
                <th><?php _t("Payroll"); ?></th>
                <th><?php _t("Worker"); ?></th>
                <th><?php _t("Total worked hours"); ?></th>
                <th><?php _t("Total worked days"); ?></th>
                <th><?php _t("Total to pay"); ?></th>
            </tr>
        </thead>

        <tbody>
            <?php
            $i = 1;

            $payroll_numbers = null;

            foreach ($workers_list as $key => $worker) {

                $employee = new Employee();
                $employee->setEmployee($u_owner_id, $worker['employee_id']);

                $total_hours_worked = 10;
                $total_days_worked = 1;
                $total_to_pay = 1750;

                // Id del payroll segun el empleado, mes, año
                $payroll_numbers = (hr_payroll_search_by_employee_year_month($worker['employee_id'], $year, $month)) ?? null;

                echo '<tr>';
                //
                echo '<td>' . $i++ . '</td>';
                //

                if ($payroll_numbers) {
                    echo '<td>';
                    foreach ($payroll_numbers as $key => $payroll) {
                        echo '<a href="index.php?c=hr_payroll&a=details&id=' . $payroll['id'] . '">' . $payroll['id'] . '</a><br>';
                    }

                    echo '</td>';
                } else {
                    echo '<td>
                        <div class="checkbox">
                    <label>
                      <input type="checkbox" name="employee_id[]" value="' . $worker['employee_id'] . '"> ' . _tr("Create one") . '
                    </label>
                  </div></td>';
                }




                echo '</td>';

                echo '<td><a href="index.php?c=contacts&a=details&id=' . $worker['employee_id'] . '">' . contacts_formated($worker['employee_id']) . '</a></td>';

                echo '<td>' . $total_hours_worked . '</td>';
                echo '<td>' . $total_days_worked . '</td>';
                echo '<td>' . $total_to_pay . '</td>';
                echo '</tr>';

                $payroll_numbers = null;
            }
            ?>
        </tbody>
    </table>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Create payroll"); ?>
    </button>

</form>

<br>
<br>
<br>