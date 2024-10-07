<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped">
    <thead>
        <tr>                              
            <th><?php _t("Worker"); ?></th>
            <th><?php _t("Total hours worked"); ?> : <?php echo magia_dates_month($month) . " - $year"; ?></th>                        
            <th><?php _t("Remuneration by hour"); ?></th>
            <th><?php _t("Total in this month"); ?></th>
            <th></th>
        </tr>
    </thead>
    
    <tfoot>
        <tr>                              
            <th><?php _t("Worker"); ?></th>
            <th><?php _t("Total hours worked"); ?> : <?php echo magia_dates_month($month) . " - $year"; ?></th>                        
            <th><?php _t("Remuneration by hour"); ?></th>
            <th><?php _t("Total in this month"); ?></th>
            <th></th>
        </tr>
    </tfoot>
    
    
    <tbody>
        <?php
        foreach (employees_list_by_company($u_owner_id) as $key => $employee) {

            $emp = new Employees();

            $emp->setEmployee($employee['company_id'], $employee['contact_id']);

            $dateThisMonth = new DateTime("$year-$month-01");

            $salary = $emp->getClosestSalaryByDate($dateThisMonth);

            echo '<tr>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $emp->getContact_id() . '">' . contacts_formated($emp->getContact_id()) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $emp->getContact_id() . '">' . ($emp->getTotalWorkedHours($year, $month)['hours']??0) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_salary&id=' . $emp->getContact_id() . '">' . monedaf($emp->getClosestSalaryByDate($dateThisMonth)['hour']??0) . '</a></td>';
            echo '<td>' . moneda($emp->calculateMonthlySalary($year, $month)) . '</td>';
            echo '<td>';

            include "part_table_money_advance.php";
            //include 'modal_add.php';
            //include "form_add_by_employee_in_td.php"; 
            echo '</td>';
            echo '</tr>';
        }
        ?>	

    </tbody>

</table>
<?php
//$pagination->createHtml();
?>
