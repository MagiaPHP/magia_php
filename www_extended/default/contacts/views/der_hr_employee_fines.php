<?php include view('contacts', 'der_hr_employee_documents_all'); ?>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Add Fine / Withdrawal"); ?>
    </div>
    <div class="panel-body">

        <?php
        $params = [];
        $params['employee_id'] = $id;
        $params['redi'] = '5';
        $params['c'] = 'contacts';
        $params['a'] = 'hr_employee_fines';
        $params['params'] = 'id=' . $params['employee_id'];

        include view('hr_employee_fines', 'form_add_by_employee');
        ?>


    </div>
</div>

