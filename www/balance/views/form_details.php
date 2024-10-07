<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="balance">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$balance[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # client_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="client_id" name="client_id" class="form-control"  id="client_id" placeholder="client_id" value="<?php echo "$balance[client_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # client_id ?>

    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="invoice_id" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="<?php echo "$balance[invoice_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # invoice_id ?>

    <?php # credit_note_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="credit_note_id" name="credit_note_id" class="form-control"  id="credit_note_id" placeholder="credit_note_id" value="<?php echo "$balance[credit_note_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # credit_note_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Type"); ?></label>
        <div class="col-sm-8">                    
            <input type="type" name="type" class="form-control"  id="type" placeholder="type" value="<?php echo "$balance[type]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # type ?>

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">                    
            <input type="account_number" name="account_number" class="form-control"  id="account_number" placeholder="account_number" value="<?php echo "$balance[account_number]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # account_number ?>

    <?php # sub_total ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Sub_total"); ?></label>
        <div class="col-sm-8">                    
            <input type="sub_total" name="sub_total" class="form-control"  id="sub_total" placeholder="sub_total" value="<?php echo "$balance[sub_total]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # sub_total ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="tax" name="tax" class="form-control"  id="tax" placeholder="tax" value="<?php echo "$balance[tax]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # tax ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Total"); ?></label>
        <div class="col-sm-8">                    
            <input type="total" name="total" class="form-control"  id="total" placeholder="total" value="<?php echo "$balance[total]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # total ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">                    
            <input type="ref" name="ref" class="form-control"  id="ref" placeholder="ref" value="<?php echo "$balance[ref]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # ref ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="description" name="description" class="form-control"  id="description" placeholder="description" value="<?php echo "$balance[description]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # description ?>

    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">                    
            <input type="ce" name="ce" class="form-control"  id="ce" placeholder="ce" value="<?php echo "$balance[ce]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # ce ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="date" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$balance[date]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # date ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="date_registre" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$balance[date_registre]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # date_registre ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="code" name="code" class="form-control"  id="code" placeholder="code" value="<?php echo "$balance[code]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # code ?>

    <?php # canceled ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Canceled"); ?></label>
        <div class="col-sm-8">                    
            <input type="canceled" name="canceled" class="form-control"  id="canceled" placeholder="canceled" value="<?php echo "$balance[canceled]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # canceled ?>

    <?php # canceled_code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Canceled_code"); ?></label>
        <div class="col-sm-8">                    
            <input type="canceled_code" name="canceled_code" class="form-control"  id="canceled_code" placeholder="canceled_code" value="<?php echo "$balance[canceled_code]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # canceled_code ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

