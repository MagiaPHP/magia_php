<form action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_banks_update">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="bank_id" value="<?php echo $banks_list_by_contact_id['id']; ?>">


    <div class="form-group">
        <label for="bank"><?php _t("Bank name"); ?></label>
        <input 
            type="text" 
            name="bank" 
            class="form-control" 
            id="bank" 
            value="<?php echo "$banks_list_by_contact_id[bank]"; ?>"
            placeholder="<?php echo "$banks_list_by_contact_id[bank]"; ?>"
            >
    </div>

    <div class="form-group">
        <label for="account_number"><?php _t("Account number"); ?></label>
        <input 
            type="text" 
            name="account_number" 
            class="form-control" 
            id="account_number" 
            value="<?php echo "$banks_list_by_contact_id[account_number]"; ?>"
            placeholder="<?php echo "$banks_list_by_contact_id[account_number]"; ?>"
            disabled=""
            >
    </div>


    <div class="form-group">
        <label for="bic"><?php _t("BIC"); ?></label>
        <input 
            type="text" 
            name="bic" 
            class="form-control" 
            id="bic" 
            value="<?php echo "$banks_list_by_contact_id[bic]"; ?>"
            placeholder="<?php echo "$banks_list_by_contact_id[bic]"; ?>"
            >
    </div>


    <div class="form-group">
        <label for="iban"><?php _t("IBAN"); ?></label>
        <input 
            type="text" 
            name="iban" 
            class="form-control" 
            id="iban" 
            value="<?php echo "$banks_list_by_contact_id[iban]"; ?>"
            placeholder="<?php echo "$banks_list_by_contact_id[iban]"; ?>"
            >
    </div>


    <div class="form-group">
        <label for="status"><?php _t("Status"); ?></label>
        <input 
            type="text" 
            name="status" 
            class="form-control" 
            id="status" 
            value="<?php echo "$banks_list_by_contact_id[status]"; ?>"
            placeholder="<?php echo "$banks_list_by_contact_id[status]"; ?>"
            >
    </div>


    <button type="submit" class="btn btn-default"
    <?php echo ($banks_list_by_contact_id['status'] == 0 ) ? " disabled " : ""; ?>
            >
                <?php _t("Update"); ?>
    </button>
</form>
