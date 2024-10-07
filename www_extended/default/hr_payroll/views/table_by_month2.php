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




<form class="form-inline" method="get" action="index.php">

    <input type="hidden" name="c" value="hr_payroll">
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

<br>



<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th class="info text-center" colspan="3"><?php _t("Salary"); ?></th>                        
            <th></th>
            <th></th>
            <th></th>
            <th class="info text-center" colspan="2"><?php _t("Money advance "); ?></th>
            <th></th>
            <th class="info text-center" colspan="3"><?php _t("Solde"); ?></th>
            <th></th>

        </tr>

        <tr class="info">
            <th>#</th>            
            <th><?php _t("Id"); ?></th>
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

        // personas que han trabajado este mes   
        $from = "$year-$month-01";
        $to = "$year-$month-31";

        foreach (hr_employee_worked_days_search_by_from_to($from, $to) as $key => $item) {

            $payroll = new Hr_employee_worked_days();
            $payroll->setHr_employee_worked_days($item['id']);
            vardump($payroll);

//            $payroll = new Payroll();
//            $payroll->setHr_payroll($item['id']);

            echo '<tr>';
            // 
            echo '<td>' . $i++ . '</td>';
            echo '<td>1</td>';
            echo '<td>2</td>';
            echo '<td>3</td>';
            echo '<td>4</td>';
            echo '<td>5</td>';
            echo '<td>6</td>';
            echo '<td>7</td>';
            echo '<td>8</td>';
            echo '<td>9</td>';
            echo '<td>10</td>';
            echo '<td>11</td>';
            echo '<td>12</td>';
            echo '<td>13</td>';
            echo '<td>14</td>';
            //
//            echo '<td><a href="index.php?c=hr_payroll&a=details&id=' . $payroll->getId() . '">' . $payroll->getId() . '</a></td>';
//            // 
//            echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $payroll->getEmployee_id() . '&month=' . $month . '&year=' . $year . '">' . contacts_formated($payroll->getEmployee_id()) . '</a></td>';
//            // A
//            echo '<td><a href="index.php?c=contacts&a=hr_employee_salary&id=' . $payroll->getEmployee_id() . '&month=' . $month . '&year=' . $year . '">' . moneda($payroll->getSalary('hour')) . '</a></td>';
//            // B
//            echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $payroll->getEmployee_id() . '&month=' . $month . '&year=' . $year . '">' . $payroll->getWorked_hours() . '</a></td>';
//            // C
//            echo '<td class="text-right">' . moneda($payroll->getSalary('hour') * $payroll->getWorked_hours()) . '</td>';
//            //  D                
//            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_payroll&id=' . $payroll->getEmployee_id() . '&month=' . $month . '&year=' . $year . '">' . moneda($payroll->getPrecompte()) . '</a></td>';
//            // E
//            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_benefits&id=' . $payroll->getEmployee_id() . '&month=' . $month . '&year=' . $year . '">' . moneda($payroll->getSodexo()) . '</a></td>';
//            // F
//            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_fines&id=' . $payroll->getEmployee_id() . '&month=' . $month . '&year=' . $year . '">' . moneda($payroll->getFine_withdrawal()) . '</a></td>';
//            // G
//            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $payroll->getEmployee_id() . '&month=' . $month . '&year=' . $year . '">' . moneda($payroll->getMoney_advance('bank')) . '</a></td>';
//            // H
//            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $payroll->getEmployee_id() . '&month=' . $month . '&year=' . $year . '">' . moneda($payroll->getMoney_advance('cash')) . '</a></td>';
//            //  I
//            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_documents&id=' . $payroll->getEmployee_id() . '&month=' . $month . '&year=' . $year . '">' . moneda($payroll->getDriver()) . '</a></td>';
//            // J
            echo '<td>';

//            echo moneda($payroll->getValue_round());
            include 'modal_value_round_update.php';
            echo '</td>';

            // K
            echo '<td>';

            $formula_total_sold = hr_payroll_by_month_get_formula_by_payroll_id_column($payroll->getId(), 'total_sold');
            //vardump($formula_total_sold);
            $Total_sold = $payroll->calculate_formula($formula_total_sold);
            $payroll->setTotal_sold($Total_sold);
            //echo moneda($payroll->getTotal_sold());
            include 'modal_total_sold_update.php';
            echo '</td>';

            // L
            echo '<td>';

            $formula_pay_to_bank = hr_payroll_by_month_get_formula_by_payroll_id_column($payroll->getId(), 'pay_to_bank');
            //vardump($formula_pay_to_bank);
            $pay_to_bank = $payroll->calculate_formula($formula_pay_to_bank);
            $payroll->setPay_to_bank($pay_to_bank);
            //echo moneda($payroll->getPay_to_bank());
            include 'modal_pay_to_bank_update.php';
            echo '</td>';

            // M
            echo '<td>';

            $formula_pay_to_cash = hr_payroll_by_month_get_formula_by_payroll_id_column($payroll->getId(), 'pay_to_cash');
            //vardump($formula_pay_to_cash);
            $pay_to_cash = $payroll->calculate_formula($formula_pay_to_cash);
            $payroll->setPay_to_cash($pay_to_cash);
            //echo moneda($payroll->getPay_to_cash());
            include 'modal_pay_to_cash_update.php';
            echo '</td>';

            // M
            echo '<td>';

            $formula_total_to_pay = hr_payroll_by_month_get_formula_by_payroll_id_column($payroll->getId(), 'total_to_pay');
            //vardump($formula_total_to_pay);
            $total_to_pay = $payroll->calculate_formula($formula_total_to_pay);
            $payroll->setTotal_to_pay($total_to_pay);
            //echo moneda($payroll->getTotal_to_pay());
            include 'modal_total_to_pay_update.php';
            echo '</td>';

            echo '</tr>';
        }
        ?>      
    </tbody>
    <tr>
        <td></td>
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

'%payroll_salary_base%',

'%salary_month%',

'%worked_days%',


