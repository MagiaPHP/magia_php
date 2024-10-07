<?php

$from = "$year-$month-01"; 
$to = "$year-$month-31";; 

$hr_employee_fines = hr_employee_fines_search_by_employee_from_to_category($employee->getContact_id(), $from, $to, 'all');

if ($hr_employee_fines) {
    ?>



    <table class="table table-striped table-bordered">
        <thead>
            <tr>                              
                <th><?php _t("Date"); ?></th>            
                <th><?php _t("Category"); ?></th>            
                <th><?php _t("Description"); ?></th>            
                <th  class="text-right"><?php _t("Bank"); ?></th>            
                <th  class="text-right"><?php _t("Cash"); ?></th>            
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php
            $hr_employee_fines = hr_employee_fines_search_by_employee_from_to_category($employee->getContact_id(), $from, $to, 'all');
            $total_cash = 0;
            $total_bank = 0;

            foreach ($hr_employee_fines as $key => $hr_employee_fines_item) {

                echo "<tr>";
                echo '<td>' . magia_dates_formated($hr_employee_fines_item['date']) . '</td>';
                echo '<td>' . hr_fines_categories_field_category_code('category', $hr_employee_fines_item['category_code']) . '</td>';
                echo '<td>' . ($hr_employee_fines_item['description']) . '</td>';
                //echo '<td>' . ($hr_employee_fines_item['way']) . '</td>';

                if ($hr_employee_fines_item['way'] == 'bank') {
                    $total_bank = $total_bank + $hr_employee_fines_item['value'];

                    echo '<td></td>';
                    echo '<td  class="text-right">' . ($hr_employee_fines_item['value']) . '</td>';
                } else {
                    $total_cash = $total_cash + $hr_employee_fines_item['value'];
                    echo '<td  class="text-right">' . ($hr_employee_fines_item['value']) . '</td>';
                    echo '<td></td>';
                }

                echo "<td>";
                
                $params = "index.php?c=hr_employee_fines&a=ok_delete&id=$hr_employee_fines_item[id]&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_fines&redi[params]=" . urlencode("id=".$employee->getContact_id()."&from=$from&to=$to");
                
                include view('hr_employee_fines', 'modal_delete', $params);
                
                echo "</td>";

                echo '</tr>';
            }

            echo '<tr>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="text-right"><b>' . moneda($total_cash) . '</b></td>';
            echo '<td class="text-right"><b>' . moneda($total_bank) . '</b></td>';
            echo '<td class="text-right"><b>' . moneda($total_cash + $total_bank) . '</b></td>';
            echo '</tr>';
            ?>	
        </tbody>
    </table>

<?php }
?>

