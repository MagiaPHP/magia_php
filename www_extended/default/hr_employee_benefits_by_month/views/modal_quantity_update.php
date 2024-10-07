<!-- Button trigger modal -->
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#quantity_update_<?php echo $hr_employee_benefits_by_month_item['id']; ?>">
    <?php _t("Update"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="quantity_update_<?php echo $hr_employee_benefits_by_month_item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="quantity_update_<?php echo $hr_employee_benefits_by_month_item['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="quantity_update_<?php echo $hr_employee_benefits_by_month_item['id']; ?>Label">
                    <?php echo _t("Update"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php include "form_quantity_update.php"; ?>
                
                
            </div>



        </div>
    </div>
</div>