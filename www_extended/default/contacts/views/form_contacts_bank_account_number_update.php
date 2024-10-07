
<form action="index.php" class="form-inline" method="post">
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="ok_account_number_update">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="bank_id" value="<?php echo "$banks_list_by_contact_id[id]"; ?>">
    <input type="hidden" name="redi" value="2">
    <input 
        type="text" 
        class="form-control"       
        name="account_number" 
        value="<?php echo "$banks_list_by_contact_id[account_number]"; ?>" 
        placeholder="<?php echo _t("Account number"); ?>" 
        required=""
        <?php echo ($banks_list_by_contact_id['status'] == 0 ) ? " disabled " : ""; ?>
        >


    <button type="submit" class="btn btn-default"
    <?php echo ($banks_list_by_contact_id['status'] == 0 ) ? " disabled " : ""; ?>
            >
                <?php echo icon("refresh"); ?>        
    </button>
</form>