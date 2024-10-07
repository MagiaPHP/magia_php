<a name="10"></a>

<h2><?php _t("Invoice number"); ?></h2>



<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_10">
    <input type="hidden" name="redi" value="1">

    <?php # invoice_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="invoice_number"><?php _t("Invoice number"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text" 
                name="invoice_number" 
                class="form-control" 
                id="invoice_number" 
                placeholder="<?php _t("Invoice number"); ?>" value="<?php echo $expense->getInvoice_number() ?? false; ?>" 
                autofocus=""
                >
        </div>	
    </div>
    <?php # /invoice_number ?>

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
                <?php echo icon("chevron-right"); ?>
            </button>


        </div>      							
    </div>      							

</form>

