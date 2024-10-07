<?php include view('contacts', 'der_hr_employee_documents_all'); ?>






<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Employee category"); ?>
        </h3>
    </div>
    <div class="panel-body">

        <?php
        // si el empleado ya tiene categoria, no permitir add mas

        if (!hr_employee_category_list_codes_by_employee_id($id)) {
            include view('hr_employee_category', 'form_add_by_employee');
        } else {
            message('info', 'The employee is already in a category');
        }
        ?>

    </div>
</div>




