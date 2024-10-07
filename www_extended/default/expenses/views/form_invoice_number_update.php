
<form class="form-inline" method="post" action="index.php">


    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_invoice_number_update">
    <input type="hidden" name="provider_id" value="<?php echo $expense->getProvider_id(); ?>">
    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="2">

    <div class="form-group">
        <label class="" for="invoice_number"><?php _t("Invoice number"); ?></label>
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

    <button type="submit" class="btn btn-default">
        <?php //echo icon('ok'); ?>
        <?php _t("Change"); ?>
    </button>


</form>

