
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_modal_pay_expense_<?php echo $expense->getId(); ?>">
    <?php echo _t("Pay now"); ?>
</button>


<div class="modal fade" id="myModal_modal_pay_expense_<?php echo $expense->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_modal_pay_expense_<?php echo $expense->getId(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_modal_pay_expense_<?php echo $expense->getId(); ?>Label">
                    <?php _t("Pay now"); ?>
                </h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>