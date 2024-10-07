<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="invoices_counter">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="invoice_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="<?php echo "$invoices_counter[invoice_id]"; ?>" >
        </div>	
    </div>
    <?php # /invoice_id ?>

    <?php # year ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="year"><?php _t("Year"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="year" class="form-control"  id="year" placeholder="year" value="<?php echo "$invoices_counter[year]"; ?>" >
        </div>	
    </div>
    <?php # /year ?>

    <?php # counter ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="counter"><?php _t("Counter"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="counter" class="form-control"  id="counter" placeholder="counter" value="<?php echo "$invoices_counter[counter]"; ?>" >
        </div>	
    </div>
    <?php # /counter ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

