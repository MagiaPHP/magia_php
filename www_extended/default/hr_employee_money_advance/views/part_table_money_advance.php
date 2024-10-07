<?php
$total_lines = (count(hr_employee_money_advance_search_by_employee_year_month($employee['contact_id'], $year, $month)));
?>
<table class="table table-striped table-bordered">

    <?php if ($total_lines) { ?>
        <thead>
            <tr>
                <th></th>
                <th><?php _t("Bank"); ?></th>
                <th><?php _t("Cash"); ?></th>
            </tr>
        </thead>
    <?php } ?>

    <?php
    $hrmabe_total_bank = 0;
    $hrmabe_total_cash = 0;

    foreach (hr_employee_money_advance_search_by_employee_year_month($employee['contact_id'], $year, $month) as $key => $hrmabe) {



        echo '<tr>';

        if ($hrmabe['way'] == 'bank') {
            $hrmabe_total_bank = $hrmabe_total_bank + $hrmabe['value'];
            echo '<td>' . magia_dates_formated($hrmabe['date']) . '</td>';
            echo '<td>' . moneda($hrmabe['value']) . '</td>';
            echo '<td></td>';
        } else {
            $hrmabe_total_cash = $hrmabe_total_cash + $hrmabe['value'];
            echo '<td>' . magia_dates_formated($hrmabe['date']) . '</td>';
            echo '<td></td>';
            echo '<td>' . moneda($hrmabe['value']) . '</td>';
        }

        echo '<td>';

        $params['id'] = $hrmabe['id'];
        $params['redi'] = 5;
        $params['c'] = 'hr_employee_money_advance';
        $params['a'] = 'index';
        $params['params'] = '';
        //$params = "index.php?c=hr_employee_money_advance&a=ok_delete&id=$hrmabe[id]&redi[redi]=5&redi[c]=hr_employee_money_advance&redi[a]=index&redi[params]=";
        include view('hr_employee_money_advance', 'modal_delete', $params);
        echo'</td>';
        echo '</tr>';
    }

    if ($total_lines > 1) {


        echo '<tr>';
        echo '<td><b>' . _tr('Totals') . '</b></td>';
        echo '<td><b>' . moneda($hrmabe_total_bank) . '</b></td>';
        echo '<td><b>' . moneda($hrmabe_total_cash) . '</b></td>';
        echo '<td><b>' . moneda($hrmabe_total_cash + $hrmabe_total_bank) . '</b></td>';
        echo '</tr>';
    }
    ?>

    <?php
    $params = [];
    $params['id'] = $employee['contact_id'];
    $params['redi'] = '5';
    $params['c'] = 'hr_employee_money_advance';
    $params['a'] = 'index';
    $params['params'] = "month=$month&year=$year";
    ?>
    <form class="form-horizontal" action="index.php" method="post" >
        <input type="hidden" name="c" value="hr_employee_money_advance">
        <input type="hidden" name="a" value="ok_add">
        <input type="hidden" name="employee_id" value="<?php echo $params['id']; ?>">

        <input type="hidden" name="redi[redi]" value="<?php echo $params['redi']; ?>">
        <input type="hidden" name="redi[c]" value="<?php echo $params['c']; ?>">
        <input type="hidden" name="redi[a]" value="<?php echo $params['a']; ?>">
        <input type="hidden" name="redi[params]" value="<?php echo $params['params']; ?>">

        <tr>
            <td>
                <input type="date" name="date" class="form-control" id="date" placeholder="date" value="" 
                       required=""
                       >
            </td>
            <td>
                <input type="number" step="any" name="value" class="form-control" id="value" placeholder="value" value=""
                       required=""
                       >
            </td>
            <td>
                <select name="way" class="form-control" id="way" >                
                    <option value="bank"><?php echo _t("Bank"); ?></option>

                    <option value="cash"><?php echo _t("Cash"); ?></option>
                </select>     
            </td>

            <td>
                <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
            </td>
        </tr>

    </form>



</table>







