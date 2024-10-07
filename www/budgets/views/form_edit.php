<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="invoice_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="<?php echo "$budgets[invoice_id]"; ?>" >
        </div>	
    </div>
    <?php # /invoice_id ?>

    <?php # credit_note_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="credit_note_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="credit_note_id" class="form-control"  id="credit_note_id" placeholder="credit_note_id" value="<?php echo "$budgets[credit_note_id]"; ?>" >
        </div>	
    </div>
    <?php # /credit_note_id ?>

    <?php # client_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="client_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="client_id" class="form-control"  id="client_id" placeholder="client_id" value="<?php echo "$budgets[client_id]"; ?>" >
        </div>	
    </div>
    <?php # /client_id ?>

    <?php # seller_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="seller_id"><?php _t("Seller_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="seller_id" class="form-control"  id="seller_id" placeholder="seller_id" value="<?php echo "$budgets[seller_id]"; ?>" >
        </div>	
    </div>
    <?php # /seller_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$budgets[date]"; ?>" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$budgets[date_registre]"; ?>" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="total" class="form-control"  id="total" placeholder="total" value="<?php echo "$budgets[total]"; ?>" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tax" class="form-control"  id="tax" placeholder="tax" value="<?php echo "$budgets[tax]"; ?>" >
        </div>	
    </div>
    <?php # /tax ?>

    <?php # advance ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="advance"><?php _t("Advance"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="advance" class="form-control"  id="advance" placeholder="advance" value="<?php echo "$budgets[advance]"; ?>" >
        </div>	
    </div>
    <?php # /advance ?>

    <?php # balance ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="balance"><?php _t("Balance"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="balance" class="form-control"  id="balance" placeholder="balance" value="<?php echo "$budgets[balance]"; ?>" >
        </div>	
    </div>
    <?php # /balance ?>

    <?php # comments ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="comments"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="comments" class="form-control"  id="comments" placeholder="comments" value="<?php echo "$budgets[comments]"; ?>" >
        </div>	
    </div>
    <?php # /comments ?>

    <?php # comments_private ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="comments_private"><?php _t("Comments_private"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="comments_private" class="form-control"  id="comments_private" placeholder="comments_private" value="<?php echo "$budgets[comments_private]"; ?>" >
        </div>	
    </div>
    <?php # /comments_private ?>

    <?php # r1 ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="r1"><?php _t("R1"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="r1" class="form-control"  id="r1" placeholder="r1" value="<?php echo "$budgets[r1]"; ?>" >
        </div>	
    </div>
    <?php # /r1 ?>

    <?php # r2 ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="r2"><?php _t("R2"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="r2" class="form-control"  id="r2" placeholder="r2" value="<?php echo "$budgets[r2]"; ?>" >
        </div>	
    </div>
    <?php # /r2 ?>

    <?php # r3 ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="r3"><?php _t("R3"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="r3" class="form-control"  id="r3" placeholder="r3" value="<?php echo "$budgets[r3]"; ?>" >
        </div>	
    </div>
    <?php # /r3 ?>

    <?php # fc ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="fc"><?php _t("Fc"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="fc" class="form-control"  id="fc" placeholder="fc" value="<?php echo "$budgets[fc]"; ?>" >
        </div>	
    </div>
    <?php # /fc ?>

    <?php # date_update ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date_update"><?php _t("Date_update"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_update" class="form-control"  id="date_update" placeholder="date_update" value="<?php echo "$budgets[date_update]"; ?>" >
        </div>	
    </div>
    <?php # /date_update ?>

    <?php # days ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="days"><?php _t("Days"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="days" class="form-control"  id="days" placeholder="days" value="<?php echo "$budgets[days]"; ?>" >
        </div>	
    </div>
    <?php # /days ?>

    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ce"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="ce" class="form-control"  id="ce" placeholder="ce" value="<?php echo "$budgets[ce]"; ?>" >
        </div>	
    </div>
    <?php # /ce ?>

    <?php # key ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="key"><?php _t("Key"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="key" class="form-control"  id="key" placeholder="key" value="<?php echo "$budgets[key]"; ?>" >
        </div>	
    </div>
    <?php # /key ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$budgets[status]"; ?>" >
        </div>	
    </div>
    <?php # /status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

