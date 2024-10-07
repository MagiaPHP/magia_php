<button type="button" class="btn btn-<?php echo ($expense->getInvoice_number()) ? "default" : "primary"; ?> btn-xs" data-toggle="modal" data-target="#myModalinvoice_number_update">
    <?php icon('pencil'); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="myModalinvoice_number_update" tabindex="-1" role="dialog" aria-labelledby="myModalinvoice_number_updateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalinvoice_number_updateLabel">
                    <?php _t("Update invoice number"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <form class="form-inline" method="post" action="index.php">
                    <input type="hidden" name="c" value="expenses">
                    <input type="hidden" name="a" value="ok_invoice_number_update">
                    <input type="hidden" name="provider_id" value="<?php echo $expense->getProvider_id(); ?>">
                    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
                    <input type="hidden" name="redi[redi]" value="2">

                    <div class="form-group">
                        <label class="sr-only" for="invoice_number"><?php _t("Invoice number"); ?></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="invoice_number" 
                            name="invoice_number" 
                            placeholder=""
                            value="<?php echo $expense->getInvoice_number(); ?>"
                            required=""
                            >
                    </div>                    

                    <button type="submit" class="btn btn-primary">
                        <?php echo icon('ok'); ?>
                        <?php _t("Save"); ?>
                    </button>


                </form>


            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
