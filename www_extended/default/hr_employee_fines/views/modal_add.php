
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_<?php echo $employee->getContact_id(); ?>">
    <?php echo icon("plus"); ?> <?php _t("Add"); ?>
</button>


<div class="modal fade" id="myModal_<?php echo $employee->getContact_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo $employee->getContact_id(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_<?php echo $employee->getContact_id(); ?>Label">
                    <?php _t("Add"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
                $params = [];
                $params['employee_id'] = $employee->getContact_id();
                $params['redi'] = '5';
                $params['c'] = 'hr_employee_fines';
                $params['a'] = 'index';
                $params['params'] = "month=$month&year=$year&id=" . $employee->getContact_id();

                include view('hr_employee_fines', 'form_add_by_employee', $params);
                ?>

            </div>


        </div>
    </div>
</div>