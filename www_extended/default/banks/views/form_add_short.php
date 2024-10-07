<?php
# MagiaPHP 
# file date creation: 2024-05-27 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="contact_id" value="<?php echo $arg["contact_id"]; ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">


    

    <?php # bank ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="bank"><?php _t("Bank"); ?> * </label>
        <div class="col-sm-8">
            <input type="text" name="bank" class="form-control" id="bank" placeholder="<?php _t("Bank name"); ?>" value="" required="" >
        </div>	
    </div>
    <?php # /bank ?>

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account number"); ?> * </label>
        <div class="col-sm-8">
            <input type="text" name="account_number" class="form-control" id="account_number" placeholder="<?php _t("Account number"); ?>" value=""  required="">
        </div>	
    </div>
    <?php # /account_number ?>

    <?php # bic ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="bic"><?php _t("Bic"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="bic" class="form-control" id="bic" placeholder="<?php _t("BIC number"); ?>" value="" >
        </div>	
    </div>
    <?php # /bic ?>

    <?php # iban ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="iban"><?php _t("Iban"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="iban" class="form-control" id="iban" placeholder="<?php _t("IBAN name"); ?>" value="" >
        </div>	
    </div>
    <?php # /iban ?>





    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
