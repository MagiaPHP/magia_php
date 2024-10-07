<?php include view('contacts', 'der_hr_employee_documents_all'); ?>



<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Record a remuneration for this worker"); ?>
    </div>
    <div class="panel-body">


        <?php
        if (hr_employee_salary_has_open_period($id)) {
            message('info', "You cannot add a new salary for this employee as there is an open salary period (without an end date). Please close the current period before adding a new salary.");
        } else {
            include view('hr_employee_salary', 'form_add_by_employee');
        }

//        vardump(hr_employee_salary_date_last_salary($id));                
//        vardump(hr_employee_salary_in_date($id, "2024-01-16"));                 
        ?>


    </div>
</div>




