
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_details_items_delete_<?php echo $hr_payroll_lines->getId(); ?>">
    <?php echo icon("trash"); ?>
    <?php echo _tr("Delete"); ?>
</button>


<div class="modal fade" id="myModal_details_items_delete_<?php echo $hr_payroll_lines->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_details_items_delete_<?php echo $hr_payroll_lines->getId(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_details_items_delete_<?php echo $hr_payroll_lines->getId(); ?>Label">
                    <?php _t("Delete"); ?>
                    <?php echo $hr_payroll_lines->getId(); ?>

                </h4>
            </div>
            <div class="modal-body">
                <h4>
                    <?php _t("Are you sure you want to delete this item?"); ?>
                </h4>
            </div>

            <div class="modal-footer">
                <a
                    class="btn btn-danger"
                    href="index.php?c=hr_payroll_lines&a=ok_delete&id=<?php echo $hr_payroll_lines->getId(); ?>&redi[redi]=5&redi[c]=hr_payroll&redi[a]=edit&redi[params]=id=<?php echo $id; ?>">
                        <?php echo icon("trash"); ?>
                        <?php _t("Delete"); ?>
                </a>
            </div>
        </div>
    </div>
</div>