<?php include view('contacts', 'der_hr_employee_documents_all'); ?>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Add clothes"); ?>
    </div>
    <div class="panel-body">

        <?php
        if (count(hr_employee_sizes_clothes_list_codes_by_employee_id($id)) >= count(hr_clothes_list())) {
            message('info', 'There are no more items of clothing available to add to this worker.');
        } else {
            include view('hr_employee_sizes_clothes', 'form_add_by_employee');
        }
        ?>


    </div>
</div>




