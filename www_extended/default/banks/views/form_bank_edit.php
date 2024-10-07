<form action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_banks_edit">
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



    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
</form>
