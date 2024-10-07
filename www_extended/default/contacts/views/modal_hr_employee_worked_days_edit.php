<!-- Button trigger modal -->
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_hr_employee_worked_days_edit_<?php echo $line['id']; ?>">
    <?php echo icon("pencil"); ?>
</button>


<div class="modal fade" id="modal_hr_employee_worked_days_edit_<?php echo $line['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_hr_employee_worked_days_edit_<?php echo $line['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_hr_employee_worked_days_edit_<?php echo $line['id']; ?>Label">
                    <?php _t("Edit"); ?> <?php echo $line['id']; ?> 
                </h4>
            </div>
            <div class="modal-body">

                <?php // include view('hr_employee_worked_days', "form_edit_by_employee"); ?>
                
                <?php
                                               
                if (_options_option('config_hr_employee_worked_days_add_by') == 'ampm') {
                    include view('hr_employee_worked_days', "form_edit_by_employee_ampm");
                } else {
                    include view('hr_employee_worked_days', "form_edit_by_project");
                }
                ?>

            </div>

        </div>
    </div>
</div>