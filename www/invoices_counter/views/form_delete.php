<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="invoices_counter">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="invoice_id" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="<?php echo "$invoices_counter[invoice_id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Year"); ?></label>
        <div class="col-sm-8">                    
            <input type="year" name="year" class="form-control"  id="year" placeholder="year" value="<?php echo "$invoices_counter[year]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Counter"); ?></label>
        <div class="col-sm-8">                    
            <input type="counter" name="counter" class="form-control"  id="counter" placeholder="counter" value="<?php echo "$invoices_counter[counter]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

