<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Code"); ?></th>
            <th><?php _t("Days"); ?></th>
            <th><?php _t("Quantity"); ?></th>
            <th><?php _t("Value"); ?></th>
            <th><?php _t("Value in EURO"); ?></th>
            <th><?php _t("Description"); ?></th>                        
            <th><?php _t("Formula"); ?></th>                        
            <th><?php _t("Order by"); ?></th>                                                        
        </tr>
    </thead>

    <tbody>

        <?php
        $i = 1;
        foreach ($hr_payroll->getLines() as $key => $line) {

            $hr_payroll_lines = new Payroll_lines();
            
            $hr_payroll_lines->setHr_payroll_lines($line['id']);

            echo '<tr>';
            echo '<td>' . $i . '</td>';
            //echo '<td>' . $hr_payroll_lines->getId() . '</td>';
            echo '<td>' . $hr_payroll_lines->getCode() . '</td>';

            if ($hr_payroll_lines->getCode() == 2110 || $hr_payroll_lines->getCode() == 2120) {
                echo '<td class="text-center">' . $hr_payroll_lines->getDays() . '</td>';
                echo '<td class="text-right">' . moneda($hr_payroll_lines->getQuantity()) . '</td>';
                echo '<td class="text-right">' . moneda($hr_payroll_lines->getValue()) . '</td>';
                echo '<td class="text-right">' . moneda($hr_payroll_lines->getQuantity() * $hr_payroll_lines->getValue()) . '</td>';
            } else {
                echo '<td class="text-center"></td>';
                echo '<td class="text-center"></td>';
                echo '<td class="text-right"></td>';
                echo '<td class="text-right">' . moneda($hr_payroll_lines->getQuantity() * $hr_payroll_lines->getValue()) . '</td>';
            }


//            if (!hr_payroll_items_field_code('formula', $hr_payroll_lines->getCode())) {
//                moneda($hr_payroll_lines->getValue());
//                //    include "modal_details_items_edit.php";
//            }


            echo '<td>' . $hr_payroll_lines->getDescription() . '</td>';
            echo '<td>' . $hr_payroll_lines->getFormula() . '</td>';
            echo '<td>' . $hr_payroll_lines->getOrder_by() . '</td>';
            echo '</tr>';
            $i++;
        }
        ?>





    </tbody>
</table>



