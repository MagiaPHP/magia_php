
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_hr_employee_clothes_delete_<?php echo $hr_employee_clothes_item['id']; ?>">
    <?php echo icon("trash"); ?>
    <?php _t("Delete"); ?>
</button>

<div class="modal fade" id="modal_hr_employee_clothes_delete_<?php echo $hr_employee_clothes_item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_hr_employee_clothes_delete_<?php echo $hr_employee_clothes_item['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_hr_employee_clothes_delete_<?php echo $hr_employee_clothes_item['id']; ?>Label">
                    <?php _t("Delete"); ?> <?php // echo $hr_employee_clothes_item['id']; ?> 
                </h4>
            </div>
            <div class="modal-body">

                <p>
                    <?php _t("Are you sure you want to delete this item?"); ?>
                </p>

            </div>

            <div class="modal-footer">
                <a 
                    class="btn btn-danger" 
                    href="index.php?c=hr_employee_clothes&a=ok_delete&id=<?php echo $hr_employee_clothes_item['id']; ?>&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_sizes_clothes&redi[params]=id=<?php echo $id; ?>"><?php echo icon("trash"); ?> 
                        <?php echo _tr("Delete"); ?>
                </a>
            </div>

        </div>
    </div>
</div>