
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_delete_date_end_<?php echo $hr_employee_salary->getId(); ?>">
    <?php echo icon("trash"); ?>
    <?php _t("Delete"); ?>
</button>

<div class="modal fade" 
     id="modal_delete_date_end_<?php echo $hr_employee_salary->getId(); ?>" 
     tabindex="-1" 
     role="dialog" 
     aria-labelledby="modal_delete_date_end_<?php echo $hr_employee_salary->getId(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_delete_date_end_<?php echo $hr_employee_salary->getId(); ?>Label">
                    <?php _t("Edit"); ?> <?php echo $hr_employee_salary->getId(); ?>
                </h4>
            </div>
            <div class="modal-body">
                <h4>
                    <?php _t("Are you sure you want to delete"); ?>?
                </h4>
            </div>
            <div class="modal-footer">
                <a 
                    class="btn btn-danger" 
                    href="index.php?c=hr_employee_salary&a=ok_delete&id=<?php echo $hr_employee_salary->getId(); ?>&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_salary&redi[params]=<?php echo urlencode("id=$id"); ?>"
                    >
                        <?php echo icon('trash'); ?> 
                        <?php _t("Delete"); ?>
                </a>

            </div>
        </div>
    </div>
</div>