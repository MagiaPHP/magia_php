<?php include view('contacts', 'der_hr_employee_documents_all'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Add civil status"); ?>
    </div>
    <div class="panel-body">

        <?php
        // si ya tiene un status registrado 
        // no se puede poner mas 
        //
        //vardump(hr_employee_civil_status_search_by('employee_id', $id));

        if (hr_employee_civil_status_search_by('employee_id', $id)) {
            message('info', 'You have already registered a civil status for this employee');
        } else {
            include view('hr_employee_civil_status', 'form_add_by_employee');
        }
        ?>


    </div>
</div>



