<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_hr_payroll_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_hr_payroll_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>





<br>

<div class="container-fluid">


    <div class="row">
        <div class="col-xs-6 col-md-4">



        </div>
        <div class="col-xs-6 col-md-4 text-center">

            <h2 class="text-center"><?php echo _tr(magia_dates_month($month)); ?> - <?php echo $year; ?></h2>

            <form class="form-inline" method="get" action="index.php">
                <input type="hidden" name="c" value="hr_employee_worked_days">
                <input type="hidden" name="a" value="by_month">        

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
                    <?php _t("Change"); ?>
                </button>
            </form>
        </div>
        <div class="col-xs-6 col-md-4"></div>
    </div>


</div>


<br>
<br>












<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th class="info text-center" colspan="3"><?php _t("Salary"); ?></th>                        
            <th></th>
            <th></th>
            <th></th>
            <th class="info text-center" colspan="2"><?php _t("Money advance "); ?></th>
            <th></th>
            <th></th>
            <th class="info text-center" colspan="3"><?php _t("Solde"); ?></th>
            <th></th>
        </tr>

        <tr class="info">
            <th>#</th>            
            <th><?php _t("Employee"); ?></th>
            <th><?php _t("Salary hour"); ?></th>
            <th>Total h.</th>
            <th>Total value</th>
            <th><?php _t("Precompte"); ?></th>
            <th><?php _t("Sodexo"); ?></th>
            <th><?php _t("FINE / WITHDRAWAL"); ?></th>
            <th><?php _t("Bank"); ?></th>
            <th><?php _t("Cash"); ?></th>
            <th><?php _t("Driver"); ?></th>
            <th><?php _t("Value round"); ?></th>
            <th><?php _t("Total sold"); ?></th>
            <th><?php _t("Bank"); ?></th>
            <th><?php _t("Cash"); ?></th>
            <th><?php _t("Total to pay"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 1;
        $salary_month = null;
        $salary_hour = null;

        $total_total_salaire = 0;
        $driver = '';

        // lista de los empleados que trabajan ese mes y ano 
        //vardump($hr_employee_worked_days); 

        foreach ($hr_employee_worked_days as $key => $hr_employee_worked_days_line) {


            //vardump($hr_payroll_by_month_line); 
            //$wd = new Hr_payroll_by_month();
            //$wd->setHr_payroll_by_month($hr_payroll_by_month_line['id']); 
            //$wd->setHr_payroll_by_month($hr_payroll_by_month_line['id']);
            //vardump($wd); 
            //
            $employee = new Employee();
            $employee->setEmployee(1022, $hr_employee_worked_days_line['employee_id']);
            //$employee->setSalary();
            vardump($employee);
            //
            //
            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td><a href="index.php?c=contacts&a=details&id=' . $wd->getEmployee_id() . '">' . contacts_formated($wd->getEmployee_id()) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_salary&id=' . $wd->getEmployee_id() . '">' . $wd->getSalary('hour') . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $wd->getEmployee_id() . '">' . moneda($wd->getWorked_hours()) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $wd->getEmployee_id() . '">' . moneda($wd->getSalary('hour') * $wd->getWorked_hours()) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_payroll&id=' . $wd->getEmployee_id() . '">' . moneda($wd->getPrecompte()) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_payroll&id=' . $wd->getEmployee_id() . '">' . moneda($wd->getSodexo()) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_fines&id=' . $wd->getEmployee_id() . '">' . moneda($wd->getFine_withdrawal()) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $wd->getEmployee_id() . '">' . moneda($wd->getMoney_advance('bank')) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $wd->getEmployee_id() . '">' . moneda($wd->getMoney_advance('cash')) . '</a></td>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_documents&id=' . $wd->getEmployee_id() . '">' . moneda($wd->getDriver()) . '</a></td>';

            echo '<td>';
            //echo moneda($wd->getValue_round());
            //vardump($wd->getValue_round()); 
            include 'modal_value_round_update.php';
            echo '</td>';

            echo '<td>';

            $formule_total_sold = hr_employee_worked_days_formule_get_formule_by_employee_month_year_column($wd->getEmployee_id(), $wd->getMonth_of_payroll(), $wd->getYear_of_payroll(), 'total_sold');
            //vardump($formule_total_sold);
            $total_sold = $wd->calculate_formule($formule_total_sold);
//            vardump($total_sold);             
            //$wd->setTotal_sold($total_sold);
            //echo moneda($wd->getTotal_sold());
            include 'modal_total_sold_update.php';
            echo '</td>';

            echo '<td>';
            $formule_pay_to_bank = hr_employee_worked_days_formule_get_formule_by_employee_month_year_column($wd->getEmployee_id(), $wd->getMonth_of_payroll(), $wd->getYear_of_payroll(), 'pay_to_bank');
            //vardump($formule_pay_to_bank);
            $total_pay_to_bank = $wd->calculate_formule($formule_pay_to_bank);
            //vardump($total_pay_to_bank);             
            //$wd->setPay_to_bank($total_pay_to_bank);
            include 'modal_pay_to_bank_update.php';
            echo '</td>';

            echo '<td>';
            $formule_pay_to_cash = hr_employee_worked_days_formule_get_formule_by_employee_month_year_column($wd->getEmployee_id(), $wd->getMonth_of_payroll(), $wd->getYear_of_payroll(), 'pay_to_cash');
            //vardump($formule_pay_to_cash);
            $total_pay_to_cash = $wd->calculate_formule($formule_pay_to_cash);
            //vardump($total_pay_to_cash);             
            //$wd->setPay_to_cash($total_pay_to_cash);
            include 'modal_pay_to_cash_update.php';
            echo '</td>';

            echo '<td>';
            $formule_total_to_pay = hr_employee_worked_days_formule_get_formule_by_employee_month_year_column($wd->getEmployee_id(), $wd->getMonth_of_payroll(), $wd->getYear_of_payroll(), 'total_to_pay');
            //vardump($formule_total_to_pay);
            $total_total_to_pay = $wd->calculate_formule($formule_total_to_pay);
            //vardump($total_total_to_pay);             
            //$wd->setTotal_to_pay($total_total_to_pay);
            include 'modal_total_to_pay_update.php';
            echo '</td>';

//            echo '<td>';
//            echo moneda($payroll->getValue_round());
//            include 'modal_value_round_update.php';
//            echo '</td>';
//
//            // K
//            echo '<td>';
//
//            $formule_total_sold = hr_payroll_by_month_get_formule_by_payroll_id_column($payroll->getId(), 'total_sold');
//            //vardump($formule_total_sold);
//            $Total_sold = $payroll->calculate_formule($formule_total_sold);
//            $payroll->setTotal_sold($Total_sold);
//            //echo moneda($payroll->getTotal_sold());
//            include 'modal_total_sold_update.php';
//            echo '</td>';
//
//            // L
//            echo '<td>';
//
//            $formule_pay_to_bank = hr_payroll_by_month_get_formule_by_payroll_id_column($payroll->getId(), 'pay_to_bank');
//            //vardump($formule_pay_to_bank);
//            $pay_to_bank = $payroll->calculate_formule($formule_pay_to_bank);
//            $payroll->setPay_to_bank($pay_to_bank);
//            //echo moneda($payroll->getPay_to_bank());
//            include 'modal_pay_to_bank_update.php';
//            echo '</td>';
//
//            // M
//            echo '<td>';
//
//            $formule_pay_to_cash = hr_payroll_by_month_get_formule_by_payroll_id_column($payroll->getId(), 'pay_to_cash');
//            //vardump($formule_pay_to_cash);
//            $pay_to_cash = $payroll->calculate_formule($formule_pay_to_cash);
//            $payroll->setPay_to_cash($pay_to_cash);
//            //echo moneda($payroll->getPay_to_cash());
//            include 'modal_pay_to_cash_update.php';
//            echo '</td>';
//
//            // M
//            echo '<td>';
//
//            $formule_total_to_pay = hr_payroll_by_month_get_formule_by_payroll_id_column($payroll->getId(), 'total_to_pay');
//            //vardump($formule_total_to_pay);
//            $total_to_pay = $payroll->calculate_formule($formule_total_to_pay);
//            $payroll->setTotal_to_pay($total_to_pay);
//            //echo moneda($payroll->getTotal_to_pay());
//            include 'modal_total_to_pay_update.php';
//            echo '</td>';

            echo '</tr>';
        }
        ?>      
    </tbody>





    <tr>

        <td></td>
        <td></td>
        <td>salary_hour</td>
        <td>worked_hours</td>
        <td></td>
        <td>precompte</td>
        <td>sodexo</td>
        <td>fine_withdrawal</td>
        <td>money_advance_bank</td>
        <td>money_advance_cash</td>
        <td>driver</td>
        <td>payroll_value_round</td>
        <td>total_sold</td>
        <td>pay_to_bank</td>
        <td>pay_to_cash</td>
        <td>total_to_pay</td>


    </tr>

</table>



<br>
<br>

'%payroll_salary_base%',

'%salary_month%',

'%worked_days%',


