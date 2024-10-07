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



<?php
/**
 * <div class="container-fluid">
  <div class="row">
  <div class="col-xs-6 col-md-4">
  </div>
  <div class="col-xs-6 col-md-4 text-center">
  <h2 class="text-center"><?php echo _tr(magia_dates_month($month)); ?> - <?php echo $year; ?></h2>
  <form class="form-inline" method="get" action="index.php">
  <input type="hidden" name="c" value="hr_payroll_by_month">
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
 */
?>



<table class="mgTableCol table table-striped table-bordered">
    <thead>     

        <tr class="info">
            <th>#</th>            
            <?php
            /**
             *             <th  class="text-center">
              <a href="index.php?c=hr_payroll_by_month&a=by_month&order_col=employee_id&order_way=desc">desc</a>
              <?php _t("Employee"); ?>
              <a href="index.php?c=hr_payroll_by_month&a=by_month&order_col=employee_id&order_way=asc">asc</a>
              </th>
             */
            ?>



            <th class="text-left"><?php _t("Worker"); ?></th>
            <th class="text-center"><?php _t("Remuneration hour"); ?></th>
            <th class="text-center"><?php _t("Total hours worked"); ?></th>
            <th class="text-center"><?php _t("Total value"); ?></th>
            <th class="text-center"><?php _t("Precompte"); ?></th>
            <th class="text-center"><?php _t("Meal vouchers"); ?></th>
            <th class="text-center"><?php _t("Fine / withdrawal"); ?></th>
            <th class="text-center"><?php _t("Bank"); ?></th>
            <th class="text-center"><?php _t("Cash"); ?></th>
            <th class="text-center"><?php _t("Driver bonus"); ?></th>
            <th class="text-center"><?php _t("Value to round"); ?></th>
            <th class="text-center"><?php _t("Total"); ?></th>
            <th class="text-center"><?php _t("Bank"); ?></th>
            <th class="text-center"><?php _t("Cash"); ?></th>
            <th class="text-center"><?php _t("Total to pay"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 1;
        $salary_month = null;
        $salary_hour = null;

        $total_total_salaire = 0;
        $driver = '';

        $i = 1;

        $total_worked_hours = null;
        $total_value_in_euros = null;

        $total_precompte = null;
        $total_meal_vouchers = null;
        $total_fine_withdrawal = null;
        $total_money_advance_bank = null;
        $total_money_advance_cash = null;
        $total_driver = null;

        $total_general_value_round = null;
        $total_general_total_sold = null;
        $total_general_pay_to_bank = null;
        $total_general_pay_to_cash = null;
        $total_general_total_to_pay = null;

        foreach ($employees_list as $key => $employee_id) {

            $prbm = new Payroll_by_month();

            $prbm->setPayroll_by_month($employee_id, $year, $month);

            $total_worked_hours = $total_worked_hours + $prbm->getWorked_hours();
            $total_value_in_euros = $total_value_in_euros + $prbm->getSalary('hour') * $prbm->getWorked_hours();

            $total_precompte = $total_precompte + $prbm->getPrecompte();
            $total_meal_vouchers = $total_meal_vouchers + $prbm->getMeal_vouchers();
            $total_fine_withdrawal = $total_fine_withdrawal + $prbm->getFine_withdrawal();
            $total_money_advance_bank = $total_money_advance_bank + $prbm->getMoney_advance('bank');
            $total_money_advance_cash = $total_money_advance_cash + $prbm->getMoney_advance('cash');
            $total_driver = $total_driver + $prbm->getDriver();

            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td ><a href="index.php?c=contacts&a=details&id=' . $prbm->getEmployee_id() . '">' . contacts_formated($prbm->getEmployee_id()) . '</a></td>';
            echo '<td class="text-right" ><a href="index.php?c=contacts&a=hr_employee_salary&id=' . $prbm->getEmployee_id() . '">' . $prbm->getSalary('hour') . '</a></td>';
            echo '<td class="text-center" ><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $prbm->getEmployee_id() . '">' . ($prbm->getWorked_hours()) . '</a></td>';
            echo '<td class="text-right success"><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $prbm->getEmployee_id() . '">' . moneda($prbm->getSalary('hour') * $prbm->getWorked_hours()) . '</a></td>';
            echo '<td class="text-right" ><a href="index.php?c=hr_employee_payroll_items&a=hr&id=' . $prbm->getEmployee_id() . '">' . moneda($prbm->getPrecompte()) . '</a></td>';
            echo '<td class="text-right" ><a href="index.php?c=hr_employee_benefits_by_month&a=by_month&id=' . $prbm->getEmployee_id() . '">' . moneda($prbm->getMeal_vouchers()) . '</a></td>';
            echo '<td class="text-right" ><a href="index.php?c=contacts&a=hr_employee_fines&id=' . $prbm->getEmployee_id() . '">' . moneda($prbm->getFine_withdrawal()) . '</a></td>';
            echo '<td class="text-right success"><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $prbm->getEmployee_id() . '">' . moneda($prbm->getMoney_advance('bank')) . '</a></td>';
            echo '<td class="text-right" ><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $prbm->getEmployee_id() . '">' . moneda($prbm->getMoney_advance('cash')) . '</a></td>';
            echo '<td class="text-right" ><a href="index.php?c=contacts&a=veh_vehicles_drivers&id=' . $prbm->getEmployee_id() . '">' . moneda($prbm->getDriver()) . '</a></td>';

            echo '<td >';
            $formule_value_round = hr_payroll_by_month_field_by('formule', $employee_id, $year, $month, 'value_round');
            $total_value_round = $prbm->calculate_formule($formule_value_round);
            //vardump($total_value_round); 
            hr_payroll_by_month_update_value_by($employee_id, $year, $month, 'value_round', $total_value_round);
            include 'modal_value_round_update.php';
            echo '</td>';

            echo '<td >';
            // ( %salary_hour% * %worked_hours% ) - ( %precompte% + %meal_vouchers% + %fine_withdrawal% + %money_advance_bank% + %money_advance_cash% ) + %driver%
            $formule_total_sold = hr_payroll_by_month_field_by('formule', $employee_id, $year, $month, 'total_sold');
            //vardump($formule_total_sold); 
            $total_total_sold = $prbm->calculate_formule($formule_total_sold);
            //vardump($total_total_sold); 
            hr_payroll_by_month_update_value_by($employee_id, $year, $month, 'total_sold', $total_total_sold);
            include 'modal_total_sold_update.php';
            echo '</td>';

            echo '<td  >';
            // 1900 - %precompte% - %money_advance_bank% -  %value_round%
            $formule_pay_to_bank = hr_payroll_by_month_field_by('formule', $employee_id, $year, $month, 'pay_to_bank');
            $total_pay_to_bank = $prbm->calculate_formule($formule_pay_to_bank);
            hr_payroll_by_month_update_value_by($employee_id, $year, $month, 'pay_to_bank', $total_pay_to_bank);
            include 'modal_pay_to_bank_update.php';
            echo '</td>';

            echo '<td >';
            // %total_sold% - %pay_to_bank%
            $formule_pay_to_cash = hr_payroll_by_month_field_by('formule', $employee_id, $year, $month, 'pay_to_cash');
            $total_pay_to_cash = $prbm->calculate_formule($formule_pay_to_cash);
            hr_payroll_by_month_update_value_by($employee_id, $year, $month, 'pay_to_cash', $total_pay_to_cash);
            include 'modal_pay_to_cash_update.php';
            echo '</td>';

            echo '<td >';
            // 
            $formule_total_to_pay = hr_payroll_by_month_field_by('formule', $employee_id, $year, $month, 'total_to_pay');

            //vardump($formule_total_to_pay); 

            $total_total_to_pay = $prbm->calculate_formule($formule_total_to_pay);

            //vardump($total_total_to_pay); 

            hr_payroll_by_month_update_value_by($employee_id, $year, $month, 'total_to_pay', $total_total_to_pay);

            include 'modal_total_to_pay_update.php';

            echo '</td>';

            echo '</tr>';

            //$total_value_round = $total_value_round + $prbm->getValue_round();
            $total_general_total_sold = $total_general_total_sold + $prbm->getTotal_sold();
            $total_general_pay_to_bank = $total_general_pay_to_bank + $total_pay_to_bank;
            $total_general_pay_to_cash = $total_general_pay_to_cash + $total_pay_to_cash;
            $total_general_total_to_pay = $total_general_total_to_pay + $total_total_to_pay;
        }
        ?>      
    </tbody>







    <tr class="success">
        <td></td>
        <td></td>
        <td></td>
        <td class="text-center" ><?php echo ($total_worked_hours); ?></td>
        <td class="text-right" ><?php echo moneda($total_value_in_euros); ?></td>        
        <td class="text-right" ><?php echo moneda($total_precompte); ?></td>
        <td class="text-right" ><?php echo moneda($total_meal_vouchers); ?></td>
        <td class="text-right" ><?php echo moneda($total_fine_withdrawal); ?></td>
        <td class="text-right" ><?php echo moneda($total_money_advance_bank); ?></td>
        <td class="text-right" ><?php echo moneda($total_money_advance_cash); ?></td>
        <td class="text-right" ><?php echo moneda($total_driver); ?></td>
        <td><?php // echo $total_value_round;                 ?></td>
        <td class="text-right" ><?php echo moneda($total_general_total_sold); ?></td>
        <td class="text-right" ><?php echo moneda($total_general_pay_to_bank); ?></td>
        <td class="text-right" ><?php echo moneda($total_general_pay_to_cash); ?></td>
        <td class="text-right" ><?php echo moneda($total_general_total_to_pay); ?></td>
    </tr>


    <?php
    /**
     * 

      <tr>
      <td></td>
      <td></td>
      <td>salary_hour</td>
      <td>worked_hours</td>
      <td></td>
      <td>precompte</td>
      <td>meal_vouchers</td>
      <td>fine_withdrawal</td>
      <td>money_advance_bank</td>
      <td>money_advance_cash</td>
      <td>driver</td>
      <td>value_round</td>
      <td>total_sold</td>
      <td>pay_to_bank</td>
      <td>pay_to_cash</td>
      <td>total_to_pay</td>
      </tr>

     */
    ?>



</table>




