<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # client_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="client_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="client_id" class="form-control"  id="client_id" placeholder="client_id" value="<?php echo "$credit_notes[client_id]"; ?>" >
        </div>	
    </div>
    <?php # /client_id ?>

    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="invoice_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="<?php echo "$credit_notes[invoice_id]"; ?>" >
        </div>	
    </div>
    <?php # /invoice_id ?>

    <?php # addresses_billing ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="addresses_billing"><?php _t("Addresses_billing"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="addresses_billing" class="form-control"  id="addresses_billing" placeholder="addresses_billing" value="<?php echo "$credit_notes[addresses_billing]"; ?>" >
        </div>	
    </div>
    <?php # /addresses_billing ?>

    <?php # addresses_delivery ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="addresses_delivery"><?php _t("Addresses_delivery"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="addresses_delivery" class="form-control"  id="addresses_delivery" placeholder="addresses_delivery" value="<?php echo "$credit_notes[addresses_delivery]"; ?>" >
        </div>	
    </div>
    <?php # /addresses_delivery ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$credit_notes[date_registre]"; ?>" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="total" class="form-control"  id="total" placeholder="total" value="<?php echo "$credit_notes[total]"; ?>" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tax" class="form-control"  id="tax" placeholder="tax" value="<?php echo "$credit_notes[tax]"; ?>" >
        </div>	
    </div>
    <?php # /tax ?>

    <?php # returned ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="returned"><?php _t("Returned"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="returned" class="form-control"  id="returned" placeholder="returned" value="<?php echo "$credit_notes[returned]"; ?>" >
        </div>	
    </div>
    <?php # /returned ?>

    <?php # comments ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="comments"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="comments" class="form-control"  id="comments" placeholder="comments" value="<?php echo "$credit_notes[comments]"; ?>" >
        </div>	
    </div>
    <?php # /comments ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code" class="form-control"  id="code" placeholder="code" value="<?php echo "$credit_notes[code]"; ?>" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$credit_notes[status]"; ?>" >
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

