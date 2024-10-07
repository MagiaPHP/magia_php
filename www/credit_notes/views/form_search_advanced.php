<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="search_advancedOk">




    <?php # client_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="client_id" class="form-control"  id="client_id" placeholder="client_id" value="">
        </div>	
    </div>
    <?php # client_id ?>

    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="">
        </div>	
    </div>
    <?php # invoice_id ?>

    <?php # addresses_billing ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Addresses_billing"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="addresses_billing" class="form-control"  id="addresses_billing" placeholder="addresses_billing" value="">
        </div>	
    </div>
    <?php # addresses_billing ?>

    <?php # addresses_delivery ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Addresses_delivery"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="addresses_delivery" class="form-control"  id="addresses_delivery" placeholder="addresses_delivery" value="">
        </div>	
    </div>
    <?php # addresses_delivery ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="">
        </div>	
    </div>
    <?php # date_registre ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Total"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="total" class="form-control"  id="total" placeholder="total" value="">
        </div>	
    </div>
    <?php # total ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tax" class="form-control"  id="tax" placeholder="tax" value="">
        </div>	
    </div>
    <?php # tax ?>

    <?php # returned ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Returned"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="returned" class="form-control"  id="returned" placeholder="returned" value="">
        </div>	
    </div>
    <?php # returned ?>

    <?php # comments ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="comments" class="form-control"  id="comments" placeholder="comments" value="">
        </div>	
    </div>
    <?php # comments ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code" class="form-control"  id="code" placeholder="code" value="">
        </div>	
    </div>
    <?php # code ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="">
        </div>	
    </div>
    <?php # status ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
