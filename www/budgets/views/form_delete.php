<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="deleteOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$budgets[id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="invoice_id" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="<?php echo "$budgets[invoice_id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="credit_note_id" name="credit_note_id" class="form-control"  id="credit_note_id" placeholder="credit_note_id" value="<?php echo "$budgets[credit_note_id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="client_id" name="client_id" class="form-control"  id="client_id" placeholder="client_id" value="<?php echo "$budgets[client_id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Seller_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="seller_id" name="seller_id" class="form-control"  id="seller_id" placeholder="seller_id" value="<?php echo "$budgets[seller_id]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="date" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$budgets[date]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="date_registre" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$budgets[date_registre]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Total"); ?></label>
        <div class="col-sm-8">                    
            <input type="total" name="total" class="form-control"  id="total" placeholder="total" value="<?php echo "$budgets[total]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="tax" name="tax" class="form-control"  id="tax" placeholder="tax" value="<?php echo "$budgets[tax]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Advance"); ?></label>
        <div class="col-sm-8">                    
            <input type="advance" name="advance" class="form-control"  id="advance" placeholder="advance" value="<?php echo "$budgets[advance]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Balance"); ?></label>
        <div class="col-sm-8">                    
            <input type="balance" name="balance" class="form-control"  id="balance" placeholder="balance" value="<?php echo "$budgets[balance]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">                    
            <input type="comments" name="comments" class="form-control"  id="comments" placeholder="comments" value="<?php echo "$budgets[comments]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Comments_private"); ?></label>
        <div class="col-sm-8">                    
            <input type="comments_private" name="comments_private" class="form-control"  id="comments_private" placeholder="comments_private" value="<?php echo "$budgets[comments_private]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("R1"); ?></label>
        <div class="col-sm-8">                    
            <input type="r1" name="r1" class="form-control"  id="r1" placeholder="r1" value="<?php echo "$budgets[r1]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("R2"); ?></label>
        <div class="col-sm-8">                    
            <input type="r2" name="r2" class="form-control"  id="r2" placeholder="r2" value="<?php echo "$budgets[r2]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("R3"); ?></label>
        <div class="col-sm-8">                    
            <input type="r3" name="r3" class="form-control"  id="r3" placeholder="r3" value="<?php echo "$budgets[r3]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Fc"); ?></label>
        <div class="col-sm-8">                    
            <input type="fc" name="fc" class="form-control"  id="fc" placeholder="fc" value="<?php echo "$budgets[fc]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_update"); ?></label>
        <div class="col-sm-8">                    
            <input type="date_update" name="date_update" class="form-control"  id="date_update" placeholder="date_update" value="<?php echo "$budgets[date_update]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Days"); ?></label>
        <div class="col-sm-8">                    
            <input type="days" name="days" class="form-control"  id="days" placeholder="days" value="<?php echo "$budgets[days]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">                    
            <input type="ce" name="ce" class="form-control"  id="ce" placeholder="ce" value="<?php echo "$budgets[ce]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Key"); ?></label>
        <div class="col-sm-8">                    
            <input type="key" name="key" class="form-control"  id="key" placeholder="key" value="<?php echo "$budgets[key]"; ?>" disabled="" >
        </div>	
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$budgets[status]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

