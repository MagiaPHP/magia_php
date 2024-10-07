<?php include view('contacts', 'der_hr_employee_documents_all'); ?>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Register a document"); ?>
    </div>
    <div class="panel-body">
        <?php
        if (count(hr_employee_documents_list_documents_by_emplyee_id($id)) >= count(hr_documents_list())) {
            message('info', 'There are no more documents available to add this worker');
        } else {
            include view('hr_employee_documents', 'form_add_by_employee');
        }
        ?>
    </div>
</div>


