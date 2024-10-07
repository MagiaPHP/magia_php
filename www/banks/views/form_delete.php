<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $banks->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true"  disabled="" >
                <?php contacts_select("id", array("name", "lastname"), $banks->getContact_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # bank ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="bank"><?php _t("Bank"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="bank" class="form-control" id="bank" placeholder="bank" value="<?php echo $banks->getBank(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /bank ?>

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="account_number" class="form-control" id="account_number" placeholder="account_number" value="<?php echo $banks->getAccount_number(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /account_number ?>

    <?php # bic ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="bic"><?php _t("Bic"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="bic" class="form-control" id="bic" placeholder="bic" value="<?php echo $banks->getBic(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /bic ?>

    <?php # iban ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="iban"><?php _t("Iban"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="iban" class="form-control" id="iban" placeholder="iban" value="<?php echo $banks->getIban(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /iban ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="<?php echo $banks->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # codification ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="codification"><?php _t("Codification"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="codification" class="form-control" id="codification" placeholder="codification" value="<?php echo $banks->getCodification(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /codification ?>

    <?php # delimiter ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="delimiter"><?php _t("Delimiter"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="delimiter" class="form-control" id="delimiter" placeholder="delimiter" value="<?php echo $banks->getDelimiter(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /delimiter ?>

    <?php # date_format ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_format"><?php _t("Date_format"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="date_format" class="form-control" id="date_format" placeholder="date_format" value="<?php echo $banks->getDate_format(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_format ?>

    <?php # thousands_separator ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="thousands_separator"><?php _t("Thousands_separator"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="thousands_separator" class="form-control" id="thousands_separator" placeholder="thousands_separator" value="<?php echo $banks->getThousands_separator(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /thousands_separator ?>

    <?php # decimal_separator ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="decimal_separator"><?php _t("Decimal_separator"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="decimal_separator" class="form-control" id="decimal_separator" placeholder="decimal_separator" value="<?php echo $banks->getDecimal_separator(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /decimal_separator ?>

    <?php # invoices ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="invoices"><?php _t("Invoices"); ?></label>
        <div class="col-sm-8">
            <select name="invoices" class="form-control" id="invoices"  disabled="" >                
                <option value="1" <?php echo ($banks->getInvoices() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($banks->getInvoices() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /invoices ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $banks->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($banks->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($banks->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

