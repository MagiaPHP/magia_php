<table class="table table-striped">
    <thead>
        <tr>    
            <th><?php _t("Benefit"); ?></th>            
            <th><?php _t("Periodicity"); ?></th>            
            <th class="text-right"><?php _t("Value"); ?></th>            
            <th class="text-right"><?php _t("Company part"); ?></th>            
            <th class="text-right"><?php _t("Employee part"); ?></th>            
            <th></th>                                               
        </tr>
    </thead>

    <tbody>
        <?php
        foreach (hr_employee_benefits_by_employee_id($id) as $key => $benefit) {

            $hr_employee_benefits = new Hr_employee_benefits();
            $hr_employee_benefits->setHr_employee_benefits($benefit['id']);

            echo '<tr>
                    
                    <td>' . hr_benefits_field_code('title', $hr_employee_benefits->getBenefit_code()) . '</td>
                        
                    <td>' . _tr(hr_benefit_periodicity_field_code('periodicity', $benefit['periodicity'])) . '</td>
                        
                    <td class="text-right">' . moneda($benefit['price']) . '</td>
                        
                    <td class="text-right">' . number_format($benefit['company_part'], 3) . '% <b>' . moneda($benefit['value_company_part']) . '</b></td>
                        
                    <td class="text-right">' . number_format(100 - $benefit['company_part'], 3) . '%  <b>' . moneda($benefit['value_employee_part']) . '</b></td>       
                        
                    <td>';
            include "modal_hr_employee_benefits_update.php";
            include "modal_hr_employee_benefits_delete.php";
            echo '</td>
                    
                </tr>';
        }
        ?>
    </tbody>
</table>


