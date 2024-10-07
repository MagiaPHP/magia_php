<form action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_account_number_edit">
    <input type="hidden" name="contact_id" value="<?php echo $bank->getContact_id(); ?>">
    <input type="hidden" name="bank_id" value="<?php echo $bank->getId(); ?>">


    <div class="form-group">
        <label for="bank"><?php _t("Account number"); ?></label>
        <input 
            type="text" 
            name="bank" 
            class="form-control" 
            id="account_number" 
            value="<?php echo $bank->getAccount_number(); ?>"
            placeholder=""
            >
    </div>

    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
</form>
