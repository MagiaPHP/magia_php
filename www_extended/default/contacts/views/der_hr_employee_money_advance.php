<?php include view('contacts', 'der_hr_employee_documents_all'); ?>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Summary"); ?>
    </div>
    <div class="panel-body">



        <table class="table table-striped">
            <tr>
                <td><?php _t("Total hours worked in"); ?>: <?php echo _tr(magia_dates_month($month)); ?></td>

                <td class="text-right">
                    <?php
                    echo $employee->getTotalWorkedHours($year, $month) ? $employee->getTotalWorkedHours($year, $month)['hours'] : '';
                    ?>
                </td>

            </tr>

            <tr>

                <td><?php _t("Remuneration by hour"); ?>: <?php echo _tr(magia_dates_month($month)); ?> / <?php echo (($year)); ?></td>

                <td class="text-right">
                    <?php
                    $date = new DateTime("$year-$month-01");
                    echo $employee->getClosestSalaryByDate($date) ? $employee->getClosestSalaryByDate($date)['hour'] : '';
                    ?>

                </td>


            </tr> 

            <tr>
                <td><?php _t("Total"); ?></td>
                <td class="text-right">

                    <?php
                    echo monedaf($employee->calculateMonthlySalary($year, $month));
                    ?>

                </td>
            </tr>

        </table>



    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Add money advance"); ?>
    </div>
    <div class="panel-body">

        <?php
        $params = [];
        $params['id'] = $id;
        $params['redi'] = '5';
        $params['c'] = 'contacts';
        $params['a'] = 'hr_employee_money_advance';
        $params['params'] = 'id=' . $id;

        include view('hr_employee_money_advance', 'form_add_by_employee', $params);
        ?>
    </div>
</div>


