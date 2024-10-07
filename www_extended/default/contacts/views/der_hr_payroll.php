<?php include view('contacts', 'der_hr_employee_documents_all'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Create a new payslip"); ?>
    </div>
    <div class="panel-body">  


        <?php
        if (!$employee->can_create_payroll()) {
            foreach ($employee->getWhy_cant_create_payroll() as $key => $msj) {
                message('warning', $msj);
            }
        } else {
            include "form_hr_payroll_add_short_by_date.php";
        }
        
        
        
        
        
        ?>


        <?php //include "form_hr_payroll_add_short.php";  ?>
        <?php // include "form_hr_payroll_add_short_by_date.php"; ?>
        <?php // include "form_hr_payroll_add_short_by_month.php";  ?>

    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Values by default"); ?>
    </div>
    <div class="panel-body">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Description"); ?></th>                    
                    <th class="text-right"><?php _t("Value"); ?></th>                                        
                    <th></th>                    
                </tr>
            </thead>

            <tbody>

                <?php
                foreach (hr_employee_payroll_items_search_by('employee_id', $id) as $key => $hreprisb) {
                    echo '<tr>';
                    echo '<td>' . $hreprisb['code'] . '</td>';
                    echo '<td>' . hr_payroll_items_field_code('description', $hreprisb['code']) . '</td>';
                    echo '<td class="text-right">' . moneda($hreprisb['value']) . '</td>';
                    echo '<td>';

                    $params = $hreprisb;
                    //                    include view('hr_employee_payroll_items', 'modal_edit', $params); 
                    include view('hr_employee_payroll_items', 'modal_delete', $params);

                    echo '</td>';
                    echo '</tr>';
                }
                ?>

            </tbody>
        </table>

        <?php include view('hr_employee_payroll_items', 'form_add_by_employee'); ?>

        <p>
            <a href="index.php?c=hr_payroll_items"><?php _t("Edit"); ?></a>
        </p>


    </div>
</div>




