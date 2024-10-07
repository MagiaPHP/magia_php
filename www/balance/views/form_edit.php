<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="balance">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # client_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="client_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="client_id" class="form-control"  id="client_id" placeholder="client_id" value="<?php echo "$balance[client_id]"; ?>" >
        </div>	
    </div>
    <?php # /client_id ?>

    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="invoice_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="<?php echo "$balance[invoice_id]"; ?>" >
        </div>	
    </div>
    <?php # /invoice_id ?>

    <?php # credit_note_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="credit_note_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="credit_note_id" class="form-control"  id="credit_note_id" placeholder="credit_note_id" value="<?php echo "$balance[credit_note_id]"; ?>" >
        </div>	
    </div>
    <?php # /credit_note_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="type" class="form-control"  id="type" placeholder="type" value="<?php echo "$balance[type]"; ?>" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="account_number" class="form-control"  id="account_number" placeholder="account_number" value="<?php echo "$balance[account_number]"; ?>" >
        </div>	
    </div>
    <?php # /account_number ?>

    <?php # sub_total ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="sub_total"><?php _t("Sub_total"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="sub_total" class="form-control"  id="sub_total" placeholder="sub_total" value="<?php echo "$balance[sub_total]"; ?>" >
        </div>	
    </div>
    <?php # /sub_total ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tax" class="form-control"  id="tax" placeholder="tax" value="<?php echo "$balance[tax]"; ?>" >
        </div>	
    </div>
    <?php # /tax ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="total" class="form-control"  id="total" placeholder="total" value="<?php echo "$balance[total]"; ?>" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="ref" class="form-control"  id="ref" placeholder="ref" value="<?php echo "$balance[ref]"; ?>" >
        </div>	
    </div>
    <?php # /ref ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="<?php echo "$balance[description]"; ?>" >
        </div>	
    </div>
    <?php # /description ?>

    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ce"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="ce" class="form-control"  id="ce" placeholder="ce" value="<?php echo "$balance[ce]"; ?>" >
        </div>	
    </div>
    <?php # /ce ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$balance[date]"; ?>" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$balance[date_registre]"; ?>" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code" class="form-control"  id="code" placeholder="code" value="<?php echo "$balance[code]"; ?>" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # canceled ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="canceled"><?php _t("Canceled"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="canceled" class="form-control"  id="canceled" placeholder="canceled" value="<?php echo "$balance[canceled]"; ?>" >
        </div>	
    </div>
    <?php # /canceled ?>

    <?php # canceled_code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="canceled_code"><?php _t("Canceled_code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="canceled_code" class="form-control"  id="canceled_code" placeholder="canceled_code" value="<?php echo "$balance[canceled_code]"; ?>" >
        </div>	
    </div>
    <?php # /canceled_code ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

