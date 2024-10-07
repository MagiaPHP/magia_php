<form action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_subdomain_create">


    <?php /* <input type="hidden" name="bank_id" value="<?php echo $banks_list_by_contact_id['id']; ?>"> */ ?>

    <div class="form-group">
        <label for="bank"><?php _t("Bank"); ?></label>
        <input 
            type="text" 
            name="bank" 
            class="form-control" 
            id="bank" 
            value=""
            placeholder=""

            >
    </div>

    <div class="form-group">
        <label for="account_number"><?php _t("Account number"); ?></label>
        <input 
            type="text" 
            name="account_number" 
            class="form-control" 
            id="account_number" 
            value=""
            placeholder=""
            >
    </div>


    <div class="form-group">
        <label for="bic"><?php _t("BIC"); ?></label>
        <input 
            type="text" 
            name="bic" 
            class="form-control" 
            id="bic" 
            value=""
            placeholder=""
            >
    </div>


    <div class="form-group">
        <label for="iban"><?php _t("IBAN"); ?></label>
        <input 
            type="text" 
            name="iban" 
            class="form-control" 
            id="iban" 
            value=""
            placeholder=""
            >
    </div>




    <button type="submit" class="btn btn-default"><?php _t("Add"); ?></button>
</form>
