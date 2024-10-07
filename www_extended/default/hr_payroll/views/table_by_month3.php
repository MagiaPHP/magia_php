


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
            <th class="info text-center" colspan="3"><?php _t("REMUNERATION CALCULATION"); ?></th>                        
            <th></th>
            <th></th>
            <th class="info text-center" colspan="2">ACOMPTE 25.04</th>
            <th></th>
            <th class="info text-center" colspan="3">SOLDE 10.05</th>

            <th></th>
        </tr>

        <tr class="info">
            <th>N</th>
            <th><?php _t("Employee"); ?></th>
            <th>TARIF /h</th>
            <th>Total h.</th>
            <th>Total value</th>
            <th>PRECONT PROF</th>
            <th><?php _t("SODEXO"); ?></th>
            <th><?php _t("FINE / WITHDRAWAL"); ?></th>
            <th><?php _t("BANK"); ?></th>
            <th><?php _t("CASH"); ?></th>
            <th><?php _t("DRIVER"); ?></th>
            <th><?php _t("VALUE ROUND"); ?></th>
            <th><?php _t("TOTAL SOLD"); ?></th>
            <th><?php _t("BANK"); ?></th>
            <th><?php _t("CASH"); ?></th>
            <th><?php _t("OBSERVATION"); ?></th>
        </tr>

    </thead>
    <tfoot>
        <tr class="info">           

        </tr>
    </tfoot>
    <tbody>


        <?php
        $i = 1;
        $salary_month = null;
        $salary_hour = null;

        $total_total_salaire = 0;
        $driver = '';

        foreach (employees_list_by_company($u_owner_id) as $key => $employee) {



            // A
            // B
            // C
            // tarifa horaria de ese empleado en esa fecha    
            // extended/default/hr_payroll/views/table_by_month.php
            $salary = hr_employee_salary_in_date($employee['contact_id'], "$year-$month-01");
            if (isset($salary) && $salary) {
                $salary_month = $salary['month'];
                $salary_hour = $salary['hour'];
            }
            // D
            $total_worked_days = hr_employee_worked_days_total_days_worked_by_year_month_employee($year, $month, $employee['contact_id']);
            $total_worked_hours = (hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $employee['contact_id'])) ?? 0;
            // E = C * D
            $total_salaire = ( isset($total_worked_hours) && isset($salary_hour) ) ? $salary_hour * ((int) $total_worked_hours['sec'] / 3600 ) : 0;
            // F
            $precompte = hr_employee_payroll_items_default_value_by_employee_id_code($employee['contact_id'], 7050);
            // nada del payrool
            //$precompte = hr_employee_payroll_items_list_by_employee_code($employee['contact_id'], 7050)['value'] ?? null;
            // G (dias trabajados x valor cheque repas part employee)
            $value_employee_part = hr_employee_benefits_field_by_employee_id_code($employee['contact_id'], 'meal_vouchers')['value_employee_part'] ?? 0;
            if ($value_employee_part && $total_worked_days) {
                $sodexo = ($value_employee_part * $total_worked_days);
            } else {
                $sodexo = 0;
            }


//            $sodexo = hr_employee_payroll_items_list_by_employee_code($employee['contact_id'], 2100)['value'] ?? null;
            ;
            // H            
            $amande_retrait = hr_employee_fines_total_by_employee_year_month($employee['contact_id'], $year, $month);
            // I
            $acompte_bank = hr_employee_money_advance_total_by_employee_year_month($employee['contact_id'], $year, $month, 'bank');
            // J
            $acompte_cash = hr_employee_money_advance_total_by_employee_year_month($employee['contact_id'], $year, $month, 'cash');
            // K
            $driver = (veh_vehicles_drivers_search_by('driver_id', $employee['contact_id'])) ? 100 : 0;
            // L
            $value_round = 0;
            // M
            $total_sold = ($total_salaire - $precompte - $sodexo - $amande_retrait - $acompte_bank - $acompte_cash + $driver - $value_round );
            // N
            $pay_to_bank = 1900;
            // O
            $pay_to_cash = ($total_sold - $pay_to_bank );
            // P



            $total_total_salaire = $total_total_salaire + $total_salaire;

            echo '<tr>';
            // A
            echo '<td>' . $i++ . '</td>';
            // B
            echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $employee['contact_id'] . '&month=' . $month . '&year=' . $year . '">' . contacts_formated($employee['contact_id']) . '</a></td>';
            // C
            echo '<td><a href="index.php?c=contacts&a=hr_employee_salary&id=' . $employee['contact_id'] . '&month=' . $month . '&year=' . $year . '">' . moneda($salary_hour) . '</a></td>';
            // D
            echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $employee['contact_id'] . '&month=' . $month . '&year=' . $year . '">' . hr_employee_worked_days_format_time($total_worked_hours['hours']) . '</a></td>';
            // E
            echo '<td class="text-right">' . moneda($total_salaire) . '</td>';
            // F                 
            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_payroll&id=' . $employee['contact_id'] . '&month=' . $month . '&year=' . $year . '">' . moneda($precompte) . '</a></td>';
            // G
            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_benefits&id=' . $employee['contact_id'] . '&month=' . $month . '&year=' . $year . '">' . moneda($sodexo) . '</a></td>';
            // H
            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_fines&id=' . $employee['contact_id'] . '&month=' . $month . '&year=' . $year . '">' . moneda($amande_retrait) . '</a></td>';
            // I
            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $employee['contact_id'] . '&month=' . $month . '&year=' . $year . '">' . moneda($acompte_bank) . '</a></td>';
            // J
            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $employee['contact_id'] . '&month=' . $month . '&year=' . $year . '">' . moneda($acompte_cash) . '</a></td>';
            // K 
            echo '<td  class="text-right"><a href="index.php?c=contacts&a=hr_employee_documents&id=' . $employee['contact_id'] . '&month=' . $month . '&year=' . $year . '">' . moneda($driver) . '</a></td>';
            // L
            echo '<td>';
            echo moneda($value_round);
            include 'modal_value_round_update.php';
            echo '</td>';
            // M
            echo '<td  class="text-right" >' . moneda($total_sold) . '</td>';
            echo '<td  class="text-right" >' . moneda($pay_to_bank) . '</td>';
            echo '<td  class="text-right" >' . moneda($pay_to_cash) . '</td>';
            // N
            echo '<td></td>';
            // O
            // P
            // Q         
            echo '</tr>';
        }
        ?>
        <tr>
            <td>A</td>
            <td>B</td>
            <td>C</td>
            <td>D</td>
            <td>E = C x D</td>
            <td>F</td>
            <td>G</td>
            <td>H</td>
            <td>I</td>
            <td>J</td>
            <td>K</td>
            <td>L</td>
            <td>M=E+</td>
            <td>N</td>
            <td>O</td>
            <td>P</td>
        </tr>



        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right"><?php echo moneda($total_total_salaire); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>





</table>


L=E5-I5-J5-F5-H5-G5+100


