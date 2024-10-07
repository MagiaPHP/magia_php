<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$credit_notes[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # client_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="client_id" name="client_id" class="form-control"  id="client_id" placeholder="client_id" value="<?php echo "$credit_notes[client_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # client_id ?>

    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="invoice_id" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="<?php echo "$credit_notes[invoice_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # invoice_id ?>

    <?php # addresses_billing ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Addresses_billing"); ?></label>
        <div class="col-sm-8">                    
            <input type="addresses_billing" name="addresses_billing" class="form-control"  id="addresses_billing" placeholder="addresses_billing" value="<?php echo "$credit_notes[addresses_billing]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # addresses_billing ?>

    <?php # addresses_delivery ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Addresses_delivery"); ?></label>
        <div class="col-sm-8">                    
            <input type="addresses_delivery" name="addresses_delivery" class="form-control"  id="addresses_delivery" placeholder="addresses_delivery" value="<?php echo "$credit_notes[addresses_delivery]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # addresses_delivery ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="date_registre" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$credit_notes[date_registre]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # date_registre ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Total"); ?></label>
        <div class="col-sm-8">                    
            <input type="total" name="total" class="form-control"  id="total" placeholder="total" value="<?php echo "$credit_notes[total]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # total ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="tax" name="tax" class="form-control"  id="tax" placeholder="tax" value="<?php echo "$credit_notes[tax]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # tax ?>

    <?php # returned ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Returned"); ?></label>
        <div class="col-sm-8">                    
            <input type="returned" name="returned" class="form-control"  id="returned" placeholder="returned" value="<?php echo "$credit_notes[returned]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # returned ?>

    <?php # comments ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">                    
            <input type="comments" name="comments" class="form-control"  id="comments" placeholder="comments" value="<?php echo "$credit_notes[comments]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # comments ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="code" name="code" class="form-control"  id="code" placeholder="code" value="<?php echo "$credit_notes[code]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # code ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$credit_notes[status]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

