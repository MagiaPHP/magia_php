<button 
    type="button" 
    class="btn btn-default btn-sm" 
    data-toggle="modal" 
    data-target="#modal_update_benefits_<?php echo $hr_employee_benefits->getId(); ?>">
        <?php echo icon("pencil"); ?>
        <?php _t("Edit"); ?>
</button>

<div class="modal fade" 
     id="modal_update_benefits_<?php echo $hr_employee_benefits->getId(); ?>" 
     tabindex="-1" 
     role="dialog" 
     aria-labelledby="modal_update_benefits_<?php echo $hr_employee_benefits->getId(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_update_benefits_<?php echo $hr_employee_benefits->getId(); ?>Label">
                    <?php _t("Edit"); ?> <?php echo $hr_employee_benefits->getId(); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php include view('hr_employee_benefits', 'form_edit_by_employee'); ?>


            </div>




        </div>
    </div>
</div>