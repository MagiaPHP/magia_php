
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_details_items_edit_<?php echo $hr_payroll_lines->getId(); ?>">
    <?php echo icon("pencil"); ?>
    <?php echo _tr("Edit"); ?>
</button>


<div class="modal fade" id="myModal_details_items_edit_<?php echo $hr_payroll_lines->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_details_items_edit_<?php echo $hr_payroll_lines->getId(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_details_items_edit_<?php echo $hr_payroll_lines->getId(); ?>Label">
                    <?php _t("Edit"); ?>
                    <?php echo $hr_payroll_lines->getId(); ?>

                </h4>
            </div>
            <div class="modal-body">
                <?php
                //vardump($hr_payroll_lines); 

                include view('hr_payroll_lines', 'form_edit_simple');
                //include view('hr_payroll_lines', 'form_edit_value');
                ?>
            </div>
        </div>
    </div>
</div>