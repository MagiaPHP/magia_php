<form method="post" action="index.php" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="ok_update_field">
    <input type="hidden" name="field" value="date_format">
    <input type="hidden" name="file" value="<?php echo $file; ?>">
    <input type="hidden" name="account_number" value="<?php echo $account_number; ?>">
    <input type="hidden" name="redi[redi]" value="6">
    <input type="hidden" name="redi[c]" value="banks_lines">
    <input type="hidden" name="redi[a]" value="import_check">
    <input type="hidden" name="redi[params]" value="<?php echo ("file=$file&account_number=$account_number"); ?>">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("Date format"); ?></label>
        <input 
            class="form-control"  
            type="text" 
            name="new_data" 
            value="<?php echo $bank->getDate_format(); ?>"            
            >
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon('refresh'); ?>
        <?php // _t("Changer template"); ?>
    </button>
</form>





