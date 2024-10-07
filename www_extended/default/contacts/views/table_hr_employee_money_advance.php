<table class="table table-striped">
    <thead>
        <tr>                               
            <th><?php _t('Date'); ?></th>
            <th class="text-right"><?php _t('Value'); ?></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>


    <tbody>

        <?php
        $total_value = 0;
        $total_cash = 0;
        $total_bank = 0;

        foreach ($hr_employee_money_advance as $hr_employee_money_advance_item) {

//            $advance = new Money_advance();
//            $advance->setHr_employee_money_advance($hr_employee_money_advance_item['id']);

            if ($hr_employee_money_advance_item['way'] == 'cash') {
                $total_cash = $total_cash + $hr_employee_money_advance_item['value'];
            }


            if ($hr_employee_money_advance_item['way'] == 'bank') {
                $total_bank = $total_bank + $hr_employee_money_advance_item['value'];
            }




            echo "</tr>";
            echo '<td>' . magia_dates_formated($hr_employee_money_advance_item['date']) . '</td>';
            echo '<td  class="text-right">' . ($hr_employee_money_advance_item['value']) . '</td>';

            echo '<td>' . ucfirst($hr_employee_money_advance_item['way']) . '</td>';

            if ($hr_employee_money_advance_item['way'] == 'bank') {
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_money_advance&a=details_payment&id=' . $hr_employee_money_advance_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
            } else {
                echo '<td></td>';
            }

            echo "<td>";

            $params['id'] = $hr_employee_money_advance_item['id'];
            $params['redi'] = 5;
            $params['c'] = 'contacts';
            $params['a'] = 'hr_employee_money_advance';
            $params['params'] = "id=$id";

            //$params = "index.php?c=hr_employee_money_advance&a=ok_delete&id=$hr_employee_money_advance_item[id]&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_money_advance&redi[params]=" . urlencode("id=$id&month=$month&year=$year");
            include view('hr_employee_money_advance', 'modal_delete', $params);
            echo "</td>";

            echo '</tr>';
        }
        ?>	        
    </tbody>


    <tr>                
        <td class="text-right"><?php _t('Total cash'); ?></td>
        <td class="text-right"><?php echo moneda($total_cash) ?></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td class="text-right"><?php _t('Total bank'); ?></td>
        <td class="text-right"><?php echo moneda($total_bank) ?></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>                
        <td class="text-right"><?php _t('Total general'); ?></td>
        <td class="text-right"><b><?php echo moneda($total_cash + $total_bank) ?></b></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

</table>


