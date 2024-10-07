<table class="table table-striped">
    <thead>
        <tr>  
            <th><?php _t("Remuneration by month"); ?></th>
            <th><?php _t("Remuneration by hour"); ?></th>
            <th><?php _t("Date start"); ?></th>
            <th><?php _t("Date end"); ?></th>
            <th></th>
            <th></th>                    
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($hr_employee_salary as $key => $salary) {

            $hr_employee_salary = new Hr_employee_salary();
            $hr_employee_salary->setHr_employee_salary($salary['id']);

            echo '<tr>';
            //echo '<td>' . contacts_formated($hr_employee_salary->getEmployee_id()) . '</td>';
            echo '<td>' . ($hr_employee_salary->getMonth()) . '</td>';
            echo '<td>' . ($hr_employee_salary->getHour()) . '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_salary->getDate_start()) . '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_salary->getDate_end()) . '</td>';
            echo '<td>';
            include "modal_hr_employee_salary_update.php";
            include "modal_hr_employee_salary_delete.php";
            echo '</td>';
            echo '<td></td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
